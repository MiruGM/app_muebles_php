<?php
require_once("config.php");
$conexion = obtenerConexion();

$sql = "SELECT * FROM categoria;";

// Ejecutar consulta
$resultado = mysqli_query($conexion, $sql);

// Montar tabla
$mensaje = "<h3 class='text-center boldRegularFont'>Listado de Categorías</h3>";
$mensaje .= "<div class='container' id='listados'><div class='row'><table class='table table-striped'>";
$mensaje .= "<thead><tr><th class='text-center'>ID CATEGORÍA</th><th class='text-center'>NOMBRE</th><th class='text-center'>DESCRIPCION</th><th class='text-center'>SE MANDA MONTADO</th><th class='text-center'>ACCION</th></tr></thead>";
$mensaje .= "<tbody>";

// Recorrer filas
while ($fila = mysqli_fetch_assoc($resultado)) {
    $mensaje .= "<tr><td class='text-center'>" . $fila['idcategoria'] . "</td>";
    $mensaje .= "<td>" . $fila['nombre'] . "</td>";
    $mensaje .= "<td>" . $fila['descripcion'] . "</td>";
    $mensaje .= "<td class='text-center'>" . ($fila['estamontado'] == 1 ? "Sí" : "No") . "</td>";

    $mensaje .= "<td class='text-center'><form class='d-inline me-1' action='editar_categoria.php' method='GET'>";
    $mensaje .= "<input type='hidden' name='categoria' value='" . htmlspecialchars(json_encode($fila),ENT_QUOTES) . "' />";
    $mensaje .= "<button name='Editar' class='btn btn-primary'><i class='bi bi-pencil-square'></i></button></form>";

    $mensaje .= "<form class='d-inline' action='proceso_borrar_categoria.php' method='post'>";
    $mensaje .= "<input type='hidden' name='idcategoria' value='" . $fila['idcategoria']  . "' />";
    $mensaje .= "<button name='Borrar' class='btn btn-danger'><i class='bi bi-trash'></i></button></form>";

    $mensaje .= "</td></tr>";
    
}

// Cerrar tabla
$mensaje .= "</tbody></table></div></div></body></html>";

// Insertamos cabecera
include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;

?>