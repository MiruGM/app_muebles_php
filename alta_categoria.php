<?php
include_once("cabecera.html");
?>

<div class="container" id="formularios">
    <div class="row">
        <!-- Formulario 1: Alta Categoría Mueble -->
        <form class="form-horizontal" name="frmAltaCategoria" id="frmAltaCategoria" action="proceso_alta_categoria.php" method="POST">
            <fieldset>
                <!-- Cabecera -->
                <legend class="boldRegularFont">Alta: Categoría de Mueble</legend>
                <!-- Fin cabecera -->

                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtNombreCategoria">Nombre: </label>
                    <div class="col-xs-4">
                        <input id="txtNombreCategoria" name="txtNombreCategoria" placeholder="Nombre de la categoría" class="form-control input-md" type="text">
                    </div>
                </div>
                <div class="form-group mt-2">
                    <label class="col-xs-4 control-label" for="txtDescripcionCategoria">Descripción: </label>
                    <div class="col-xs-4">
                        <input id="txtDescripcionCategoria" name="txtDescripcionCategoria" placeholder="Descripción de la categoría" class="form-control input-md" type="text">
                    </div>
                </div>
                <div class="form-check mt-2">
                    <label class="form-check-label" for="chkMontado">Se manda montado </label>
                    <input class="form-check-input" type="checkbox" value="assembled" name="chkMontado" id="chkMontado">
                </div>

                <!-- Botón -->
                <div class="form-group mt-2">
                    <div class="col-xs-4">
                        <input type="submit" id="btnAceptarAltaCategoria" name="btnAceptarAltaCategoria" class="btn btn-primary" value="Aceptar" />
                    </div>
                </div>
                <!-- fin boton -->
            </fieldset>
        </form>
        <!-- Fin formulario1 -->

    </div>
</div>
</body>

</html>