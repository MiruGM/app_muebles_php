<?php
require_once("config.php");
$conexion = obtenerConexion();

$sql = "SELECT idcategoria,nombre FROM categoria;";

$resultado = mysqli_query($conexion, $sql);

$options = "";
while ($fila = mysqli_fetch_assoc($resultado)) {
    $options .= " <option value='" . $fila["idcategoria"] . "'>" . $fila["nombre"] . "</option>";
}

include_once("cabecera.html");
?>
<div class="container" id="formularios">
    <div class="row">
        <!-- Formulario 2: Alta de producto -->
        <form class="form-horizontal" name="frmAltaProducto" id="frmAltaProducto" action="proceso_alta_producto.php" method="POST">
            <fieldset>
                <!-- Cabecera -->
                <legend class="boldRegularFont">Alta: Producto - Mueble</legend>
                <!-- Fin cabecera -->

                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtNombreProducto">Nombre: </label>
                    <div class="col-xs-4">
                        <input id="txtNombreProducto" name="txtNombreProducto" placeholder="Nombre del producto" class="form-control input-md" type="text">
                    </div>
                </div>

                <div class="form-group mt-2">
                    <label class="col-xs-4 control-label" for="txtDescripcionProducto">Descripción: </label>
                    <div class="col-xs-4">
                        <input id="txtDescripcionProducto" name="txtDescripcionProducto" placeholder="Descripción del producto" class="form-control input-md" type="text">
                    </div>
                </div>

                <div class="form-group mt-2">
                    <label class="col-xs-4 control-label" for="txtPrecioProducto">Precio: </label>
                    <div class="col-xs-4">
                        <input id="txtPrecioProducto" name="txtPrecioProducto" placeholder="Precio del producto" class="form-control input-md" type="number">
                    </div>
                </div>

                <div class="form-group mt-2">
                    <label class="col-xs-4 control-label" for="lstCategoria">Categoria: </label>
                    <div class="col-xs-4">
                        <select id="lstCategoria" name="lstCategoria" class="form-control">
                            <?php echo $options; ?>
                        </select>
                    </div>
                </div>

                <!-- Botón -->
                <div class="form-group mt-2">
                    <div class="col-xs-4">
                        <input type="submit" id="btnAceptarAltaProducto" name="btnAceptarAltaProducto" class="btn btn-primary" value="Aceptar" />
                    </div>
                </div>
                <!-- fin boton -->

            </fieldset>
        </form>
        <!-- Fin formulario2 -->
    </div>
</div>
</body>

</html>