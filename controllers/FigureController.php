<?php
class FigureController{
    
    function create(){
        $response = new Output();
        $response->allowedMethod('POST'); 
        // entrada  
        $foto = $_POST['foto'];
        $foto2 = $_POST['foto2'];
        $foto3 = $_POST['foto3'];
        $fotodofigure = $_POST['fotodofigure'];
        $nome = $_POST['nome'];
        $sobre = $_POST['sobre'];
        $pertence = $_POST['pertence'];
        $quantaspessoas = $_POST['quantaspessoas'];
      
        
        $figure = new Figure(null, $foto, $foto2, $foto3,$fotodofigure, $nome, $sobre, $pertence, $quantaspessoas);
        $id = $figure->create();

        // saida
        $result['message'] = "Figura feita com sucesso";
        $result['figure']['id'] = $id;
        $result['figure']['foto'] = $foto;
        $result['figure']['foto2'] = $foto2;
        $result['figure']['foto3'] = $foto3;
        $result['figure']['fotodofigure'] = $fotodofigure;
        $result['figure']['nome'] = $nome;
        $result['figure']['sobre'] = $sobre;
        $result['figure']['pertence'] = $pertence;
        $result['figure']['quantaspessoas'] = $quantaspessoas;
        $response->out($result);
    }
  
    function delete(){
        $response = new Output();
        $response->allowedMethod('POST'); 

        $id = $_POST['id'];
        $figure= new Figure ($id,null,null,null,null,null,null,null,null);
        $figure->delete();
        $result['message'] = "Figura deletada com sucesso";
        $result['figure']['id'] = $id;
        $response->out($result);
    }

    function update(){
        $response = new Output();
        $response->allowedMethod('POST');


        $foto = $_POST['foto'];
        $foto2 = $_POST['foto2'];
        $foto3 = $_POST['foto3'];
        $fotodofigure = $_POST['fotodofigure'];
        $nome = $_POST['nome'];
        $sobre = $_POST['sobre'];
        $pertence = $_POST['pertence'];
        $quantaspessoas = $_POST['quantaspessoas'];
        $figure = new Figure($id, $foto, $foto2, $foto3,$fotodofigure, $nome, $sobre, $pertence, $quantaspessoas);
        $figure->update();
        $result['message'] = "nome editado feito com Sucesso";
        $result['figure']['id'] = $id;
        $result['figure']['foto'] = $foto;
        $result['figure']['foto2'] = $foto2;
        $result['figure']['foto3'] = $foto3;
        $result['figure']['fotodofigure'] = $fotodofigure;
        $result['figure']['nome'] = $nome;
        $result['figure']['sobre'] = $sobre;
        $result['figure']['pertence'] = $pertence;
        $result['figure']['quantaspessoas'] = $quantaspessoas;
        $response->out($result);
    }

    function selectAll(){
        $response = new Output();
        $response->allowedMethod('GET');

        $figure= new Figure(null,null,null,null,null,null,null,null,null);
        $result = $figure->selectAll();
        $response->out($result);

    }

    function selectById(){
        $response = new Output();
        $response->allowedMethod('GET');
        $id = $_GET['id'];
        $figure = new Figure ($id,null,null,null,null,null,null,null,null);
        $result = $figure->selectById();
        
        $response->out($result);

    }
}
?>