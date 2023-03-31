<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Administracion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet' href='https://getuikit.com/assets/uikit/dist/css/uikit.css?nc=2479'>
    <link rel="stylesheet" href="css/style.css">
    <?php
    include './View/cabecera.php'
    ?>
    
</head>

<body>
<?php
    include './View/menuadmin.php'
    ?>

    <!-- partial:index.partial.html -->
    <div class="toolbar bg-white">
        <div class="uk-flex uk-flex-between">
        </div>
    </div>
    <div class="main">
        <div class="uk-flex uk-flex-between uk-margin-top">
            
            <div>
                <a class="uk-button uk-button-primary uk-text-bold" href="#organization-new" uk-toggle>Agregar Productos</a>
               
            </div>
        </div>
        <div class="data">
            <div class="uk-overflow-auto uk-box-shadow-small uk-margin-top bg-white rounded">
                <table class="uk-table uk-table-divider uk-table-hover">
                    <thead>
                        <tr>
                            <th>COD</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Imágen</th>
                            <th>Precio</th>
                            <th>Existencias</th>
                            <th>Categoría</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach($productos as $producto){    
                         //echo var_dump($producto);  
                        //echo var_dump($_SESSION['CARRITO']); 
                     ?> 
                        <tr>
                            <td class="uk-table-link"><?php echo $producto['codigo_producto'];?></td>
                            <td class="uk-table-link"><?php echo $producto['nombre_producto'];?></td>
                            <td class="uk-table-link"><?php echo $producto['descripcion'];?></td>
                            <td class="uk-table-link"><div uk-lightbox><a href=""><img src="<?php echo PATH."/View/assets/img/".$producto[3];?>" width="100" height="200"></a></div></td>
                            <td class="uk-table-link"><?php echo $producto['precio'];?></td>
                            <td class="uk-table-link"><?php echo $producto['existencia'];?></td>
                            <td class="uk-table-link"><?php echo $producto['nombre_categoria'];?></td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <!-- partial -->
    <script src='https://getuikit.com/assets/uikit/dist/js/uikit.js?nc=2479'></script>
    <script src='https://getuikit.com/assets/uikit/dist/js/uikit-icons.js?nc=2479'></script>
    <script src="js/script.js"></script>

</body>

</html>