<?php
include_once 'model/UsuarioDAO.php';
include_once 'model/Usuario.php';

class usuarioController{

    public function index(){
        session_start();
        include_once 'view/cabecera.php';
        if (!isset($_SESSION['usuario'])){
            include_once 'view/login.php';
        }else{
            include_once 'view/panelUsuario.php';
        }
        include_once 'view/footer.php';
    }

    public function logUsuarios(){
        session_start();
        include_once 'view/cabecera.php';
        if (!isset($_SESSION['usuario'])){
            include_once 'view/login.php';
        }else{
            include_once 'view/panelUsuario.php';
        }
        include_once 'view/footer.php';
    }

    public function validarUsuario(){
        session_start();
        if(isset($_POST['usuario']) && isset($_POST['password'])){
            $usuario = $_POST['usuario'];
            $password = $_POST['password'];

            if (!isset($_SESSION['usuario'])){
                $_SESSION['usuario'] = array();

                if (UsuarioDAO::getUsuario($usuario,$password) != null){
                    $user = UsuarioDAO::getUsuario($usuario,$password);
                    
                    array_push($_SESSION['usuario'], $user); 
                    
                    include_once 'view/cabecera.php';
                    include_once 'view/panelUsuario.php';
                    include_once 'view/footer.php';
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
}