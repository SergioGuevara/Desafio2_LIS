<?php
require_once 'Model.php';
class VentasModel extends Model{

    public function getVentas(){
        $query="SELECT V.codigo_venta,V.total,U.nombre_usuario,V.pdf,V.fecha_venta FROM ventas V INNER JOIN usuarios U ON V.codigo_usuario=U.codigo_usuario ORDER BY V.fecha_venta ASC";
        return $this->getQuery($query);
    }
}