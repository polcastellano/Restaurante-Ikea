<?php

class DataBase{
    //Declaramos funcion con valores por defecto
    public static function connect($host = 'localhost', $user = 'root', $password = '', $db = 'ikea_db'){
        $con = new mysqli($host, $user, $password, $db);

        if($con == false){
            die('DATABASE ERROR');//No hace falta saber que hace, es seguridad
        }else{
            return $con;
        }
    }

}