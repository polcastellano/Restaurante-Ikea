<body>
    <main>
        <div class="contenido">

            <h2 class="textosTitulo mt-5 mb-5">Detalles del pedido</h2>
                <div class="row p-0 m-0">
                    <section class="col-12 col-sm-10 col-md-9 col-lg-7">
                        <?php 
                            foreach($ultimoPedido as $pedido){ ?>
                                <div class="card rounded-0 border-0 border-bottom mb-3">
                                    <div class="row g-0 mb-5 mt-5">
                                        <div class="col-7 col-sm-5 col-md-3 col-lg-2">
                                        <img style="width: 100%;" src="assets/images/foto_productos/<?=$pedido->getProducto()->getImg()?>" alt="<?=$pedido->getProducto()->getImg() ?>"> 
                                        </div>
                                        <div class="col-11 col-sm-9 col-md-7 col-lg-8">
                                            <div class="card-body">
                                                <h5 class="card-title tituloProductoCar"><?=mb_strtoupper($pedido->getProducto()->getNombre())?></h5>
                                                <p class="card-text descProd"><?=$pedido->getProducto()->getDescripcion()?></p>
                                                <div class="row col-lg-12">
                                                    <form class="d-flex align-items-center justify-content-center border rounded-5 p-1 col-6 col-md-5 col-lg-3" action="<?=url."?controller=producto&action=compra"?>" method="POST">
                                                        <td><span class="cantidadPedido mx-2"><?= $pedido->getCantidad()?></span></td>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-lg-2 d-flex justify-content-end">
                                            <span class="d-flex">
                                                <p class="card-text precioProductoCar"><?=$pedido->formatPrecio()?>€</p>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                    </section>
                    <section class="p-0 col-lg-5">
                            <div class="ps-5 col-lg-12">
                                <h5 class="resumenPedido">Resumen del pedido</h5>
                                <div class="mt-5 pb-4 border-3 border-bottom bordeResumenPed d-flex justify-content-between">
                                    <p class="textoPedidos">Precio de los productos</p>
                                    <p class="textoPedidosBold">
                                        <!-- Formatea el precio -->
                                        <?= CalculadoraPrecios::formatPrecios(CalculadoraPrecios::calcularPrecioPedido($ultimoPedido)) ?>€
                                    </p>
                                </div>
                                <div class="mt-4 pb-4 border-bottom">
                                    <div class="d-flex justify-content-between">
                                        <p class="textoPedidosBold">Subtotal</p>
                                        <p class="precioSubtotal">
                                            <!-- Formatea el precio -->
                                            <?= CalculadoraPrecios::formatPrecios(CalculadoraPrecios::calcularPrecioPedido($ultimoPedido)) ?>€
                                        </p>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p class="textoPedidos">Subtotal sin IVA</p>
                                        <p class="textoPedidosBold">
                                            <!-- Formatea el precio -->
                                            <?= CalculadoraPrecios::formatPrecios(CalculadoraPrecios::subtotalSinIVA($ultimoPedido)) ?>€
                                        </p>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p class="textoPedidos">IVA</p>
                                        <p class="textoPedidosBold">
                                            <!-- Formatea el precio -->
                                            <?= CalculadoraPrecios::formatPrecios(CalculadoraPrecios::IVA($ultimoPedido)) ?>€
                                        </p>
                                    </div>
                                </div>
                                <?php if(!ResenaDAO::getReseña($pedido_id)){?>
                                <div>
                                    <h3 class="textosTitulo justify-content-center mt-5 mb-5">Nueva reseña</h3>
                                    <form id="formReseña" method="POST">
                                        <div class="row col">
                                            <input id="usuario_id" value="<?= $usuario_id?>" hidden />
                                            <input id="pedido_id" value="<?= $pedido_id?>" hidden />
                                            <label class="p-0">Comentario</label>
                                                <input class="py-3" type="text" id="comentario"/>
                                            <div id="estrellas" class="d-flex mt-4 p-0">

                                                <input id="valoracion" hidden />

                                                <div class="mb-3" onclick="asignarEstrella(1)">
                                                    <svg width="20" height="20" class="star-icon">
                                                        <path d="m11.9999 6 2.1245 3.6818 4.1255.9018-2.8125 3.1773L15.8626 18l-3.8627-1.7182L8.1372 18l.4252-4.2391-2.8125-3.1773 4.1255-.9018L11.9999 6z"></path>
                                                    </svg>
                                                </div>
                                                <div class="mb-3" onclick="asignarEstrella(2)">
                                                    <svg width="20" height="20" class="star-icon">
                                                        <path d="m11.9999 6 2.1245 3.6818 4.1255.9018-2.8125 3.1773L15.8626 18l-3.8627-1.7182L8.1372 18l.4252-4.2391-2.8125-3.1773 4.1255-.9018L11.9999 6z"></path>
                                                    </svg>
                                                </div>
                                                <div class="mb-3" onclick="asignarEstrella(3)">
                                                    <svg width="20" height="20" class="star-icon">
                                                        <path d="m11.9999 6 2.1245 3.6818 4.1255.9018-2.8125 3.1773L15.8626 18l-3.8627-1.7182L8.1372 18l.4252-4.2391-2.8125-3.1773 4.1255-.9018L11.9999 6z"></path>
                                                    </svg>
                                                </div>
                                                <div class="mb-3" onclick="asignarEstrella(4)">
                                                    <svg width="20" height="20" class="star-icon">
                                                        <path d="m11.9999 6 2.1245 3.6818 4.1255.9018-2.8125 3.1773L15.8626 18l-3.8627-1.7182L8.1372 18l.4252-4.2391-2.8125-3.1773 4.1255-.9018L11.9999 6z"></path>
                                                    </svg>
                                                </div>
                                                <div class="mb-3" onclick="asignarEstrella(5)">
                                                    <svg width="20" height="20" class="star-icon">
                                                        <path d="m11.9999 6 2.1245 3.6818 4.1255.9018-2.8125 3.1773L15.8626 18l-3.8627-1.7182L8.1372 18l.4252-4.2391-2.8125-3.1773 4.1255-.9018L11.9999 6z"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                                
                                            
                                            <button type="submit" class="btnLogin border-0 rounded-5 py-3 mt-5">
                                                <div class="d-flex justify-content-center col-12">
                                                    <p class="m-0 btnIniciar">Dejar reseña</p>
                                                </div>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <?php }else{ ?>
                                    <h3 class="textosTitulo justify-content-center mt-5 mb-5">Este pedido ya tiene reseña</h3>

                                <?php }?>
                            </div>
                        </section>

                </div>
        </div>
    </main>
    <script src="./assets/js/insertarReseña.js"></script>