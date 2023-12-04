<?php
include_once("cabecera.html");
?>

<div class="container" id="formularios">
    <div class="row">
        <!-- Formulario 4:  Busqueda Producto -->
        <form class="form-horizontal" name="frmBuscarProducto" id="frmBuscarProducto" action="proceso_buscar_producto_nombre.php" method="GET">
            <fieldset>
                <!-- Cabecera -->
                <legend class="boldRegularFont">Buscar: Producto por Nombre</legend>
                <!-- Fin cabecera -->

                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtBuscarNombreProducto">Nombre del producto:
                    </label>
                    <div class="col-xs-4">
                        <input id="txtBuscarNombreProducto" name="txtBuscarNombreProducto" placeholder="Nombre del producto a buscar" class="form-control input-md" type="text">
                    </div>
                </div>

                <!-- Botón -->
                <div class="form-group mt-2">
                    <div class="col-xs-4">
                        <input type="submit" id="btnAceptarBuscarNombreProducto" name="btnAceptarBuscarNombreProducto" class="btn btn-primary" value="Buscar" />
                    </div>
                </div>
                <!-- fin boton -->
            </fieldset>
        </form>
        <!-- Fin formulario4 -->

    </div>
</div>
</body>

</html>