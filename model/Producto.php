<?php

class Producto{

    protected $producto_id;
    protected $nombre;
    protected $categoria_id;
    protected $precio;
    protected $descripcion;
    protected $img;

    public function __construct(){
    }

    /**
     * Get the value of producto_id
     */ 
    public function getProducto_id()
    {
        return $this->producto_id;
    }

    /**
     * Set the value of producto_id
     *
     * @return  self
     */ 
    public function setProducto_id($producto_id)
    {
        $this->producto_id = $producto_id;

        return $this;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of categoria_id
     */ 
    public function getCategoria_id()
    {
        return $this->categoria_id;
    }

    /**
     * Set the value of categoria_id
     *
     * @return  self
     */ 
    public function setCategoria_id($categoria_id)
    {
        $this->categoria_id = $categoria_id;

        return $this;
    }
    
    /**
     * Get the value of precio
     */ 
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set the value of precio
     *
     * @return  self
     */ 
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }


    /**
     * Get the value of descripcion
     */ 
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     *
     * @return  self
     */ 
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get the value of img
     */ 
    public function getImg()
    {
        return $this->img;
    }

    /**
     * Set the value of img
     *
     * @return  self
     */ 
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }

    public function getPrecioEntera(){
        // Formatea el precio con dos decimales y separador de miles
        $precio_formateado = number_format($this->getPrecio(), 2, ',', '.');
    
        // Encuentra la posición de la coma decimal
        $pos_coma = strpos($precio_formateado, ',');
    
        // Obtiene la parte entera (números antes de la coma)
        $parte_entera = substr($precio_formateado, 0, $pos_coma);
    
        return $parte_entera;
    }
    
    public function getPrecioDecimal(){
        // Formatea el precio con dos decimales y separador de miles
        $precio_formateado = number_format($this->getPrecio(), 2, ',', '.');
    
        // Encuentra la posición de la coma decimal
        $pos_coma = strpos($precio_formateado, ',');
    
        // Obtiene la parte decimal (números después de la coma)
        $parte_decimal = substr($precio_formateado, $pos_coma + 1);
    
        return $parte_decimal;
    }
    
    
}