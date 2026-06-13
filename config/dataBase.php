<?php

class DataBase{
    //Declaramos funcion con valores por defecto
    public static function connect($host = '127.0.0.1', $user = 'root', $password = '', $db = 'ikea_db'){
        $con = new mysqli($host, $user, $password, $db);

        if($con == false){
            die('DATABASE ERROR');//No hace falta saber que hace, es seguridad
        }else{
            return $con;
        }
    }

}
?>