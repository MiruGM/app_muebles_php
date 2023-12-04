<?php
require_once("config.php");
$conexion = obtenerConexion();

// Recuperar parámetros
$idcategoria = $_POST['idcategoria'];

// Definir delete
$sql = "DELETE FROM categoria WHERE idcategoria = $idcategoria;";

// Ejecutar consulta
$resultado = mysqli_query($conexion, $sql);

// Verificar si hay error y almacenar mensaje
if (mysqli_errno($conexion) != 0) {
    $numerror = mysqli_errno($conexion);
    $descrerror = mysqli_error($conexion);
    $mensaje =  "<h3 class='text-center boldRegularFont'>Se ha producido un error numero $numerror que corresponde a: $descrerror </h3>";
} else {
    $mensaje =  "<h3 class='text-center boldRegularFont'>La categoría con id $idcategoria se ha borrado correctamente</h3>"; 
}

include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;

?>