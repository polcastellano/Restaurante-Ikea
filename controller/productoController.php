<?php
//Creamos el controlador de producto
include_once 'model/Plato.php';
include_once 'model/Desayuno.php';

include_once 'model/ProductoDAO.php';

class productoController{

    public function index(){
        //cabecera
        
        // panel include

        echo "<h1>Platos Principales</h1>".
        "<table border=1 style='text-align: center;'>".
        "<th>Producto id</th>".
        "<th>Categoria id</th>".
        "<th>Nombre</th>".
        "<th>Precio</th>";

        $platos = ProductoDAO::getAllPlatos();
        foreach($platos as $plato){
            
            echo "<tr>".
            "<td>".$plato->getProducto_id()."</td>".
            "<td>".$plato->getCategoria_id()."</td>".
            "<td>".$plato->getNombre()."</td>".
            "<td>".$plato->getPrecio()."€</td>".
            "</tr>";
        }
        echo "</table>";

        echo "<br><br>";

        echo "<h1>Desayunos</h1>".
        "<table border=1 style='text-align: center;'>".
        "<th>Producto id</th>".
        "<th>Categoria id</th>".
        "<th>Nombre</th>".
        "<th>Precio</th>";

        $desayunos = ProductoDAO::getAllDesayunos();
        foreach($desayunos as $desayuno){

            echo "<tr>".
            "<td>".$desayuno->getProducto_id()."</td>".
            "<td>".$desayuno->getCategoria_id()."</td>".
            "<td>".$desayuno->getNombre()."</td>".
            "<td>".$desayuno->getPrecio()."€</td>".
            "</tr>";
        }
        echo "</table>";

        //footer

    }

    public function compra(){
        echo 'Pagina de compra';
    }

}



?>