<?php
//Creamos el controlador de producto
include_once 'model/Plato.php';
include_once 'model/Desayuno.php';

include_once 'model/ProductoDAO.php';

class productoController{

    public function index(){
        
        
        //cabecera
        
        // panel include
        $platos = ProductoDAO::getAllProductos(1);

        $desayunos = ProductoDAO::getAllProductos(2);

        ProductoDAO::getProductoById(1);

        include_once 'view/panelPedido.php';

        //footer

    }

    public function compra(){
        echo 'Pagina de compra';
    }

    public function eliminar(){

        if (isset($_POST['producto_id'])){
            $producto_id = $_POST['producto_id'];
            ProductoDAO::eliminarProducto($producto_id);
            header("Location:".url."?controller=producto");
        }else{
            header("Location:".url."?controller=producto");
        }
        
    }
    
    public function modificar(){

        include_once 'view/modificarPedido.php';

    }

    public function actualizar(){

        if (isset($_POST['producto_id'])&
            isset($_POST['categoria_id'])&
            isset($_POST['nombre'])&
            isset($_POST['precio'])
            ){
            
            include_once 'view/modificarPedido.php';
            
            $producto_id = $_POST['producto_id'];
            $categoria_id = $_POST['categoria_id'];
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];
            ProductoDAO::modificarProducto($producto_id, $categoria_id, $nombre, $precio);
            header("Location:".url."?controller=producto");
        }else{
            header("Location:".url."?controller=producto");
        }
    }
}



?>