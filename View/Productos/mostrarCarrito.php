<?php
include './View/cabecera.php';
include './View/menu.php';?>
<br>
    <center>
    <h3>Lista del carrito</h3>
    </center>
    <?php 
    //Comprueba si tiene algo el carrito
    if(!empty($_SESSION['CARRITO'])) {
    ?>
    <center>
    <div class="col-sm-10 col-sm-offset-4">
    <table class="table table-light table-bordered">
        <tbody >
            <tr>
                <th width="40%">Descripcion</th>
                <th width="15%" class="text-center">Cantidad</th>
                <th width="20%" class="text-center">Precio</th>
                <th width="20%" class="text-center">Imagen</th>
                <th width="20%" class="text-center">Total</th>
            </tr>
            <?php $total=0;?>
            <?php foreach ($_SESSION['CARRITO'] as $indice => $producto) { ?>
            <tr>
                <td width="40%"><?php echo $producto['NOMBRE']?></td>
                <td width="15%" class="text-center"><?php echo $producto['CANTIDAD']?></td>
                <td width="20%" class="text-center"><?php echo $producto['PRECIO']?></td>
                <td width="20%" class="text-center"><img src="<?=PATH?>/View/assets/img/<?php echo $producto['IMAGEN']?>" alt=""width="200px"></td>
                <td width="20%" class="text-center"><?php echo number_format($producto['PRECIO']*$producto['CANTIDAD'],2);?></td>
                <td width="5%">
                    <form method="post" action="">
                    <input 
                    type="hidden" 
                    name="id" 
                    id="id" 
                    value="<?php echo $producto['ID'];?>">
                    <form method="post" action="">
                    <input type="hidden" name="id" id="id" value="<?php echo $producto['ID'];?>">
                    <input type="hidden" name="cantidad" id="cantidad" value="<?php echo 1;?>">                     
                    </form>
                </td>
                    
            </tr>
            <?php $total=$total+$producto['PRECIO']*$producto['CANTIDAD']; ?>
            <?php } ?>
            <tr>
                <td colspan="3" align="right"><h3>Total</h3></td>
                <td align="center"><h3><?php echo number_format($total,2)?></h3></td>
                <td></td>
            </tr>
            <tr border="0">
                     <td colspan="3" align="right">  
                    <form action="<?=PATH."/Productos/generarPDF/"?>" method="post" clas>
                        <button class="btn btn-primary btn-lg btn-block" type="submit" name="btnAccion"value="proceder">
                            Generar PDF>>
                        </button>
            </form></td>
           
            <td>
                <form action="<?=PATH."/Public/checkout.html"?>" method="post">
                   
                   <button class="btn btn-primary btn-lg btn-block" type="submit" name="btnAccion"value="proceder">
                        Proceder a pagar>>
                    </button>
                    </form>
            </td>
               
            <td></td>
            
                
            </tr>
            </tbody>
    </table>
    </div>
            </center>
            </br>
           
            <div class="col-sm-2 col-sm-offset-4">
                      
                
                        
            </div>
            

      
   
    <?php
    }else{
    ?>
        <div class="alert alert-success">
            No hay productos en el carrito...
        </div>
    <?php }?>