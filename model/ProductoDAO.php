<?php

include_once 'config/dataBase.php';


class ProductoDAO{

    public static function getAllProductos($categoria_id){
        $con = DataBase::connect();
    
        // Consulta para obtener todos los productos de la categoría proporcionada
        $stmt = $con->prepare("SELECT * FROM productos WHERE categoria_id = ?");
        $stmt->bind_param("i", $categoria_id); // Enlaza la categoría_id como un entero
    
        $stmt->execute();
        $result = $stmt->get_result();
    
        // Consulta para obtener el nombre de la categoría según la categoria_id proporcionada
        $consultaCat = $con->prepare("SELECT nombre FROM categorias WHERE categoria_id = ?");
        $consultaCat->bind_param("i", $categoria_id); // Enlaza la categoría_id como un entero
    
        $consultaCat->execute();
        $categoria = $consultaCat->get_result()->fetch_object()->nombre;
    
        $con->close();
    
        $res =[];
    
        // Crea un array con los productos y los almacena bajo el nombre de la categoría
        while($producto = $result->fetch_object($categoria)){
            $res[] = $producto;
        }
        return $res;
    }
    
    public static function eliminarProducto($producto_id){
        $con = DataBase::connect();
    
        // Elimina un producto según su producto_id
        $stmt = $con->prepare("DELETE FROM productos WHERE producto_id = ?");
        $stmt->bind_param("i", $producto_id);
    
        $stmt->execute();
        $result = $stmt->get_result();
    
        $con->close();
    
        return $result;
    }
    
    public static function updateProducto($producto_id, $nombre, $precio, $imagen){
        $con = DataBase::connect();
    
        // Actualiza un producto con un nuevo nombre, precio e imagen según su ID
        $stmt = $con->prepare("UPDATE productos SET nombre = ?, precio = ?, img = ? WHERE producto_id = ?");
        $stmt->bind_param("sdsi", $nombre, $precio, $imagen, $producto_id);
    
        $stmt->execute();
        $result = $stmt->get_result();
    
        $con->close();
    
        return $result;
    }
    
    public static function getProductoById($producto_id, $categoria_id){
        $con = DataBase::connect();
    
        // Consulta para extraer todos los datos del producto según su ID
        $stmt = $con->prepare("SELECT * FROM productos WHERE producto_id = ?");
        $stmt->bind_param("i", $producto_id); // Enlaza el tipo como un entero
    
        $stmt->execute();
    
        // Almacena el resultado de la consulta
        $result = $stmt->get_result();
    
        // Consulta para obtener el nombre de la categoria_id proporcionada
        $consultaCat = $con->prepare("SELECT nombre FROM categorias WHERE categoria_id = ?");
        $consultaCat->bind_param("i", $categoria_id); // Enlaza la categoria_id como un entero
    
        $consultaCat->execute();
        // Obtiene el nombre de la categoría
        $categoria = $consultaCat->get_result()->fetch_object()->nombre;
    
        // Indica que el resultado de la consulta es un objeto de la categoría extraída anteriormente
        $result = $result->fetch_object($categoria);
    
        $con->close();
        
        return $result;
    }
    

    public static function insertarProducto($categoria, $nombre, $precio, $imagen){
        $con = DataBase::connect();
    
        // Consulta para extraer el ID de la categoría proporcionada
        $stmt = $con->prepare("SELECT productos.categoria_id FROM productos INNER JOIN categorias 
                                ON productos.categoria_id = categorias.categoria_id WHERE categorias.nombre = ?");
        $stmt->bind_param("s", $categoria);
        
        $stmt->execute();
    
        // Obtiene el ID de la categoría basado en el nombre proporcionado
        $categoria_id = $stmt->get_result()->fetch_object()->categoria_id;
    
        // Inserta un nuevo producto con los detalles dados
        $insProd = $con->prepare("INSERT INTO productos (producto_id, categoria_id, nombre, precio, img) VALUES (NULL, ?, ?, ?, ?)");
        $insProd->bind_param("isds", $categoria_id, $nombre, $precio, $imagen);
    
        $insProd->execute();
        $result = $insProd->get_result();
    
        $con->close();
    
        return $result;
    }
    
    public static function getAllCategorias(){
        $con = DataBase::connect();
    
        // Obtiene todos los nombres de las categorías disponibles
        $allCategorias = $con->query("SELECT nombre FROM categorias");
    
        // Almacena los nombres de las categorías en un array
        $categorias = $allCategorias->fetch_all();
    
        $con->close();
    
        return $categorias;
    }

    public static function precioDescuento($pedido_id){
        $con = DataBase::connect();
    
        // Consulta para obtener los productos y cantidades asociadas a un pedido específico
        $stmt = $con->prepare("SELECT precio_total FROM pedidos WHERE pedido_id = ?");
        $stmt->bind_param("i", $pedido_id);
    
        $stmt->execute();
    
        $result = $stmt->get_result();

        // Obtener el nombre del resultado
        if ($row = $result->fetch_assoc()) {
            $precio = $row['precio_total'];
            return $precio;
            $con->close();
        }
        $con->close();
    }
    
    public static function getPropina($pedido_id){
        $con = DataBase::connect();
    
        // Consulta para obtener los productos y cantidades asociadas a un pedido específico
        $stmt = $con->prepare("SELECT propinas FROM pedidos WHERE pedido_id = ?");
        $stmt->bind_param("i", $pedido_id);
    
        $stmt->execute();
    
        $result = $stmt->get_result();

        // Obtener el nombre del resultado
        if ($row = $result->fetch_assoc()) {
            $propina = $row['propinas'];
            return $propina;
            $con->close();
        }
        $con->close();
    }
    public static function getPuntosUsados($pedido_id){
        $con = DataBase::connect();
    
        // Consulta para obtener los productos y cantidades asociadas a un pedido específico
        $stmt = $con->prepare("SELECT puntos_usados FROM pedidos WHERE pedido_id = ?");
        $stmt->bind_param("i", $pedido_id);
    
        $stmt->execute();
    
        $result = $stmt->get_result();

        // Obtener el nombre del resultado
        if ($row = $result->fetch_assoc()) {
            $puntosUsados = $row['puntos_usados'];
            return $puntosUsados;
            $con->close();
        }
        $con->close();
    }
}