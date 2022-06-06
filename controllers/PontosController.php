<?php
class PontosController{
    
    function create(){
        $response = new Output();
        $response->allowedMethod('POST'); 
        // entrada  
        $name = $_POST['name'];
        $sobre = $_POST['sobre'];
        $pertence = $_POST['pertence'];
        $quantaspessoas = $_POST['quantaspessoas'];
        
       

        $pontos = new Pontos (null, $name, $sobre, $pertence, $quantaspessoas);
        $id = $pontos->create();

        // saida
        $result['message'] = "Ponto cadastrado com sucesso";
        $result['pontos']['id'] = $id;
        $result['pontos']['name'] = $name;
        $result['pontos']['sobre'] = $sobre;
        $result['pontos']['pertence'] = $pertence;
        $result['pontos']['quantaspessoas'] = $quantaspessoas;
   
       
        $response->out($result);
    }
  
    function delete(){
        $response = new Output();
        $response->allowedMethod('POST'); 

        $id = $_POST['id'];
        $pontos = new Pontos ($id,null,null,null,null);
        $pontos->delete();
        $result['message'] = "Ponto deletado com sucesso";
        $result['pontos']['id'] = $id;
        $response->out($result);
    }

    function update(){
        $response = new Output();
        $response->allowedMethod('POST');


        $id = $_POST['id'];
        $name = $_POST['name'];
        $sobre = $_POST['sobre'];
        $pertence = $_POST['pertence'];
        $quantaspessoas = $_POST['quantaspessoas'];
        $pontos = new Pontos ($id,$name,$sobre,$pertence,$quantaspessoas);
        $pontos->update();
        $result['message'] = "Ponto update feito com Sucesso";
        $result['pontos']['id'] = $id;
        $result['pontos']['name'] = $name;
        $result['pontos']['sobre'] = $sobre;
        $result['pontos']['pertence'] = $pertence;
        $result['pontos']['quantaspessoas'] = $quantaspessoas;
        $response->out($result);
    }

    function selectAll(){
        $response = new Output();
        $response->allowedMethod('GET');

        $pontos = new Pontos(null,null,null,null,null);
        $result = $pontos->selectAll();
        $response->out($result);

    }

    function selectById(){
        $response = new Output();
        $response->allowedMethod('GET');
        $id = $_GET['id'];
        $pontos = new Pontos ($id,null,null,null,null);
        $result = $pontos->selectById();
        
        $response->out($result);

    }
}
?>