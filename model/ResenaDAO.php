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

    public static function getReseña($pedido_id){
        $con = DataBase::connect();
        
        $stmt = $con->prepare("SELECT * FROM reseñas WHERE pedido_id = ?");
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

    public static function insertarReseña($usuario_id, $pedido_id, $comentario, $valoracion, $nombre_usuario){
        $con = DataBase::connect();
        
        $stmt = $con->prepare("INSERT INTO reseñas (usuario_id, pedido_id, comentario, valoracion, nombre_usuario) VALUES (?????);");
        $stmt->bind_param("iisis", $usuario_id, $pedido_id, $comentario, $valoracion, $nombre_usuario);

        $stmt->execute();

        $con->close();
        
    }

}