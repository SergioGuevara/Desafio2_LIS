<?php 

require_once 'Model.php';
class InventarioModel extends Model{


    public function get($id=''){
        if($id==''){
            $query="SELECT p.codigo_producto, p.nombre_producto, p.descripcion, p.imagen,  
            p.precio,  p.existencia,  c.nombre_categoria
            FROM productos p INNER JOIN categorias c ON p.codigo_categoria = c.codigo_categoria
            ";
            return $this->getQuery($query);
        }
        else{
            $query="SELECT p.codigo_producto, p.nombre_producto, p.descripcion, p.imagen,  
            p.precio,  p.existencia,  c.nombre_categoria
            FROM productos p INNER JOIN categorias c ON p.codigo_categoria = c.codigo_categoria
            ";
            return $this->getQuery($query,['codigo_producto'=>$id]);
        }
       
        
    }
}