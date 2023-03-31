<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de usuario</title>
    <?php
        include './View/cabecera.php';
    ?>
</head>
<body>
<header class="head">
    
    <h1 class="title">TextilExport</h1>
    <center>
    <p>Siempre los mejores estilos</p>
    </center>
</header>
<div class="container">
            <div>
                <br>
                <br>
                <div class="col-sm-12 col-sm-offset-4">
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
                   <center> <h2>Crear una cuenta</h2></center>
                    <br>
                    <center>
                    <form method="post" action="<?= PATH ?>/Usuarios/insertUsuario" class="col-sm-4 col-sm-offset-4">
                        <div class="form-group">
                            <input type="text" class="form-control"  id="nombre" placeholder="Usuario" name="nombre" >
                        </div>
                        </br> 
                        <div class="form-group">
                            <input type="text" class="form-control"  id="apellido" placeholder="Apellido" name="apellido" >
                        </div>
                        </br>
                        <div class="form-group">
                            <input type="text" class="form-control"  id="correo" placeholder="Correo" name="correo" >
                        </div>
                        </br>
                        <div class="form-group">
                            <input type="password" class="form-control"  id="clave" placeholder="Elija una contraña" name="clave" >
                        </div>
                        </br>    
                        <div class="form-group">
                            <button class="btn btn-lg btn-primary btn-block" name="Crear" type="submit">Crear Cuenta</button>
                        </div>
                    </form>
                    </br>
                    </br>
                    </br>
                    </br>
                    </center>
                </div>
            </div>
        </div>
        <footer class="foot">
 <p class="">Derechos reservados &copy;</p>
</footer>
<body>
    </html>