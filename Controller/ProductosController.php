<?php
require_once 'Controller.php';
require_once './Model/ProductosModel.php';
//include_once './Core/validaciones.php';
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
}