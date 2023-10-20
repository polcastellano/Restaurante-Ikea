<?php

include_once 'config/dataBase.php';
include_once 'model/Producto.php';

include_once 'model/Desayuno.php';
include_once 'model/Plato.php';


class ProductoDAO{

    public static function getAllPlatos(){
        $con = DataBase::connect();

        if ($result = $con->query("SELECT * FROM productos WHERE categoria_id = 1")){

            $res =[];

            
            while($producto = $result->fetch_object('Plato')){
                $res[] = $producto;
            }
            return $res;
            
        }
    }

    public static function getAllDesayunos(){
        $con = DataBase::connect();

        if ($result = $con->query("SELECT * FROM productos WHERE categoria_id = 2")){

            $res =[];

            
            while($producto = $result->fetch_object('Desayuno')){
                $res[] = $producto;
            }
            return $res;
            
        }
    }

}