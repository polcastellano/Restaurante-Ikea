<?php

include_once 'config/dataBase.php';

class ProductoDAO{

    public static function getAllProductos(){
        $con = DataBase::connect();

/*  Lo que ha hecho el ruben en clase!!!!     
        $start = $con->query("SELECT * FROM producto");
        $start->execute();
        var_dump($start->get_result());
*/
        if ($result = $con->query("SELECT * FROM productos")){

            while($procuto = $result->fetch_array()){
                echo $procuto['nombre'];
                echo '<p></p>';
            }
        }
    }

}