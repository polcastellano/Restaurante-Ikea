<?php

include_once 'Producto.php';

class Desayuno extends Producto{

    private $cafe;

    public function __construct(){
    }

/*
    public function __construct($producto_id, $nombre, $categoria_id, $precio, $cafe){
        parent::__construct($producto_id, $nombre, $categoria_id, $precio);
        $this->cafe = $cafe;
    }
*/


    /**
     * Get the value of cafe
     */ 
    public function getCafe()
    {
        return $this->cafe;
    }

    /**
     * Set the value of cafe
     *
     * @return  self
     */ 
    public function setCafe($cafe)
    {
        $this->cafe = $cafe;

        return $this;
    }

    public function calculaPrecioTotal($numDias){
        $precioTotal = $numDias*self::PRECIODESAYUNO;
        return $precioTotal;
    }

    public function devuelvePrecioDia(){
        return self::PRECIODESAYUNO;
    }

}