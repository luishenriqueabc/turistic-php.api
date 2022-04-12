<?php
define('FOLDER','/lp2/api/'); // cria a constante caminho padrão
$url = $_SERVER['REQUEST_URI']; // pega o que está na url
$lengthStrFolder = strlen(FOLDER); // guarda o tamanho da constante folder
$urlClean = substr($url, $lengthStrFolder); // separa a string por partes

$route = explode('/', $urlClean);

// carrega os autoloades
require('helpers/autoloaders.php');
// cria objeto de resposta de api
$response = new Output();

if(!isset($route[0])  ||   !isset($route[1])){
    $result['message'] = "404 - Rota api não encontrada.";
    $response->out($result, 404);
}

$controller_name = $route[0];
$action = str_replace('-', '', $route[1]);

//Checa se o controller existe
$controller_path = 'controllers/' . $controller_name . 'Controller.php';

// checa se o arquivo do controller existe
if(file_exists($controller_path)){
    $controller_class_name = $controller_name.'Controller';
    $controller = new $controller_class_name();
    // checa se a action do controller existe
    if(method_exists($controller, $action)){
        $controller->$action();
    }
}

$result['message'] = "404 - Rota api não encontrada.";
$response->out($result, 404);
?>