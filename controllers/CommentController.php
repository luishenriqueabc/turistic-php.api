<?php
class CommentController{
    
    function create(){
        $response = new Output();
        $response->allowedMethod('POST'); 
        // entrada  
        $email = $_POST['email'];
        $comentario = $_POST['comentario'];
        $comentario2 = $_POST['comentario2'];
        $comentario3 = $_POST['comentario3'];
        
        $comment = new Comment(null, $email, $comentario, $comentario2, $comentario3);
        $id = $comment->create();

        // saida
        $result['message'] = "Comentario feito com sucesso";
        $result['comment']['id'] = $id;
        $result['comment']['email'] = $email;
        $result['comment']['comentario'] = $comentario;
        $result['comment']['comentario2'] = $comentario2;
        $result['comment']['comentario3'] = $comentario3;
        $response->out($result);
    }
  
    function delete(){
        $response = new Output();
        $response->allowedMethod('POST'); 

        $id = $_POST['id'];
        $comment= new Comment ($id,null,null,null,null,null);
        $comment->delete();
        $result['message'] = "Mensagem deletado com sucesso";
        $result['comment']['id'] = $id;
        $response->out($result);
    }

    function update(){
        $response = new Output();
        $response->allowedMethod('POST');


        $id = $_POST['id'];
        $email = $_POST['email'];
        $comentario = $_POST['comentario'];
        $comentario2 = $_POST['comentario2'];
        $comentario3 = $_POST['comentario3'];
        $comment = new Comment($id,$email,$comentario,$comentario2,$comentario3);
        $comment->update();
        $result['message'] = "Comentario editado feito com Sucesso";
        $result['comment']['id'] = $id;
        $result['comment']['email'] = $email;
        $result['comment']['comentario'] = $comentario;
        $result['comment']['comentario2'] = $comentario2;
        $result['comment']['comentario3'] = $comentario3;
        $response->out($result);
    }

    function selectAll(){
        $response = new Output();
        $response->allowedMethod('GET');

        $comment= new Comment(null,null,null,null,null,null);
        $result = $comment->selectAll();
        $response->out($result);

    }

    function selectById(){
        $response = new Output();
        $response->allowedMethod('GET');
        $id = $_GET['id'];
        $comment = new Comment ($id,null,null,null,null,null);
        $result = $comment->selectById();
        
        $response->out($result);

    }
}
?>