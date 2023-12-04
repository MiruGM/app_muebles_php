<?php
require_once("config.php");
$conexion = obtenerConexion();

//Recoger parámetros de entrada: 
$precioMin = $_GET["txtPrecioMin"];
$precioMax = $_GET["txtPrecioMax"];

//Sentencia SQL
if ($precioMin && $precioMax) {
    $sql = "SELECT p.*, c.nombre AS categoria 
            FROM producto p, categoria c
            WHERE p.idcategoria = c.idcategoria
                AND p.precio >= $precioMin 
                AND p.precio <= $precioMax
            ORDER BY p.precio ASC;";
} elseif ($precioMin && !$precioMax) {
    $sql = "SELECT p.*, c.nombre AS categoria 
            FROM producto p, categoria c
            WHERE p.idcategoria = c.idcategoria
                AND p.precio >= $precioMin
            ORDER BY p.precio ASC;";
} elseif (!$precioMin && $precioMax) {
    $sql = "SELECT p.*, c.nombre AS categoria 
    FROM producto p, categoria c
    WHERE p.idcategoria = c.idcategoria
        AND p.precio <= $precioMax
    ORDER BY p.precio ASC;";
}


//Ejecutar la sentencia SQL
$resultado = mysqli_query($conexion, $sql);

// Montar tabla
$mensaje = "<h3 class='text-center boldRegularFont'>Listado de Productos por Precio</h3>";
$mensaje .= "<h5 class='text-center boldRegularFont'>Mínimo: " . ($precioMin != '' ? $precioMin : 0)   . "€  ~  Máximo: " . ($precioMax != '' ? $precioMax : 0) . "€</h5>";

$mensaje .= "<div class='container' id='listados'><div class='row'><table class='table table-striped'>";
$mensaje .= "<thead><tr><th class='text-center'>ID PRODUCTO</th><th class='text-center'>NOMBRE</th><th class='text-center'>DESCRIPCION</th><th class='text-center'>PRECIO</th><th class='text-center'>CATEGORÍA</th><th class='text-center'>ACCIÓN</th></tr></thead>";
$mensaje .= "<tbody>";

// Recorrer filas
while ($fila = mysqli_fetch_assoc($resultado)) {
    $mensaje .= "<tr><td class='text-center'>" . $fila['idproducto'] . "</td>";
    $mensaje .= "<td>" . $fila['nombre'] . "</td>";
    $mensaje .= "<td>" . $fila['descripcion'] . "</td>";
    $mensaje .= "<td class='text-center'>" . $fila['precio'] . "€</td>";
    $mensaje .= "<td>" . $fila['categoria'] . "</td>";

    // Formulario en la celda para procesar edición y borrado del registro
    $mensaje .= "<td class='text-center'><form class='d-inline me-1 ' action='editar_producto.php' method='GET'>";
    $mensaje .= "<input type='hidden' name='producto' value='" . htmlspecialchars(json_encode($fila),ENT_QUOTES) . "' />";
    $mensaje .= "<button name='Editar' class='btn btn-primary'><i class='bi bi-pencil-square'></i></button></form>";

    $mensaje .= "<form class='d-inline mt-1' action='proceso_borrar_producto.php' method='post'>";
    $mensaje .= "<input type='hidden' name='idproducto' value='" . $fila['idproducto']  . "' />";
    $mensaje .= "<button name='Borrar' class='btn btn-danger'><i class='bi bi-trash'></i></button></form></td></tr>";
}

// Cerrar tabla
$mensaje .= "</tbody></table></div></div>";

// Insertamos cabecera
include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;
?>