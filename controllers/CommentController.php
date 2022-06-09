<?php
class CommentController{
    
    function create(){
        $response = new Output();
        $response->allowedMethod('POST'); 
        // entrada  
        $email = $_POST['email'];
        $comentario = $_POST['comentario'];
      
        
        $comment = new Comment(null, $email, $comentario);
        $id = $comment->create();

        // saida
        $result['message'] = "Comentario feito com sucesso";
        $result['comment']['id'] = $id;
        $result['comment']['email'] = $email;
        $result['comment']['comentario'] = $comentario;
        $response->out($result);
    }
  
    function delete(){
        $response = new Output();
        $response->allowedMethod('POST'); 

        $id = $_POST['id'];
        $comment= new Comment ($id,null,null);
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
        $comment = new Comment($id,$email,$comentario);
        $comment->update();
        $result['message'] = "Comentario editado feito com Sucesso";
        $result['comment']['id'] = $id;
        $result['comment']['email'] = $email;
        $result['comment']['comentario'] = $comentario;
        $response->out($result);
    }

    function selectAll(){
        $response = new Output();
        $response->allowedMethod('GET');

        $comment= new Comment(null,null,null);
        $result = $comment->selectAll();
        $response->out($result);

    }

    function selectById(){
        $response = new Output();
        $response->allowedMethod('GET');
        $id = $_GET['id'];
        $comment = new Comment ($id,null,null);
        $result = $comment->selectById();
        
        $response->out($result);

    }
}
?>