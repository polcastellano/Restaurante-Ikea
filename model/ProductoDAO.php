<?php

include_once 'config/dataBase.php';


class ProductoDAO{

    public static function getAllProductos($tipo){
        $con = DataBase::connect();

        $stmt = $con->prepare("SELECT * FROM productos WHERE categoria_id = ?");
        $stmt->bind_param("i", $tipo); //Bindea el tipo con un integer

        $stmt->execute();
        $result = $stmt->get_result();

        $con->close();

        $res =[];

        $obj = "";

        if ($tipo = 1){
            $obj = "Plato";
        }elseif ($tipo = 2){
            $obj = "Desayunos";
        } 

        while($producto = $result->fetch_object($obj)){
            $res[] = $producto;
        }
        return $res;
    }

    public static function eliminarProducto($producto_id){
        $con = DataBase::connect();

        $stmt = $con->prepare("DELETE FROM productos WHERE producto_id = ?");
        $stmt->bind_param("i", $producto_id);

        $stmt->execute();
        $result = $stmt->get_result();

        $con->close();

        return $result;
    }

    public static function modificarProducto($producto_id, $categoria_id, $nombre, $precio){
        $con = DataBase::connect();

        $stmt = $con->prepare("UPDATE productos SET producto_id = ?, categoria_id = ?, nombre = ?, precio = ? WHERE producto_id = ?");
        $stmt->bind_param("iisd", $producto_id, $categoria_id, $nombre, $precio);

        $stmt->execute();
        $result = $stmt->get_result();

        $con->close();

        return $result;
    }

    public static function getProductoById($producto_id){
        $con = DataBase::connect();

        $stmt = $con->prepare("SELECT categorias.nombre FROM productos INNER JOIN categorias 
                                ON productos.categoria_id=categorias.categoria_id WHERE productos.producto_id = ?");
        $stmt->bind_param("i", $producto_id); //Bindea el tipo con un integer

        $stmt->execute();
        $categoria = $stmt->get_result()->fetch_object(); //Falta algo al final del fetch obj
        $con->close();

        var_dump($categoria);
    }
}