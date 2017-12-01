<?php

session_start();

require 'admin/config.php';

require 'funciones.php';


if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $usuario = limpiar($_POST['usuario']);
    $pass = limpiar($_POST['password']);

    if($usuario == $blog_admin['usuario'] && $pass == $blog_admin['password'] ){

        $_SESSION['admin'] = $blog_admin['usuario'];
        header('Location: panel');

    }

}


require 'views/login.view.php';

?>