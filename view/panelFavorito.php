<body>
    <main>
        <div class="contenido">

            <h1>Favoritos</h1>
                <table border=1 style='text-align: center;'>
                <th>Producto id</th>
                <th>Categoria id</th>
                <th>Nombre</th>
                <th>Precio</th>

                <!-- Hacer condicional por si no hay sesion iniciada  y de si hay algo en el carrito -->

                <?php foreach($_SESSION['favoritos'] as $favorito){ ?>
                    
                    <tr>
                    <td><?=$favorito->getProducto()->getProducto_id()?></td>
                    <td><?=$favorito->getProducto()->getCategoria_id()?></td>
                    <td><?=$favorito->getProducto()->getNombre()?></td>
                    <td><?=$favorito->getProducto()->getPrecio()?> €</td>
                    </tr>
                <?php } ?>
                </table>
        </div>
    </main>
</body>
</html>

