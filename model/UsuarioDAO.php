<?php

include_once 'config/dataBase.php';

class UsuarioDAO{

    public static function getUsuario($email, $password){
        $con = DataBase::connect();
    
        // Consulta para obtener un usuario a partir del email y la contraseña proporcionados
        $stmt = $con->prepare("SELECT * FROM usuarios WHERE email = ? AND password = ?");
        $stmt->bind_param("ss", $email, $password);
    
        $stmt->execute();
    
        // Obtiene el resultado de la consulta y lo convierte en un objeto "Usuario"
        $result = $stmt->get_result();
        $result = $result->fetch_object("Usuario");
    
        $con->close();
    
        return $result;
    }

    public static function getInfoUsuario($usuario_id){
        $con = DataBase::connect();
    
        // Consulta para obtener un usuario a partir del email y la contraseña proporcionados
        $stmt = $con->prepare("SELECT * FROM usuarios WHERE usuario_id = ?");
        $stmt->bind_param("i", $usuario_id);
    
        $stmt->execute();
    
        // Obtiene el resultado de la consulta y lo convierte en un objeto "Usuario"
        $result = $stmt->get_result();
        $result = $result->fetch_object("Usuario");
    
        $con->close();
    
        return $result;
    }
    
    public static function crearUsuario($usuario, $email, $password){
        $con = DataBase::connect();
    
        // Consulta para crear un nuevo usuario con el nombre, email y contraseña proporcionados
        $stmt = $con->prepare("INSERT INTO usuarios(nombre,email,permisos,password) VALUES (?,?,0,?)");
        $stmt->bind_param("sss", $usuario, $email, $password);
    
        $stmt->execute();
    
        $con->close();
    }
    

    public static function pedidosUsuario($usuario_id){
        $con = DataBase::connect();
    
        // Consulta para obtener todos los pedidos de un usuario dado su ID
        $stmt = $con->prepare("SELECT * FROM pedidos WHERE usuario_id = ?");
        $stmt->bind_param("i", $usuario_id);
    
        $stmt->execute();
    
        // Obtiene el resultado de la consulta y lo almacena en un array de objetos "PedidoDetalle"
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
    
        // Consulta para obtener los detalles del último pedido con un ID específico
        $stmt = $con->prepare("SELECT * FROM pedidos WHERE pedido_id = ? LIMIT 1");
        $stmt->bind_param("i", $pedido_id);
    
        $stmt->execute();
    
        // Obtiene el resultado de la consulta y lo convierte en un objeto "PedidoDetalle"
        $result = $stmt->get_result();
    
        $con->close();
    
        $pedido_id = $result->fetch_object("PedidoDetalle");
    
        return $pedido_id;
    }
    

    public static function verPedido($pedido_id){
        $con = DataBase::connect();
    
        // Consulta para obtener los productos y cantidades asociadas a un pedido específico
        $stmt = $con->prepare("SELECT producto_id, cantidad FROM pedidos_productos WHERE pedido_id = ?");
        $stmt->bind_param("i", $pedido_id);
    
        $stmt->execute();
    
        $result = $stmt->get_result();
    
        // Obtener todos los resultados como un array asociativo
        $rows = $result->fetch_all(MYSQLI_ASSOC);
    
        // Aquí almacenaremos los pedidos que se vayan creando
        $pedidos =[];
    
        // Recorrer el array de resultados y obtener los detalles de cada producto
        foreach ($rows as $row) {
            // Consulta para extraer todos los datos del producto que le pasamos por parámetro
            $consultaProducto = $con->prepare("SELECT * FROM productos WHERE producto_id = ?");
            $consultaProducto->bind_param("i", $row['producto_id']);
    
            $consultaProducto->execute();
    
            // Obtener el resultado de la consulta
            $producto = $consultaProducto->get_result();
    
            // Consulta para obtener la categoría del producto
            $consultaCatProducto = $con->prepare("SELECT * FROM productos WHERE producto_id = ?");
            $consultaCatProducto->bind_param("i", $row['producto_id']);
    
            $consultaCatProducto->execute();
    
            // Obtener el resultado de la consulta
            $catProducto = $consultaCatProducto->get_result();
    
            // Obtener la categoría del producto
            $categoria_id = $catProducto->fetch_object()->categoria_id;
    
            // Consulta para obtener el nombre de la categoría a partir de su ID
            $consultaCat = $con->prepare("SELECT nombre FROM categorias WHERE categoria_id = ?");
            $consultaCat->bind_param("i", $categoria_id);
    
            $consultaCat->execute();
            $categoria = $consultaCat->get_result()->fetch_object()->nombre;
    
            // Convertir el resultado de la consulta en un objeto de la categoría extraída anteriormente
            $producto = $producto->fetch_object($categoria);
    
            // Crear un objeto Pedido con el producto y su cantidad correspondiente
            $pedido = new Pedido($producto);
            $pedido = $pedido->setCantidad($row['cantidad']);
    
            // Almacenar el pedido en el array de pedidos
            $pedidos [] = $pedido;
        }
        
        $con->close();
    
        return $pedidos;
    }
    

    public static function borrarPedido($pedido_id){
        $con = DataBase::connect();
        
        //Recogo la reseña_id
        $cogerReseña_id = $con->prepare("SELECT reseña_id FROM pedidos_reseñas WHERE pedido_id = ?");
        $cogerReseña_id->bind_param("i", $pedido_id);
        $cogerReseña_id->execute();

        $result = $cogerReseña_id->get_result();

        // Obtener el reseña_id de la primera fila
        $row = $result->fetch_assoc();
        $reseña_id = $row['reseña_id'];

        // Borrar la reseña de pedidos_reseña 
        $borrarResPed = $con->prepare("DELETE FROM pedidos_reseñas WHERE pedido_id = ?");
        $borrarResPed->bind_param("i", $pedido_id);
        $borrarResPed->execute();

        // Borrar la reseña
        $borrarReseña = $con->prepare("DELETE FROM reseñas WHERE reseña_id = ?");
        $borrarReseña->bind_param("i", $reseña_id);
        $borrarReseña->execute();
        
        // Borrar el pedido de la tabla pedidos
        $borrarPedido = $con->prepare("DELETE FROM pedidos WHERE pedido_id = ?");
        $borrarPedido->bind_param("i", $pedido_id);
        $borrarPedido->execute();
    
        // Borrar las referencias del pedido en la tabla pedidos_productos
        $borrarPedProd = $con->prepare("DELETE FROM pedidos_productos WHERE pedido_id = ?");
        $borrarPedProd->bind_param("i", $pedido_id);
        $borrarPedProd->execute();
    
        $con->close();
    }
    
    public static function editarUsuario($nombre, $email, $password, $usuario_id){
        $con = DataBase::connect();
    
        // Actualizar los datos del usuario en la tabla usuarios
        $stmt = $con->prepare("UPDATE usuarios SET nombre = ?, email = ?, password = ? WHERE usuario_id = ?");
        $stmt->bind_param("sssi", $nombre, $email, $password, $usuario_id);
        $stmt->execute();
    
        $con->close();
    }
    

    public static function getContraseña($email){
        $con = DataBase::connect();
    
        // Obtener la contraseña encriptada asociada al correo electrónico
        $stmt = $con->prepare("SELECT password FROM usuarios WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
    
        $result = $stmt->get_result();
    
        $row = $result->fetch_assoc();
        $contraseña_encriptada_bd = $row['password'];
    
        $con->close();
    
        return $contraseña_encriptada_bd;
    }
    
    public static function getEmail($email){
        $con = DataBase::connect();
    
        // Obtener la información del usuario asociado al correo electrónico
        $stmt = $con->prepare("SELECT * FROM usuarios WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
    
        $result = $stmt->get_result();
    
        $result = $result->fetch_object("Usuario");
    
        $con->close();
    
        return $result;
    }

    public static function acumularPuntos($usuario_id, $puntos2){
        $con = DataBase::connect();
       
        // Obtener los puntos del usuario
        $obtenerPts = $con->prepare(" SELECT puntos FROM usuarios WHERE usuario_id = ?;");
        $obtenerPts->bind_param("i", $usuario_id);
        $obtenerPts->execute();
        $obtenerPts->bind_result($puntos);

        // Obtener el resultado
        $obtenerPts->fetch();
        $obtenerPts->close();

        // Ahora $puntos contiene la cantidad de puntos de la consulta
        $puntosOld = $puntos;
        
        // Sumar los puntos a la variable
        $puntos2 += $puntosOld;
        $puntos2 = intval($puntos2);

        // Actualizar los puntos del usuario
        $stmt = $con->prepare("UPDATE usuarios SET puntos = ? WHERE usuario_id = ?;");
        $stmt->bind_param("ii", $puntos2, $usuario_id);
        $stmt->execute();
    
        $con->close();
    }    

}