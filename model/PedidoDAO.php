<?php

include_once 'config/dataBase.php';
include_once 'model/PedidoDetalle.php';


class PedidoDAO{

    public static function almacenaPedido($usuario_id, $precioTotal){
        $con = DataBase::connect();

        //Consulta para extraer el id del nombre de la categoria que recibimos
        $stmt = $con->prepare("INSERT INTO pedidos (usuario_id, precio_total) VALUES (?, ?)");
        $stmt->bind_param("id", $usuario_id, $precioTotal);

        $stmt->execute();

        $result = $stmt->get_result();

        foreach ($_SESSION['selecciones'] as $pedido) {
            $producto_id = $pedido->getProducto()->getProducto_id();
            $cantidad = $pedido->getCantidad();
            $precioProd = $pedido->calculaPrecioCantidad();
            $pedido_id = self::ultimoPedido($usuario_id);
            $stmt = $con->prepare("INSERT INTO pedidos_productos (pedido_id, producto_id, cantidad, precio_total) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("iiid", $pedido_id, $producto_id, $cantidad, $precioProd);
            $stmt->execute();
            $result = $stmt->get_result();

        }

        $con->close();

        return $pedido_id;
    }

    public static function ultimoPedido($usuario_id){
        $con = DataBase::connect();

        //Consulta para extraer el id del nombre de la categoria que recibimos
        $stmt = $con->prepare("SELECT pedido_id,fecha,precio_total FROM pedidos WHERE usuario_id = ? ORDER BY fecha DESC LIMIT 1");
        $stmt->bind_param("i", $usuario_id);

        $stmt->execute();

        $result = $stmt->get_result();
        
        $con->close();

        $res =[];
        $obj = "PedidoDetalle";
        while($pedido = $result->fetch_object($obj)){
            $res[] = $pedido;
        }

        return $res;
    }
}