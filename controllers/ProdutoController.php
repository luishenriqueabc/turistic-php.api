<?php
if(isset($route[1]) && $route[1] != ''){
    $user = new Produto(5, 'Lira dos 20 Anos',' R$ 50,00',' Álvares de Azevedo', '15');
    
    if($route[1] == 'create'){
        $user->create();
    }elseif ($route[1] == 'delete') {
        $user->delete();
    }else{
        echo "Página não econtrada";
    }
}else{
    echo "Página não econtrada";
}

?>