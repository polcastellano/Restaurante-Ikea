    <main>
        <div class="contenido">
            <h2 class="textosTitulo mt-5 mb-5">Reseñas</h2>
            <div id="contenidoPagina" class="d-flex">
                <section class="col-6 col-md-8" id="resenas">

                </section>
                <section class="col ps-3">
                    <div class="elementoLista1 p-3">
                        <h3 class="filtrarReseñaTitulo m-0 align-items-center d-flex">Filtrar reseñas</h3>
                    </div>
        
        
                    <form id="filtroReseña" method="POST">
                        <div class="row m-0 col-4">
                            <label class="mt-4 p-0">Valoración:</label>
                            <div id="estrellas" class="d-flex mb-4 p-0">

                                <input id="valoracion" hidden />
                                
                                <div id="1" class="hoverEstrellas" onclick="asignarEstrella(1)">
                                    <svg  width="20" height="20" class="star-icon">
                                        <path d="m11.9999 6 2.1245 3.6818 4.1255.9018-2.8125 3.1773L15.8626 18l-3.8627-1.7182L8.1372 18l.4252-4.2391-2.8125-3.1773 4.1255-.9018L11.9999 6z"></path>
                                    </svg>
                                </div>
                                <div id="2" class="hoverEstrellas" onclick="asignarEstrella(2)">
                                    <svg width="20" height="20" class="star-icon">
                                        <path d="m11.9999 6 2.1245 3.6818 4.1255.9018-2.8125 3.1773L15.8626 18l-3.8627-1.7182L8.1372 18l.4252-4.2391-2.8125-3.1773 4.1255-.9018L11.9999 6z"></path>
                                    </svg>
                                </div>
                                <div id="3" class="hoverEstrellas" onclick="asignarEstrella(3)">
                                    <svg width="20" height="20" class="star-icon">
                                        <path d="m11.9999 6 2.1245 3.6818 4.1255.9018-2.8125 3.1773L15.8626 18l-3.8627-1.7182L8.1372 18l.4252-4.2391-2.8125-3.1773 4.1255-.9018L11.9999 6z"></path>
                                    </svg>
                                </div>
                                <div id="4" class="hoverEstrellas" onclick="asignarEstrella(4)">
                                    <svg width="20" height="20" class="star-icon">
                                        <path d="m11.9999 6 2.1245 3.6818 4.1255.9018-2.8125 3.1773L15.8626 18l-3.8627-1.7182L8.1372 18l.4252-4.2391-2.8125-3.1773 4.1255-.9018L11.9999 6z"></path>
                                    </svg>
                                </div>
                                <div id="5" class="hoverEstrellas" onclick="asignarEstrella(5)">
                                    <svg width="20" height="20" class="star-icon">
                                        <path d="m11.9999 6 2.1245 3.6818 4.1255.9018-2.8125 3.1773L15.8626 18l-3.8627-1.7182L8.1372 18l.4252-4.2391-2.8125-3.1773 4.1255-.9018L11.9999 6z"></path>
                                    </svg>
                                </div>
                            </div>
                            <label class="mt-4 p-0">Ordenar:</label>
                            <div id="ordenacion" class="d-flex mb-4 p-0">

                                <input id="orden" hidden />

                                <div class="rounded-circle iconosOrden d-flex justify-content-center align-items-center" onclick="asignarOrden('asc')">
                                    <svg width="24" height="24">
                                        <path d="M11.9999 17.0605 3.9992 9.0593l1.4142-1.4141L12 14.2322l6.5869-6.586 1.4141 1.4143-8.0011 8z"></path>
                                    </svg>
                                </div>
                                <div class="ms-3 rounded-circle iconosOrden d-flex justify-content-center align-items-center" onclick="asignarOrden('desc')">
                                    <svg width="24" height="24">
                                        <path d="m12.0001 6.9394 8.0007 8.0013-1.4142 1.4141L12 9.7678l-6.5869 6.586-1.414-1.4143 8.001-8z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </main>

        
<script src="./assets/js/reseñas.js"></script>
</body>