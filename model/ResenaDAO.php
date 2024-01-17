<?php

include_once 'config/dataBase.php';

class ResenaDAO{
    public static function getAllReseñas(){
        $con = DataBase::connect();
        
        // Consulta para obtener un usuario a partir del email y la contraseña proporcionados
        $stmt = $con->prepare("SELECT * FROM reseñas");

        $stmt->execute();

        // Obtiene el resultado de la consulta y lo convierte en un objeto "Usuario"
        $result = $stmt->get_result();

        $con->close();

        $res =[];
    
        // Crea un array con las reseñas
        while($reseña = $result->fetch_object("Resena")){
            $res[] = $reseña;
        }

        return $res;
    }

}