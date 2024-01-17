<?php
include_once 'config/parameters.php';
include_once 'controller/productoController.php';
include_once 'controller/usuarioController.php';
include_once 'controller/pedidoController.php';
include_once 'controller/APIController.php';
include_once 'controller/resenasController.php';


// Verifica si no se ha especificado un controlador en la URL
if (!isset($_GET['controller'])){
    // Redirige a la página principal de productos si no se especifica nada
    header("Location:".url."?controller=producto");
} else {
    // Obtiene el nombre del controlador
    $nombre_controller = $_GET['controller'].'Controller';
    
    // Verifica si la clase del controlador existe
    if(class_exists($nombre_controller)){
        // Verifica si se ha pasado una acción, de lo contrario, establece una acción predeterminada
        $controller = new $nombre_controller;

        if(isset($_GET['action']) && method_exists($controller, $_GET['action'])){
            // Si se especifica una acción y existe en el controlador, la asigna
            $action = $_GET['action'];
        } else {
            // Si no se especifica una acción o no existe en el controlador, establece una acción por defecto
            $action = action_default;
        }

        // Llama a la acción correspondiente en el controlador
        $controller->$action();

    } else {
        // Si la clase del controlador no existe, redirige a la página principal de productos
        header("Location:".url."?controller=producto");
    }
}
?>