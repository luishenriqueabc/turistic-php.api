<?php
    if(isset($route[1]) && $route[1] != ''){
        if($route[1] == 'create'){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            $user = new User(null, $name,$email,$pass);
            $user->create();
        }elseif ($route[1] == 'delete') {
            $id = $_POST['id'];
            $user = new User($id,null,null, null);
            $user->delete();
        }elseif ($route[1] == 'update') {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            $user = new User($id,$name,$email,$pass);
            $user->update();
        }else{
            echo "Página não econtrada";
        }
    }else{
        echo "Página não econtrada";
    }
?>