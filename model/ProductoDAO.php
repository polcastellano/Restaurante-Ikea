<?php

include_once 'config/dataBase.php';


class ProductoDAO{

    public static function getAllProductos($categoria_id){
        $con = DataBase::connect();

        $stmt = $con->prepare("SELECT * FROM productos WHERE categoria_id = ?");
        $stmt->bind_param("i", $categoria_id); //Bindea la categoria_id con un integer

        $stmt->execute();
        $result = $stmt->get_result();

        // $stmt->bind_result($producto_id, $categoria_id, $nombre, $precio); //Para extraer el producto_id de la consulta

        $con->close();

        // $obj = self::getProductoById($producto_id);
        
        $res =[];

        $obj = "";

        if ($categoria_id = 1){
            $obj = "Plato";
        }elseif ($categoria_id = 2){
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
        $categoria = $stmt->get_result()->fetch_object()->nombre; //Nose si el nombre esta bien
        $con->close();

        return $categoria;
    }
}