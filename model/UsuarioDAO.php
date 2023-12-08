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
}