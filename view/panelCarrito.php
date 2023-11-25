<body>
    <main>
        <div class="contenido">

            <h1>Carrito</h1>
                <table border=1 style='text-align: center;'>
                <th>Producto id</th>
                <th>Categoria id</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Cantidad</th>

                <!-- Hacer condicional por si no hay sesion iniciada  y de si hay algo en el carrito -->

                <?php 
                $pos = 0;
                foreach($_SESSION['selecciones'] as $pedido){ ?>
                    
                    <tr>
                        <td><?=$pedido->getProducto()->getProducto_id()?></td>
                        <td><?=$pedido->getProducto()->getCategoria_id()?></td>
                        <td><?=$pedido->getProducto()->getNombre()?></td>
                        <td><?=$pedido->getProducto()->getPrecio()?> €</td>
                        <td><?=$pedido->getCantidad()?></td>

                        <form action="<?=url."?controller=producto&action=compra"?>" method="POST">
                            <td><button type="submit" name="suma" value="<?=$pos?>"> + </button></td>
                            <td><button type="submit" name="resta" value="<?=$pos?>"> - </button></td>
                        </form>
                    </tr>
                <?php
                $pos++;
                }
                ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>PRECIO FINAL PEDIDO:</td>
                    <td><?=CalculadoraPrecios::calcularPrecioPedido($_SESSION['selecciones'])?></td>
                    <form action="<?=url."?controller=producto&action=confirmar"?>" method="POST">
                        <td><button type="submit"> CONFIRMAR </button></td>
                    </form>

                </tr>
                </table>
        </div>
    </main>
</body>
</html>


