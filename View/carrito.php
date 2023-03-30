<?php
//$mensaje="";
if(isset($_POST['btnAccion']))
{
    /*switch($_POST['btnAccion']){
        case 'Agregar':
    */
            //echo var_dump($_POST);
            $ID=$_POST['id'];
            $NOMBRE=$_POST['nombre'];
            $PRECIO=$_POST['precio'];
            $CANTIDAD=$_POST['cantidad'];
            
            if(!isset($_SESSION['CARRITO'])){ //SI NO EXITE NADA EN EL CARRITO
                $producto=array(//CAPTURAMOS LOS DATOS DEL FORMULARIO
                    'ID'=>$ID,
                    'NOMBRE'=>$NOMBRE,
                    'CANTIDAD'=>$CANTIDAD,
                    'PRECIO'=>$PRECIO
                );
                $_SESSION['CARRITO'][0]=$producto;
                $mensaje="Producto agregado al carrito";
            }else{ 
                echo var_dump($_SESSION['CARRITO']);
                //$identificador=md5($codigo_producto);
                $IdProductos=array_column($_SESSION['CARRITO'],"ID"); //array column deposita todos los ids que estan en el carrito de compras
                if(in_array($ID,$IdProductos)){
                    $carro=$_SESSION['CARRITO'];
                    $codigo_producto=$_POST['id'];
                    $cantidad=$_POST['cantidad'];
                    //echo var_dump($carro);
                    foreach ($carro as $indice => $producto) {
                    if($producto['ID']==$codigo_producto){
                        $identificador=$indice;
                    }
                }
                    $carro[$identificador]['CANTIDAD'] += $cantidad;
                    $_SESSION['CARRITO']=$carro;

                }else{
                    //SI YA HAY 1 PRODUCTO EN EL CARRITO 
                $numeroProductos=count($_SESSION['CARRITO']);//NUMERO DE ELEMENTOS EN CARRITO
                $producto=array(//CAPTURAMOS LOS DATOS DEL FORMULARIO
                    'ID'=>$ID,
                    'NOMBRE'=>$NOMBRE,
                    'CANTIDAD'=>$CANTIDAD,
                    'PRECIO'=>$PRECIO
                );
                $_SESSION['CARRITO'][$numeroProductos]=$producto;
                header('location:'.PATH.'/Productos');
               // $mensaje="Producto agregado al carrito";
                }
            }
            //$mensaje=print_r($_SESSION['CARRITO'],true);
            /*

            break;
            
            case 'Eliminar':
                if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY))){
                    $ID=openssl_decrypt($_POST['id'],COD,KEY);
                    //$mensaje="OK ID correcto ".$ID ." <br/>";
                    //Aqui se define cada objeto del carrito mediante del indice
                    foreach ($_SESSION['CARRITO'] as $indice => $producto) {
                        if($producto['ID']==$ID){
                            unset($_SESSION['CARRITO'][$indice]);
                            echo "<script>alert('Elemento borrado...');</script>";
                        }
                    }

                }
                else{
                    $mensaje="Upss... ID incorrecto".$ID;
                }
                break;

                case 'AgregarNuevo':
                    $carro=$_SESSION['CARRITO'];
                    $codigo_producto=openssl_decrypt($_POST['id'],COD,KEY);
                    $cantidad=openssl_decrypt($_POST['cantidad'],COD,KEY);
                    //echo var_dump($carro);
                    foreach ($carro as $indice => $producto) {
                    if($producto['ID']==$codigo_producto){
                        $identificador=$indice;
                    }
                }
                    $carro[$identificador]['CANTIDAD'] += $cantidad;
                    $_SESSION['CARRITO']=$carro;
                    break;
                    
                case 'QuitarElemento':
                $carro=$_SESSION['CARRITO'];
                $codigo_producto=openssl_decrypt($_POST['id'],COD,KEY);
                $cantidad=openssl_decrypt($_POST['cantidad'],COD,KEY);
                foreach ($carro as $indice => $producto) {
                if($producto['ID']==$codigo_producto){
                    $identificador=$indice;
                    $cantidadActual=$producto['CANTIDAD'];
                    }
                }
                if($cantidadActual==1){
                    unset($_SESSION['CARRITO'][$identificador]);
                }
                else{
                    $carro[$identificador]['CANTIDAD'] -= $cantidad;
                    $_SESSION['CARRITO']=$carro;
                }
            
                break;



    }
    */
}

?>
