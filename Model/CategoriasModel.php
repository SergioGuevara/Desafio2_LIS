<?php 

require_once 'Model.php';
class CategoriasModel extends Model{

    public function get($id=''){
        if($id==''){
            $query="SELECT * FROM categorias";
            return $this->getQuery($query);
        }
        else{
            $query="SELECT * FROM categorias WHERE codigo_categoria=:codigo_categoria";
            return $this->getQuery($query,['codigo_categoria'=>$id]);
        }
    }
    
    public function insertCategoria($categoria=array()){
    $query="INSERT INTO categorias VALUES (:codigo_categoria,:nombre_categoria)";
    return $this->setQuery($query,$categoria);
    }
    public function updateCategoria($categoria=array()){
        $query="UPDATE categorias SET nombre_categoria=:nombre_categoria WHERE codigo_categoria=:codigo_categoria";
        return $this->setQuery($query,$categoria);
    }
    public function removeCategoria($id){
        $query="DELETE FROM categorias WHERE codigo_categoria=:codigo_categoria";
        return $this->setQuery($query,['codigo_categoria'=>$id]);
    }

    
}
