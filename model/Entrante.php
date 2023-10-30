<?php

include_once 'Producto.php';

class Entrante extends Producto{


    public function __construct(){
    }

/*
    public function __construct($producto_id, $nmobre, $categoria_id, $precio){
        parent::__construct($producto_id, $nmobre, $categoria_id, $precio);
    }
*/


    public function calculaPrecioTotal($numDias){
        $precioTotal = $numDias*self::PRECIOPLATO;
        return $precioTotal;
    }

    public function devuelvePrecioDia(){
        return self::PRECIOPLATO;
    }
}