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

}