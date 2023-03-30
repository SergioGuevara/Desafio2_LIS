<?php
require_once 'Model.php';
class UsuariosModel extends Model{

    
    public function validateUser($user,$pass){
        $query="SELECT nombre_usuario FROM usuarios
        WHERE nombre_usuario=:user AND password=SHA2(:pass,256)";
        return $this->getQuery($query,['user'=>$user, 'pass'=>$pass]);
    }
    public function insertUser($usuario=array()){
        $query="INSERT INTO usuarios VALUES (null,:nombre_usuario,:apellido_usuario,:correo,SHA2(:contrasenia,256),3,1)";
        return $this->setQuery($query,$usuario);
    }
}