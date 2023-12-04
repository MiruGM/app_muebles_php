<?php
include_once("cabecera.html");
?>

<div class="container" id="formularios">
    <div class="row">
        <!-- Formulario 5: Busqueda Producto por Precio -->
        <form class="form-horizontal" name="frmBuscarProductoPorPrecio" id="frmBuscarProductoPorPrecio" action="proceso_buscar_producto_precio.php" method="GET">
            <!-- Cabecera -->
            <legend class="boldRegularFont">Buscar: Producto por Precio</legend>
            <!-- Fin cabecera -->

            <div class="form-group">
                <label class="col-xs-4 control-label" for="txtPrecioMin">Precio Mínimo: </label>
                <div class="col-xs-4">
                    <input id="txtPrecioMin" name="txtPrecioMin" placeholder="Mínimo del rango de precio" class="form-control input-md" type="number">
                </div>
            </div>

            <div class="form-group mt-2">
                <label class="col-xs-4 control-label" for="txtPrecioMax">Precio Máximo: </label>
                <div class="col-xs-4">
                    <input id="txtPrecioMax" name="txtPrecioMax" placeholder="Máximo del rango de precio" class="form-control input-md" type="number">
                </div>
            </div>

            <!-- Botón -->
            <div class="form-group mt-2">
                <div class="col-xs-4">
                    <input type="submit" id="btnAceptarBuscarProductoPorPrecio" name="btnAceptarBuscarProductoPorPrecio" class="btn btn-primary" value="Buscar" />
                </div>
            </div>
            <!-- fin boton -->

        </form>
        <!-- Fin formulario5 -->


    </div>
</div>
</body>

</html>