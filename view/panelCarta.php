<!DOCTYPE html>
<html lang="es">
<head>
    <title>IKEA</title>

    <meta charset="UTF-8">

</head>
<body>
    
    <main>
    <div class="contenido">
        <section class="border-bottom py-3 d-flex align-items-center ">
          <div class="col-12 col-md-6 d-flex justify-content-start align-items-center">
            <a href=<?=url."?controller=producto"?> class="link-dark link-underline-opacity-0 link-underline-opacity-100-hover me-3"><p class="textosMenu my-0">Inicio</p></a>
            <a href=<?=url."?controller=producto&action=carta"?> class="link-dark link-underline-opacity-0 link-underline-opacity-100-hover me-3"><p class="textosMenu my-0">Carta</p></a>
            
          </div>
          <div class="ocultos col-md-6 d-flex justify-content-end align-items-center">
            <div class="d-flex align-items-center">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="black">
                <path d="M1 4h15v3h3.0246l3.9793 5.6848V18h-2.6567c-.4218 1.3056-1.6473 2.25-3.0933 2.25-1.446 0-2.6715-.9444-3.0932-2.25h-3.9044c-.4217 1.3056-1.6472 2.25-3.0932 2.25S4.4916 19.3056 4.0698 18H1V4zm3.0698 12c.4218-1.3056 1.6473-2.25 3.0933-2.25 1.446 0 2.6715.9444 3.0932 2.25H14V6H3v10h1.0698zM16 14.0007a3.24 3.24 0 0 1 1.2539-.2507c1.446 0 2.6715.9444 3.0933 2.25h.6567v-2.6848L17.9833 9H16v5.0007zM7.163 15.75c-.6903 0-1.25.5596-1.25 1.25s.5597 1.25 1.25 1.25c.6904 0 1.25-.5596 1.25-1.25s-.5596-1.25-1.25-1.25zm10.0909 0c-.6904 0-1.25.5596-1.25 1.25s.5596 1.25 1.25 1.25 1.25-.5596 1.25-1.25-.5596-1.25-1.25-1.25z"></path>
              </svg>
              <p class="textosMenu2 my-0 ms-2">08750</p>
            </div>
            <div class="ms-5 d-flex align-items-center"> 
              <svg width="24" height="24" viewBox="0 0 24 24" fill="black">
                <path fill-rule="evenodd" d="M22 20V4H2v16h20zM20 6H4v12h3v-8h10v8h3V6zm-9 6H9v6h2v-6zm2 6h2v-6h-2v6z"></path>
              </svg>
              <p class="textosMenu2 my-0 ms-2">Molins de Rei</p>
            </div> 
          </div>
        </section>
    
    
        <h1>Productos</h1>
        <form action=<?=url."?controller=producto&action=agregar"?> method="post">
            <button type="submit">Agregar</button>
        </form>

        <h2>Platos Principales</h2>
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
                </tr>
            <?php } ?>
            </table>

        <h2>Desayunos</h2>
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
                </tr>
            <?php } ?>
            </table>
        
        <h2>Entrantes</h2>
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
                </tr>
            <?php } ?>
            </table>

        <h2>Pizzas</h2>
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
                </tr>
            <?php } ?>
            </table>
    </div>
    </main>

    <footer>

    </footer>
</body>
</html>