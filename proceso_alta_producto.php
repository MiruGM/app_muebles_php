<?php
require_once("config.php");
$conexion = obtenerConexion();

// Recuperar parámetros
$nombre = $_POST['txtNombreProducto'];
$descripcion = $_POST['txtDescripcionProducto'];
$precio = $_POST['txtPrecioProducto'];
$idcategoria = $_POST['lstCategoria'];

// Definir insert
$sql = "INSERT INTO producto(`idproducto`, `nombre`, `descripcion`, `precio`, `idcategoria`) 
                VALUES (null,'" . $nombre . "', '" . $descripcion . "', $precio, $idcategoria );";

// Ejecutar consulta
$resultado = mysqli_query($conexion, $sql);

// Verificar si hay error y almacenar mensaje
if (mysqli_errno($conexion) != 0) {
    $numerror = mysqli_errno($conexion);
    $descrerror = mysqli_error($conexion);
    $mensaje =  "<h3 class='text-center boldRegularFont'>Se ha producido un error numero $numerror que corresponde a: $descrerror </h3>";
} else {
    $mensaje =  "<h3 class='text-center boldRegularFont'>Producto insertado correctamente</h3>"; 
}

//Aquí empieza la página 
include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;

?>