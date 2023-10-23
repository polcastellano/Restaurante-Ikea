<?php
//Creamos el controlador de producto
include_once 'model/Plato.php';
include_once 'model/Desayuno.php';

include_once 'model/ProductoDAO.php';

class productoController{

    public function index(){
        
        
        //cabecera
        
        // panel include
        $platos = ProductoDAO::getAllPlatos();

        $desayunos = ProductoDAO::getAllDesayunos();

        include_once 'view/panelPedido.php';

        //footer

    }

    public function compra(){
        echo 'Pagina de compra';
    }

}



?>