<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Pedido</title>
</head>
<body>
<h1>Productos</h1>
    <form action=<?=url."?controller=producto&action=agregar"?> method="post">
        <button type="submit">Agregar</button>
    </form>

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
            <td><?=$plato->getPrecio()?> €</td>
            <td>
                <form action=<?=url."?controller=producto&action=modificar"?> method="post">
                    <input name="producto_id" value="<?= $plato->getProducto_id()?>" hidden />
                    <input name="categoria_id" value="<?= $plato->getCategoria_id()?>" hidden />
                    <button type="submit">Modificar</button>
                </form>
            <td>
                <form action=<?=url."?controller=producto&action=eliminar"?> method="post">
                    <input name="producto_id" value="<?= $plato->getProducto_id()?>" hidden />
                    <button type="submit">Eliminar</button>
                </form>
            </td>
            </tr>
        <?php } ?>
        </table>

    <h2>Desayunos</h2>
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
            <td><?=$desayuno->getPrecio()?> €</td>
            <td>
                <form action=<?=url."?controller=producto&action=modificar"?> method="post">
                    <input name="producto_id" value="<?= $desayuno->getProducto_id()?>" hidden />
                    <input name="categoria_id" value="<?= $desayuno->getCategoria_id()?>" hidden />
                    <button type="submit">Modificar</button>
                </form>
            <td>
                <form action=<?=url."?controller=producto&action=eliminar"?> method="post">
                    <input name="producto_id" value="<?= $desayuno->getProducto_id()?>" hidden />
                    <button type="submit">Eliminar</button>
                </form>
            </tr>
        <?php } ?>
        </table>
    
    <h2>Entrantes</h2>
        <table border=1 style='text-align: center;'>
        <th>Producto id</th>
        <th>Categoria id</th>
        <th>Nombre</th>
        <th>Precio</th>

        <?php foreach($entrantes as $entrante){ ?>
            
            <tr>
            <td><?=$entrante->getProducto_id()?></td>
            <td><?=$entrante->getCategoria_id()?></td>
            <td><?=$entrante->getNombre()?></td>
            <td><?=$entrante->getPrecio()?> €</td>
            <td>
                <form action=<?=url."?controller=producto&action=modificar"?> method="post">
                    <input name="producto_id" value="<?= $entrante->getProducto_id()?>" hidden />
                    <input name="categoria_id" value="<?= $entrante->getCategoria_id()?>" hidden />
                    <button type="submit">Modificar</button>
                </form>
            <td>
                <form action=<?=url."?controller=producto&action=eliminar"?> method="post">
                    <input name="producto_id" value="<?= $entrante->getProducto_id()?>" hidden />
                    <button type="submit">Eliminar</button>
                </form>
            </tr>
        <?php } ?>
        </table>

    <h2>Pizzas</h2>
        <table border=1 style='text-align: center;'>
        <th>Producto id</th>
        <th>Categoria id</th>
        <th>Nombre</th>
        <th>Precio</th>

        <?php foreach($pizzas as $pizza){ ?>
            
            <tr>
            <td><?=$pizza->getProducto_id()?></td>
            <td><?=$pizza->getCategoria_id()?></td>
            <td><?=$pizza->getNombre()?></td>
            <td><?=$pizza->getPrecio()?> €</td>
            <td>
                <form action=<?=url."?controller=producto&action=modificar"?> method="post">
                    <input name="producto_id" value="<?= $pizza->getProducto_id()?>" hidden />
                    <input name="categoria_id" value="<?= $pizza->getCategoria_id()?>" hidden />
                    <button type="submit">Modificar</button>
                </form>
            <td>
                <form action=<?=url."?controller=producto&action=eliminar"?> method="post">
                    <input name="producto_id" value="<?= $pizza->getProducto_id()?>" hidden />
                    <button type="submit">Eliminar</button>
                </form>
            </tr>
        <?php } ?>
        </table>
</body>
</html>

