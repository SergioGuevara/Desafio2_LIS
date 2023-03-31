<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    include './View/cabecera.php';
    ?>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <title>Ventas</title>

</head>

<body>
    <header>
        <?php
        include './View/menuadmin.php';
        ?>
    </header>
</br>
<h2>Listado de ventas</h2>
</br>
    <center>
    <div class="row"><!--Contenedor principal-->
        <div class="col-md-8"><!--Contenedor lateral-->
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Codigo de venta</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Total</th>
                        <th scope="col">Fecha Venta</th>
                        <th scope="col">Ver PDF</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        foreach ($ventas as $venta) {
                            echo var_dump($venta);
                        ?>
                            <td><?= $venta[0] ?></td>
                            <td><?= $venta[1] ?></td>
                            <td><?= $venta[2] ?></td>
                            <td><?= $venta[4] ?></td>
                            <td><a href="<?=PATH."/View/assets/pdfs/".$venta[3]?>">Ver PDF</a></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            
        </div>
    </div>
    </center>
    <footer>
        <?php
        include './View/footer.php';
        ?>

    </footer>
</body>

</html>