<?php
require_once 'Controller.php';
require_once './Model/ProductosModel.php';
//include_once './Core/config.php';
class ProductosController extends Controller{

    private $model;

    function __construct(){
        $this->model=new ProductosModel();
    }

    public function index(){
        $viewBag=array();
        $productos=$this->model->get();
        //$viewBag['nombre']="Fulanito";
        $viewBag['productos']=$productos;
        $this->render("index.php",$viewBag);
    }
    public function carrito(){

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
                header('location:'.PATH.'/Productos/');
            }else{ 
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
                    header('location:'.PATH.'/Productos/');

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
                header('location:'.PATH.'/Productos/');
               //$mensaje="Producto agregado al carrito";
                }
            }
        }
    }
    public function MostrarCarrito(){
        $this->render("mostrarCarrito.php");
    }
}