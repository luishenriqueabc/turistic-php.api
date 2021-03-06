<?php 
class Figure{

    public $id;
    public $foto;
    public $nome;
    public $nome2;
    public $nome3;
    public $nome4;


    function __construct($id, $foto, $nome, $nome2, $nome3, $nome4) {
        $this->id = $id;
        $this->foto = $foto;
        $this->nome = $nome;
        $this->nome2 = $nome2;
        $this->nome3 = $nome3;
        $this->nome4 = $nome4;
    }

    function create(){
        $db = new Database();
        try{
            $stmt = $db->conn->prepare("INSERT INTO figure (foto, nome, nome2, nome3, nome4)
            VALUES (:foto, :nome, :nome2, :nome3, :nome4)");
            $stmt->bindParam(':foto' , $this->foto);
            $stmt->bindParam(':nome' , $this->nome);
            $stmt->bindParam(':nome2' , $this->nome2);
            $stmt->bindParam(':nome3' , $this->nome3);
            $stmt->bindParam(':nome4' , $this->nome4);
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
            $stmt = $db->conn->prepare("UPDATE figure SET foto = :foto, nome=:nome, nome2=:nome2 , nome3=:nome3 , nome4=:nome4  WHERE id= :id");
            $stmt->bindParam(':id' , $this->id);
            $stmt->bindParam(':foto' , $this->foto);
            $stmt->bindParam(':nome' , $this->nome);
            $stmt->bindParam(':nome2' , $this->nome2);
            $stmt->bindParam(':nome3' , $this->nome3);
            $stmt->bindParam(':nome4' , $this->nome4);
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
            $result['message'] = "404 - Rota api n??o encontrada." .$e-> getMessage();
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