<?php
require_once 'Controller.php';
require_once './Model/InventarioModel.php';
//include_once './Core/config.php';
class InventarioController extends Controller{

    private $model;

    function __construct(){
        $this->model=new InventarioModel();
    }

    public function index(){
        $viewBag=array();
        $productos=$this->model->get();
        //$viewBag['nombre']="Fulanito";
        $viewBag['productos']=$productos;
        $this->render("index.php",$viewBag);
    }
}