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

    $titulo   = limpiar($_POST['titulo']);
    $extracto = limpiar($_POST['extracto']);
    $texto    = $_POST['texto'];
    $id   = limpiar($_POST['id']);
    $thumb_guardada   = $_POST['thumb-guardada'];
    $thumb = $_FILES['thumb'];

    if(empty($thumb['name'])){

        $thumb = $thumb_guardada;

    }else{

        $archivo_subido = $blog_config['carpeta_imagenes'] . $_FILES['thumb']['name'];
        move_uploaded_file($_FILES['thumb']['tmp_name'], $archivo_subido );
        $thumb = $_FILES['thumb']['name']; 

    }

    
    $qry = $conexion -> prepare('UPDATE articulos SET titulo = :titulo, extracto = :extracto, texto = :texto, thumb = :thumb WHERE id = :id');
    $qry ->execute(array(':titulo' => $titulo, ':extracto' => $extracto, ':texto' => $texto, ':thumb' => $thumb, ':id' => $id)); 

    header('Location: panel');


}else{

    $id_articulo = id_articulo($_GET['id']);

    if(empty($id_articulo)){

        header('Location: panel');

    }

    $post = obtener_post_por_id($conexion, $id_articulo);

    if(!$post){
        header('Location: panel');
    }

    $post = $post[0];

}

require 'views/editar.view.php';

?>