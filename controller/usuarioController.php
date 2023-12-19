<?php
include_once 'model/UsuarioDAO.php';
include_once 'model/Usuario.php';

class usuarioController{

    public function index(){
        session_start();

        if (!isset($_SESSION['selecciones'])){
            $_SESSION['selecciones'] = array();
        }

        if (!isset($_SESSION['favoritos'])){
            $_SESSION['favoritos'] = array();
        }

        if (!isset($_SESSION['usuario'])){
            include_once 'view/login.php';
        }else{
            header("Location:".url."?controller=usuario&action=logUsuarios");
        }
    }

    public function logUsuarios(){
        session_start();

        include_once 'view/cabecera.php';
        
        if (!isset($_SESSION['usuario'])){
            include_once 'view/login.php';
        }else{

            if(isset($_COOKIE['UltimoPedido'])){
                $ultimoPedido = UsuarioDAO::ultimoPedido($_COOKIE['UltimoPedido']); 
            }
            
            $usuario_id = $_SESSION['usuario']->getUsuario_id();
            
            $pedidos = UsuarioDAO::pedidosUsuario($usuario_id);

            include_once 'view/panelUsuario.php';
        }
        include_once 'view/footer.php';
    }

    public function registro(){
        session_start();

        include_once 'view/cabecera.php';
        
        if (!isset($_SESSION['usuario'])){
            include_once 'view/registro.php';
        }else{

            if(isset($_COOKIE['UltimoPedido'])){
                $ultimoPedido = UsuarioDAO::ultimoPedido($_COOKIE['UltimoPedido']); 
            }
            
            $usuario_id = $_SESSION['usuario']->getUsuario_id();
            
            $pedidos = UsuarioDAO::pedidosUsuario($usuario_id);

            include_once 'view/panelUsuario.php';
        }
        include_once 'view/footer.php';
    }

    public function validarRegistro(){
        session_start();
        if(isset($_POST['usuario']) && isset($_POST['email']) && isset($_POST['password'])){
            $usuario = $_POST['usuario'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            if(UsuarioDAO::getUsuario($email, $password) != null){
                header("Location:".url."?controller=usuario&action=logUsuarios");
            }else{
                UsuarioDAO::crearUsuario($usuario, $email, $password);
                $_SESSION['usuario'] = UsuarioDAO::getUsuario($email, $password);
                header("Location:".url."?controller=usuario&action=logUsuarios");
            }


        }
    }

    public function cerrarSesion(){
        session_start();
        if (isset($_SESSION['usuario'])){
            setcookie('UltimoPedido','',time()-3600);
            unset($_SESSION['usuario']);
            header("Location:".url."?controller=usuario&action=logUsuarios");
        }
    }

    public function validarUsuario(){
        session_start();
        if(isset($_POST['usuario']) && isset($_POST['password'])){
            $usuario = $_POST['usuario'];
            $password = $_POST['password'];

            if (!isset($_SESSION['usuario'])){
                $_SESSION['usuario'] = array();

                if (UsuarioDAO::getUsuario($usuario,$password) != null){
                    $_SESSION['usuario'] = UsuarioDAO::getUsuario($usuario,$password);
                                        
                    header("Location:".url."?controller=usuario&action=logUsuarios");
                }else{
                    header("Location:".url."?controller=usuario&action=logUsuarios");
                }
                
            }else{
                include_once 'view/cabecera.php';
                include_once 'view/panelUsuario.php';
                include_once 'view/footer.php';
            }

           

        }else{
            header("Location:".url."?controller=usuario&action=logUsuarios");
        }
    }

    public function verPedido(){
        session_start();      
        include_once 'view/cabecera.php';
  
        if(isset($_POST['pedido_id'])){

            $ultimoPedido = UsuarioDAO::verPedido($_POST['pedido_id']);

            include_once 'view/mostrarPedido.php';
        }else{
            header("Location:".url."?controller=producto");
        }
        include_once 'view/footer.php';
    }

    public function borrarPedido(){
  
        if(isset($_POST['pedido_id'])){

            UsuarioDAO::borrarPedido($_POST['pedido_id']);
            
            self::logUsuarios();
        }else{
            header("Location:".url."?controller=producto");
        }
        include_once 'view/footer.php';
    }

}