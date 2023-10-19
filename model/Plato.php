<?php

include_once 'Producto.php';

class Plato extends Producto{



    public function __construct($id, $name, $tipo, $genero){
        parent::__construct($id, $name, $tipo, $genero);
    }
    
    public function calculaPrecioTotal($numDias){
        $precioTotal = $numDias*self::PRECIOPLATO;
        return $precioTotal;
    }

    public function devuelvePrecioDia(){
        return self::PRECIOPLATO;
    }
}