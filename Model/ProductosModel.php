<?php 

require_once 'Model.php';
class ProductosModel extends Model{
    public function get($id=''){
        if($id==''){
            $query="SELECT * FROM productos";
            return $this->getQuery($query);
        }
        else{
<<<<<<< HEAD
            $query="SELECT * FROM productos WHERE codigo_producto=:codigo_producto";
            return $this->getQuery($query,['codigo_prodcuto'=>$id]);
=======
            $query="SELECT * FROM editoriales WHERE codigo_editorial=:codigo_editorial";
            return $this->getQuery($query,['codigo_editorial'=>$id]);
>>>>>>> origin
        } 
    }

}