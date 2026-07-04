<?php

class PedidoDetalle extends Pedido{

    private $pedido_id;
    private $usuario_id;
    private $fecha;
    private $precio_total;
    private $propinas;
    private $puntos;
    private $puntos_usados;
    
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
     * Get the value of usuario_id
     */ 
    public function getUsuario_id()
    {
        return $this->usuario_id;
    }

    /**
     * Set the value of usuario_id
     *
     * @return  self
     */ 
    public function setUsuario_id($usuario_id)
    {
        $this->usuario_id = $usuario_id;

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

    /**
     * Get the value of propinas
     */ 
    public function getPropinas()
    {
        return $this->propinas;
    }

    /**
     * Set the value of propinas
     *
     * @return  self
     */ 
    public function setPropinas($propinas)
    {
        $this->propinas = $propinas;

        return $this;
    }

    /**
     * Get the value of puntos
     */ 
    public function getPuntos()
    {
        return $this->puntos;
    }

    /**
     * Set the value of puntos
     *
     * @return  self
     */ 
    public function setPuntos($puntos)
    {
        $this->puntos = $puntos;

        return $this;
    }

    /**
     * Get the value of puntos_usados
     */ 
    public function getPuntos_usados()
    {
        return $this->puntos_usados;
    }

    /**
     * Set the value of puntos_usados
     *
     * @return  self
     */ 
    public function setPuntos_usados($puntos_usados)
    {
        $this->puntos_usados = $puntos_usados;

        return $this;
    }
}