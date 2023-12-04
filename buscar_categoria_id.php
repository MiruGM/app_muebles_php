<?php
include_once("cabecera.html");
?>

<div class="container" id="formularios">
    <div class="row">
        <!-- Formulario 3:  Busqueda Categoria -->
        <form class="form-horizontal" name="frmBuscarCategoria" id="frmBuscarCategoria" action="proceso_buscar_categoria_id.php" method="GET">
            <fieldset>
                <!-- Cabecera -->
                <legend class="boldRegularFont">Buscar: Categoria por ID</legend>
                <!-- Fin cabecera -->

                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtIdCategoria">ID Categoría: </label>
                    <div class="col-xs-4">
                        <input id="txtIdCategoria" name="txtIdCategoria" placeholder="ID de la categoría a buscar" class="form-control input-md" type="text">
                    </div>
                </div>

                <!-- Botón -->
                <div class="form-group mt-2">
                    <div class="col-xs-4">
                        <input type="submit" id="btnAceptarIdCategoria" name="btnAceptarIdCategoria" class="btn btn-primary" value="Buscar" />
                    </div>
                </div>
                <!-- fin boton -->

            </fieldset>
        </form>
        <!-- Fin formulario3 -->

    </div>
</div>
</body>

</html>