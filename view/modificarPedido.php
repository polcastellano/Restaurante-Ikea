<form action=<?=url."?controller=producto&action=actualizar"?> method="post">
    <input name="producto_id" value="<?= $plato->getProducto_id()?>"  />
    </br>
    <input name="categoria_id" value="<?= $plato->getCategoria_id()?>"  />
    </br>
    <input name="nombre" value="<?= $plato->getNombre()?>"  />
    </br>
    <input name="precio" value="<?= $plato->getPrecio()?>"  />
    
    <button type="submit">Actualizar</button>
</form>