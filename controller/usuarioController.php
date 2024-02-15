<?php
include_once 'model/UsuarioDAO.php';
include_once 'model/Usuario.php';
include_once 'model/ProductoDAO.php';

class usuarioController{

    public function index(){
        // Inicia la sesión para el usuario
        session_start();
    
        // Verifica si no existen selecciones y favoritos para el usuario, y en caso contrario, los inicializa
        if (!isset($_SESSION['selecciones'])){
            $_SESSION['selecciones'] = array();
        }
    
        if (!isset($_SESSION['favoritos'])){
            $_SESSION['favoritos'] = array();
        }
    
        // Verifica si el usuario está autenticado
        if (!isset($_SESSION['usuario'])){
            // Si el usuario no está autenticado, muestra la vista de inicio de sesión
            include_once 'view/login.php';
        }else{
            // Si el usuario está autenticado, lo redirige a la página de inicio de sesión del usuario
            header("Location:".url."?controller=usuario&action=logUsuarios");
        }
    }
    
    public function logUsuarios(){
        // Inicia la sesión para el usuario
        session_start();
    
        // Incluye la cabecera en la vista
        include_once 'view/cabecera.php';
        
        // Verifica si el usuario no está autenticado para mostrar la vista de inicio de sesión o el panel de usuario
        if (!isset($_SESSION['usuario'])){
            include_once 'view/login.php';
        }else{
            // Si el usuario está autenticado, obtiene su ID y sus pedidos
            $usuario_id = $_SESSION['usuario']->getUsuario_id();
            $pedidos = UsuarioDAO::pedidosUsuario($usuario_id);
    
            // Verifica si existe una cookie del último pedido y lo muestra
            if(isset($_COOKIE['UltimoPedido'])){
                $ultimoPedido = UsuarioDAO::ultimoPedido($_COOKIE['UltimoPedido']); 
            }

            $usuarioActualizado = UsuarioDAO::getInfoUsuario($usuario_id);

            $_SESSION['usuario'] = $usuarioActualizado;
    
            // Incluye la vista del panel del usuario
            include_once 'view/panelUsuario.php';
        }
    
        // Incluye el pie de página en la vista
        include_once 'view/footer.php';
    }
    

    public function registro(){
        // Inicia la sesión para el usuario
        session_start();
    
        // Incluye la cabecera en la vista
        include_once 'view/cabecera.php';
        
        // Verifica si el usuario no está autenticado para mostrar la vista de registro o el panel del usuario
        if (!isset($_SESSION['usuario'])){
            // Muestra la vista de registro si el usuario no está autenticado
            include_once 'view/registro.php';
        }else{
            // Si el usuario está autenticado, muestra sus pedidos y, si existe, el último pedido
            $usuario_id = $_SESSION['usuario']->getUsuario_id();
            $pedidos = UsuarioDAO::pedidosUsuario($usuario_id);
    
            if(isset($_COOKIE['UltimoPedido'])){
                $ultimoPedido = UsuarioDAO::ultimoPedido($_COOKIE['UltimoPedido']); 
            }
    
            // Muestra el panel del usuario
            include_once 'view/panelUsuario.php';
        }
    
        // Incluye el pie de página en la vista
        include_once 'view/footer.php';
    }
    
    public function validarRegistro(){
        // Inicia la sesión para el usuario
        session_start();
    
        // Verifica si se enviaron datos de usuario, email y contraseña para el registro
        if(isset($_POST['usuario']) && isset($_POST['email']) && isset($_POST['password'])){
            $usuario = $_POST['usuario'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            // Encripta la contraseña utilizando la función password_hash de PHP
            $contraseña_encriptada = password_hash($password, PASSWORD_DEFAULT);
    
            // Verifica si el email ya está registrado en la base de datos
            if(UsuarioDAO::getEmail($email) != null){
                // Si el email ya existe, redirige al usuario a la página de inicio de sesión
                header("Location:".url."?controller=usuario&action=logUsuarios");
            }else{
                // Si el email no está registrado, crea un nuevo usuario en la base de datos
                UsuarioDAO::crearUsuario($usuario, $email, $contraseña_encriptada);
                // Inicia sesión con el nuevo usuario y redirige a la página de inicio de sesión
                $_SESSION['usuario'] = UsuarioDAO::getUsuario($email, $contraseña_encriptada);
                header("Location:".url."?controller=usuario&action=logUsuarios");
            }
        }
    }
    

    public function cerrarSesion(){
        // Inicia la sesión
        session_start();
        
        // Verifica si el usuario está autenticado para cerrar sesión
        if (isset($_SESSION['usuario'])){
            // Elimina la cookie del último pedido y destruye la sesión del usuario
            setcookie('UltimoPedido', '', time() - 3600);
            unset($_SESSION['usuario']);
            // Redirige al usuario a la página de inicio de sesión
            header("Location:".url."?controller=usuario&action=logUsuarios");
        }
    }
    
    public function validarUsuario(){
        // Inicia la sesión
        session_start();
        
        // Verifica si se enviaron datos de email y contraseña para validar al usuario
        if(isset($_POST['email']) && isset($_POST['password'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            // Obtiene la contraseña encriptada desde la base de datos
            $contraseña_encriptada = UsuarioDAO::getContraseña($email);
    
            // Verifica si el usuario no está autenticado
            if (!isset($_SESSION['usuario'])){
                // Verifica si la contraseña ingresada coincide con la almacenada en la base de datos
                if (password_verify($password, $contraseña_encriptada)){
                    // Obtiene la información del usuario y crea una sesión para él
                    $_SESSION['usuario'] = UsuarioDAO::getUsuario($email, $contraseña_encriptada);
                    // Redirige al usuario al panel de usuario después de iniciar sesión
                    header("Location:".url."?controller=usuario&action=logUsuarios");
                }else{
                    // Si la contraseña no coincide, redirige de nuevo a la página de inicio de sesión
                    header("Location:".url."?controller=usuario&action=logUsuarios");
                }
            }else{
                // Si el usuario ya está autenticado, muestra su panel de usuario
                include_once 'view/cabecera.php';
                include_once 'view/panelUsuario.php';
                include_once 'view/footer.php';
            }
        }else{
            // Si no se enviaron datos de email y contraseña, redirige a la página de inicio de sesión
            header("Location:".url."?controller=usuario&action=logUsuarios");
        }
    }
    

    public function verPedido(){
        // Inicia la sesión
        session_start();      
    
        // Incluye la cabecera de la página
        include_once 'view/cabecera.php';
    
        // Verifica si se ha enviado el ID del pedido para visualizarlo
        if(isset($_POST['pedido_id'])){
            // Obtiene y muestra el último pedido del usuario
            $ultimoPedido = UsuarioDAO::verPedido($_POST['pedido_id']);
            $pedido_id = $_POST['pedido_id'];
            $usuario_id = $_SESSION['usuario']->getUsuario_id();
            $precioDescuento = ProductoDAO::precioDescuento($_POST['pedido_id']);
            $propina = ProductoDAO::getPropina($_POST['pedido_id']);
            $puntosUsados = ProductoDAO::getPuntosUsados($_POST['pedido_id']);
            include_once 'view/mostrarPedido.php';
        }else{
            // Si no se envió el ID del pedido, redirige a la página de productos
            header("Location:".url."?controller=producto");
        }
    
        // Incluye el pie de página
        include_once 'view/footer.php';
    }
    
    public function borrarPedido(){
        // Verifica si se envió el ID del pedido para eliminarlo
        if(isset($_POST['pedido_id'])){
            // Elimina el pedido con el ID proporcionado
            UsuarioDAO::borrarPedido($_POST['pedido_id']);
            // Redirige al usuario a su panel después de eliminar el pedido
            header("Location:".url."?controller=usuario");
        }else{
            // Si no se envió el ID del pedido, redirige a la página de productos
            header("Location:".url."?controller=producto");
        }
        // Incluye el pie de página
        include_once 'view/footer.php';
    }
    

    public function acutalizaUsuario(){
        // Inicia la sesión
        session_start();
    
        // Verifica si se enviaron los datos para actualizar el usuario
        if(isset($_POST['nombre']) || isset($_POST['email']) || isset($_POST['password'])){
            // Obtiene los valores enviados
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $usuario_id = $_SESSION['usuario']->getUsuario_id();
            // Encripta la contraseña
            $contraseña_encriptada = password_hash($password, PASSWORD_DEFAULT);
            
            // Actualiza la información del usuario en la base de datos
            UsuarioDAO::editarUsuario($nombre, $email, $contraseña_encriptada, $usuario_id);
            
            $usuarioActualizado = UsuarioDAO::getInfoUsuario($usuario_id);

            $_SESSION['usuario'] = $usuarioActualizado;
    
            // Redirige al usuario a su panel
            header("Location:".url."?controller=usuario&action=logUsuarios");
        }
    }
    

}