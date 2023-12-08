<body>
    
    <main>
    <div class="contenido">    
    
        <h2 class="textosTitulo mt-5 mb-5">Restaurante en Molins de Rei</h2>


        <section class="pt-3 pb-4 border-bottom">
            <?php foreach (ProductoDAO::getAllCategorias() as $categoria){ ?>
                <a class="text-decoration-none" href="#<?=$categoria[0]?>">
                    <button class="py-2 px-4 me-3 rounded-5 border-0 categorias txtCategorias"><?=$categoria[0]?></button>
                </a>
            <?php } ?>
        </section>

        <h2 id="Plato" class="mt-5 textosTituloCat">Platos Principales</h2>
        
        <section class="contenido row p-0 m-0 mt-5">
            <?php foreach($platos as $plato){ ?>
                <div class="card border-0 rounded-0 border-bottom col-12 col-sm-6 col-md-4 col-lg-3 mb-5 justify-content-center">
                    <div class="mx-auto">
                        <img style="width: 100%;" src="assets/images/foto_productos/<?=$plato->getImg()?>" alt="<?=$plato->getDescripcion() ?>"> 
                    </div>                   
                    <div class="card-body">
                        <h5 class="card-title tituloProducto"><?=mb_strtoupper($plato->getNombre())?></h5>
                        <p class="card-text descProd"><?=$plato->getDescripcion()?></p>
                        <div class="d-flex justify-content-between">
                            <span class="d-flex">
                                <p class="card-text precioEntProd"><?=$plato->getPrecioEntera()?></p>
                                <p class="card-text precioDecProd">,<?=$plato->getPrecioDecimal()?> €</p>
                            </span>
                            <div class="w-auto d-flex justify-content-end">
                                <form action=<?=url."?controller=producto&action=favorito"?> method="post">
                                    <input name="producto_id" value="<?= $plato->getProducto_id()?>" hidden />
                                    <input name="categoria_id" value="<?= $plato->getCategoria_id()?>" hidden />
                                    <button type="submit" class="border-0 rounded-circle btnProdFav me-2">
                                        <a>
                                        <svg width="24" height="24" viewBox="0 0 24 24">
                                            <path d="M19.205 5.599c.9541.954 1.4145 2.2788 1.4191 3.6137 0 3.0657-2.2028 5.7259-4.1367 7.5015-1.2156 1.1161-2.5544 2.1393-3.9813 2.9729L12 20.001l-.501-.3088c-.9745-.5626-1.8878-1.2273-2.7655-1.9296-1.1393-.9117-2.4592-2.1279-3.5017-3.5531-1.0375-1.4183-1.8594-3.1249-1.8597-4.9957-.0025-1.2512.3936-2.5894 1.419-3.6149 1.8976-1.8975 4.974-1.8975 6.8716 0l.3347.3347.336-.3347c1.8728-1.8722 4.9989-1.8727 6.8716 0zm-7.2069 12.0516c.6695-.43 1.9102-1.2835 3.1366-2.4096 1.8786-1.7247 3.4884-3.8702 3.4894-6.0264-.0037-.849-.2644-1.6326-.8333-2.2015-1.1036-1.1035-2.9413-1.0999-4.0445.0014l-1.7517 1.7448-1.7461-1.7462c-1.1165-1.1164-2.9267-1.1164-4.0431 0-1.6837 1.6837-.5313 4.4136.6406 6.0156.8996 1.2298 2.0728 2.3207 3.137 3.1722a24.3826 24.3826 0 0 0 2.0151 1.4497z"></path>
                                        </svg>
                                        </a>
                                    </button>
                                </form>
                                <form action=<?=url."?controller=producto&action=carrito"?> method="post">
                                    <input name="producto_id" value="<?= $plato->getProducto_id()?>" hidden />
                                    <input name="categoria_id" value="<?= $plato->getCategoria_id()?>" hidden />
                                    <button type="submit" class="border-0 rounded-circle btnProdCarrito me-2">
                                        <a>
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="white">
                                                <path fill-rule="evenodd" d="M10.4372 4h3.1244l.2922.4801 3.3574 5.517h5.0694l-.3104 1.2425L21.5303 13h-2.0615l.2506-1.0029H4.2808l1.3106 5.2426a1 1 0 0 0 .9702.7574H15v2H6.5616c-1.3766 0-2.5766-.9369-2.9105-2.2724L2.03 11.2397l-.3107-1.2426H6.788l3.357-5.517L10.4372 4zm2.0003 2L14.87 9.9971H9.1291L11.5614 6h.8761zm5.5586 10v-2h2v2h2v2h-2v2h-2v-2h-2v-2h2z"></path>
                                            </svg>
                                        </a>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </section>


        <h2 id="Desayuno" class="textosTituloCat">Desayunos</h2>
        
        <section class="contenido row p-0 m-0 mt-5">
            <?php foreach($desayunos as $desayuno){ ?>
                <div class="card border-0 rounded-0 border-bottom col-sm-5 col-md-3 mb-5 justify-content-center">
                    <div class="medidaProductos mx-auto">
                        <img style="width: 100%;" src="assets/images/foto_productos/<?=$desayuno->getImg()?>" alt="<?=$desayuno->getDescripcion() ?>"> 
                    </div>                   
                    <div class="card-body">
                        <h5 class="card-title tituloProducto"><?=mb_strtoupper($desayuno->getNombre())?></h5>
                        <p class="card-text descProd"><?=$desayuno->getDescripcion()?></p>
                        <div class="d-flex justify-content-between">
                            <span class="d-flex">
                                <p class="card-text precioEntProd"><?=$desayuno->getPrecioEntera()?></p>
                                <p class="card-text precioDecProd">,<?=$desayuno->getPrecioDecimal()?> €</p>
                            </span>
                            <div class="w-auto d-flex justify-content-end">
                                <form action=<?=url."?controller=producto&action=favorito"?> method="post">
                                    <input name="producto_id" value="<?= $desayuno->getProducto_id()?>" hidden />
                                    <input name="categoria_id" value="<?= $desayuno->getCategoria_id()?>" hidden />
                                    <button type="submit" class="border-0 rounded-circle btnProdFav me-2">
                                        <a href="#">
                                        <svg width="24" height="24" viewBox="0 0 24 24">
                                            <path d="M19.205 5.599c.9541.954 1.4145 2.2788 1.4191 3.6137 0 3.0657-2.2028 5.7259-4.1367 7.5015-1.2156 1.1161-2.5544 2.1393-3.9813 2.9729L12 20.001l-.501-.3088c-.9745-.5626-1.8878-1.2273-2.7655-1.9296-1.1393-.9117-2.4592-2.1279-3.5017-3.5531-1.0375-1.4183-1.8594-3.1249-1.8597-4.9957-.0025-1.2512.3936-2.5894 1.419-3.6149 1.8976-1.8975 4.974-1.8975 6.8716 0l.3347.3347.336-.3347c1.8728-1.8722 4.9989-1.8727 6.8716 0zm-7.2069 12.0516c.6695-.43 1.9102-1.2835 3.1366-2.4096 1.8786-1.7247 3.4884-3.8702 3.4894-6.0264-.0037-.849-.2644-1.6326-.8333-2.2015-1.1036-1.1035-2.9413-1.0999-4.0445.0014l-1.7517 1.7448-1.7461-1.7462c-1.1165-1.1164-2.9267-1.1164-4.0431 0-1.6837 1.6837-.5313 4.4136.6406 6.0156.8996 1.2298 2.0728 2.3207 3.137 3.1722a24.3826 24.3826 0 0 0 2.0151 1.4497z"></path>
                                        </svg>
                                        </a>
                                    </button>
                                </form>
                                <form action=<?=url."?controller=producto&action=carrito"?> method="post">
                                    <input name="producto_id" value="<?= $desayuno->getProducto_id()?>" hidden />
                                    <input name="categoria_id" value="<?= $desayuno->getCategoria_id()?>" hidden />
                                    <button type="submit" class="border-0 rounded-circle btnProdCarrito me-2">
                                        <a href="#">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="white">
                                                <path fill-rule="evenodd" d="M10.4372 4h3.1244l.2922.4801 3.3574 5.517h5.0694l-.3104 1.2425L21.5303 13h-2.0615l.2506-1.0029H4.2808l1.3106 5.2426a1 1 0 0 0 .9702.7574H15v2H6.5616c-1.3766 0-2.5766-.9369-2.9105-2.2724L2.03 11.2397l-.3107-1.2426H6.788l3.357-5.517L10.4372 4zm2.0003 2L14.87 9.9971H9.1291L11.5614 6h.8761zm5.5586 10v-2h2v2h2v2h-2v2h-2v-2h-2v-2h2z"></path>
                                            </svg>
                                        </a>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </section>


        <h2 id="Entrante" class="textosTituloCat">Entrantes</h2>
        
        <section class="contenido row p-0 m-0 mt-5">
            <?php foreach($entrantes as $entrante){ ?>
                <div class="card border-0 rounded-0 border-bottom col-sm-5 col-md-3 mb-5 justify-content-center">
                    <div class="medidaProductos mx-auto">
                        <img style="width: 100%;" src="assets/images/foto_productos/<?=$entrante->getImg()?>" alt="<?=$entrante->getDescripcion() ?>"> 
                    </div>                   
                    <div class="card-body">
                        <h5 class="card-title tituloProducto"><?=mb_strtoupper($entrante->getNombre())?></h5>
                        <p class="card-text descProd"><?=$entrante->getDescripcion()?></p>
                        <div class="d-flex justify-content-between">
                            <span class="d-flex">
                                <p class="card-text precioEntProd"><?=$entrante->getPrecioEntera()?></p>
                                <p class="card-text precioDecProd">,<?=$entrante->getPrecioDecimal()?> €</p>
                            </span>
                            <div class="w-auto d-flex justify-content-end">
                                <form action=<?=url."?controller=producto&action=favorito"?> method="post">
                                    <input name="producto_id" value="<?= $entrante->getProducto_id()?>" hidden />
                                    <input name="categoria_id" value="<?= $entrante->getCategoria_id()?>" hidden />
                                    <button type="submit" class="border-0 rounded-circle btnProdFav me-2">
                                        <a href="#">
                                        <svg width="24" height="24" viewBox="0 0 24 24">
                                            <path d="M19.205 5.599c.9541.954 1.4145 2.2788 1.4191 3.6137 0 3.0657-2.2028 5.7259-4.1367 7.5015-1.2156 1.1161-2.5544 2.1393-3.9813 2.9729L12 20.001l-.501-.3088c-.9745-.5626-1.8878-1.2273-2.7655-1.9296-1.1393-.9117-2.4592-2.1279-3.5017-3.5531-1.0375-1.4183-1.8594-3.1249-1.8597-4.9957-.0025-1.2512.3936-2.5894 1.419-3.6149 1.8976-1.8975 4.974-1.8975 6.8716 0l.3347.3347.336-.3347c1.8728-1.8722 4.9989-1.8727 6.8716 0zm-7.2069 12.0516c.6695-.43 1.9102-1.2835 3.1366-2.4096 1.8786-1.7247 3.4884-3.8702 3.4894-6.0264-.0037-.849-.2644-1.6326-.8333-2.2015-1.1036-1.1035-2.9413-1.0999-4.0445.0014l-1.7517 1.7448-1.7461-1.7462c-1.1165-1.1164-2.9267-1.1164-4.0431 0-1.6837 1.6837-.5313 4.4136.6406 6.0156.8996 1.2298 2.0728 2.3207 3.137 3.1722a24.3826 24.3826 0 0 0 2.0151 1.4497z"></path>
                                        </svg>
                                        </a>
                                    </button>
                                </form>
                                <form action=<?=url."?controller=producto&action=carrito"?> method="post">
                                    <input name="producto_id" value="<?= $entrante->getProducto_id()?>" hidden />
                                    <input name="categoria_id" value="<?= $entrante->getCategoria_id()?>" hidden />
                                    <button type="submit" class="border-0 rounded-circle btnProdCarrito me-2">
                                        <a href="#">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="white">
                                                <path fill-rule="evenodd" d="M10.4372 4h3.1244l.2922.4801 3.3574 5.517h5.0694l-.3104 1.2425L21.5303 13h-2.0615l.2506-1.0029H4.2808l1.3106 5.2426a1 1 0 0 0 .9702.7574H15v2H6.5616c-1.3766 0-2.5766-.9369-2.9105-2.2724L2.03 11.2397l-.3107-1.2426H6.788l3.357-5.517L10.4372 4zm2.0003 2L14.87 9.9971H9.1291L11.5614 6h.8761zm5.5586 10v-2h2v2h2v2h-2v2h-2v-2h-2v-2h2z"></path>
                                            </svg>
                                        </a>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </section>


        <h2 id="Pizza" class="textosTituloCat">Pizzas</h2>
        
        <section class="contenido row p-0 m-0 mt-5">
            <?php foreach($pizzas as $pizza){ ?>
                <div class="card border-0 rounded-0 border-bottom col-sm-5 col-md-3 mb-5 justify-content-center">
                    <div class="medidaProductos mx-auto">
                        <img style="width: 100%;" src="assets/images/foto_productos/<?=$pizza->getImg()?>" alt="<?=$pizza->getDescripcion() ?>"> 
                    </div>                   
                    <div class="card-body">
                        <h5 class="card-title tituloProducto"><?=mb_strtoupper($pizza->getNombre())?></h5>
                        <p class="card-text descProd"><?=$pizza->getDescripcion()?></p>
                        <div class="d-flex justify-content-between">
                            <span class="d-flex">
                                <p class="card-text precioEntProd"><?=$pizza->getPrecioEntera()?></p>
                                <p class="card-text precioDecProd">,<?=$pizza->getPrecioDecimal()?> €</p>
                            </span>
                            <div class="w-auto d-flex justify-content-end">
                                <form action=<?=url."?controller=producto&action=favorito"?> method="post">
                                    <input name="producto_id" value="<?= $pizza->getProducto_id()?>" hidden />
                                    <input name="categoria_id" value="<?= $pizza->getCategoria_id()?>" hidden />
                                    <button type="submit" class="border-0 rounded-circle btnProdFav me-2">
                                        <a href="#">
                                        <svg width="24" height="24" viewBox="0 0 24 24">
                                            <path d="M19.205 5.599c.9541.954 1.4145 2.2788 1.4191 3.6137 0 3.0657-2.2028 5.7259-4.1367 7.5015-1.2156 1.1161-2.5544 2.1393-3.9813 2.9729L12 20.001l-.501-.3088c-.9745-.5626-1.8878-1.2273-2.7655-1.9296-1.1393-.9117-2.4592-2.1279-3.5017-3.5531-1.0375-1.4183-1.8594-3.1249-1.8597-4.9957-.0025-1.2512.3936-2.5894 1.419-3.6149 1.8976-1.8975 4.974-1.8975 6.8716 0l.3347.3347.336-.3347c1.8728-1.8722 4.9989-1.8727 6.8716 0zm-7.2069 12.0516c.6695-.43 1.9102-1.2835 3.1366-2.4096 1.8786-1.7247 3.4884-3.8702 3.4894-6.0264-.0037-.849-.2644-1.6326-.8333-2.2015-1.1036-1.1035-2.9413-1.0999-4.0445.0014l-1.7517 1.7448-1.7461-1.7462c-1.1165-1.1164-2.9267-1.1164-4.0431 0-1.6837 1.6837-.5313 4.4136.6406 6.0156.8996 1.2298 2.0728 2.3207 3.137 3.1722a24.3826 24.3826 0 0 0 2.0151 1.4497z"></path>
                                        </svg>
                                        </a>
                                    </button>
                                </form>
                                <form action=<?=url."?controller=producto&action=carrito"?> method="post">
                                    <input name="producto_id" value="<?= $pizza->getProducto_id()?>" hidden />
                                    <input name="categoria_id" value="<?= $pizza->getCategoria_id()?>" hidden />
                                    <button type="submit" class="border-0 rounded-circle btnProdCarrito me-2">
                                        <a href="#">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="white">
                                                <path fill-rule="evenodd" d="M10.4372 4h3.1244l.2922.4801 3.3574 5.517h5.0694l-.3104 1.2425L21.5303 13h-2.0615l.2506-1.0029H4.2808l1.3106 5.2426a1 1 0 0 0 .9702.7574H15v2H6.5616c-1.3766 0-2.5766-.9369-2.9105-2.2724L2.03 11.2397l-.3107-1.2426H6.788l3.357-5.517L10.4372 4zm2.0003 2L14.87 9.9971H9.1291L11.5614 6h.8761zm5.5586 10v-2h2v2h2v2h-2v2h-2v-2h-2v-2h2z"></path>
                                            </svg>
                                        </a>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </section>


        <!--<form action=<?=url."?controller=producto&action=agregar"?> method="post">
            <button type="submit">Agregar</button>
        </form>

        <h2 id="Plato" class="textosTituloCat">Platos Principales</h2>
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
                    </td>
                    <td>
                        <form action=<?=url."?controller=producto&action=eliminar"?> method="post">
                            <input name="producto_id" value="<?= $plato->getProducto_id()?>" hidden />
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                    <td>
                        <form action=<?=url."?controller=producto&action=carta"?> method="post">
                            <input name="producto_id" value="<?= $plato->getProducto_id()?>" hidden />
                            <input name="categoria_id" value="<?= $plato->getCategoria_id()?>" hidden />
                            <button type="submit">Seleccionar</button>
                        </form>
                    </td>
                    <td>
                        <form action=<?=url."?controller=producto&action=favoritos"?> method="post">
                            <input name="producto_id" value="<?= $plato->getProducto_id()?>" hidden />
                            <input name="categoria_id" value="<?= $plato->getCategoria_id()?>" hidden />
                            <button type="submit">Favorito</button>
                        </form>
                    </td>
                    </tr>
                <?php } ?>
            </table>

        <h2 id="Desayuno" class="textosTituloCat">Desayunos</h2>
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
                </td>
                <td>
                    <form action=<?=url."?controller=producto&action=eliminar"?> method="post">
                        <input name="producto_id" value="<?= $desayuno->getProducto_id()?>" hidden />
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
                <td>
                    <form action=<?=url."?controller=producto&action=carta"?> method="post">
                        <input name="producto_id" value="<?= $desayuno->getProducto_id()?>" hidden />
                        <input name="categoria_id" value="<?= $desayuno->getCategoria_id()?>" hidden />
                        <button type="submit">Seleccionar</button>
                    </form>
                </td>
                <td>
                    <form action=<?=url."?controller=producto&action=favoritos"?> method="post">
                        <input name="producto_id" value="<?= $desayuno->getProducto_id()?>" hidden />
                        <input name="categoria_id" value="<?= $desayuno->getCategoria_id()?>" hidden />
                        <button type="submit">Favorito</button>
                    </form>
                </td>
                </tr>
            <?php } ?>
            </table>
        
        <h2 id="Entrante" class="textosTituloCat">Entrantes</h2>
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
                </td>
                <td>
                    <form action=<?=url."?controller=producto&action=eliminar"?> method="post">
                        <input name="producto_id" value="<?= $entrante->getProducto_id()?>" hidden />
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
                <td>
                    <form action=<?=url."?controller=producto&action=carta"?> method="post">
                        <input name="producto_id" value="<?= $entrante->getProducto_id()?>" hidden />
                        <input name="categoria_id" value="<?= $entrante->getCategoria_id()?>" hidden />
                        <button type="submit">Seleccionar</button>
                    </form>
                </td>
                <td>
                    <form action=<?=url."?controller=producto&action=favoritos"?> method="post">
                        <input name="producto_id" value="<?= $entrante->getProducto_id()?>" hidden />
                        <input name="categoria_id" value="<?= $entrante->getCategoria_id()?>" hidden />
                        <button type="submit">Favorito</button>
                    </form>
                </td>
                </tr>
            <?php } ?>
            </table>

        <h2 id="Pizza" class="textosTituloCat">Pizzas</h2> 
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
                </td>
                <td>
                    <form action=<?=url."?controller=producto&action=eliminar"?> method="post">
                        <input name="producto_id" value="<?= $pizza->getProducto_id()?>" hidden />
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
                <td>
                    <form action=<?=url."?controller=producto&action=carta"?> method="post">
                        <input name="producto_id" value="<?= $pizza->getProducto_id()?>" hidden />
                        <input name="categoria_id" value="<?= $pizza->getCategoria_id()?>" hidden />
                        <button type="submit">Seleccionar</button>
                    </form>
                </td>
                <td>
                    <form action=<?=url."?controller=producto&action=favoritos"?> method="post">
                        <input name="producto_id" value="<?= $pizza->getProducto_id()?>" hidden />
                        <input name="categoria_id" value="<?= $pizza->getCategoria_id()?>" hidden />
                        <button type="submit">Favorito</button>
                    </form>
                </td>
                </tr>
            <?php } ?>
            </table>-->
    </div>
    </main>