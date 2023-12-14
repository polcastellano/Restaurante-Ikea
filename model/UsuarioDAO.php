<?php

include_once 'config/dataBase.php';

class UsuarioDAO{

    public static function getUsuario($email, $password){
        $con = DataBase::connect();

       //Consulta para extraer el id del nombre de la categoria que recibimos
       $stmt = $con->prepare("SELECT * FROM usuarios WHERE email = ? AND password = ?");
        $stmt->bind_param("si", $email, $password);

        $stmt->execute();

        $result = $stmt->get_result();

        $result = $result->fetch_object("Usuario");

        $con->close();

        return $result;
    }

    public static function pedidosUsuario($usuario_id){
        $con = DataBase::connect();

        $stmt = $con->prepare("SELECT * FROM pedidos WHERE usuario_id = ?");
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

    public static function ultimoPedido($pedido_id){
        $con = DataBase::connect();

        $stmt = $con->prepare("SELECT * FROM pedidos WHERE pedido_id = ? LIMIT 1");
        $stmt->bind_param("i", $pedido_id);

        $stmt->execute();

        $result = $stmt->get_result();

        $con->close();

        $pedido_id = $result->fetch_object("PedidoDetalle");

        return $pedido_id;
    }

    public static function verPedido(){
        $con = DataBase::connect();

        $stmt = $con->prepare("SELECT * FROM pedidos WHERE pedido_id = ? LIMIT 1");
        $stmt->bind_param("i", $pedido_id);

        $stmt->execute();

        $result = $stmt->get_result();

        $con->close();

        $pedido_id = $result->fetch_object("PedidoDetalle");

        return $pedido_id;
    }
}