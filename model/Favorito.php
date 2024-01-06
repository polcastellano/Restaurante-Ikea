<?php

class Favorito{

    private $producto;

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
     * Funcion para formatear el precio total 
     */
    public function formatPrecio(){
        $precioTotal = $this->producto->getPrecio();

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