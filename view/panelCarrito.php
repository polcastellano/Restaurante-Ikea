<body>
    <main>
        <div class="contenido">

            <h1>Carrito</h1>
                <table border=1 style='text-align: center;'>
                <th>Producto id</th>
                <th>Categoria id</th>
                <th>Nombre</th>
                <th>Precio</th>

                <!-- Hacer condicional por si no hay sesion iniciada  y de si hay algo en el carrito -->

                <?php foreach($_SESSION['selecciones'] as $pedido){ ?>
                    
                    <tr>
                    <td><?=$pedido->getProducto()->getProducto_id()?></td>
                    <td><?=$pedido->getProducto()->getCategoria_id()?></td>
                    <td><?=$pedido->getProducto()->getNombre()?></td>
                    <td><?=$pedido->getProducto()->getPrecio()?> €</td>
                    </tr>
                <?php } ?>
                </table>
        </div>
    </main>
</body>
</html>

