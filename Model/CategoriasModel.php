<?php 

require_once 'Model.php';
class CategotiasModel extends Model{
    public function get($id=''){
            $query="SELECT * FROM productos";
            return $this->getQuery($query);
    }
    

}