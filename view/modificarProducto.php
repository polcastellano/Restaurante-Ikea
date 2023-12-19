<body>
    <main>
        <div class="contenido">
            <h2 class="textosTitulo mt-5 mb-5">Modificar Productos</h2>
                <table class="text-center">
                    <th>Producto Id</th>
                    <th>Categoria Id</th>
                    <th>Foto Producto</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Nombre Imagen</th>
                    <?php foreach($platos as $plato){ ?>           
                    <tr>
                        <form action=<?=url."?controller=producto&action=actualizar"?> method="post">
                            <td>
                                <input name="producto_id" value="<?= $plato->getProducto_id()?>" hidden />
                                <input name="producto_id2" value="<?= $plato->getProducto_id()?>" disabled  class="text-center mx-1"/>
                            </td>
                            <td>
                                <input name="categoria_id" value="<?= $plato->getCategoria_id()?>" hidden />
                                <input name="categoria_id2" value="<?= $plato->getCategoria_id()?>" disabled  class="text-center mx-1"/>
                            </td>
                            <td>
                                <img width="50%" src="assets/images/foto_productos/<?= $plato->getImg()?>" alt="<?= $plato->getDescripcion()?>">
                            </td>
                            <td>
                                <input name="nombre" value="<?= $plato->getNombre()?>" class="text-center mx-1" />
                            </td>
                            <td>
                                <input name="precio" value="<?= $plato->getPrecio()?>"  class="text-center mx-1" />
                            </td>
                            <td>
                                <input name="imagen" value="<?= $plato->getImg()?>"  class="text-center mx-1" />
                            </td>
                            <td>
                                <button type="submit" class="border mx-1">Actualizar</button>
                            </td>
                        </form>
                    </tr>
                    <?php } ?> 
                    <?php foreach($desayunos as $desayuno){ ?>           
                    <tr>
                        <form action=<?=url."?controller=producto&action=actualizar"?> method="post">
                            <td>
                                <input name="producto_id" value="<?= $desayuno->getProducto_id()?>" hidden />
                                <input name="producto_id2" value="<?= $desayuno->getProducto_id()?>" disabled  class="text-center mx-1"/>
                            </td>
                            <td>
                                <input name="categoria_id" value="<?= $desayuno->getCategoria_id()?>" hidden />
                                <input name="categoria_id2" value="<?= $desayuno->getCategoria_id()?>" disabled  class="text-center mx-1"/>
                            </td>
                            <td>
                                <img width="50%" src="assets/images/foto_productos/<?= $desayuno->getImg()?>" alt="<?= $desayuno->getDescripcion()?>">
                            </td>
                            <td>
                                <input name="nombre" value="<?= $desayuno->getNombre()?>"  class="text-center mx-1" />
                            </td>
                            <td>
                                <input name="precio" value="<?= $desayuno->getPrecio()?>"  class="text-center mx-1" />
                            </td>
                            <td>
                                <input name="precio" value="<?= $desayuno->getImg()?>"  class="text-center mx-1" />
                            </td>
                            <td>
                                <button type="submit" class="border mx-1">Actualizar</button>
                            </td>
                        </form>
                    </tr>
                    <?php } ?> 
                    <?php foreach($entrantes as $entrante){ ?>           
                    <tr>
                        <form action=<?=url."?controller=producto&action=actualizar"?> method="post">
                            <td>
                                <input name="producto_id" value="<?= $entrante->getProducto_id()?>" hidden />
                                <input name="producto_id2" value="<?= $entrante->getProducto_id()?>" disabled  class="text-center mx-1"/>
                            </td>
                            <td>
                                <input name="categoria_id" value="<?= $entrante->getCategoria_id()?>" hidden />
                                <input name="categoria_id2" value="<?= $entrante->getCategoria_id()?>" disabled  class="text-center mx-1"/>
                            </td>
                            <td>
                                <img width="50%" src="assets/images/foto_productos/<?= $entrante->getImg()?>" alt="<?= $plato->getDescripcion()?>">
                            </td>
                            <td>
                                <input name="nombre" value="<?= $entrante->getNombre()?>"  class="text-center mx-1" />
                            </td>
                            <td>
                                <input name="precio" value="<?= $entrante->getPrecio()?>"  class="text-center mx-1" />
                            </td>
                            <td>
                                <input name="precio" value="<?= $entrante->getImg()?>"  class="text-center mx-1" />
                            </td>
                            <td>
                                <button type="submit" class="border mx-1">Actualizar</button>
                            </td>
                        </form>
                    </tr>
                    <?php } ?> 
                    <?php foreach($pizzas as $pizza){ ?>           
                    <tr>
                        <form action=<?=url."?controller=producto&action=actualizar"?> method="post">
                            <td>
                                <input name="producto_id" value="<?= $pizza->getProducto_id()?>" hidden />
                                <input name="producto_id2" value="<?= $pizza->getProducto_id()?>" disabled  class="text-center mx-1"/>
                            </td>
                            <td>
                                <input name="categoria_id" value="<?= $pizza->getCategoria_id()?>" hidden />
                                <input name="categoria_id2" value="<?= $pizza->getCategoria_id()?>" disabled  class="text-center mx-1"/>
                            </td>
                            <td>
                                <img width="50%" src="assets/images/foto_productos/<?= $pizza->getImg()?>" alt="<?= $pizza->getDescripcion()?>">
                            </td>
                            <td>
                                <input name="nombre" value="<?= $pizza->getNombre()?>"  class="text-center mx-1" />
                            </td>
                            <td>
                                <input name="precio" value="<?= $pizza->getPrecio()?>"  class="text-center mx-1" />
                            </td>
                            <td>
                                <input name="precio" value="<?= $pizza->getImg()?>" class="text-center mx-1" />
                            </td>
                            <td>
                                <button type="submit" class="border mx-1">Actualizar</button>
                            </td>
                        </form>
                    </tr>
                    <?php } ?> 
            </table>
        </div>
    </main>
</body>