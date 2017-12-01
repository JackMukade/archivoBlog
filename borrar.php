<?php 
session_start();

require 'admin/config.php';
require 'funciones.php';


comprobarSesion();

$conexion = conexion($bd_config);

if(!$conexion){
    header('Location: error.php');
}

$id = limpiar($_GET['id']);

if(!$id){
    header('Location: panel');

}

    
$qry = $conexion -> prepare('DELETE FROM articulos WHERE id = :id');
$qry ->execute(array(':id' => $id)); 

header('Location: panel');

?>