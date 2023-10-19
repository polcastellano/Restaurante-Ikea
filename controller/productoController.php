<?php
//Creamos el controlador de producto
include_once 'model/Plato.php';
include_once 'model/Desayuno.php';

include_once 'model/ProductoDAO.php';

class productoController{

    public function index(){
        //cabecera
        
        // panel include
/*
        $p1 = new Plato(0,'Macarrones','pasta','italiano');
        $d1 = new Desayuno(0,'Cruasan','bolleria','frances','granier');

        $listaProductos = [$p1,$d1];

        foreach ($listaProductos as $producto){
            echo $producto->getName();
            echo "<p></p>";
        }
*/
        var_dump(ProductoDAO::getAllProductos());
        
/*
        echo 'Lista de productos';
        //footer
*/
    }

    public function compra(){
        echo 'Pagina de compra';
    }

}



?>