<?php

include_once 'config/dataBase.php';

class PedidoDAO{

    public static function almacenaPedido($usuario_id, $precioTotal, $puntos, $precioPropina){
        // Establece la conexión a la base de datos
        $con = DataBase::connect();
    
        // Prepara y ejecuta la inserción del pedido
        $stmt = $con->prepare("INSERT INTO pedidos (usuario_id, precio_total, puntos, propinas) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("idid", $usuario_id, $precioTotal, $puntos, $precioPropina);
        $stmt->execute();

        // Obtener el ID de la última fila insertada
        $pedido_id = $stmt->insert_id; 

        //Insertar el pedido_id en la tabla intermedia con las reseñas
        $stmt2 = $con->prepare("INSERT INTO pedidos_reseñas (pedido_id) VALUES (?)");
        $stmt2->bind_param("i", $pedido_id);
        $stmt2->execute();
    
        // Itera sobre los elementos en 'selecciones' y guarda cada producto en la tabla de pedidos_productos
        foreach ($_SESSION['selecciones'] as $pedido) {
            // Obtiene detalles del producto del pedido actual
            $producto_id = $pedido->getProducto()->getProducto_id();
            $cantidad = $pedido->getCantidad();
            $precioProd = $pedido->calculaPrecioCantidad();
            //Buscamos el utlimo pedido de la tabla pedidos y seleccionamos el pedido_id
            $ultPedido = $con->query("SELECT pedido_id FROM pedidos ORDER BY fecha DESC LIMIT 1");
            // Guardamos el resultado de la consulta
            $fila = $ultPedido->fetch_assoc();
            // almacenamos solo el pedido_id parseandolo a integer para poder hacer el insert correctamente a la bbdd
            $pedido_id = intval($fila['pedido_id']);
    
            // Prepara y ejecuta la inserción de cada producto en la tabla de pedidos_productos
            $stmt = $con->prepare("INSERT INTO pedidos_productos (pedido_id, producto_id, cantidad, precio_total) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("iiid", $pedido_id, $producto_id, $cantidad, $precioProd);
            $stmt->execute();
        }
    
        // Cierra la conexión a la base de datos y devuelve el ID del pedido
        $con->close();
        return $pedido_id;
    }
    
    public static function ultimoPedido($usuario_id){
        // Establece la conexión a la base de datos
        $con = DataBase::connect();
    
        // Obtiene el último pedido del usuario especificado
        $stmt = $con->prepare("SELECT * FROM pedidos WHERE usuario_id = ? ORDER BY fecha DESC LIMIT 1");
        $stmt->bind_param("i", $usuario_id);
        $stmt->execute();
        $result = $stmt->get_result();
    
        // Cierra la conexión a la base de datos y devuelve el último pedido del usuario
        $con->close();
        $pedido_id = $result->fetch_object("PedidoDetalle");
        return $pedido_id;
    }
    
}