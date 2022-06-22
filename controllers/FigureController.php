<?php
class FigureController{

    function create(){
        $response = new Output();
        $response->allowedMethod('POST'); 
        // entrada  
        $foto = $_POST['foto'];
        $nome = $_POST['nome'];
        $nome2 = $_POST['nome2'];
        $nome3 = $_POST['nome3'];
        $nome4 = $_POST['nome4'];
     


        $figure = new Figure(null, $foto, $nome, $nome2, $nome3, $nome4);
        $id = $figure->create();

        // saida
        $result['message'] = "Figura feita com sucesso";
        $result['figure']['id'] = $id;
        $result['figure']['foto'] = $foto;
        $result['figure']['nome'] = $nome;
        $result['figure']['nome2'] = $nome2;
        $result['figure']['nome3'] = $nome3;
        $result['figure']['nome4'] = $nome4;
        $response->out($result);
    }

    function delete(){
        $response = new Output();
        $response->allowedMethod('POST'); 

        $id = $_POST['id'];
        $figure= new Figure ($id,null,null,null,null,null);
        $figure->delete();
        $result['message'] = "Figura deletada com sucesso";
        $result['figure']['id'] = $id;
        $response->out($result);
    }

    function update(){
        $response = new Output();
        $response->allowedMethod('POST');


        $id = $_POST['id'];
        $foto = $_POST['foto'];
        $nome = $_POST['nome'];
        $nome2 = $_POST['nome2'];
        $nome3 = $_POST['nome3'];
        $nome4 = $_POST['nome4'];
      
        $figure = new Figure(null, $foto, $nome, $nome2, $nome3, $nome4);
        $figure->update();
        $result['message'] = "nome editado feito com Sucesso";
        $result['figure']['id'] = $id;
        $result['figure']['foto'] = $foto;
        $result['figure']['nome'] = $nome;
        $result['figure']['nome2'] = $nome2;
        $result['figure']['nome3'] = $nome3;
        $result['figure']['nome4'] = $nome4;
        $response->out($result);
    }

    function selectAll(){
        $response = new Output();
        $response->allowedMethod('GET');

        $figure= new Figure(null,null,null,null,null,null);
        $result = $figure->selectAll();
        $response->out($result);

    }

    function selectById(){
        $response = new Output();
        $response->allowedMethod('GET');
        $id = $_GET['id'];
        $figure = new Figure ($id,null,null,null,null,null);
        $result = $figure->selectById();

        $response->out($result);

    }
}
?>