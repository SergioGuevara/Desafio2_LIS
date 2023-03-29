<?php 

require_once 'Model.php';
class ProductosModel extends Model{
    public function get($id=''){
        if($id==''){
            $query="SELECT * FROM productos";
            return $this->getQuery($query);
        }
        else{
            $query="SELECT * FROM editoriales WHERE codigo_editorial=:codigo_editorial";
            return $this->getQuery($query,['codigo_editorial'=>$id]);
        } 
    }

}