<?php
require_once("config.php");
$conexion = obtenerConexion();

// Recuperar parámetros
$nombre = $_POST['txtNombreCategoria'];
$descripcion = $_POST['txtDescripcionCategoria'];
$estamontado = isset($_POST['chkMontado']) ? 1 : 0;

// Definir insert
$sql = "INSERT INTO categoria (`idcategoria`, `nombre`, `descripcion`, `estamontado`) 
                VALUES (null,'" . $nombre . "', '" . $descripcion . "', $estamontado );";

// Ejecutar consulta
$resultado = mysqli_query($conexion, $sql);

// Verificar si hay error y almacenar mensaje
if (mysqli_errno($conexion) != 0) {
    $numerror = mysqli_errno($conexion);
    $descrerror = mysqli_error($conexion);
    $mensaje =  "<h3 class='text-center boldRegularFont'>Se ha producido un error numero $numerror que corresponde a: $descrerror </h3>";
} else {
    $mensaje =  "<h3 class='text-center boldRegularFont'>Categoría insertada correctamente</h3>"; 
}

//Aquí empieza la página 
include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;

?>