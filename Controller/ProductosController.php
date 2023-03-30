<?php
require_once 'Controller.php';
require_once './Model/ProductosModel.php';
include_once "vendor/autoload.php";
//include_once './Core/config.php';
use Dompdf\Dompdf;
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
            $DESCRIPCION=$_POST['descripcion'];
            $IMAGEN=$_POST['imagen'];
            $PRECIO=$_POST['precio'];
            $CANTIDAD=$_POST['cantidad'];
            
            if(!isset($_SESSION['CARRITO'])){ //SI NO EXITE NADA EN EL CARRITO
                $producto=array(//CAPTURAMOS LOS DATOS DEL FORMULARIO
                    'ID'=>$ID,
                    'NOMBRE'=>$NOMBRE,
                    'DESCRIPCION'=>$DESCRIPCION,
                    'CANTIDAD'=>$CANTIDAD,
                    'IMAGEN'=>$IMAGEN,
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
                    'DESCRIPCION'=>$DESCRIPCION,
                    'CANTIDAD'=>$CANTIDAD,
                    'IMAGEN'=>$IMAGEN,
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
    public function generarPdf(){
       
        $dompdf = new Dompdf();
        $productos=$_SESSION['CARRITO'];
        ob_start(); 
        echo "<!DOCTYPE html>";
        echo "<html lang=\"en\">";
        echo "<head>";
        echo " <meta charset=\"UTF-8\">";
        echo "<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">";
        echo "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">";
        echo "<title>PDF</title>";
        echo "<style>";
        echo ".img1{";
        echo "width: 200px;";
        echo "height: 100px;";
        echo "}";
        echo ".tdb{";
        echo "border: none;";
        echo "}";
        echo ".center {";
        echo "text-align: center;";
        echo "border: 3px solid green;";
        echo "}";
        echo "h1{";
        echo "text-align: center;";
        echo "font-family: \"Lucida Console\, \"Courier New\", monospace;";
        echo "text-decoration: underline;";
        echo "}";
        echo "table {";
        echo "width: 100%;";
        echo "border: none;";
        echo "}";
        echo "th, td {";
        echo "font-family: \"Lucida Console\", \"Courier New\", monospace;";
        echo "width: 25%;";
        echo "text-align: center;";
        echo "vertical-align: top;";
        echo "border: 1px solid #000;";
        echo " border-collapse: collapse;";
        echo "padding: 0.3em;";
        echo "caption-side: bottom;";
        echo "}";
        echo "th {";
        echo "background: #D1F2EB;";
        echo "font-size: 20px;";
        echo "}";
        echo "</style>";
        echo "</head>";
        echo "<body>";
        $nombreImagen = "./View/assets/img/logo.png";
        $imagenBase64 =  "data:image/png;base64," .base64_encode(file_get_contents($nombreImagen));
        echo "<img src=".$imagenBase64." class=\"img1\">";
        echo "<h1>Detalle de compra</h1>";
        echo "<br/>";
        echo "<table>";
        echo "<thead>";
        echo "<th>Código</th>";
        echo "<th>Nombre</th>";
        echo "<th>Descripción</th>";
        echo "<th>Cantidad</th>";
        echo "<th>Imagen</th>";
        echo "<th>Precio</th>";
        echo "</thead>";
        $total=0;
        for ($i=0; $i < sizeof($productos) ; $i++) { 
        echo "<tr>";
        foreach ($productos[$i] as $clave => $valor) {
            if($clave=='IMAGEN')
            {
                $nombreImagen = "./View/assets/img/".$valor."";
                $imagenBase64 = "data:image/png;base64," .base64_encode(file_get_contents($nombreImagen));;
                echo "<td><img src=".$imagenBase64." width=\"100\" height=\"100\"/></td>";
            }
            else
            {
                if($clave=="CANTIDAD"){
                    $cantidad=$valor;
                }
                if($clave=="PRECIO")
                {
                    $precio=$valor;
                    $total=$cantidad*$precio;
                    echo "<td>$".$valor."</td>";
                }
                else{
                    echo "<td>".$valor."</td>";
                }
            }
        }
        echo "</tr>";
    }
        echo "<tr>";
        echo "<td class=\"tdb\"></td>";
        echo "<td class=\"tdb\"></td>";
        echo "<td class=\"tdb\"></td>";
        echo "<td class=\"tdb\"></td>";
        echo "<th>Total</th>";
        echo "<td>$". $total."</td>";
        echo "</tr>";
        echo "</table>";
        echo "</body>";
        echo "</html>";
        $html = ob_get_clean(); //ob_get_clean captura toda la información y lo amacenamos en una variable
        $dompdf->loadHtml($html); //loadHtml carga la información contenida en la variable $html
        $rutaGuardado = "./View/assets/pdfs/";; //se define una ruta en donde se gurdara el pdf
        srand (time());
        $nombre=rand(1,100);
        for ($i=0; $i < 5; $i++) { 
            $nombre .= rand(1,100);
        }
        $nombreArchivo=$nombre.".pdf"; // el nombre del archivo 
        $dompdf->render(); // renderiza el archivo
        header("Content-type: application/pdf"); // define el tipo
        header("Content-Disposition: inline; filename=".$nombreArchivo."");// define el nombre y la disposicion en la que se vera el documento en el navegador
        echo $dompdf->output(); //crea el archivo
        $outPut=$dompdf->output();
        file_put_contents($rutaGuardado.$nombreArchivo,$outPut); // funcion que mueve el archivo a la ruta definida 
    }
}