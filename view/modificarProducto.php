<table border=1 style='text-align: center;'>
        <th>Producto id</th>
        <th>Categoria id</th>
        <th>Nombre</th>
        <th>Precio</th>            
        <tr>
            <form action=<?=url."?controller=producto&action=actualizar"?> method="post">
                <td>
                    <input name="producto_id" value="<?= $producto->getProducto_id()?>" hidden />
                    <input name="producto_id2" value="<?= $producto->getProducto_id()?>" disabled />
                </td>
                <td>
                    <input name="categoria_id" value="<?= $producto->getCategoria_id()?>" hidden />
                    <input name="categoria_id2" value="<?= $producto->getCategoria_id()?>" disabled />
                </td>
                <td>
                    <input name="nombre" value="<?= $producto->getNombre()?>"  />
                </td>
                <td>
                    <input name="precio" value="<?= $producto->getPrecio()?>"  />
                </td>
                <td>
                    <button type="submit">Actualizar</button>
                </td>
            </form>
        </tr>
</table>