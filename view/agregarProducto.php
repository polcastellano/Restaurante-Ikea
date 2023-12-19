<body>
    <main>
        <div class="contenido">
            <h2 class="textosTitulo mt-5 mb-5">Añadir producto</h2>
                <table class="text-center">
                        <th>Categoria</th>        
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Nombre Imagen</th>             
                        <tr>
                            <form action=<?=url."?controller=producto&action=insertar"?> method="post">
                                <td>
                                    <select name="categoria" class="text-center mx-1">
                                        <?php foreach($categorias as $categoria){ ?>
                                            <option value="<?= $categoria[0] ?>"><?= $categoria[0] ?></option>
                                        <?php } ?>
                                    </select>
                                </td>
                                <td>
                                    <input name="nombre" class="text-center mx-1"/>
                                </td>
                                <td>
                                    <input name="precio" class="text-center mx-1"/>
                                </td>
                                <td>
                                    <input name="img" class="text-center mx-1"/>
                                </td>
                                <td>
                                    <button type="submit" class="border mx-1">Añadir</button>
                                </td>
                            </form>
                        </tr>
                </table>
        </div>
    </main>
</body>
        
