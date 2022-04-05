<?php 
class User{
    public $id;
    public $name;
    public $email;
    public $pass;
    function __construct($id, $name, $email, $pass) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->pass = $pass;
    }
    function create(){
        $db = new Database();
        try{
            $stmt = $db->conn->prepare("INSERT INTO users (name, email, pass)
            VALUES (:name, :email, :pass)");
            $stmt->bindParam(':name' , $this->name);
            $stmt->bindParam(':email' , $this->email);
            $stmt->bindParam(':pass' , $this->pass);
            $stmt->execute();
            $id = $db->conn->lastInsertId();
            $result['message'] = "Cadastrado com sucesso";
            $result['user']['id'] = $id;
            $result['user']['name'] = $this->name;
            $result['user']['email'] = $this->email;
            $result['user']['pass'] = $this->pass;
            $response = new Output();
            $response->out($result, 200);
        
        
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
            $stmt = $db->conn->prepare("DELETE FROM users WHERE id = :id;");
            $stmt->bindParam(':id' , $this->id);
            $stmt->execute();

        
            $result['message'] = "Deletado com sucesso";
            $result['user']['id'] = $this->id;
            $response = new Output();
            $response->out($result, 200);
        
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
            $stmt = $db->conn->prepare("UPDATE users SET name = :name,email=:email, pass=:pass WHERE id= :id");
            $stmt->bindParam(':id' , $this->id);
             $stmt->bindParam(':name' , $this->name);
             $stmt->bindParam(':email' , $this->email);
             $stmt->bindParam(':pass' , $this->pass);
            $stmt->execute();
            
            $id = $db->conn->lastInsertId();
            $result['message'] = "Update feito com Sucesso";
            $result['user']['id'] = $this->id;
            $result['user']['name'] = $this->name;
            $result['user']['email'] = $this->email;
            $result['user']['pass'] = $this->pass;
            $response = new Output();
            $response->out($result, 200);
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
            $stmt = $db->conn->prepare("SELECT * FROM users");
            $stmt->execute();
            $result = $stmt->fetchAll (PDO::FETCH_ASSOC);

            $response = new Output();

            $response->out($result);

        }
        catch(PDOException $e){
            $result['message'] = "404 - Rota api não encontrada." .$e-> getMessage();
            $response = new Output();
            $response->out($result, 404);
     }
    }

  }
?>