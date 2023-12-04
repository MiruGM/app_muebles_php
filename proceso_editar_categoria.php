<?php
require_once("config.php");
$conexion = obtenerConexion();

// Recuperar parámetros
$idcategoria = $_POST['txtEditarIdCategoria'];
$nombre = $_POST['txtEditarNombreCategoria'];
$descripcion = $_POST['txtEditarDescripcionCategoria'];
$estamontado = $_POST['chkEditarMontado'] ? 1 : 0;

// Definir insert
$sql = "UPDATE categoria SET nombre='" . $nombre . 
            "', descripcion='" . $descripcion . 
            "', estamontado=" . $estamontado .
            " WHERE idcategoria=" . $idcategoria . ";"; 

// Ejecutar consulta
$resultado = mysqli_query($conexion, $sql);

// Verificar si hay error y almacenar mensaje
if (mysqli_errno($conexion) != 0) {
    $numerror = mysqli_errno($conexion);
    $descrerror = mysqli_error($conexion);
    $mensaje =  "<h3 class='text-center boldRegularFont'>Se ha producido un error numero $numerror que corresponde a: $descrerror </h3>";
} else {
    $mensaje =  "<h3 class='text-center boldRegularFont'>Categoria actualizada correctamente</h3>"; 
}

//Aquí empieza la página 
include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;

?>