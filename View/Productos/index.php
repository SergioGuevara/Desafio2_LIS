<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="stylesheet" href="../assets/css/styles.css">
    <link href="../assets/css/design.css" rel="stylesheet" />
<<<<<<< HEAD
    <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
=======
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
>>>>>>> c2d54bf9be49571863364682610a37ab4e0c2c7e
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <title>TextilExport</title>
<<<<<<< HEAD
    <?php
   // include './View/cabecera.php';
    ?>
=======
>>>>>>> c2d54bf9be49571863364682610a37ab4e0c2c7e
</head>
<body >

<div class="cont">
    <header class="head">
    
        <h1 class="title">TextilExport</h1>
        <p>Siempre los mejores estilos</p>
    </header>
    <div class="contenido">
    
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
               
    <?php
   // $data = simplexml_load_file('../administracion/data/productos.xml');
  //  $directory="../administracion/";
    
    //foreach ($data as $producto){

    ?> 
     
    <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                    <img class="card-img-top" src="<?/*php echo $directory."/".$producto->img;*/?>"  alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder"><?/*= $producto->nombre */?></h5>
                                <!-- Product price-->
                                
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <form class="text-center">
                                <a class="btn btn-outline-dark mt-auto" href="carrito.php?product=<?/*= $producto->nombre*/?>">Agregar al carrito</a>
                    </form>
                        </div>
                    </div>
                </div>
    
  <?php   ?>

</div>
</div>
    </section>
    </div>
</div>
<footer class="foot">
 <p class="">Derechos reservados &copy;</p>
</footer>
<<<<<<< HEAD
<script src="../assets/js/jquery.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
=======
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
>>>>>>> c2d54bf9be49571863364682610a37ab4e0c2c7e
</body>
</html>