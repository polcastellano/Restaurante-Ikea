<?php
include_once 'model/UsuarioDAO.php';
include_once 'model/Usuario.php';

class usuarioController{

    public function logUsuarios(){
        session_start();
        include_once 'view/cabecera.php';
        include_once 'view/PanelUsuario.php';
        include_once 'view/footer.php';
    }

    public function validarUsuario(){
        session_start();
        if(isset($_POST['usuario']) && isset($_POST['password'])){
            $usuario = $_POST['usuario'];
            $password = $_POST['password'];

            $user = new Usuario(UsuarioDAO::getUsuario($usuario,$password));
            
            include_once 'view/cabecera.php';
            include_once 'view/modificarUsuario.php';
            include_once 'view/footer.php';

        }else{
            header("Location:".url."?controller=usuario&action=logUsuarios");
        }
    }
}