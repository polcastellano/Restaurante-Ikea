<?php

include_once 'config/dataBase.php';

class ResenaDAO{

    public static function getAllReseñas(){
        $con = DataBase::connect();
        
        $stmt = $con->prepare("SELECT * FROM reseñas");

        $stmt->execute();

        $result = $stmt->get_result();

        $con->close();

        $res =[];
    
        // Crea un array con las reseñas
        while($reseña = $result->fetch_object("Resena")){

            $res[] = $reseña;
        }
        
        return $res;
    }

    public static function getNombreUsuario($usuario_id){
        $con = DataBase::connect();
        
        $stmt = $con->prepare("SELECT nombre FROM usuarios WHERE usuario_id = ?");
        $stmt->bind_param("i", $usuario_id);

        $stmt->execute();

        $result = $stmt->get_result();
        
        // Obtener el nombre del resultado
        if ($row = $result->fetch_assoc()) {
            $nombre = $row['nombre'];
            return $nombre;
            $con->close();
        }
        $con->close();
    }

    public static function getReseña($pedido_id){
        $con = DataBase::connect();
        
        $stmt = $con->prepare("SELECT reseña_id FROM pedidos_reseñas WHERE pedido_id = ? AND reseña_id IS NOT NULL;");
        $stmt->bind_param("i", $pedido_id);

        $stmt->execute();

        $result = $stmt->get_result();

        // Verificar si hay al menos una fila en el resultado
        if ($result->num_rows > 0) {
            // Hay resultados, devuelve true
            $con->close();
            return true;
        } else {
            // No hay resultados, devuelve false
            $con->close();
            return false;
        }
        
    }

    public static function insertarReseña($usuario_id, $pedido_id, $comentario, $valoracion){
        $con = DataBase::connect();
        
        $stmt = $con->prepare("INSERT INTO reseñas (usuario_id, comentario, valoracion) VALUES (?,?,?);");
        $stmt->bind_param("isi", $usuario_id, $comentario, $valoracion);

        $stmt->execute();

        // Obtener el ID de la última fila insertada
        $reseña_id = $stmt->insert_id;  

        $stmt2 = $con->prepare(" UPDATE pedidos_reseñas SET reseña_id = ? WHERE pedido_id = ?;");
        $stmt2->bind_param("ii", $reseña_id, $pedido_id);
       
        $stmt2->execute();

        $con->close();
        
    }

    public static function getDatosReseña($pedido_id){
        $con = DataBase::connect();
        
        $stmt = $con->prepare("SELECT reseña_id FROM pedidos_reseñas WHERE pedido_id = ?");
        $stmt->bind_param("i", $pedido_id);

        $stmt->execute();

        $result = $stmt->get_result();

        // Obtener el reseña_id de la primera fila
        $row = $result->fetch_assoc();
        $reseña_id = $row['reseña_id'];

        // Segunda consulta para obtener todos los datos de la reseña
        $stmt2 = $con->prepare("SELECT * FROM reseñas WHERE reseña_id = ?");
        $stmt2->bind_param("i", $reseña_id);

        $stmt2->execute();

        $result2 = $stmt2->get_result();

        $con->close();
        
        $reseña = $result2->fetch_object("Resena");
        
        return $reseña;
    }

    public static function restarPuntosUsuario($puntos, $usuario_id){
        $con = DataBase::connect();

        $stmt = $con->prepare("SELECT puntos FROM usuarios WHERE usuario_id = ?");
        $stmt->bind_param("i", $usuario_id);

        $stmt->execute();

        $result = $stmt->get_result();

        // Obtener el reseña_id de la primera fila
        $row = $result->fetch_assoc();
        $puntosUsu = $row['puntos'];

        $puntosTotales = $puntosUsu - $puntos;


        //Actualizar los puntos del usuario
        $stmt2 = $con->prepare("UPDATE usuarios SET puntos = ? WHERE usuario_id = ?;");
        $stmt2->bind_param("ii", $puntosTotales, $usuario_id);
       
        $stmt2->execute();

        $con->close();
    }

}