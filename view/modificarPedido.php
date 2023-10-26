<table border=1 style='text-align: center;'>
        <th>Categoria id</th>
        <th>Nombre</th>
        <th>Precio</th>            
        <tr>
            <form action=<?=url."?controller=producto&action=actualizar"?> method="post">
                <input name="producto_id" value="<?= $producto->getProducto_id()?>"  hidden/>
                <td>
                    <input name="categoria_id" value="<?= $producto->getCategoria_id()?>"  />
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

