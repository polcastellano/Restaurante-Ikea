<?php

include_once 'config/dataBase.php';


class PedidoDAO{

    public static function almacenaPedido($usuario_id, $precioTotal){
        $con = DataBase::connect();

        //Consulta para extraer el id del nombre de la categoria que recibimos
        $stmt = $con->prepare("INSERT INTO pedidos (pedido_id, usuario_id, precio_total) VALUES (NULL, ?, ?)");
        $stmt->bind_param("id", $usuario_id, $precioTotal);

        $stmt->execute();

        $result = $stmt->get_result();

        $con->close();

        return $result;
    }

    public static function ultimoPedido($usuario_id){
        $con = DataBase::connect();

        //Consulta para extraer el id del nombre de la categoria que recibimos
        $stmt = $con->prepare("SELECT pedido_id FROM pedidos WHERE usuario_id = ? ORDER BY fecha DESC LIMIT 1");
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