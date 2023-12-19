<body>
    <main>
        <div class="contenido">

            <h2 class="textosTitulo mt-5 mb-5">Último Pedido</h2>
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
                                        <?= CalculadoraPrecios::formatPrecios(CalculadoraPrecios::calcularPrecioPedido($ultimoPedido)) ?>€
                                    </p>
                                </div>
                                <div class="mt-4 pb-4 border-bottom">
                                    <div class="d-flex justify-content-between">
                                        <p class="textoPedidosBold">Subtotal</p>
                                        <p class="precioSubtotal">
                                            <?= CalculadoraPrecios::formatPrecios(CalculadoraPrecios::calcularPrecioPedido($ultimoPedido)) ?>€
                                        </p>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p class="textoPedidos">Subtotal sin IVA</p>
                                        <p class="textoPedidosBold">
                                            <?= CalculadoraPrecios::formatPrecios(CalculadoraPrecios::subtotalSinIVA($ultimoPedido)) ?>€
                                        </p>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p class="textoPedidos">IVA</p>
                                        <p class="textoPedidosBold">
                                            <?= CalculadoraPrecios::formatPrecios(CalculadoraPrecios::IVA($ultimoPedido)) ?>€
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </section>

                </div>
        </div>
    </main>