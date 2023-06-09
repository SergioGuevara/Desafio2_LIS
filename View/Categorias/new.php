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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
</head>
<body>
<?php
        include './View/menuadmin.php';
    ?>
    </br>
    <div class="container">
            <div class="row">

                <h3>Nueva Categoria</h3>
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
                   
            <form action="<?= PATH ?>/Categorias/add" method="POST">
                <fieldset>

                    <div class="mb-3" hidden>
                        <label for="disabledTextInput" class="form-label">Codigo </label>
                        <input type="text" id="codigo_categoria" name="codigo_categoria" value=""  class="form-control" placeholder="">
                    </div>
                    <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">Categoria </label>
                        <input type="text" id="nombre_categoria" name="nombre_categoria"  class="form-control" placeholder="">
                    </div>

                    <input type="submit" class="btn btn-info" value="Guardar" name="Guardar">
                </fieldset>
            </form>
                </div>
            </div>  
        </div>
</body>
</html>
        