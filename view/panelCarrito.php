<body>
    <main>
        <div class="contenido">

            <h2 class="textosTitulo mt-5 mb-5">Carrito de la compra</h2>
            <!-- Si el carrito esta vacío muestra el mensaje -->
            <?php
                if(count($_SESSION['selecciones']) == 0){?>
                    <h3 class="textosTitulo mt-5 mb-5">El carrito esta vacio</h3>
                <?php }else{ ?>
                    <div class="row p-0 m-0">
                        <section class="col-12 col-sm-10 col-md-9 col-lg-7">
                            <?php 
                                $pos = 0;
                                foreach($_SESSION['selecciones'] as $pedido){ ?>
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
                                                        <form class="d-flex align-items-center justify-content-between border rounded-5 p-1 col-6 col-md-5 col-lg-3" action="<?=url."?controller=producto&action=compra"?>" method="POST">
                                                            <td>
                                                                <button class="p-1 border-0 rounded-circle sumaResta" type="submit" name="resta" value="<?=$pos?>">
                                                                    <svg width="24" viewBox="0 0 24 24">
                                                                        <path d="M17 13H7v-2h10v2z"></path>
                                                                    </svg>
                                                                </button>
                                                                <span class="cantidadPedido"><?= $pedido->getCantidad()?></span>
                                                                <button class="p-1 border-0 rounded-circle sumaResta" type="submit" name="suma" value="<?=$pos?>">
                                                                    <svg width="24" viewBox="0 0 24 24">
                                                                        <path d="M10.998 13v4h2v-4h4v-2h-4V7h-2v4h-4v2h4z"></path>
                                                                    </svg>
                                                                </button>
                                                            </td>
                                                        </form>
                                                        <div class="col-lg-4 p-0 d-flex align-items-center justify-content-end alinear-inicio">
                                                            <form action="<?=url."?controller=producto&action=eliminarProdCar"?>" class="p-0 m-0" method="post">
                                                                <input name="posicionSelecciones" value="<?= $pos?>" hidden />
                                                                <button type="submit" class="border-0 bg-transparent">
                                                                    <a class="enlacesCarrito">Eliminar Producto</a>
                                                                </button>
                                                            </form>
                                                        </div>
                                                        <div class="col-lg-5 p-0 d-flex align-items-center justify-content-end alinear-inicio">
                                                            <form action="<?=url."?controller=producto&action=favorito"?>" class="p-0 m-0" method="post">
                                                                <input name="producto_id" value="<?= $pedido->getProducto()->getProducto_id()?>" hidden />
                                                                <input name="categoria_id" value="<?= $pedido->getProducto()->getCategoria_id()?>" hidden />
                                                                <button type="submit" class="border-0 bg-transparent">
                                                                    <a class="enlacesCarrito">Guardar para más tarde</a>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-lg-2 d-flex justify-content-end alinear-inicioPrecio">
                                                <span class="d-flex">
                                                    <p class="card-text precioProductoCar"><?=$pedido->formatPrecio()?>€</p>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                <?php 
                                $pos++;
                                
                                    }?>
                        </section>
                        <section class="p-0 col-lg-5">
                            <div class="ps-5 col-lg-12 quitarPadding">
                                <h5 class="resumenPedido">Resumen del pedido</h5>
                                <div class="mt-5 pb-4 border-3 border-bottom bordeResumenPed d-flex justify-content-between">
                                    <p class="textoPedidos">Precio de los productos</p>
                                    <p class="textoPedidosBold">
                                        <!-- Formatea el precio -->
                                        <input id="inputPrecioPed" value="<?= CalculadoraPrecios::calcularPrecioPedido($_SESSION['selecciones']) ?>" hidden>
                                        <?= CalculadoraPrecios::formatPrecios(CalculadoraPrecios::calcularPrecioPedido($_SESSION['selecciones'])) ?>€
                                    </p>
                                </div>
                                <div class="mt-4 pb-4 border-2 bordeResumenPed border-bottom">
                                    <div class="d-flex justify-content-between">
                                        <p class="textoPedidosBold">Subtotal</p>
                                        <p class="precioSubtotal">
                                            <!-- Formatea el precio -->
                                            <?= CalculadoraPrecios::formatPrecios(CalculadoraPrecios::calcularPrecioPedido($_SESSION['selecciones'])) ?>€
                                        </p>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p class="textoPedidos">Subtotal sin IVA</p>
                                        <p class="textoPedidosBold">
                                            <!-- Formatea el precio -->
                                            <?= CalculadoraPrecios::formatPrecios(CalculadoraPrecios::subtotalSinIVA($_SESSION['selecciones'])) ?>€
                                        </p>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p class="textoPedidos">IVA</p>
                                        <p class="textoPedidosBold">
                                            <!-- Formatea el precio -->
                                            <?= CalculadoraPrecios::formatPrecios(CalculadoraPrecios::IVA($_SESSION['selecciones'])) ?>€
                                        </p>
                                    </div>
                                </div>
                                <div class="mt-4 pb-4 border-bottom">
                                    <div class="d-flex justify-content-between">
                                        <p class="textoPedidos">IKEA points del pedido</p>
                                        <p class="textoPedidosBold">
                                            <!-- Formatea los puntos -->
                                            <?= CalculadoraPrecios::formatPuntos(CalculadoraPrecios::calcularPuntosPedido($_SESSION['selecciones'])) ?> 
                                        </p>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p class="textoPedidos">Tus IKEA points</p>
                                        <span id="tusPoints2"></span>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p class="textoPedidos">Utiliza tus IKEA points</p>
                                        <input id="usuario_id" hidden value="<?= $_SESSION['usuario']->getUsuario_id()?>" type="text">
                                        <input id="tusPoints" class="textoPedidosBold inputRango" type="range">
                                    </div>
                                    <div class="d-flex justify-content-end mb-3">
                                        <span id="tusPoints3" class="textoPedidosBold"></span>
                                    </div>
                                    <div class="d-flex justify-content-between form-check form-switch p-0 mb-2">
                                        <label id="tituloPropina" class="form-check-label textoPedidos" for="flexSwitchCheckChecked">Propinas</label><!-- Cambia el texto por defecto -->
                                        <input id="quieresPropina" class="form-check-input" type="checkbox" role="switch" checked > <!-- Marcado por defecto -->
                                    </div>
                                    <div id="botonesPropina" class="justify-content-around" style="display: flex;">
                                        <button value="3" id="btn3Porciento" type="button" class="btnPropina rounded-2 border-0 p-2 propinas"> <!-- Agrega la clase 'active' -->
                                            3%
                                        </button>
                                        <button value="20" type="button" class="btnPropina rounded-2 border-0 p-2 ms-2 propinas">
                                            20%
                                        </button>
                                        <button value="35" type="button" class="btnPropina rounded-2 border-0 p-2 ms-2 propinas">
                                            35%
                                        </button>
                                        <button value="50" type="button" class="btnPropina rounded-2 border-0 p-2 ms-2 propinas">
                                            50%
                                        </button>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center my-2">
                                        <p class="textoPedidosBold">Subtotal con descuento</p>
                                        <input id="inputPrecioTotal" type="number" hidden value="<?= CalculadoraPrecios::calcularPrecioPedido($_SESSION['selecciones'])?>">
                                        <p id="precioDescuento" class="precioSubtotal">
                                        </p>
                                    </div>
                                    <div class="d-flex justify-content-end mb-3">
                                        <span id="tusPropinas" class="textoPedidosBold"></span>
                                    </div>
                                </div>
                                <form id="hacerPedido" class="mt-5" action="<?= url . "?controller=pedido&action=confirmar"?>" method="POST">
                                    <!-- Calcula el precio final del pedido -->
                                    <input id="puntosUsados" type="hidden">
                                    <input id="inputPrecioDescuento" type="hidden">
                                    <input id="puntos" value="<?= CalculadoraPrecios::calcularPuntosPedido($_SESSION['selecciones']) ?>" type="hidden" />
                                        <button class="border-0 col-12" type="submit">
                                                <div class="px-4 py-5 rounded-1 btnContinuar d-flex justify-content-between align-items-center">
                                                    <p class="m-0 continuarPedido">Continuar</p> 
                                                    <div class="rounded-circle d-flex justify-content-center btn_flechaPed">
                                                        <svg fill="black" width="24px" heigth="24px" viewBox="0 0 24 24">
                                                            <path d="m20.0008 12.0001-8-8.001-1.4143 1.414L16.1727 11H4v2h12.1723l-5.5868 5.5866 1.4141 1.4142 8.0012-8.0007z">
                                                            </path>
                                                        </svg>
                                                    </div>
                                                </div>
                                        </button>
                                </form>
                            </div>
                        </section>

                    </div>
                    <?php
                    }?>
        </div>
    </main>
    <script src="./assets/js/gestorPuntos.js"></script>