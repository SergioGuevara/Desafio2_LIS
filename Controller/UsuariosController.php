<?php
require_once 'Controller.php';
require_once './Model/UsuariosModel.php';

class UsuariosController extends Controller{
    private $model;
    function __construct(){
        /*
        if(is_null( $_SESSION['login_data'])){
            header('location:'.PATH.'/Usuarios/login');
        }
        else if($_SESSION['login_data']['id_tipo_usuario']==2){
            echo "<h1>PRueba</h1>";
            exit;
        }*/

        $this->model=new UsuariosModel();
    }
    public function login(){
        $this->render("login.php");
    }
    public function singup(){
        $this->render("singup.php");
    }
    public function insertUsuario(){
            if(isset($_POST['Crear'])){
                extract($_POST);
                $errores=array();
                $usuario=array();
                $viewBag=array();
                $usuario['nombre_usuario']=$nombre;
                $usuario['apellido_usuario']=$apellido;
                $usuario['correo']=$correo;
                $usuario['contrasenia']=$clave;
                
    
                if(estaVacio($nombre)||!isset($nombre)){
                    array_push($errores,'Debes ingresar el nombre de usuario');
                }
                
                if(estaVacio($apellido)||!isset($apellido)){
                    array_push($errores,'Debes ingresar un apellido'); 
                }elseif(!esTexto($apellido)){
                    array_push($errores,'Debes ingresar un apellido'); 
                }
                
                if(estaVacio($correo)||!isset($correo)){
                    array_push($errores,'Debes ingresar un email');
                }
                elseif(!esMail($correo))
                {
                    array_push($errores,'Debes ingresar un email valido');
                }
                if(estaVacio($clave)||!isset($clave)){
                    array_push($errores,'Debes ingresar una contraseña');
                }
            
    
                
    
                if(count($errores)==0){
                    if($this->model->insertUser($usuario)>0){
                       // $_SESSION['success_message']="Editorial creado exitosamente";
                        header('location:'.PATH.'/Usuarios/login');
                    }
                    else{
                        //array_push($errores,"YA existe un editorial con este codigo");
                        //$viewBag['errores']=$errores;
                        //$viewBag['editorial']=$editorial;
                        $this->render("singup.php",$viewBag);
    
                    }
                    
    
                }
                else{
                    $viewBag['errores']=$errores;
                    //$viewBag['errores']=$usuario;
                    $this->render("singup.php",$viewBag);
                }
    
    
                
            }
    }

    
    public function logout(){
        session_unset();
        session_destroy();
        header('location:'.PATH.'/Usuarios/login');

    }
    public function validate(){
        $model=new UsuariosModel();
        $user=$_POST['nombre'];
        $pass=$_POST['clave'];
        if(!empty($model->validateUser($user,$pass))){
            $login_data=$model->validateUser($user,$pass);
            $login_data=$login_data[0];
            $_SESSION['login_data']=$login_data;
            header('location:'.PATH.'/Productos');
           
        }
        else{
            //echo var_dump($model->validateUser($user,$pass));
            $errores=array();
            $viewBag=array();
            if(empty($_POST['nombre']) || empty($_POST['clave'])){
                array_push($errores,"El usuario y/o contraseña no fueron ingresados");
             }
             else{
                array_push($errores,"El usuario y/o contraseña son incorrectos");
             }
            $viewBag['errores']=$errores;
            $this->render("login.php",$viewBag);
        }
    }
} 