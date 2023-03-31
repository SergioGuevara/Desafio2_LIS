<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo editorial</title>
    <?php
        include './View/cabecera.php';
    ?>
</head>
<body>
<?php
        include './View/menuadmin.php';
    ?>
    <div class="container">
            <div class="row">
                <h3>Nuevo Producto</h3>
            </div>
            <div class="row">
                <div class=" col-md-7">
                    <?php
                        if(isset($errores)){
                            if(count($errores)>0){
                                echo "<div class='alert alert-danger'><ul>";
                                foreach ($errores as $error) {
                                    echo "<li>$error</li>";
                                }
                                echo "</ul></div>";

                            }
                        }
                            
                    ?>
                   
                    <form role="form" action="<?= PATH ?>/Inventario/add" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="op" value="insertar"/>
                        <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Campos requeridos</strong></div>
                        <div class="form-group">
                            <label for="codigo">Codigo del producto:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="codigo_producto" id="codigo_producto" value="<?= isset($editorial)?$editorial['codigo_editorial']:'' ?>"  placeholder="Ingresa el codigo del genero" >
                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre del producto:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="nombre_producto" id="nombre_producto"   placeholder="Ingresa el nombre del producto" >
                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">descripcion:</label>
                            <div class="input-group">
                            <textarea class="form-control" id="descripcion" name="descripcion" ></textarea>
                             <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="precio">precio</label>
                            <div class="input-group">
                                <input type="" class="form-control" id="precio" name="precio"  placeholder="Ingresa el telefono del contacto" >
                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="existencia">existencia</label>
                            <div class="input-group">
                                <input type="" class="form-control" id="existencia" name="existencia"  placeholder="Ingresa el telefono del contacto" >
                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="codigo_categoria">codigo_categoria</label>
                            <div class="input-group">
                                <input type="" class="form-control" id="codigo_categoria" name="codigo_categoria"  placeholder="Ingresa el telefono del contacto" >
                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            </div>
                        </div>
                        <div class="uk-margin">
                            <div uk-form-custom="target: true">
                                <input type="file" name="imagen" id="imagen" aria-label="Custom controls">                            
                        </div>
                        <input type="submit" class="btn btn-info" value="Guardar" name="Guardar">
                        <a class="btn btn-danger" href="#">Cancelar</a>
                    </form>
                </div>
            </div>  
        </div>

</body>
</html>
        