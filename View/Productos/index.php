<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
    <!-- Core theme CSS (includes Bootstrap)-->
    <title>TextilExport</title>
    <?php
     include './View/cabecera.php';
    ?>
</head>
<body >

<div class="cont">
    
    <?php
     include './View/menu.php';
     //include './View/carrito.php'
    ?>
    <div class="contenido">
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">             
    <?php
        foreach($productos as $producto){    
            //echo var_dump($producto);  
            //echo var_dump($_SESSION['CARRITO']); 
    ?> 
        <div class="col mb-5">
                    <div class="card h-100">
                    <img class="card-img-top" src="<?php echo PATH."/View/assets/img/".$producto[3];?>"  alt="..." />
                        <div class="card-body p-4">
                            <div class="text-center">
                                <h5 class="fw-bolder"><?= $producto[1] ?></h5> 
                            </div>
                        </div>
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <form action="<?=PATH.'/Productos/carrito/'?>" method="post">
                        <input type="hidden" name="id" id="id" value="<?php echo $producto['codigo_producto'];?>">
                        <input type="hidden" name="nombre" id="nombre" value="<?php echo $producto['nombre_producto'];?>">
                        <input type="hidden" name="descripcion" id="descripcion" value="<?php echo $producto['descripcion'];?>">
                        <input type="hidden" name="imagen" id="imagen" value="<?php echo $producto['imagen'];?>">
                        <input type="hidden" name="precio" id="precio" value="<?php echo $producto['precio'];?>">
                        <input type="hidden" name="cantidad" id="cantidad" value="<?php echo 1;?>">
                        <button class="btn btn-outline-dark mt-auto" 
                                type="submit" 
                                name="btnAccion" 
                                value="Agregar"
                                >Agregar al carrito
                        </button>
                        </div>
                    </div>
                </div>
    
  <?php  } ?>

</div>
</div>
    </section>
    </div>
</div>
<footer class="foot">
 <p class="">Derechos reservados &copy;</p>
</footer>
<!--<script src="../assets/js/jquery.min.js"></script>-->
<!--<script src="../assets/js/bootstrap.min.js"></script>-->
</body>
</html>