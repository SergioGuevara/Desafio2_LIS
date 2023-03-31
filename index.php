<?php
include_once 'Controller/ProductosController.php';
include_once 'Controller/UsuariosController.php';
include_once 'Controller/CategoriasController.php';
include_once 'Core/validaciones.php';
include_once 'Controller/InventarioController.php';
include_once 'Core/config.php';
/*$model=new CategoriasModel();
var_dump($model->get());*/
$url=$_SERVER['REQUEST_URI'];
//session_start();
$url=explode("/",$url);
$controller=empty($url[3])?"":$url[3];
//echo var_dump($controller);
$controller.="Controller";
//if($url[3]==""){
$method=empty($url[4])?"index":$url[4];
//}
//echo var_dump($method);
$param=empty($url[5])?"":$url[5];
$controlador=new $controller();
$controlador->$method($param);
