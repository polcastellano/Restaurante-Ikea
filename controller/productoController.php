<?php
include_once 'model/Plato.php';
include_once 'model/Desayuno.php';
include_once 'model/Entrante.php';
include_once 'model/Pizza.php';
include_once 'model/Pedido.php';

include_once 'model/ProductoDAO.php';

class productoController{

    public function index(){
        
        //Iniciamos y tratamos sesion
        session_start();

        if (!isset($_SESSION['selecciones'])){
            $_SESSION['selecciones'] = array();
        }else{
            if (isset($_POST['producto_id']) && isset($_POST['categoria_id'])){
                $producto_id = $_POST['producto_id'];
                $categoria_id = $_POST['categoria_id'];
    
                $pedido = new Pedido(ProductoDAO::getProductoById($producto_id, $categoria_id));
                array_push($_SESSION['selecciones'], $pedido);  

            }
            // Esto es un bucle infinito si vuelvo de una pagina cualquiera
            // else{
            //     header("Location:".url."?controller=producto");
            // }
            
        }
            
           
        
        //cabecera
        include_once 'view/cabecera.php';


        // panel include
        $platos = ProductoDAO::getAllProductos(1);

        $desayunos = ProductoDAO::getAllProductos(2);

        $entrantes = ProductoDAO::getAllProductos(3);

        $pizzas = ProductoDAO::getAllProductos(4);

        include_once 'view/panelPedido.php';

        //footer

    }

    public function carrito(){
        session_start();

        include_once 'view/cabecera.php';

        include_once 'view/panelCarrito.php';

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

        if (isset($_POST['producto_id']) && isset($_POST['categoria_id'])){
            $producto_id = $_POST['producto_id'];
            $categoria_id = $_POST['categoria_id'];
            $producto = ProductoDAO::getProductoById($producto_id, $categoria_id);
            include_once 'view/modificarProducto.php';
        }else{
            header("Location:".url."?controller=producto");
        }
        
        

    }

    public function actualizar(){

        if (isset($_POST['producto_id'])&&
            isset($_POST['nombre'])&&
            isset($_POST['precio'])
            ){

            $producto_id = $_POST['producto_id'];
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];
            
            ProductoDAO::updateProducto($producto_id, $nombre, $precio);
            header("Location:".url."?controller=producto");
        }else{
            header("Location:".url."?controller=producto");
        }
    }

    public function agregar(){

        $categorias = ProductoDAO::getAllCategorias();
        include_once 'view/agregarProducto.php';
    }

    public function insertar(){

        if (isset($_POST['categoria'])&&
            isset($_POST['nombre'])&&
            isset($_POST['precio'])
            ){

            $categoria = $_POST['categoria'];
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];
            
            ProductoDAO::insertarProducto($categoria, $nombre, $precio);

            header("Location:".url."?controller=producto");
        }else{
            header("Location:".url."?controller=producto&action=agregar");
        }
    }

}



?>