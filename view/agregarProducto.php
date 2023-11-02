<table border=1 style='text-align: center;'>
        <th>Categoria</th>        
        <th>Nombre</th>
        <th>Precio</th>            
        <tr>
            <form action=<?=url."?controller=producto&action=insertar"?> method="post">
                <!-- <input name="producto_id" hidden/> -->
                <td>
                    <select name="categoria">
                        <?php foreach($categorias as $categoria){ ?>
                            <option value="<?= $categoria[0] ?>"><?= $categoria[0] ?></option>
                        <?php } ?>
                    </select>
                </td>
                <td>
                    <input name="nombre"/>
                </td>
                <td>
                    <input name="precio"/>
                </td>
                <td>
                    <button type="submit">Agregar</button>
                </td>
            </form>
        </tr>
</table>
