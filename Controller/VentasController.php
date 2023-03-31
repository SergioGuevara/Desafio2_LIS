<?php
require_once 'Controller.php';
require_once './Model/VentasModel.php';

class VentasController extends Controller{
    private $model;
    function __construct(){
        $this->model=new VentasModel();
    }
    public function index(){
        $viewBag=array();
        $ventas=$this->model->getVentas();
        $viewBag['ventas']=$ventas;
        $this->render("index.php",$viewBag);
    }
}