<?php
require_once("config.php");
$conexion = obtenerConexion();

$sql = "SELECT p.* , c.nombre AS categoria
            FROM producto p, categoria c
            WHERE p.idcategoria = c.idcategoria 
            ORDER BY idproducto ASC;";

// Ejecutar consulta
$resultado = mysqli_query($conexion, $sql);

// Montar tabla
$mensaje = "<h3 class='text-center boldRegularFont'>Listado de Productos</h3>";
$mensaje .= "<div class='container' id='listados'><div class='row'><table class='table table-striped'>";
$mensaje .= "<thead><tr><th class='text-center'>ID PRODUCTO</th><th class='text-center'>NOMBRE</th><th class='text-center'>DESCRIPCIÓN</th><th class='text-center'>PRECIO</th><th class='text-center'>CATEGORIA</th><th class='text-center'>ACCIÓN</th></tr></thead>";
$mensaje .= "<tbody>";

// Recorrer filas
while ($fila = mysqli_fetch_assoc($resultado)) {
    $mensaje .= "<td class='text-center'>" . $fila['idproducto'] . "</td>";
    $mensaje .= "<td>" . $fila['nombre'] . "</td>";
    $mensaje .= "<td>" . $fila['descripcion'] . "</td>";
    $mensaje .= "<td class='text-center'>" . $fila['precio'] . "€</td>";
    $mensaje .= "<td>" . $fila['categoria'] . "</td>";

    //BOTÓN DE EDITAR: 
    $mensaje .= "<td><form class='d-inline me-1' action='editar_producto.php' method='GET'>"; 
    $mensaje .= "<input type='hidden' name='producto' value='" . htmlspecialchars(json_encode($fila),ENT_QUOTES) . "'/>";
    $mensaje .= "<button name='Editar' class='btn btn-primary'><i class='bi bi-pencil-square'></i></input></form>"; 
    
    //BOTÓN DE BORRAR:
    $mensaje .= "<form class='d-inline' action='proceso_borrar_producto.php' method='POST'>"; 
    $mensaje .= "<input type='hidden' name='idproducto' value='" . $fila['idproducto'] . "'/>";
    $mensaje .= "<button name='Borrar' class='btn btn-danger'><i class='bi bi-trash'></i></input></form>"; 

    $mensaje .= "</td></tr>";
}

// Cerrar tabla
$mensaje .= "</tbody></table></div></div></body></html>";

// Insertamos cabecera
include_once("cabecera.html");

// Mostrar mensaje calculado antes
echo $mensaje;
?>