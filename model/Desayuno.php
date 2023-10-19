<?php

include_once 'Producto.php';

class Desayuno extends Producto{

    private $plataforma;

    public function __construct($id, $name, $tipo, $genero, $plataforma){
        parent::__construct($id, $name, $tipo, $genero);
        $this->plataforma = $plataforma;
    }

    /**
     * Get the value of plataforma
     */ 
    public function getPlataforma()
    {
        return $this->plataforma;
    }

    /**
     * Set the value of plataforma
     *
     * @return  self
     */ 
    public function setPlataforma($plataforma)
    {
        $this->plataforma = $plataforma;

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