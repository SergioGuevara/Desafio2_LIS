<?php
require_once 'Controller.php';
require_once './Model/InventarioModel.php';
require_once './Core/validaciones.php';
//include_once './Core/config.php';
class InventarioController extends Controller{

    private $model;

    function __construct(){
        $this->model=new InventarioModel();
    }

    public function index(){
        $viewBag=array();
        $productos=$this->model->get();
        $viewBag['productos']=$productos;
        $this->render("index.php",$viewBag);
    }
    public function create(){
        $this->render("new.php");
    }


    public function add(){
        if(isset($_POST['Guardar'])){
            extract($_POST);
            $errores=array();
            $producto=array();
            $viewBag=array();
            $producto['codigo_producto']=$codigo_producto;
            $producto['nombre_producto']=$nombre_producto;
            $producto['descripcion']=$descripcion;
            //$producto['imagen']=$imagen;
            $producto['precio']=$precio;
            $producto['existencia']=$existencia;
            $producto['codigo_categoria']=$codigo_categoria;
            $imge=$_FILES['imagen']['name'];
            $imget=$_FILES['imagen']['tmp_name'];
            $producto['imagen']=$imge;
                $ruta= PATH."/View/assets/img/";
                $origen_archivo = $imget;
                $destino_archivo = $ruta.$imge;
                @move_uploaded_file($origen_archivo, $destino_archivo);
            $_FILES['imagen']['name'];
            if(estaVacio($codigo_producto)||!isset($codigo_producto)){
                array_push($errores,'Debes ingresar el codigo del producto');
            }
            elseif(!esCodigoProducto($codigo_producto)){
                array_push($errores,'El codigo del producto debe tener el formato PROD#####');
            }
            if(estaVacio($nombre_producto)||!isset($nombre_producto)){
                array_push($errores,'Debes ingresar el nombre del producto');
            }
            if(estaVacio($descripcion)||!isset($descripcion)){
                array_push($errores,'Debes ingresar la descripcion del producto');
            }
            //if(estaVacio($imagen)||!isset($imagen)){
                //array_push($errores,'Debes ingresar una imagen');
            //}
            if(estaVacio($precio)||!isset($precio)){
               array_push($errores,'Debes ingresar el precio del producto');
            }
            if(estaVacio($existencia)||!isset($existencia)){
                array_push($errores,'Debes ingresar las existencias del producto');
            }
            if(estaVacio($codigo_categoria)||!isset($codigo_categoria)){
                array_push($errores,'Debes ingresar el codigo de la categoria');
            }
                
        }
            if(count($errores)==0){
                  
                        if($this->model->insertProducto($producto)>0){
                            header('location:'.PATH.'/Inventario');
                       }
                           
                }
            else{
                $viewBag['errores']=$errores;
                $viewBag['producto']=$producto;
                $this->render("new.php",$viewBag);
               
            }
        }
    }