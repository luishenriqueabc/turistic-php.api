<?php
class Output{
    function out($result = [], $code = 200){
        header('Content-Type: application/json; charset=utf-8');
        header('Acess-Control-Allow-Origin: *');
        http_response_code($code);
        echo json_encode($result);
        die;
    }
};




?>