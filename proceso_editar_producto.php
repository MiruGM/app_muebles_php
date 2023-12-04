<?php
require_once("config.php");
$conexion = obtenerConexion();

// Recuperar parámetros
$idproducto = $_POST['txtIdProductoEditar'];
$nombre = $_POST['txtNombreProductoEditar'];
$descripcion = $_POST['txtDescripcionProductoEditar'];
$precio = $_POST['txtPrecioProductoEditar'];
$idcategoria = $_POST['lstCategoriaEditar'];

// Definir insert
$sql = "UPDATE producto SET nombre='" . $nombre . 
            "', descripcion='" . $descripcion . 
            "', precio=" . $precio . 
            ", idcategoria=" . $idcategoria . 
            " WHERE idproducto=" . $idproducto . ";"; 

// Ejecutar consulta
$resultado = mysqli_query($conexion, $sql);

// Verificar si hay error y almacenar mensaje
if (mysqli_errno($conexion) != 0) {
    $numerror = mysqli_errno($conexion);
    $descrerror = mysqli_error($conexion);
    $mensaje =  "<h3 class='text-center boldRegularFont'>Se ha producido un error numero $numerror que corresponde a: $descrerror </h3>";
} else {
    $mensaje =  "<h3 class='text-center boldRegularFont'>Producto actualizado correctamente</h3>"; 
}

 //Aquí empieza la página 
 include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;

?>