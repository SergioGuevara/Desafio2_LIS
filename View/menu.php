<header class="head">
    
        <h1 class="title">TextilExport</h1>
        <center>
        <p>Siempre los mejores estilos</p>
        </center>
        <ul class="nav navbar-nav navbar-right">
        <li class="">
              <a href="<?=PATH.'/Productos/mostrarCarrito/'?>" class="" > Carrito(<?php
                        //condicionador ternario
                        echo (empty($_SESSION['CARRITO'])?0:array_sum(array_column($_SESSION['CARRITO'],"CANTIDAD")));
                    ?>)</a>
            </li>
        </ul>
    </header>
        
