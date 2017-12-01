<?php 
session_start();

require 'admin/config.php';
require 'funciones.php';


comprobarSesion();

$conexion = conexion($bd_config);

if(!$conexion){
    header('Location: error.php');
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $titulo = limpiar($_POST['titulo']);
    $extracto = limpiar($_POST['extracto']);
    $texto = limpiar($_POST['texto']);
    $thumb = $_FILES['thumb']['tmp_name'];

    $archivo_subido =  $blog_config['carpeta_imagenes']. $_FILES['thumb']['name'] ;

    move_uploaded_file($thumb, $archivo_subido);

    $qry = $conexion -> prepare('INSERT INTO articulos (id, titulo, extracto, texto, thumb ) VALUES (null, :titulo, :extracto, :texto, :thumb)');
    $qry ->execute(array(':titulo' => $titulo, ':extracto' => $extracto, ':texto' => $texto, ':thumb' => $_FILES['thumb']['name'])); 

    header('Location: panel');

}




require 'views/nuevo.views.php';

?>