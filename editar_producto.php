<?php

//Recuperar los datos
$producto = json_decode($_GET["producto"], true);

require_once("config.php");
$conexion = obtenerConexion();

$sql = "SELECT idcategoria,nombre FROM categoria;";

$resultado = mysqli_query($conexion, $sql);

$options = "";
while ($fila = mysqli_fetch_assoc($resultado)) {
    if ($fila["idcategoria"] == $producto['idcategoria']) {
        $options .= "<option selected value='" . $fila['idcategoria'] . "'>" . $fila['nombre'] . "</option>";
    } else {
        $options .= " <option value='" . $fila['idcategoria'] . "'>" . $fila['nombre'] . "</option>";
    }
}

include_once("cabecera.html");
?>

<div class="container" id="formularios">
    <div class="row">
        <!-- Formulario 6: Editar Producto -->
        <!-- Sé que este formulario debe ser POST, pero me mandaba el formulario vacío y por tanto daba error a la hora de 
            recoger los datos en el php proceso_editar_producto.php. En otros formularios funciona pero en este no.  -->
            <!-- TODO: intentar arreglar el problema con POST -->
        <form class="form-horizontal" name="frmEditarProducto" id="frmEditarProducto" action="proceso_editar_producto.php" method="post">
            <fieldset>
                <!-- Cabecera -->
                <legend class="boldRegularFont">Modificar Producto</legend>
                <!-- fin cabecera -->

                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtIdProductoEditar">ID Producto: </label>
                    <div class="col-xs-4">
                        <input value='<?php echo $producto['idproducto'] ?>' id="txtIdProductoEditar" name="txtIdProductoEditar" class="form-control input-md" type="hidden">
                        <input disabled value='<?php echo $producto['idproducto'] ?>'id="txtIdProductoEditar" name="txtIdProductoEditar" class="form-control input-md" type="text">
                    </div>
                </div>

                <div class="form-group mt-2">
                    <label class="col-xs-4 control-label" for="txtNombreProductoEditar">Nombre del producto:
                    </label>
                    <div class="col-xs-4">
                        <input value='<?php echo $producto['nombre'] ?>' id="txtNombreProductoEditar" name="txtNombreProductoEditar" class="form-control input-md" type="text">

                    </div>
                </div>

                <div class="form-group mt-2">
                    <label class="col-xs-4 control-label" for="txtDescripcionProductoEditar">Descripción: </label>
                    <div class="col-xs-4">
                        <input value='<?php echo $producto['descripcion'] ?>' id="txtDescripcionProductoEditar" name="txtDescripcionProductoEditar" class="form-control input-md" type="text">
                    </div>
                </div>

                <div class="form-group mt-2">
                    <label class="col-xs-4 control-label" for="txtPrecioProductoEditar">Precio: </label>
                    <div class="col-xs-4">
                        <input value='<?php echo $producto['precio'] ?>' id="txtPrecioProductoEditar" name="txtPrecioProductoEditar" class="form-control input-md" type="number">
                    </div>
                </div>

                <div class="form-group mt-2">
                    <label class="col-xs-4 control-label" for="lstCategoriaEditar">Categoría: </label>
                    <div class="col-xs-4">
                        <select class="form-select" name="lstCategoriaEditar" id="lstCategoriaEditar">
                            <?php echo $options; ?>
                        </select>
                    </div>
                </div>

                <!-- Botón -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="btnAceptarEditarProducto"></label>
                    <div class="col-xs-4">
                        <input type="submit" id="btnAceptarEditarProducto" name="btnAceptarEditarProducto" class="btn btn-primary" value="Aceptar" />
                    </div>
                </div>
                <!-- fin boton -->

            </fieldset>
        </form>

    </div>
</div>
</body>

</html>