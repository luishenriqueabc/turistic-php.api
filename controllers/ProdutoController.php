<?php
if(isset($route[1]) && $route[1] != ''){
    $user = new Produto(5, 'Luis Henrique',' R$ 50,00',' Luis Henrique', '15');
    
    if($route[1] == 'create'){
        $user->create();
    }elseif ($route[1] == 'delete') {
        $user->delete();
    }else{
        $result['message'] = "404 - Rota api não encontrada.";
        $response = new Output();
        $response->out($result, 404);
    }
}else{
    $result['message'] = "404 - Rota api não encontrada." ;
    $response = new Output();
    $response->out($result, 404);
}

?>