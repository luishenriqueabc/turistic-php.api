<?php 
class Figure{

    public $id;
    public $foto;
    public $nome;
   
    
    function __construct($id, $foto, $nome) {
        $this->id = $id;
        $this->foto = $foto;
        $this->nome = $nome;
    }
    
    function create(){
        $db = new Database();
        try{
            $stmt = $db->conn->prepare("INSERT INTO figure (foto, nome)
            VALUES (:foto, :nome)");
            $stmt->bindParam(':foto' , $this->foto);
            $stmt->bindParam(':nome' , $this->nome);
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
            $stmt = $db->conn->prepare("DELETE FROM figure WHERE id = :id;");
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
            $stmt = $db->conn->prepare("UPDATE figure SET foto = :foto, nome=:nome WHERE id= :id");
            $stmt->bindParam(':id' , $this->id);
            $stmt->bindParam(':foto' , $this->foto);
            $stmt->bindParam(':nome' , $this->nome);
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
            $stmt = $db->conn->prepare("SELECT * FROM figure ");
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
            $stmt = $db->conn->prepare("SELECT * FROM figure WHERE id = :id;");
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