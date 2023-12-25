<body>
    <main>
        <div class="contenido">
            <h2 class="textosTitulo mt-5 mb-5">Modificar Productos</h2>
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead>
                            <tr class="align-middle">
                                <th class="ocultos">Producto Id</th>
                                <th class="ocultos">Categoria Id</th>
                                <th class="ocultos">Foto Producto</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Nombre Imagen</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($platos as $plato) { ?>
                                <tr class="align-middle">
                                    <form action="<?= url."?controller=producto&action=actualizar" ?>" method="post">
                                        <td class="ocultos align-middle">
                                            <input name="producto_id" value="<?= $plato->getProducto_id() ?>" hidden />
                                            <input name="producto_id2" value="<?= $plato->getProducto_id() ?>" disabled class="form-control text-center mx-1" />
                                        </td>
                                        <td class="ocultos align-middle">
                                            <input name="categoria_id" value="<?= $plato->getCategoria_id() ?>" hidden />
                                            <input name="categoria_id2" value="<?= $plato->getCategoria_id()?>" disabled  class="form-control text-center mx-1"/>
                                        </td>
                                        <td class="align-middle ocultos">
                                            <img class="img-fluid" style="max-width: 50%;" src="assets/images/foto_productos/<?= $plato->getImg() ?>" alt="<?= $plato->getDescripcion() ?>">
                                        </td>
                                        <td class="align-middle">
                                            <input name="nombre" value="<?= $plato->getNombre() ?>" class="form-control text-center mx-1" />
                                        </td>
                                        <td class="align-middle">
                                            <input name="precio" value="<?= $plato->getPrecio()?>"  class="form-control text-center mx-1" />
                                        </td>
                                        <td class="align-middle">
                                            <input name="img" value="<?= $plato->getImg()?>"  class="form-control text-center mx-1" />
                                        </td>
                                        <td class="align-middle">
                                            <button type="submit" class="btn btn-primary btnActualizar">Actualizar</button>
                                        </td>
                                    </form>
                                    <td>
                                        <form action=<?=url."?controller=producto&action=eliminar"?> method="post">
                                            <input name="producto_id" value="<?= $plato->getProducto_id()?>" hidden />
                                            <button type="submit" class="btn btn-primary btnEliminar">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
                            <?php foreach($desayunos as $desayuno) { ?>
                                <tr class="align-middle">
                                    <form action="<?= url."?controller=producto&action=actualizar" ?>" method="post">
                                        <td class="ocultos align-middle">
                                            <input name="producto_id" value="<?= $desayuno->getProducto_id() ?>" hidden />
                                            <input name="producto_id2" value="<?= $desayuno->getProducto_id() ?>" disabled class="form-control text-center mx-1" />
                                        </td>
                                        <td class="ocultos align-middle">
                                            <input name="categoria_id" value="<?= $desayuno->getCategoria_id() ?>" hidden />
                                            <input name="categoria_id2" value="<?= $desayuno->getCategoria_id()?>" disabled  class="form-control text-center mx-1"/>
                                        </td>
                                        <td class="align-middle ocultos">
                                            <img class="img-fluid" style="max-width: 50%;" src="assets/images/foto_productos/<?= $desayuno->getImg() ?>" alt="<?= $desayuno->getDescripcion() ?>">
                                        </td>
                                        <td class="align-middle">
                                            <input name="nombre" value="<?= $desayuno->getNombre() ?>" class="form-control text-center mx-1" />
                                        </td>
                                        <td class="align-middle">
                                            <input name="precio" value="<?= $desayuno->getPrecio()?>"  class="form-control text-center mx-1" />
                                        </td>
                                        <td class="align-middle">
                                            <input name="img" value="<?= $desayuno->getImg()?>"  class="form-control text-center mx-1" />
                                        </td>
                                        <td class="align-middle">
                                            <button type="submit" class="btn btn-primary btnActualizar">Actualizar</button>
                                        </td>
                                    </form>
                                    <td>
                                        <form action=<?=url."?controller=producto&action=eliminar"?> method="post">
                                            <input name="producto_id" value="<?= $desayuno->getProducto_id()?>" hidden />
                                            <button type="submit" class="btn btn-primary btnEliminar">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
                            <?php foreach($entrantes as $entrante) { ?>
                                <tr class="align-middle">
                                    <form action="<?= url."?controller=producto&action=actualizar" ?>" method="post">
                                        <td class="ocultos align-middle">
                                            <input name="producto_id" value="<?= $entrante->getProducto_id() ?>" hidden />
                                            <input name="producto_id2" value="<?= $entrante->getProducto_id() ?>" disabled class="form-control text-center mx-1" />
                                        </td>
                                        <td class="ocultos align-middle">
                                            <input name="categoria_id" value="<?= $entrante->getCategoria_id() ?>" hidden />
                                            <input name="categoria_id2" value="<?= $entrante->getCategoria_id()?>" disabled  class="form-control text-center mx-1"/>
                                        </td>
                                        <td class="align-middle ocultos">
                                            <img class="img-fluid" style="max-width: 50%;" src="assets/images/foto_productos/<?= $entrante->getImg() ?>" alt="<?= $entrante->getDescripcion() ?>">
                                        </td>
                                        <td class="align-middle">
                                            <input name="nombre" value="<?= $entrante->getNombre() ?>" class="form-control text-center mx-1" />
                                        </td>
                                        <td class="align-middle">
                                            <input name="precio" value="<?= $entrante->getPrecio()?>"  class="form-control text-center mx-1" />
                                        </td>
                                        <td class="align-middle">
                                            <input name="img" value="<?= $entrante->getImg()?>"  class="form-control text-center mx-1" />
                                        </td>
                                        <td class="align-middle">
                                            <button type="submit" class="btn btn-primary btnActualizar">Actualizar</button>
                                        </td>
                                    </form>
                                    <td>
                                        <form action=<?=url."?controller=producto&action=eliminar"?> method="post">
                                            <input name="producto_id" value="<?= $entrante->getProducto_id()?>" hidden />
                                            <button type="submit" class="btn btn-primary btnEliminar">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
                            <?php foreach($pizzas as $pizza) { ?>
                                <tr class="align-middle">
                                    <form action="<?= url."?controller=producto&action=actualizar" ?>" method="post">
                                        <td class="ocultos align-middle">
                                            <input name="producto_id" value="<?= $pizza->getProducto_id() ?>" hidden />
                                            <input name="producto_id2" value="<?= $pizza->getProducto_id() ?>" disabled class="form-control text-center mx-1" />
                                        </td>
                                        <td class="ocultos align-middle">
                                            <input name="categoria_id" value="<?= $pizza->getCategoria_id() ?>" hidden />
                                            <input name="categoria_id2" value="<?= $pizza->getCategoria_id()?>" disabled  class="form-control text-center mx-1"/>
                                        </td>
                                        <td class="align-middle ocultos">
                                            <img class="img-fluid" style="max-width: 50%;" src="assets/images/foto_productos/<?= $pizza->getImg() ?>" alt="<?= $pizza->getDescripcion() ?>">
                                        </td>
                                        <td class="align-middle">
                                            <input name="nombre" value="<?= $pizza->getNombre() ?>" class="form-control text-center mx-1" />
                                        </td>
                                        <td class="align-middle">
                                            <input name="precio" value="<?= $pizza->getPrecio()?>"  class="form-control text-center mx-1" />
                                        </td>
                                        <td class="align-middle">
                                            <input name="img" value="<?= $pizza->getImg()?>"  class="form-control text-center mx-1" />
                                        </td>
                                        <td class="align-middle">
                                            <button type="submit" class="btn btn-primary btnActualizar">Actualizar</button>
                                        </td>
                                    </form>
                                    <td>
                                        <form action=<?=url."?controller=producto&action=eliminar"?> method="post">
                                            <input name="producto_id" value="<?= $pizza->getProducto_id()?>" hidden />
                                            <button type="submit" class="btn btn-primary btnEliminar">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
        </div>
    </main>
</body>