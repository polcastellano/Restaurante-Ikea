<?php
include_once 'model/Pedido.php';
include_once 'model/PedidoDetalle.php';
include_once 'model/PedidoDAO.php';
include_once 'utils/GestorFechas.php';

class pedidoController{

    public function confirmar(){
        session_start();
        //Te almacena el pedido en la base de datos PedidoDAO que guarda el pedido en la BBDD
        if (isset($_POST['precioFinal'])){

            $precioTotal = $_POST['precioFinal'];
            
            foreach ($_SESSION['usuario'] as $usuario){
                $usuario_id = $usuario->getUsuario_id();
            }
            
            $precioTotal = $_POST['precioFinal'];

            PedidoDAO::almacenaPedido($usuario_id, $precioTotal);

            $pedido = PedidoDAO::ultimoPedido($usuario_id);

            // Borramos sesion de pedido
            unset($_SESSION['selecciones']);
            // $_SESSION['selecciones']=array();
            //Guardo la cookie
            setcookie('UltimoPedido',serialize($pedido),time()+3600); 
            header("Location:".url."?controller=producto");
        }else{
            header("Location:".url."?controller=producto&action=irCarrito");
        }
        
    }
    
}