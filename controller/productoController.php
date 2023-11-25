<?php
include_once 'model/Plato.php';
include_once 'model/Desayuno.php';
include_once 'model/Entrante.php';
include_once 'model/Pizza.php';
include_once 'model/Pedido.php';
include_once 'model/Favorito.php';
include_once 'utils/CalculadoraPrecios.php';

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

        if (!isset($_SESSION['favoritos'])){
            $_SESSION['favoritos'] = array();
        }else{
            if (isset($_POST['producto_id']) && isset($_POST['categoria_id'])){
                $producto_id = $_POST['producto_id'];
                $categoria_id = $_POST['categoria_id'];
    
                $favorito = new Favorito(ProductoDAO::getProductoById($producto_id, $categoria_id));
                array_push($_SESSION['favoritos'], $favorito);  

            }
            // Esto es un bucle infinito si vuelvo de una pagina cualquiera
            // else{
            //     header("Location:".url."?controller=producto");
            // }
            
        }


        //cabecera
        include_once 'view/cabecera.php';


        //home
        include_once 'view/panelHome.php';

        //footer

    }

    public function carta(){
        session_start();

        if (!isset($_SESSION['selecciones'])){
            $_SESSION['selecciones'] = array();
        }

        if (!isset($_SESSION['favoritos'])){
            $_SESSION['favoritos'] = array();
        }


        //cabecera
        include_once 'view/cabecera.php';


        // panel include
        $platos = ProductoDAO::getAllProductos(1);

        $desayunos = ProductoDAO::getAllProductos(2);

        $entrantes = ProductoDAO::getAllProductos(3);

        $pizzas = ProductoDAO::getAllProductos(4);

        include_once 'view/panelCarta.php';
    }

    public function carrito(){
        session_start();

        if (!isset($_SESSION['selecciones'])){
            $_SESSION['selecciones'] = array();
        }else{
            if (isset($_POST['producto_id']) && isset($_POST['categoria_id'])){
                $producto_id = $_POST['producto_id'];
                $categoria_id = $_POST['categoria_id'];
    
                $pedido = new Pedido(ProductoDAO::getProductoById($producto_id, $categoria_id));
                array_push($_SESSION['selecciones'], $pedido); 

                header("Location:".url."?controller=producto&action=carta");
            }else{
                header("Location:".url."?controller=producto&action=carta");
            }
            
        }

    }

    public function irCarrito(){
        session_start();

        if (!isset($_SESSION['selecciones'])){
            $_SESSION['selecciones'] = array();
        }

        include_once 'view/cabecera.php';

        include_once 'view/panelCarrito.php';

    }

    public function eliminar(){

        if (isset($_POST['producto_id'])){
            $producto_id = $_POST['producto_id'];
            ProductoDAO::eliminarProducto($producto_id);
            header("Location:".url."?controller=producto&action=carta");
        }else{
            header("Location:".url."?controller=producto&action=carta");
        }
        
    }
    
    public function modificar(){

        if (isset($_POST['producto_id']) && isset($_POST['categoria_id'])){
            $producto_id = $_POST['producto_id'];
            $categoria_id = $_POST['categoria_id'];
            $producto = ProductoDAO::getProductoById($producto_id, $categoria_id);
            include_once 'view/modificarProducto.php';
        }else{
            header("Location:".url."?controller=producto&action=carta");
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
            header("Location:".url."?controller=producto&action=carta");
        }else{
            header("Location:".url."?controller=producto&action=carta");
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

            header("Location:".url."?controller=producto&action=carta");
        }else{
            header("Location:".url."?controller=producto&action=agregar");
        }
    }

    public function favorito(){
        session_start();

        if (!isset($_SESSION['favoritos'])){
            $_SESSION['favoritos'] = array();
        }else{
            if (isset($_POST['producto_id']) && isset($_POST['categoria_id'])){
                $producto_id = $_POST['producto_id'];
                $categoria_id = $_POST['categoria_id'];
    
                $favorito = new Favorito(ProductoDAO::getProductoById($producto_id, $categoria_id));
                array_push($_SESSION['favoritos'], $favorito);  

                header("Location:".url."?controller=producto&action=carta");
            }else{
                header("Location:".url."?controller=producto&action=carta");
            }
        }

    }

    public function irFavorito(){
        session_start();

        if (!isset($_SESSION['favoritos'])){
            $_SESSION['favoritos'] = array();
        }

        include_once 'view/cabecera.php';

        include_once 'view/panelFavorito.php';

    }

    public function compra(){
        session_start();
        if (isset($_POST['suma'])){

            $pedido = $_SESSION['selecciones'][$_POST['suma']];
            $pedido->setCantidad($pedido->getCantidad()+1);
        }else if(isset($_POST['resta'])){
            $pedido = $_SESSION['selecciones'][$_POST['resta']];
            if($pedido->getCantidad()==1){
                unset($_SESSION['selecciones'][$_POST['resta']]);
                //re-indexamos el array
                $_SESSION['selecciones'] = array_values($_SESSION['selecciones']);
            }else{
                $pedido->setCantidad($pedido->getCantidad()-1);
            }
        }
        include_once 'view/cabecera.php';
        include_once 'view/panelCarrito.php';
    }

}



?>