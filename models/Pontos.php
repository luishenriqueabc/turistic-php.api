<?php 
class Pontos{

    public $id;
    public $name;
    public $sobre;
    public $foto;
    public $foto2;
    public $foto3;
    
    function __construct($id, $name, $sobre, $foto, $foto2, $foto3) {
        $this->id = $id;
        $this->name = $name;
        $this->sobre = $sobre;
        $this->foto = $foto;
        $this->foto2 = $foto2;
        $this->foto3 = $foto3;
    }
    
    function create(){
        $db = new Database();
        try{
            $stmt = $db->conn->prepare("INSERT INTO pontos (name, sobre, foto,foto2,foto3)
            VALUES (:name, :sobre, :foto,:foto2,:foto3)");
            $stmt->bindParam(':name' , $this->name);
            $stmt->bindParam(':sobre' , $this->sobre);
            $stmt->bindParam(':foto' , $this->foto);
            $stmt->bindParam(':foto2' , $this->foto2);
            $stmt->bindParam(':foto3' , $this->foto3);
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
            $stmt = $db->conn->prepare("UPDATE pontos SET name = :name, sobre=:sobre, foto=:foto, foto2=:foto2, foto3=:foto3 WHERE id= :id");
            $stmt->bindParam(':id' , $this->id);
            $stmt->bindParam(':name' , $this->name);
            $stmt->bindParam(':sobre' , $this->sobre);
            $stmt->bindParam(':foto' , $this->foto);
            $stmt->bindParam(':foto2' , $this->foto2);
            $stmt->bindParam(':foto3' , $this->foto3);
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