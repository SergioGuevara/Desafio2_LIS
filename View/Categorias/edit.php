<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificando categoria</title>
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
                <h3>Editando categoria</h3>
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
                   
                    <form role="form" action="<?= PATH ?>/Categorias/update/<?= $categoria['codigo_categoria'] ?>" method="POST">
                    
                    <input type="hidden" name="op" value="insertar"/>
                        <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Campos requeridos</strong></div>
                        <div class="form-group">
                        
                        <label for="codigo">Codigo </label>
                        <div class="input-group">
                        <input type="text" class="form-control"  
                        name="codigo_categoria" 
                        id="codigo_categoria"   
                        value="<?= isset($categoria)?$categoria['codigo_categoria']:'' ?>" 
                        placeholder="">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>    
                    </div>
                        
                    </div>
                    <div class="form-group">
                            <label for="nombre">Categoria:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" 
                                name="nombre_categoria" id="nombre_categoria"  
                                 placeholder="Ingresa el nombre de la categoria" 
                                 value="<?= isset($categoria)?$categoria['nombre_categoria']:'' ?>">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                            </div>
                        </div>

                    <input type="submit" class="btn btn-info" value="Guardar" name="Guardar">
                 
                    
                   <!--
                        <input type="submit" class="btn btn-info" value="Guardar" name="Guardar">
                        <a class="btn btn-danger" href="#">Cancelar</a>
                    --></form>
                </div>
            </div>  
        </div>

</body>
</html>
        