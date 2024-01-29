<?php
// Incluye las clases necesarias para este controlador
include_once 'model/Pedido.php';
include_once 'model/PedidoDetalle.php';
include_once 'model/PedidoDAO.php';

class pedidoController{

    public function confirmar(){
        // Inicia la sesión para utilizar variables de sesión
        session_start();

        // Verifica si se ha enviado el precio final desde un formulario
        if (isset($_POST['precioFinal']) && isset($_POST['puntos'])){
            // Obtiene el precio total y los puntos del formulario POST
            $precioTotal = $_POST['precioFinal'];
            $puntos = $_POST['puntos'];
            
            // Obtiene el ID del usuario de la sesión actual
            $usuario_id = $_SESSION['usuario']->getUsuario_id();
            
            // Almacena el pedido en la base de datos utilizando el PedidoDAO
            PedidoDAO::almacenaPedido($usuario_id, $precioTotal, $puntos);

            // Obtiene información sobre el último pedido realizado por el usuario
            $pedido = PedidoDAO::ultimoPedido($usuario_id);

            //Acumula los puntos del pedido al usuario
            UsuarioDAO::acumularPuntos($usuario_id, $puntos);

            $usuarioActualizado = UsuarioDAO::getInfoUsuario($usuario_id);

            unset($_SESSION['usuario']);
            $_SESSION['usuario'] = $usuarioActualizado;

            // Borra la variable de sesión 'selecciones'
            unset($_SESSION['selecciones']);
            
            // Guarda el ID del último pedido en una cookie llamada 'UltimoPedido' que expira en una hora
            setcookie('UltimoPedido', $pedido->getPedido_id(), time() + 3600); 
            
            // Redirecciona a la página del controlador de usuario
            header("Location:".url."?controller=usuario");
        }else{
            // Si no se ha enviado el precio final, redirecciona a la página del carrito de compras
            header("Location:".url."?controller=producto&action=irCarrito");
        }
    }
}
