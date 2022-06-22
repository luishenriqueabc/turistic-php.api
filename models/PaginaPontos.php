<?php 
class PaginaPontos{

    public $id;
    public $foto;
    public $foto2;
    public $foto3;
    public $name;
    public $sobre;
    public $pertence;
    public $quantaspessoas;


    function __construct($id, $foto, $foto2, $foto3,  $name, $sobre, $pertence, $quantaspessoas) {
    $this->id = $id;
    $this->foto = $foto;
    $this->foto2 = $foto2;
    $this->foto3 = $foto3;
    $this->name = $name;
    $this->sobre = $sobre;
    $this->pertence = $pertence;
    $this->quantaspessoas = $quantaspessoas;
    }

    function create(){
        $db = new Database();
        try{
            $stmt = $db->conn->prepare("INSERT INTO paginapontos (foto, foto2, foto3,name, sobre, pertence, quantaspessoas)
            VALUES (:foto, :foto2, :foto3,:name, :sobre, :pertence, :quantaspessoas)");
            $stmt->bindParam(':foto' , $this->foto);
            $stmt->bindParam(':foto2' , $this->foto2);
            $stmt->bindParam(':foto3' , $this->foto3);
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
            $stmt = $db->conn->prepare("DELETE FROM paginapontos WHERE id = :id;");
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
            $stmt = $db->conn->prepare("UPDATE paginapontos SET foto = :foto, foto2=:foto2,  foto3 = :foto3,name = :name, sobre=:sobre,  pertence = :pertence, quantaspessoas=:quantaspessoas WHERE id= :id");
            $stmt->bindParam(':id' , $this->id);
            $stmt->bindParam(':foto' , $this->foto);
            $stmt->bindParam(':foto2' , $this->foto2);
            $stmt->bindParam(':foto3' , $this->foto3);
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
            $stmt = $db->conn->prepare("SELECT * FROM paginapontos ");
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
            $stmt = $db->conn->prepare("SELECT * FROM paginapontos WHERE id = :id;");
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