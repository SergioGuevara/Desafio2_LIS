<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesion</title>
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
                   <center> <h2>Inicio de sesión</h2></center>
                    
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
                    <br>
                    <center>
                    <form method="post" action="<?= PATH ?>/Usuarios/validate" class="col-sm-4 col-sm-offset-4">
                       
                        <div class="form-group">
                            <input type="text" class="form-control"  id="nombre" placeholder="Usuario" name="nombre" >
                        </div>
                        </br>
                        <div class="form-group">
                            </div>
                            <input type="password" class="form-control"  id="clave" placeholder="Contraseña" name="clave" >
                        </br>    
                        <div class="form-group">
                            <button class="btn btn-lg btn-primary btn-block" name="enviar" type="submit">Iniciar sesión</button>
                        </div>
                    </form>
                    </br>
                    </br>
                    <li><a href="<?=PATH.'/Usuarios/singup'?>" class="">Crear una cuenta</a></li>
                    </br>
                    </br>
                    </br>
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