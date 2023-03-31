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
    <title>Categorias</title>

</head>

<body>
    <header>
        <?php
        include './View/menuadmin.php';
        ?>
    </header>
    <div class="row"><!--Contenedor principal-->
        <div class="col-md-12"><!--Contenedor lateral-->
        <a type="button" class="btn btn-primary btn-md" href="<?=PATH?>/Categorias/create"> Nueva Categoria</a>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Codigo de la Categoria</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Seleccionar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        foreach ($categorias as $categoria) {
                            //echo var_dump($categoria);
                        ?>
                            <td><?= $categoria[0] ?></td>
                            <td><?= $categoria[1] ?></td>
                            <td><a class="btn btn-primary" href="<?= PATH . '/Categorias/edit/' . $categoria['codigo_categoria'] ?>">Editar</a></td>
                            <td><a class="btn btn-danger" href="<?= PATH . '/Categorias/delete/' . $categoria['codigo_categoria'] ?>">Eliminar</a></td>
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