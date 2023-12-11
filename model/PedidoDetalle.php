<?php

abstract class PedidoDetalle extends Pedido{

    private $pedido_id;
    private $fecha;
    private $precio_total;
    
    public function __construct(){
    }

    /**
     * Get the value of pedido_id
     */ 
    public function getPedido_id()
    {
        return $this->pedido_id;
    }

    /**
     * Set the value of pedido_id
     *
     * @return  self
     */ 
    public function setPedido_id($pedido_id)
    {
        $this->pedido_id = $pedido_id;

        return $this;
    }

    /**
     * Get the value of fecha
     */ 
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set the value of fecha
     *
     * @return  self
     */ 
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get the value of precio_total
     */ 
    public function getPrecio_total()
    {
        return $this->precio_total;
    }

    /**
     * Set the value of precio_total
     *
     * @return  self
     */ 
    public function setPrecio_total($precio_total)
    {
        $this->precio_total = $precio_total;

        return $this;
    }
}