<?php
require_once 'Controller.php';
require_once './Model/CategoriasModel.php';
require_once './Core/validaciones.php';

class CategoriasController extends Controller{

    private $model;

    function __construct(){
        $this->model=new CategoriasModel();
    }
    
    public function index(){
        $viewBag=array();
        $categorias=$this->model->get();
        $viewBag['categorias']=$categorias;
        $this->render("index.php",$viewBag);
    }
    public function create(){
        $this->render("new.php");
    }
    public function add(){
        if(isset($_POST['Guardar'])){
            extract($_POST);
            //echo var_dump($_POST);
            $errores=array();
            $categoria=array();
            $viewBag=array();
            //$categoria['codigo_categoria']=$codigo_categoria;
            $categoria['nombre_categoria']=$nombre_categoria;

            if(estaVacio($nombre_categoria)||!isset($nombre_categoria)){
                array_push($errores,'Debes ingresar el nombre del editorial');
            }
            
            if(count($errores)==0){
                if($this->model->insertCategoria($categoria)>0){
                    $_SESSION['success_message']="Categoria generada exitosamente";
                    header('location:'.PATH.'/Categorias');
                }
                }
            else{
                $viewBag['errores']=$errores;
                $viewBag['categorias']=$categorias;
                $this->render("new.php",$viewBag);
            }
        }
    }
    public function edit($id){
        $viewBag=array();
        $categoria=$this->model->get($id);
        $viewBag['categoria']=$categoria[0];
        $this->render("edit.php",$viewBag);
    }
    public function update($id){
        if(isset($_POST['Guardar'])){
            extract($_POST);
            $errores=array();
            $categoria=array();
            $viewBag=array();
            $categoria['codigo_categoria']=$id;
            $categoria['nombre_categoria']=$nombre_categoria;
            if(estaVacio($nombre_categoria)||!isset($nombre_categoria)){
                array_push($errores,'Debes ingresar el nombre de la categoria');
            }
            
            if(count($errores)==0){
                
                $this->model->updateCategoria($categoria);
                header('location:'.PATH.'/Categorias');

            }
            else{
                $viewBag['errores']=$errores;
                $viewBag['categoria']=$categoria;
                $this->render("edit.php",$viewBag);
            }       
        }
    }
    public function delete($id){
        $this->model->removeCategoria($id);
        $viewBag=array();
        $categorias=$this->model->get();
        $viewBag['categorias']=$categorias;
        $this->render("index.php",$viewBag);
    }
}