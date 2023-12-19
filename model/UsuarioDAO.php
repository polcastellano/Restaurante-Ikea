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

    public static function crearUsuario($usuario, $email, $password){
        $con = DataBase::connect();

        //Consulta para extraer el id del nombre de la categoria que recibimos
        $stmt = $con->prepare("INSERT INTO usuarios(nombre,email,permisos,password) VALUES (?,?,0,?)");
        $stmt->bind_param("sss", $usuario, $email, $password);

        $stmt->execute();

        $con->close();
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

    public static function verPedido($pedido_id){
        $con = DataBase::connect();

        $stmt = $con->prepare("SELECT producto_id, cantidad FROM pedidos_productos WHERE pedido_id = ?");
        $stmt->bind_param("i", $pedido_id);

        $stmt->execute();

        $result = $stmt->get_result();

        // Obtener todos los resultados como objetos en un array
        $rows = $result->fetch_all(MYSQLI_ASSOC);

        //Aqui almacenaremos los pedidos que se vayan creando
        $pedidos =[];
        // Recorrer el array de resultados y almacenar las IDs
        foreach ($rows as $row) {
            //Consulta para extraer todos los datos del producto que le pasamos por parametro
            $consultaProducto = $con->prepare("SELECT * FROM productos WHERE producto_id = ?");
            $consultaProducto->bind_param("i", $row['producto_id']); //Bindea el tipo con un integer

            $consultaProducto->execute();

            //Almacenamos el resultado de la consulta
            $producto = $consultaProducto->get_result();

            //Consulta para extraer todos los datos del producto que le pasamos por parametro
            $consultaCatProducto = $con->prepare("SELECT * FROM productos WHERE producto_id = ?");
            $consultaCatProducto->bind_param("i", $row['producto_id']); //Bindea el tipo con un integer

            $consultaCatProducto->execute();

            //Almacenamos el resultado de la consulta
            $catProducto = $consultaCatProducto->get_result();

            //Cogemos la categoria_id del producto 
            $categoria_id = $catProducto->fetch_object()->categoria_id;

            //Consulta para recoger el nombre de la categoria_id que le paso por parametro
            $consultaCat = $con->prepare("SELECT nombre FROM categorias WHERE categoria_id = ?");
            $consultaCat->bind_param("i", $categoria_id); //Bindea la categoria_id con un integer

            $consultaCat->execute();
            //Cogemos el nombre de la categoria
            $categoria = $consultaCat->get_result()->fetch_object()->nombre;

            //Indicamos que el resultado de la consulta es un objeto de nuestra categoria extraida en la consulta anterior
            $producto = $producto->fetch_object($categoria);

            $pedido = new Pedido($producto);
            $pedido = $pedido->setCantidad($row['cantidad']);

            $pedidos [] = $pedido;
        }
        
        $con->close();

        return $pedidos;
    }

    public static function borrarPedido($pedido_id){
        $con = DataBase::connect();

        $borrarPedido = $con->prepare("DELETE FROM pedidos WHERE pedido_id = ?");
        $borrarPedido->bind_param("i", $pedido_id);

        $borrarPedido->execute();

        $borrarPedProd = $con->prepare("DELETE FROM pedidos_productos WHERE pedido_id = ?");
        $borrarPedProd->bind_param("i", $pedido_id);

        $borrarPedProd->execute();

        $con->close();
    }


}