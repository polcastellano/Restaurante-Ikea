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


        // Obtiene productos de diferentes categorías utilizando ProductoDAO
        $platos = ProductoDAO::getAllProductos(1);

        $desayunos = ProductoDAO::getAllProductos(2);

        $entrantes = ProductoDAO::getAllProductos(3);

        $pizzas = ProductoDAO::getAllProductos(4);

        include_once 'view/panelCarta.php';
        include_once 'view/footer.php';
    }

    public function carrito(){
        // Inicia o reanuda la sesión actual
        session_start();
        
        // Verifica si no hay un usuario autenticado, redirige al inicio de sesión
        if (!isset($_SESSION['usuario'])){
            header("Location:".url."?controller=usuario&action=logUsuarios");
            exit();
        } else {
            // Verifica si no hay selecciones guardadas en la sesión, las inicializa como un array vacío
            if (!isset($_SESSION['selecciones'])){
                $_SESSION['selecciones'] = array();
            } else {
                //Comprobar los datos
                $inputJSON = file_get_contents('php://input');
                $data = json_decode($inputJSON, TRUE); //convert JSON into array

                // Si se envían datos de producto y categoría por POST, se añade el favorito
                if (isset($data['producto_id']) && isset($data['categoria_id'])){
                    $producto_id = $data['producto_id'];
                    $categoria_id = $data['categoria_id'];
    
                    $pedido_existe = false;
    
                    // Busca si el producto ya está en el carrito; si sí, aumenta su cantidad
                    foreach ($_SESSION['selecciones'] as $pedido) {
                        if($pedido->getProducto()->getProducto_id() == $producto_id && $pedido->getProducto()->getCategoria_id() == $categoria_id){
                            $pedido->setCantidad($pedido->getCantidad() + 1);
                            $pedido_existe = true;
                            break;
                        }
                    }
                    
                    // Si el producto no existe en el carrito, lo agrega a las selecciones
                    if($pedido_existe == false){
                        $pedido = new Pedido(ProductoDAO::getProductoById($producto_id, $categoria_id));
                    
                        array_push($_SESSION['selecciones'], $pedido);
                    }
    
                    // Redirige de vuelta a la página de la carta de productos
                    header("Location:".url."?controller=producto&action=carta");
                    exit();
                } else if (isset($_POST['producto_id']) && isset($_POST['categoria_id'])){
                    $producto_id = $_POST['producto_id'];
                    $categoria_id = $_POST['categoria_id'];
    
                    $pedido_existe = false;
    
                    // Busca si el producto ya está en el carrito; si sí, aumenta su cantidad
                    foreach ($_SESSION['selecciones'] as $pedido) {
                        if($pedido->getProducto()->getProducto_id() == $producto_id && $pedido->getProducto()->getCategoria_id() == $categoria_id){
                            $pedido->setCantidad($pedido->getCantidad() + 1);
                            $pedido_existe = true;
                            break;
                        }
                    }
                    
                    // Si el producto no existe en el carrito, lo agrega a las selecciones
                    if($pedido_existe == false){
                        $pedido = new Pedido(ProductoDAO::getProductoById($producto_id, $categoria_id));
                    
                        array_push($_SESSION['selecciones'], $pedido);
                    }
    
                    // Redirige de vuelta a la página de la carta de productos
                    header("Location:".url."?controller=producto&action=carta");
                }
            }
        }
    }
    

    public function irCarrito(){
        // Inicia o reanuda la sesión actual
        session_start();
        
        // Verifica si no hay un usuario autenticado, redirige al inicio de sesión
        if (!isset($_SESSION['usuario'])){
            header("Location:".url."?controller=usuario&action=logUsuarios");
        } else {
            // Verifica si no hay selecciones guardadas en la sesión, las inicializa como un array vacío
            if (!isset($_SESSION['selecciones'])){
                $_SESSION['selecciones'] = array();
            }
        }
        
        // Incluye la cabecera de la página
        include_once 'view/cabecera.php';
    
        // Incluye el panel del carrito de compras
        include_once 'view/panelCarrito.php';
    
        // Incluye el pie de página
        include_once 'view/footer.php';
    }
    

    public function eliminar(){
        // Verifica si se ha enviado el ID del producto por POST
        if (isset($_POST['producto_id'])){
            // Obtiene el ID del producto desde la solicitud POST
            $producto_id = $_POST['producto_id'];
            
            // Utiliza el ProductoDAO para eliminar el producto de la base de datos
            ProductoDAO::eliminarProducto($producto_id);
            
            // Redirige de vuelta a la página de la carta de productos
            header("Location:".url."?controller=producto&action=carta");
        } else {
            // Si no se ha enviado el ID del producto por POST, redirige de vuelta a la carta de productos
            header("Location:".url."?controller=producto&action=carta");
        }
    }
    
    
    public function modificar(){
        // Inicia o reanuda la sesión actual
        session_start();
        
        // Verifica si el usuario tiene permisos de administrador (permisos == 1)
        if($_SESSION['usuario']->getPermisos() == 1){
            // Obtiene todos los productos por categoría utilizando ProductoDAO
            $platos = ProductoDAO::getAllProductos(1);
            $desayunos = ProductoDAO::getAllProductos(2);
            $entrantes = ProductoDAO::getAllProductos(3);
            $pizzas = ProductoDAO::getAllProductos(4);
            
            // Incluye los archivos de la interfaz de usuario correspondientes
            include_once 'view/cabecera.php';
            include_once 'view/modificarProducto.php';
            include_once 'view/footer.php';
        }else{
            // Si el usuario no tiene permisos de administrador, redirige a la página de usuario normal
            header("Location:".url."?controller=usuario");
        }
    }
    

    public function actualizar(){
        // Verifica si se han recibido todas las variables necesarias por POST para actualizar un producto
        if (isset($_POST['producto_id']) &&
            isset($_POST['nombre']) &&
            isset($_POST['precio']) &&
            isset($_POST['img'])
        ){
            // Obtiene los valores enviados por POST para la actualización del producto
            $producto_id = $_POST['producto_id'];
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];
            $imagen = $_POST['img'];
            
            // Utiliza el ProductoDAO para actualizar la información del producto en la base de datos
            ProductoDAO::updateProducto($producto_id, $nombre, $precio, $imagen);
            
            // Redirige a la página de usuario después de la actualización exitosa
            header("Location:".url."?controller=usuario");
        } else {
            // Si no se reciben todas las variables necesarias por POST, redirige de vuelta a la página de modificación
            header("Location:".url."?controller=producto&action=modificar");
        }
    }
    

    public function agregar(){
        // Inicia o reanuda la sesión actual
        session_start();
        
        // Verifica si el usuario tiene permisos de administrador (permisos == 1)
        if($_SESSION['usuario']->getPermisos() == 1){
            // Obtiene todas las categorías de productos utilizando ProductoDAO
            $categorias = ProductoDAO::getAllCategorias();
    
            // Incluye los archivos de interfaz de usuario para agregar un nuevo producto
            include_once 'view/cabecera.php';
            include_once 'view/agregarProducto.php';
            include_once 'view/footer.php';
        }else{
            // Si el usuario no tiene permisos de administrador, redirige a la página de usuario normal
            header("Location:".url."?controller=usuario");
        }
    }
    

    public function insertar(){
        // Verifica si todas las variables necesarias para insertar un producto están presentes en la solicitud POST
        if (isset($_POST['categoria']) &&
            isset($_POST['nombre']) &&
            isset($_POST['precio']) &&
            isset($_POST['img'])
        ){
            // Obtiene los valores enviados por POST para insertar un nuevo producto
            $categoria = $_POST['categoria'];
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];
            $imagen = $_POST['img'];
            
            // Utiliza el ProductoDAO para insertar un nuevo producto en la base de datos
            ProductoDAO::insertarProducto($categoria, $nombre, $precio, $imagen);
    
            // Redirige a la página de la carta de productos después de la inserción exitosa
            header("Location:".url."?controller=producto&action=carta");
        }else{
            // Si falta alguna variable necesaria, redirige de vuelta a la página de agregar producto
            header("Location:".url."?controller=producto&action=agregar");
        }
    }
    

    public function favorito(){
        // Inicia la sesión para el usuario
        session_start();
        
        // Verifica si el usuario está autenticado, si no, lo redirige al inicio de sesión
        if (!isset($_SESSION['usuario'])){
            header("Location:".url."?controller=usuario&action=logUsuarios");
            exit();
        } else {
            // Si no hay favoritos, se inicializa un array para almacenarlos en la sesión
            if (!isset($_SESSION['favoritos'])){
                $_SESSION['favoritos'] = array();
            } else {

                //Comprobar los datos
                $inputJSON = file_get_contents('php://input');
                $data = json_decode($inputJSON, TRUE); //convert JSON into array

                // Si se envían datos de producto y categoría por POST, se añade el favorito
                if (isset($data['producto_id']) && isset($data['categoria_id'])){
                    $producto_id = $data['producto_id'];
                    intval($producto_id);
                    $categoria_id = $data['categoria_id'];
                    intval($categoria_id);

    
                    // Crea un nuevo Favorito con el producto obtenido del ProductoDAO y lo agrega a la sesión
                    $favorito = new Favorito(ProductoDAO::getProductoById($producto_id, $categoria_id));
                    array_push($_SESSION['favoritos'], $favorito); 
                    
                    header("Location:".url."?controller=producto&action=irFavorito");
                    exit();

                } else {
                    // Si no se proporcionan datos de producto y categoría, redirige a la página de productos
                    header("Location:".url."?controller=producto&action=carta");
                }
            }
        }
    }
    

    public function irFavorito(){
        // Inicia la sesión para el usuario
        session_start();
    
        // Verifica si el usuario está autenticado, si no, lo redirige al inicio de sesión
        if (!isset($_SESSION['usuario'])){
            header("Location:".url."?controller=usuario&action=logUsuarios");
        } else {
            // Si no hay elementos en la lista de favoritos, se inicializa un array vacío para almacenarlos
            if (!isset($_SESSION['favoritos'])){
                $_SESSION['favoritos'] = array();
            }
        }
    
        // Muestra la vista del panel de favoritos
        include_once 'view/cabecera.php';
        include_once 'view/panelFavorito.php';
        include_once 'view/footer.php';
    }
    

    public function compra(){
        session_start();
        // Si se presiona el botón de suma
        if (isset($_POST['suma'])){
            // Aumenta la cantidad del producto seleccionado en el carrito
            $pedido = $_SESSION['selecciones'][$_POST['suma']];
            $pedido->setCantidad($pedido->getCantidad()+1);
        }
        // Si se presiona el botón de resta
        else if(isset($_POST['resta'])){
            // Reduce la cantidad del producto seleccionado en el carrito
            $pedido = $_SESSION['selecciones'][$_POST['resta']];
            if($pedido->getCantidad()==1){
                // Si la cantidad es 1, elimina el producto del carrito
                unset($_SESSION['selecciones'][$_POST['resta']]);
                // Re-indexa el array de selecciones
                $_SESSION['selecciones'] = array_values($_SESSION['selecciones']);
            }else{
                // Reduce la cantidad en 1 si es mayor que 1
                $pedido->setCantidad($pedido->getCantidad()-1);
            }
        }else{
            // Si no se presiona ninguno de los botones de suma o resta, redirige a la página de la carta
            header("Location:".url."?controller=producto&action=carta");
        }
        // Redirige al carrito después de la operación de compra
        header("Location:".url."?controller=producto&action=irCarrito");
    }
    

    public function eliminarProdCar(){
        session_start();
        // Si no hay selecciones, se inicializa el array
        if(!isset($_SESSION['selecciones'])){
            $_SESSION['selecciones'] = array();
        }else{
            // Si se recibe una posición de selección para eliminar
            if (isset($_POST['posicionSelecciones'])){
                // Se obtiene la posición a eliminar
                $posicionSelecciones = $_POST['posicionSelecciones'];
                // Encuentra el índice del elemento que se desea eliminar
                $indice = array_search($posicionSelecciones, $_SESSION['selecciones']);
    
                // Verifica si se encontró el elemento y lo elimina del array de sesión
                unset($_SESSION['selecciones'][$posicionSelecciones]);
    
                // Reinicia los índices del array si deseas mantener una secuencia numérica continua
                $_SESSION['selecciones'] = array_values($_SESSION['selecciones']);
                
                // Redirige a la vista del panel de carrito luego de eliminar el elemento
                include_once 'view/cabecera.php';
                include_once 'view/panelCarrito.php';
                include_once 'view/footer.php';
            }else{
                // Si no se recibe la posición de selección para eliminar, redirige al carrito
                header("Location:".url."?controller=producto&action=irCarrito");
            }
        }
    }
    

    public function eliminarProdFav(){
        session_start();
        // Si no existen elementos en favoritos, se inicializa el array
        if(!isset($_SESSION['favoritos'])){
            $_SESSION['favoritos'] = array();
        }else{
            // Si se recibe una posición de favorito para eliminar
            if (isset($_POST['posicionSelecciones'])){
                // Se obtiene la posición a eliminar
                $posicionSelecciones = $_POST['posicionSelecciones'];
                // Encuentra el índice del elemento que se desea eliminar
                $indice = array_search($posicionSelecciones, $_SESSION['favoritos']);
    
                // Verifica si se encontró el elemento y lo elimina del array de sesión
                unset($_SESSION['favoritos'][$posicionSelecciones]);
    
                // Opcional: reinicia los índices del array si deseas mantener una secuencia numérica continua
                $_SESSION['favoritos'] = array_values($_SESSION['favoritos']);
                
                // Redirige a la vista del panel de favoritos luego de eliminar el elemento
                include_once 'view/cabecera.php';
                include_once 'view/panelFavorito.php';
                include_once 'view/footer.php';
            }else{
                // Si no se recibe la posición de favorito para eliminar, redirige a la sección de favoritos
                header("Location:".url."?controller=producto&action=irFavorito");
            }
        }
    }

    public function reseñas(){
        session_start();

        include_once 'view/cabecera.php';
        include_once 'view/panelResenas.php';
        include_once 'view/footer.php';

    }
    
}
?>