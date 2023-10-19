<?php

include_once 'Producto.php';

class Desayuno extends Producto{

    private $cafe;

    public function __construct($id, $name, $categoria, $precio, $cafe){
        parent::__construct($id, $name, $categoria, $precio);
        $this->cafe = $cafe;
    }

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