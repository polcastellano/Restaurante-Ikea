<?php
include_once 'model/Pedido.php';

class pedidoController{

    public function confirmar(){
        //Te almacena el pedido en la base de datos PedidoDAO que guarda el pedido en la BBDD

        // Borramos sesion de pedido
        session_start();
        
        unset($_SESSION['selecciones']);
        //Guardo la cookie
        setcookie('UltimoPedido',$_POST['precioFinal'],time()+3600); 

        header("Location:".url."?controller=producto");
        
    }
    
}