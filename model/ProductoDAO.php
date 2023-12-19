<?php

include_once 'config/dataBase.php';


class ProductoDAO{

    public static function getAllProductos($categoria_id){
        $con = DataBase::connect();

        //Consulta para coger todos los productos de la categoria que le paso por parametro
        $stmt = $con->prepare("SELECT * FROM productos WHERE categoria_id = ?");
        $stmt->bind_param("i", $categoria_id); //Bindea la categoria_id con un integer

        $stmt->execute();
        $result = $stmt->get_result();

        //Consulta para recoger el nombre de la categoria_id que le paso por parametro
        $consultaCat = $con->prepare("SELECT nombre FROM categorias WHERE categoria_id = ?");
        $consultaCat->bind_param("i", $categoria_id); //Bindea la categoria_id con un integer

        $consultaCat->execute();
        $categoria = $consultaCat->get_result()->fetch_object()->nombre;

        $con->close();

        $res =[];

        while($producto = $result->fetch_object($categoria)){
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

    public static function updateProducto($producto_id, $nombre, $precio, $imagen){
        $con = DataBase::connect();

        $stmt = $con->prepare("UPDATE productos SET nombre = ?, precio = ?, img = ? WHERE producto_id = ?");
        $stmt->bind_param("sdsi", $nombre, $precio, $imagen, $producto_id);

        $stmt->execute();
        $result = $stmt->get_result();

        $con->close();

        return $result;
    }

    public static function getProductoById($producto_id, $categoria_id){
        $con = DataBase::connect();

        //Consulta para extraer todos los datos del producto que le pasamos por parametro
        $stmt = $con->prepare("SELECT * FROM productos WHERE producto_id = ?");
        $stmt->bind_param("i", $producto_id); //Bindea el tipo con un integer

        $stmt->execute();

        //Almacenamos el resultado de la consulta
        $result = $stmt->get_result();

        //Consulta para recoger el nombre de la categoria_id que le paso por parametro
        $consultaCat = $con->prepare("SELECT nombre FROM categorias WHERE categoria_id = ?");
        $consultaCat->bind_param("i", $categoria_id); //Bindea la categoria_id con un integer

        $consultaCat->execute();
        //Cogemos el nombre de la categoria
        $categoria = $consultaCat->get_result()->fetch_object()->nombre;

        //Indicamos que el resultado de la consulta es un objeto de nuestra categoria extraida en la consulta anterior
        $result = $result->fetch_object($categoria);

        $con->close();
        
        return $result;
    }

    public static function insertarProducto($categoria, $nombre, $precio, $imagen){
        $con = DataBase::connect();

        //Consulta para extraer el id del nombre de la categoria que recibimos
        $stmt = $con->prepare("SELECT productos.categoria_id FROM productos INNER JOIN categorias 
                                ON productos.categoria_id = categorias.categoria_id WHERE categorias.nombre = ?");
        $stmt->bind_param("s", $categoria);
        
        $stmt->execute();

        $categoria_id = $stmt->get_result()->fetch_object()->categoria_id;//Guardamos el resultado de la consulta con la variable $categoria_id

        $insProd = $con->prepare("INSERT INTO productos (producto_id, categoria_id, nombre, precio, img) VALUES (NULL, ?, ?, ?, ?)");

        $insProd->bind_param("isds", $categoria_id, $nombre, $precio, $imagen);

        $insProd->execute();

        $result = $insProd->get_result();

        $con->close();

        return $result;
    }

    public static function getAllCategorias(){
        $con = DataBase::connect();

        $allCategorias = $con->query("SELECT nombre FROM categorias");

        $categorias = $allCategorias->fetch_all();

        $con->close();

        return $categorias;
    }
}