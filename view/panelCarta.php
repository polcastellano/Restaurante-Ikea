<body>
    
    <main>
    <div class="contenido">    
    
        <h2 class="textosTitulo mt-5 mb-5">Restaurante en Molins de Rei</h2>

        <section class="pt-3 pb-4 border-bottom d-flex">
            <?php $index = 1; foreach (ProductoDAO::getAllCategorias() as $categoria){ ?>
                <div class="form-check checkBoxFiltros rounded-5 pe-4 py-2 me-2">
                    <label class="form-check-label" for="<?= $index?>">
                        <?= $categoria[0]?>
                    </label>
                    <input class="form-check-input filtrosProd" type="checkbox" value="<?= $categoria[0]?>" id="<?= $index?>" checked hidden>
                </div>
            <?php $index++; } ?>
        </section>

        <div id="productos">
            
        </div>

    </div>
    </main>
    <script src="./assets/js/filtroProductos.js"></script>
    <script src="https://unpkg.com/notie"></script>

</body>