<?php

require 'admin/config.php';

require 'funciones.php';

$conexion = conexion($bd_config);

if(!$conexion){

    header('Location: error.php');

}

if($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['busqueda'])){

    $busqueda = limpiar($_GET['busqueda']);

    $qry = $conexion -> prepare('SELECT * FROM articulos WHERE titulo LIKE :busqueda OR texto LIKE :busqueda');
    $qry -> execute(array(':busqueda' => "%$busqueda%"));
    
    $resultados = $qry -> fetchAll();

    if(!$resultados){
        $titulo = "No se han encontrado articulos con el resultado: $busqueda";
    }else{
        $titulo = "Resultado de las busqueda: ".$busqueda;
    }

}else{
    header('Location: index.php');
}

require 'views/buscar.view.php';

?>