<?php
include_once 'Model/ProductosModel.php';
include_once 'Controller/ProductosController.php';
include_once 'Core/config.php';
//var_dump($model->get(''));
$url=$_SERVER['REQUEST_URI'];
session_start();
//session_start();
$url=explode("/",$url);
$controller=empty($url[3])?"index":$url[3];
//echo var_dump($controller);
$controller.="Controller";
$method=empty($url[4])?"index":$url[4];
//echo var_dump($method);
$param=empty($url[5])?"":$url[5];
$controlador=new $controller();
$controlador->$method($param);