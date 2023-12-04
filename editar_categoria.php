<?php

require_once("config.php");
$conexion = obtenerConexion();

//Recuperar los datos
$categoria = json_decode($_GET["categoria"], true);

include_once("cabecera.html");
?>

<div class="container" id="formularios">
    <div class="row">
        <!-- Formulario 7: Editar Categoría -->
        <form class="form-horizontal" name="frmEditarCategoria" id="frmEditarCategoria" action='proceso_editar_categoria.php' method='POST'>
            <fieldset>
                <!-- Cabecera -->
                <legend class="boldRegularFont">Modificar Categoría de Mueble</legend>
                <!-- Fin cabecera -->

                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtEditarIdCategoria">ID Categoría: </label>
                    <div class="col-xs-4">
                    <input value='<?php echo $categoria['idcategoria'] ?>' id="txtEditarIdCategoria" name="txtEditarIdCategoria" class="form-control input-md" type="hidden">
                        <input value='<?php echo $categoria['idcategoria'] ?>' disabled id="txtEditarIdCategoria" name="txtEditarIdCategoria" class="form-control input-md" type="text">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtEditarNombreCategoria">Nombre: </label>
                    <div class="col-xs-4">
                        <input value='<?php echo $categoria['nombre'] ?>' id="txtEditarNombreCategoria" name="txtEditarNombreCategoria" class="form-control input-md" type="text">
                    </div>
                </div>
                <div class="form-group mt-2">
                    <label class="col-xs-4 control-label" for="txtEditarDescripcionCategoria">Descripción: </label>
                    <div class="col-xs-4">
                        <input value='<?php echo $categoria['descripcion'] ?>'id="txtEditarDescripcionCategoria" name="txtEditarDescripcionCategoria" class="form-control input-md" type="text">
                    </div>
                </div>
                <div class="form-check mt-2">
                    <label class="form-check-label" for="chkEditarMontado">Se manda montado </label>
                    <input class="form-check-input" type="checkbox"  <?php echo ($categoria['estamontado']) ? 'checked' : ''; ?> value="assembled" name="chkEditarMontado" id="chkEditarMontado">
                </div>

                <!-- Botón -->
                <div class="form-group mt-2">
                    <div class="col-xs-4">
                        <input type="submit" id="btnAceptarEditarCategoria" name="btnAceptarEditarCategoria" class="btn btn-primary" value="Aceptar" />
                    </div>
                </div>
                <!-- fin boton -->
            </fieldset>
        </form>
        <!-- Fin formulario7 -->

    </div>
</div>
</body>

</html>