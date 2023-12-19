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
        }

        if (!isset($_SESSION['favoritos'])){
            $_SESSION['favoritos'] = array();
        }
        //cabecera
        include_once 'view/cabecera.php';

        //home
        include_once 'view/panelHome.php';

        //footer
        include_once 'view/footer.php';

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
        include_once 'view/footer.php';
    }

    public function carrito(){
        session_start();
        if (!isset($_SESSION['usuario'])){
            header("Location:".url."?controller=usuario&action=logUsuarios");
        }else{
            if (!isset($_SESSION['selecciones'])){
                $_SESSION['selecciones'] = array();
            }else{
                if (isset($_POST['producto_id']) && isset($_POST['categoria_id'])){
                    $producto_id = $_POST['producto_id'];
                    $categoria_id = $_POST['categoria_id'];

                    $pedido_existe = false;

                    foreach ($_SESSION['selecciones'] as $pedido) {
                        if($pedido->getProducto()->getProducto_id() == $producto_id && $pedido->getProducto()->getCategoria_id() == $categoria_id){
                            $pedido->setCantidad($pedido->getCantidad() + 1);
                            $pedido_existe = true;
                            break;
                        }
                    }
                    
                    if($pedido_existe == false){
                        $pedido = new Pedido(ProductoDAO::getProductoById($producto_id, $categoria_id));
                    
                        array_push($_SESSION['selecciones'], $pedido);
                    }

                    header("Location:".url."?controller=producto&action=carta");
                }else{
                    header("Location:".url."?controller=producto&action=carta");
                } 
            }
        }
        

    }

    public function irCarrito(){
        session_start();
        if (!isset($_SESSION['usuario'])){
            header("Location:".url."?controller=usuario&action=logUsuarios");
        }else{
            if (!isset($_SESSION['selecciones'])){
                $_SESSION['selecciones'] = array();
            } 
        }
        

        include_once 'view/cabecera.php';

        include_once 'view/panelCarrito.php';
        include_once 'view/footer.php';

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
        session_start();
        
        $platos = ProductoDAO::getAllProductos(1);

        $desayunos = ProductoDAO::getAllProductos(2);

        $entrantes = ProductoDAO::getAllProductos(3);

        $pizzas = ProductoDAO::getAllProductos(4);
            
        include_once 'view/cabecera.php';
        include_once 'view/modificarProducto.php';
        include_once 'view/footer.php';
    }

    public function actualizar(){

        if (isset($_POST['producto_id'])&&
            isset($_POST['nombre'])&&
            isset($_POST['precio'])&&
            isset($_POST['img'])
            ){

            $producto_id = $_POST['producto_id'];
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];
            $imagen = $_POST['img'];
            
            ProductoDAO::updateProducto($producto_id, $nombre, $precio, $imagen); //No actualiza !!!!!!!!!!!!!!!!!!!!!!!!!!!!
            header("Location:".url."?controller=usuario&action=carta");
        }else{
            header("Location:".url."?controller=producto&action=carta");
        }
    }

    public function agregar(){
        session_start();
        $categorias = ProductoDAO::getAllCategorias();

        include_once 'view/cabecera.php';
        include_once 'view/agregarProducto.php';
        include_once 'view/footer.php';
    }

    public function insertar(){

        if (isset($_POST['categoria'])&&
            isset($_POST['nombre'])&&
            isset($_POST['precio'])&&
            isset($_POST['img'])
            ){

            $categoria = $_POST['categoria'];
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];
            $imagen = $_POST['img'];
            
            ProductoDAO::insertarProducto($categoria, $nombre, $precio, $imagen);

            header("Location:".url."?controller=producto&action=carta");
        }else{
            header("Location:".url."?controller=producto&action=agregar");
        }
    }

    public function favorito(){
        session_start();
        if (!isset($_SESSION['usuario'])){
            header("Location:".url."?controller=usuario&action=logUsuarios");
        }else{
            if (!isset($_SESSION['favoritos'])){
                $_SESSION['favoritos'] = array();
            }else{
                if (isset($_POST['producto_id']) && isset($_POST['categoria_id'])){
                    $producto_id = $_POST['producto_id'];
                    $categoria_id = $_POST['categoria_id'];
        
                    $favorito = new Favorito(ProductoDAO::getProductoById($producto_id, $categoria_id));
                    array_push($_SESSION['favoritos'], $favorito);  

                    include_once 'view/cabecera.php';
                    include_once 'view/panelFavorito.php';
                    include_once 'view/footer.php';
                }else{
                    header("Location:".url."?controller=producto&action=carta");
                }
            }
        }

    }

    public function irFavorito(){
        session_start();

        if (!isset($_SESSION['usuario'])){
            header("Location:".url."?controller=usuario&action=logUsuarios");
        }else{
            if (!isset($_SESSION['favoritos'])){
                $_SESSION['favoritos'] = array();
            }
        }

        include_once 'view/cabecera.php';
        include_once 'view/panelFavorito.php';
        include_once 'view/footer.php';

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
        }else{
            header("Location:".url."?controller=producto&action=carta");
        }
        header("Location:".url."?controller=producto&action=irCarrito");
    }

    public function eliminarProdCar(){
        session_start();
        if(!isset($_SESSION['selecciones'])){
            $_SESSION['selecciones'] = array();
        }else{
            if (isset($_POST['posicionSelecciones'])){
                $posicionSelecciones = $_POST['posicionSelecciones'];
                // Encuentra el índice del elemento que quieres eliminar
                $indice = array_search($posicionSelecciones, $_SESSION['selecciones']);

                // Verifica si se encontró el elemento y lo elimina del array de sesión
                unset($_SESSION['selecciones'][$posicionSelecciones]);

                //Reinicia los índices del array si deseas mantener una secuencia numérica continua
                $_SESSION['selecciones'] = array_values($_SESSION['selecciones']);
                
                include_once 'view/cabecera.php';
                include_once 'view/panelCarrito.php';
                include_once 'view/footer.php';
            }else{
                header("Location:".url."?controller=producto&action=irCarrito");
            }
        }
        
    }

    public function eliminarProdFav(){
        session_start();
        if(!isset($_SESSION['favoritos'])){
            $_SESSION['favoritos'] = array();
        }else{
            if (isset($_POST['posicionSelecciones'])){
                $posicionSelecciones = $_POST['posicionSelecciones'];
                // Encuentra el índice del elemento que quieres eliminar
                $indice = array_search($posicionSelecciones, $_SESSION['favoritos']);

                // Verifica si se encontró el elemento y lo elimina del array de sesión
                    unset($_SESSION['favoritos'][$posicionSelecciones]);

                // Opcional: reinicia los índices del array si deseas mantener una secuencia numérica continua
                $_SESSION['favoritos'] = array_values($_SESSION['favoritos']);
                
                include_once 'view/cabecera.php';
                include_once 'view/panelFavorito.php';
                include_once 'view/footer.php';
            }else{
                header("Location:".url."?controller=producto&action=irFavorito");
            }
        }
        
    }


}



?>