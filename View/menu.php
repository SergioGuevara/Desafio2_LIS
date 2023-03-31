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
        <ul>
        <li><a href="<?=!empty($_SESSION['login_data'])?"":PATH.'/Usuarios/login'?>" class=""><?=!empty($_SESSION['login_data'])?$_SESSION['login_data'][0]:"login"?></a></li>
        <li><a href="<?=empty($_SESSION['login_data'])?"":PATH.'/Usuarios/logout'?>" class=""><?=!empty($_SESSION['login_data'])?"Cerrar sesión":""?></a></li>
        </ul>
    </header>
        
