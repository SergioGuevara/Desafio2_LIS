<?php
include_once 'Model/ProductosModel.php';
<<<<<<< HEAD
include_once 'Controller/ProductosController.php';
include_once 'Core/config.php';
//var_dump($model->get(''));
$url=$_SERVER['REQUEST_URI'];
//session_start();
$url=explode("/",$url);
$controller=empty($url[2])?"index":$url[2];
//echo var_dump($controller);
$controller.="Controller";
$method=empty($url[3])?"index":$url[3];
//echo var_dump($method);
$param=empty($url[4])?"":$url[4];
$controlador=new $controller();
$controlador->$method($param);
=======
include_once 'Core/config.php';
$model = new ProductosModel();
var_dump($model->get(''));
>>>>>>> c2d54bf9be49571863364682610a37ab4e0c2c7e
