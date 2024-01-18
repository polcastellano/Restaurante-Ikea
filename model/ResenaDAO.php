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

}