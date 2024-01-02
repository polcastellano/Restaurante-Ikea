<script src="./assets/js/editarUsuario.js"></script>

<body>
    <main>
        <div class="contenido">

            <h2 class="textosTitulo mt-5 mb-5">Detalles de la cuenta</h2>
            <div class="d-flex">
                <div class="col-3">
                    <ul class="list-group">
                        <a href="" class="link-dark link-underline-opacity-0 link-underline-opacity-100-hover">
                            <div class="elementoLista p-3">
                                <h3 class="listaPanelUsuario m-0 align-items-center d-flex">
                                    <svg width="22px" heigth="22px" viewBox="0 0 24 24" class="me-2">
                                        <path d="M16.8907 8.5235A5.966 5.966 0 0 1 17.917 11H20v2h-2.083a5.9674 5.9674 0 0 1-1.0263 2.4766l1.4731 1.4732-1.4142 1.4142-1.4731-1.4732A5.9679 5.9679 0 0 1 13 17.917V20h-2v-2.083a5.966 5.966 0 0 1-2.4765-1.0263l-1.4731 1.4731-1.4142-1.4142 1.473-1.4731A5.9675 5.9675 0 0 1 6.083 13H4v-2h2.083a5.9679 5.9679 0 0 1 1.0263-2.4766L5.6362 7.0502 7.0504 5.636l1.4731 1.4732A5.968 5.968 0 0 1 11 6.083V4h2v2.083a5.9675 5.9675 0 0 1 2.4765 1.0263l1.4731-1.4731 1.4142 1.4142-1.4731 1.473zM12 16c2.2091 0 4-1.7909 4-4 0-2.2091-1.7909-4-4-4-2.2091 0-4 1.7909-4 4 0 2.2091 1.7909 4 4 4z"></path>
                                    </svg>
                                    Configuración de la cuenta
                                </h3>
                            </div>
                        </a>
                        <?php if($_SESSION['usuario']->getPermisos() == 1){ ?>
                            <a href="<?=url."?controller=producto&action=agregar"?>" class="link-dark link-underline-opacity-0 link-underline-opacity-100-hover">
                                <div class="elementoLista p-3">
                                    <h3 class="listaPanelUsuario2 m-0 align-items-center d-flex">
                                        <svg width="22px" heigth="22px" viewBox="0 0 24 24" class="me-2">
                                            <path d="M16.8907 8.5235A5.966 5.966 0 0 1 17.917 11H20v2h-2.083a5.9674 5.9674 0 0 1-1.0263 2.4766l1.4731 1.4732-1.4142 1.4142-1.4731-1.4732A5.9679 5.9679 0 0 1 13 17.917V20h-2v-2.083a5.966 5.966 0 0 1-2.4765-1.0263l-1.4731 1.4731-1.4142-1.4142 1.473-1.4731A5.9675 5.9675 0 0 1 6.083 13H4v-2h2.083a5.9679 5.9679 0 0 1 1.0263-2.4766L5.6362 7.0502 7.0504 5.636l1.4731 1.4732A5.968 5.968 0 0 1 11 6.083V4h2v2.083a5.9675 5.9675 0 0 1 2.4765 1.0263l1.4731-1.4731 1.4142 1.4142-1.4731 1.473zM12 16c2.2091 0 4-1.7909 4-4 0-2.2091-1.7909-4-4-4-2.2091 0-4 1.7909-4 4 0 2.2091 1.7909 4 4 4z"></path>
                                        </svg>
                                        Añadir Producto
                                    </h3>
                                </div>
                            </a>
                            <a href="<?=url."?controller=producto&action=modificar"?>" class="link-dark link-underline-opacity-0 link-underline-opacity-100-hover">
                                <div class="elementoLista p-3">
                                    <h3 class="listaPanelUsuario2 m-0 align-items-center d-flex">
                                        <svg width="22px" heigth="22px" viewBox="0 0 24 24" class="me-2">
                                            <path d="M16.8907 8.5235A5.966 5.966 0 0 1 17.917 11H20v2h-2.083a5.9674 5.9674 0 0 1-1.0263 2.4766l1.4731 1.4732-1.4142 1.4142-1.4731-1.4732A5.9679 5.9679 0 0 1 13 17.917V20h-2v-2.083a5.966 5.966 0 0 1-2.4765-1.0263l-1.4731 1.4731-1.4142-1.4142 1.473-1.4731A5.9675 5.9675 0 0 1 6.083 13H4v-2h2.083a5.9679 5.9679 0 0 1 1.0263-2.4766L5.6362 7.0502 7.0504 5.636l1.4731 1.4732A5.968 5.968 0 0 1 11 6.083V4h2v2.083a5.9675 5.9675 0 0 1 2.4765 1.0263l1.4731-1.4731 1.4142 1.4142-1.4731 1.473zM12 16c2.2091 0 4-1.7909 4-4 0-2.2091-1.7909-4-4-4-2.2091 0-4 1.7909-4 4 0 2.2091 1.7909 4 4 4z"></path>
                                        </svg>
                                        Modificar Producto
                                    </h3>
                                </div>
                            </a>
                        <?php } ?>
                        <a href="<?=url."?controller=usuario&action=cerrarSesion"?>" class="link-dark link-underline-opacity-0 link-underline-opacity-100-hover">
                            <div class="elementoLista p-3">
                                <h3 class="listaPanelUsuario2 m-0 align-items-center d-flex">
                                    <svg width="22px" heigth="22px" viewBox="0 0 24 24" class="me-2">
                                        <path d="M12 22H3V2h9v2H5v16h7v2z"></path>
                                        <path d="m16.1715 11-3.2429-3.243 1.4142-1.4142 5.6568 5.6568-5.6568 5.6569-1.4142-1.4142L16.1708 13H7.9999v-2h8.1716z"></path>
                                    </svg>
                                    Cierre de sesión
                                </h3>
                            </div>
                        </a>
                    </ul>
                </div>
                <div class="col border rounded-3 mb-5 ms-5 mt-0 p-3 d-flex justify-content-between">
                    <div>
                        <h4 class="h4infoPersonal mt-2 mb-4">Información personal</h4>
                        <form method="post" action="<?=url."?controller=usuario&action=acutalizaUsuario"?>">
                            <div class="mb-4">
                                <p class="m-0 titulosInfoPers">Nombre</p>
                                <p>
                                    <span id="nombre"><?=$_SESSION['usuario']->getNombre()?></span>
                                    <input type="text" id="inputNombre" name="nombre" class="form-control inputsUsuario" style="display:none;">
                                </p>
                            </div>
                            <div class="mb-4">
                                <p class="m-0 titulosInfoPers">Dirección de correo</p>
                                <p>
                                    <span id="email"><?=$_SESSION['usuario']->getEmail()?></span>
                                    <input type="text" id="inputEmail" name="email" class="form-control inputsUsuario" style="display:none;">
                                </p>
                            </div>
                            <div class="mb-4">
                                <p class="m-0 titulosInfoPers">Contraseña</p>
                                <p>
                                    <span id="password"><?=$_SESSION['usuario']->getPassword()?></span>
                                    <input type="text" id="inputPassword" name="password" class="form-control inputsUsuario" style="display:none;">
                                </p>
                            </div>
                            <div id="botones" style="display:none;">
                                <button onclick="guardarCambios()" class="btn btn-primary btnGuardarCambios">Guardar cambios</button>
                                <button onclick="cancelarEdicion(event)" class="btn btn-secondary btnCancelarCambios">Cancelar</button>
                            </div>
                        </form>
                    </div>
                    <div class="mt-2 me-5">
                        <button onclick="editarInformacion()" class="editarUsuario rounded-5 border-0 px-4 py-2">
                            <svg width="18px" heigth="18px" viewBox="0 0 24 24">
                                <path d="M13.0009 2.586 4 11.5868v5.4144h5.4142l8.9944-8.9944-5.4077-5.421zM6 15.0012v-2.5859l6.9991-6.9993 2.5828 2.589-6.9961 6.9962H6z"></path>
                                <path d="M4 21.0009h16v-2H4v2z"></path>
                            </svg>    
                            Editar
                        </button>
                    </div>
                </div>
            </div>

            <h2 class="textosTitulo mt-5 mb-5">Ultimo pedido</h2>
            <?php if(!isset($ultimoPedido)){ ?>
                <p>No hay ultimo pedido</p>
            <?php }else{ ?>
                <div class="table-responsive">
                    <table class="table text-center mb-5">
                        <thead>
                            <tr class="align-middle">
                                <th>Identificador pedido</th>
                                <th>Fecha</th>
                                <th>Precio total</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr class="align-middle">
                                    <td class="align-middle"><?=$ultimoPedido->getPedido_id()?></td>
                                    <td class="align-middle"><?=$ultimoPedido->getFecha()?></td>
                                    <td class="align-middle"><?=CalculadoraPrecios::formatPrecios($ultimoPedido->getPrecio_total())?> €</td>
                                    <td class="align-middle">
                                        <form action="<?=url."?controller=usuario&action=verPedido"?>" method="POST">
                                            <input type="text" name="pedido_id" value="<?=$ultimoPedido->getPedido_id()?>" hidden>
                                            <button type="submit" class="btn btn-primary btnVerPedido">Ver pedido</button>
                                        </form>
                                    </td>    
                                    <td class="align-middle">
                                        <form action="<?=url."?controller=usuario&action=borrarPedido"?>" method="POST">
                                            <input type="text" name="pedido_id" value="<?=$ultimoPedido->getPedido_id()?>" hidden>
                                            <button type="submit" class="btn btn-primary btnEliminarPedido">Borrar pedido</button>
                                        </form>
                                    </td> 
                                </tr>
                        </tbody>
                    </table>
                </div>
            <?php } ?>

            <h2 class="textosTitulo mt-5 mb-5">Todos los pedidos</h2>
            <div class="table-responsive">
                <table class="table text-center mb-5">
                    <thead>
                        <tr class="align-middleS">
                            <th>Identificador pedido</th>
                            <th>Fecha</th>
                            <th>Precio total</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="justify-content-center align-items-center">
                        <?php foreach ($pedidos as $pedido) { ?>
                            <tr class="align-middle">
                                <td class="align-middle"><?=$pedido->getPedido_id()?></td>
                                <td class="align-middle"><?=$pedido->getFecha()?></td>
                                <td class="align-middle"><?=CalculadoraPrecios::formatPrecios($pedido->getPrecio_total())?> €</td>
                                <td class="align-middle">
                                    <form action="<?=url."?controller=usuario&action=verPedido"?>" method="POST">
                                        <input type="text" name="pedido_id" value="<?=$pedido->getPedido_id()?>" hidden>
                                        <button type="submit" class="btn btn-primary btnVerPedido">Ver pedido</button>
                                    </form>
                                </td>    
                                <td class="align-middle">
                                    <form action="<?=url."?controller=usuario&action=borrarPedido"?>" method="POST">
                                        <input type="text" name="pedido_id" value="<?=$pedido->getPedido_id()?>" hidden>
                                        <button type="submit" class="btn btn-primary btnEliminarPedido">Borrar pedido</button>
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