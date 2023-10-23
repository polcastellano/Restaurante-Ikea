<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Pedido</title>
</head>
<body>
<h1>Productos</h1>
    <h2>Platos Principales</h2>
        <table border=1 style='text-align: center;'>
        <th>Producto id</th>
        <th>Categoria id</th>
        <th>Nombre</th>
        <th>Precio</th>

        <?php foreach($platos as $plato){ ?>
            
            <tr>
            <td><?=$plato->getProducto_id()?></td>
            <td><?=$plato->getCategoria_id()?></td>
            <td><?=$plato->getNombre()?></td>
            <td><?=$plato->getPrecio()?></td>
            <td><a href="modificarProducto.php">Modificar</a></td>
            <td><a href="eliminarProducto.php">Eliminar</a></td>
            </tr>
        <?php } ?>
        </table>

    <h2>Platos Principales</h2>
        <table border=1 style='text-align: center;'>
        <th>Producto id</th>
        <th>Categoria id</th>
        <th>Nombre</th>
        <th>Precio</th>

        <?php foreach($desayunos as $desayuno){ ?>
            
            <tr>
            <td><?=$desayuno->getProducto_id()?></td>
            <td><?=$desayuno->getCategoria_id()?></td>
            <td><?=$desayuno->getNombre()?></td>
            <td><?=$desayuno->getPrecio()?></td>
            <td><a href="modificarProducto.php">Modificar</a></td>
            <td><a href="eliminarProducto.php">Eliminar</a></td>
            </tr>
        <?php } ?>
        </table>
</body>
</html>

