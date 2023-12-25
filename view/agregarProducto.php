<body>
    <main>
        <div class="contenido">
            <h2 class="textosTitulo mt-5 mb-5">Añadir producto</h2>
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead>
                            <tr class="align-middle">
                                <th>Categoria</th>        
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Nombre Imagen</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="align-middle">
                                <form action=<?=url."?controller=producto&action=insertar"?> method="post">
                                    <td class="align-middle">
                                        <select name="categoria" class="form-select text-center mx-1">
                                            <?php foreach($categorias as $categoria){ ?>
                                                <option value="<?= $categoria[0] ?>"><?= $categoria[0] ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                    <td class="align-middle">
                                        <input name="nombre" class="form-control text-center mx-1"/>
                                    </td>
                                    <td class="align-middle">
                                        <input name="precio" class="form-control text-center mx-1"/>
                                    </td>
                                    <td class="align-middle">
                                        <input name="img" class="form-control text-center mx-1"/>
                                    </td>
                                    <td class="align-middle">
                                        <button type="submit" class="btn btn-primary btnAgregar">Añadir</button>
                                    </td>
                                </form>
                            </tr>
                        </tbody>             
                    </table>
                </div>
        </div>
    </main>
</body>
        
