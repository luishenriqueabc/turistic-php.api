<?php
class FigureController{
    
    function create(){
        $response = new Output();
        $response->allowedMethod('POST'); 
        // entrada  
        $foto = $_POST['foto'];
        $nome = $_POST['nome'];
      
        
        $figure = new Figure(null, $foto, $nome);
        $id = $figure->create();

        // saida
        $result['message'] = "Figura feita com sucesso";
        $result['figure']['id'] = $id;
        $result['figure']['foto'] = $foto;
        $result['figure']['nome'] = $nome;
        $response->out($result);
    }
  
    function delete(){
        $response = new Output();
        $response->allowedMethod('POST'); 

        $id = $_POST['id'];
        $figure= new Figure ($id,null,null);
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
        $figure = new Figure($id,$foto,$nome);
        $figure->update();
        $result['message'] = "nome editado feito com Sucesso";
        $result['figure']['id'] = $id;
        $result['figure']['foto'] = $foto;
        $result['figure']['nome'] = $nome;
        $response->out($result);
    }

    function selectAll(){
        $response = new Output();
        $response->allowedMethod('GET');

        $figure= new Figure(null,null,null);
        $result = $figure->selectAll();
        $response->out($result);

    }

    function selectById(){
        $response = new Output();
        $response->allowedMethod('GET');
        $id = $_GET['id'];
        $figure = new Figure ($id,null,null);
        $result = $figure->selectById();
        
        $response->out($result);

    }
}
?>