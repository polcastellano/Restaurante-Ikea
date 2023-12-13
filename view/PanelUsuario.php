<body>
    <main>
        <div class="contenido">

            <h2 class="textosTitulo mt-5 mb-5">Bienvenido</h2>
                <p>Email: <?=$_SESSION['usuario']->getEmail()?></p>
                <p>Contraseña: <input type="password" disabled value="<?=$_SESSION['usuario']->getPassword()?>"></p>
            <h2 class="textosTitulo mt-5 mb-5">Ultimo pedido</h2>
            <table class="container-fluid justify-content-between">
                <thead>
                    <tr class="justify-content-center align-items-center">
                        <th>Identificador pedido</th>
                        <th>Fecha</th>
                        <th>Precio total</th>
                        <th>Ver pedido</th>
                        <th>Eliminar pedido</th>
                    </tr>
                </thead>
                <tbody class="justify-content-center align-items-center">
                        <tr>
                            <td><?=$ultimoPedido->getPedido_id()?></td>
                            <td><?=$ultimoPedido->getFecha()?></td>
                            <td><?=CalculadoraPrecios::formatPrecios($ultimoPedido->getPrecio_total())?> €</td>
                            <td>
                                <button>
                                    <p>view</p>
                                </button>
                            </td>    
                            <td>
                                <button>
                                    <p>delete</p>
                                </button>
                            </td> 
                        </tr>
                </tbody>
            </table>
            <h2 class="textosTitulo mt-5 mb-5">Todos los pedidos</h2>
            <table class="container-fluid justify-content-between">
                <thead>
                    <tr class="justify-content-center align-items-center">
                        <th>Identificador pedido</th>
                        <th>Fecha</th>
                        <th>Precio total</th>
                        <th>Ver pedido</th>
                        <th>Eliminar pedido</th>
                    </tr>
                </thead>
                <tbody class="justify-content-center align-items-center">
                    <?php foreach ($pedidos as $pedido) { ?>
                        <tr>
                            <td><?=$pedido->getPedido_id()?></td>
                            <td><?=$pedido->getFecha()?></td>
                            <td><?=CalculadoraPrecios::formatPrecios($pedido->getPrecio_total())?> €</td>
                            <td>
                                <button>
                                    <p>view</p>
                                </button>
                            </td>    
                            <td>
                                <button>
                                    <p>delete</p>
                                </button>
                            </td> 
                        </tr>
                    <?php } ?>
                </tbody>
            </table>


            
        </div>
    </main>