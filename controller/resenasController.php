<?php

class resenaController{
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
        
        include_once 'view/cabecera.php';
        include_once 'view/panelResenas.php';
        include_once 'view/footer.php';
    }
}
?>