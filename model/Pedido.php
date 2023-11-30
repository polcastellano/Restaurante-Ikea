<?php

class Pedido{

    private $producto;
    private $cantidad = 1;

    public function __construct($producto){
        $this->producto = $producto;
    }


    /**
     * Get the value of producto
     */ 
    public function getProducto()
    {
        return $this->producto;
    }

    /**
     * Set the value of producto
     *
     * @return  self
     */ 
    public function setProducto($producto)
    {
        $this->producto = $producto;

        return $this;
    }

    /**
     * Get the value of cantidad
     */ 
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set the value of cantidad
     *
     * @return  self
     */ 
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Funcion para devolver el precio del producto segun la cantidad que haya
     */
    public function calculaPrecioCantidad(){
        return $this->producto->getPrecio() * $this->cantidad;
        
    }

    /**
     * Funcion para formatear el precio total 
     */
    public function formatPrecio(){
        $precioTotal = $this->producto->getPrecio() * $this->cantidad;

        $precio_formateado = number_format($precioTotal, 2, ',', '.');
        // Encontrar la posición de la coma decimal
        $pos_coma = strpos($precio_formateado, ',');

        // Obtener la parte entera (números antes de la coma)
        $parte_entera = substr($precio_formateado, 0, $pos_coma);

        $precio_formateado = number_format($precioTotal, 2, ',', '.');
        // Encontrar la posición de la coma decimal
        $pos_coma = strpos($precio_formateado, ',');

        // Obtener la parte entera (números antes de la coma)
        $parte_decimal = substr($precio_formateado, $pos_coma + 1);

        return "$parte_entera,$parte_decimal";
    }
}