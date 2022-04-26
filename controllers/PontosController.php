<?php
class PontosController{
    
    function create(){
        $response = new Output();
        $response->allowedMethod('POST'); 
        // entrada
        $name = $_POST['name'];
        $description = $_POST['description'];
        $image = $_POST['image'];

        $ponto = new Turistic(null, $name,$description,$image);
        $id = $ponto->create();

        // saida
        $result['message'] = " Ponto Cadastrado com sucesso";
        $result['pontos']['id'] = $id;
        $result['pontos']['name'] = $name;
        $result['pontos']['description'] = $description;
        $result['pontos']['image'] = $image;
        $response->out($result);
    }
  
    function delete(){
        $response = new Output();
        $response->allowedMethod('POST'); 

        $id = $_POST['id'];
        $ponto = new Turistic($id,null,null,null);
        $user->delete();
        $result['message'] = "Deletado com sucesso";
        $result['pontos']['id'] = $id;
        $response->out($result);
    }

    function update(){
        $response = new Output();
        $response->allowedMethod('POST');


        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $image = $_POST['image'];
        $user = new User($id,$name,$description,$image);
        $user->update();
        $result['message'] = "Update feito com Sucesso";
        $result['pontos']['id'] = $id;
        $result['pontos']['name'] = $name;
        $result['pontos']['description'] = $description;
        $result['pontos']['image'] = $image;
        $response->out($result);
    }

    function selectAll(){
        $response = new Output();
        $response->allowedMethod('GET');

        $ponto = new Turistic (null,null,null,null);
        $result = $ponto->selectAll();
        $response->out($result);

    }

    function selectById(){
        $response = new Output();
        $response->allowedMethod('GET');
        $id = $_GET['id'];
        $ponto = new Turistic ($id,null,null,null);
        $result = $user->selectById();
        
        $response->out($result);

    }
}
?>