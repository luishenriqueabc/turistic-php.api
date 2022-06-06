<?php 
class Pontos{

    public $id;
    public $name;
    public $sobre;
    public $pertence;
    public $quantaspessoas;

    
    function __construct($id, $name, $sobre, $pertence, $quantaspessoas) {
        $this->id = $id;
        $this->name = $name;
        $this->sobre = $sobre;
        $this->pertence = $pertence;
        $this->quantaspessoas = $quantaspessoas;
    }
    
    function create(){
        $db = new Database();
        try{
            $stmt = $db->conn->prepare("INSERT INTO pontos (name, sobre, pertence, quantaspessoas)
            VALUES (:name, :sobre, :pertence, :quantaspessoas)");
            $stmt->bindParam(':name' , $this->name);
            $stmt->bindParam(':sobre' , $this->sobre);
            $stmt->bindParam(':pertence' , $this->pertence);
            $stmt->bindParam(':quantaspessoas' , $this->quantaspessoas);
            $stmt->execute();
            $id = $db->conn->lastInsertId();

            return $id;
        }
        catch(PDOException $e){
            $result['message'] = "Erro ao criar" .$e-> getMessage();
            $response = new Output();
            $response->out($result, 500);
        }
    }

    function delete(){
        $db = new Database();
        try{
            $stmt = $db->conn->prepare("DELETE FROM pontos WHERE id = :id;");
            $stmt->bindParam(':id' , $this->id);
            $stmt->execute();
            return true;
        }
        catch(PDOException $e){
            $result['message'] = "Erro ao deletar" .$e-> getMessage();
            $response = new Output();
            $response->out($result, 500);
        }
    }
    
    function update(){
        $db = new Database();
        try{
            $stmt = $db->conn->prepare("UPDATE pontos SET name = :name, sobre=:sobre,  pertence = :pertence, quantaspessoas=:quantaspessoas WHERE id= :id");
            $stmt->bindParam(':id' , $this->id);
            $stmt->bindParam(':name' , $this->name);
            $stmt->bindParam(':sobre' , $this->sobre);
            $stmt->bindParam(':pertence' , $this->pertence);
            $stmt->bindParam(':quantaspessoas' , $this->quantaspessoas);
            $stmt->execute();
            return true;
        }
        catch(PDOException $e){
            $result['message'] = "Erro de update." .$e-> getMessage();
            $response = new Output();
            $response->out($result, 500);
        }
    }
       
    function selectAll(){
        $db = new Database();
        try{
            $stmt = $db->conn->prepare("SELECT * FROM pontos ");
            $stmt->execute();
            $result = $stmt->fetchAll (PDO::FETCH_ASSOC);
            return $result;
        }
        catch(PDOException $e){
            $result['message'] = "404 - Rota api não encontrada." .$e-> getMessage();
            $response = new Output();
            $response->out($result, 404);
        }
    }
    function selectById(){
        $db = new Database();
        try{
            $stmt = $db->conn->prepare("SELECT * FROM pontos WHERE id = :id;");
            $stmt->bindParam(':id', $this->id);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            $result['message'] = "Error - SelectById: " .$e-> getMessage();
            $response = new Output();
            $response->out($result, 500);
        }
    }
}

?>