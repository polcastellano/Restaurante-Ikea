<body> 
    <main>
        <div class="contenido">
        <section class="mt-5 mb-5">
          <h2 class="textosTitulo mt-5 mb-5">Restaurante IKEA</h2>
          <article class="m-0 p-0 row">
            <div class="p-0 col-12 col-xl-6 pe-3">
              <p class="textosP">Comer no es solo alimentarse. 
              Es una excusa perfecta para reunir a familiares y amigos alrededor de una mesa. 
              Es el olor a café del desayuno, a bollería recién hecha. 
              Es toda una experiencia en conjunto.</p>
              <p class="textosP mt-5">Siempre puedes desayunar en nuestro restaurante para iniciar tus compras con energía, o descansar en él durante tu viaje en la tienda y aprovechar para comer algo rico. 
                La elección de alimentos saludables y equilibrados puede ser una experiencia que mejore nuestra calidad de vida. 
                Toda experiencia mejora con el estómago lleno.</p>
            </div>
            <div class="d-none d-xl-block col-xl-6 d-flex justify-content-end p-0 ps-3 mb-5">
              <img width="100%" height="auto" src="./assets/images/homeImg/plato_mesa.jpg" alt="Imagen de una mesa vista desde arriba con un plato de comida encima">
            </div>
          </article>
        </section>
        <section class="mt-5 mb-5">
          <h2 class="textosTitulo mt-5 mb-5">Mejores productos del restaurante IKEA</h2>
          <article class="m-0 p-0 row">
            <div class="p-0 col-12 col-xl-7">
              <p class="textosP">Los menús están disponibles de lunes a vie rnes excepto festivos 
                (salvo el menú merienda/cena, disponible todos los días a partir de las 17:00) 
                *Consulta la disponibilidad de los platos en el Restaurante de tu tienda IKEA</p>
            </div>
            <div class="row row-cols-1 row-cols-md-3 g-3 p-0 m-0">
                <div class="col">
                  <a href="#" class="mejoresProductos">   
                    <div class="altoCartas pb-5">
                      <img src="./assets/images/homeImg/codillo.jpg" class="card-img-top" alt="Imagen de un codillo con patatas">
                      <div class="mt-5 px-4">
                        <div class="alturaTxtSeccion2">
                          <h5 class="titulosCartas">Codillo asado en su jugo</h5>
                          <p class="textosCartas mt-3">Codillo de cerdo con patatas fritas. 
                          Precio habitual: 10,49€</p>
                      </div>
                        <div class="rounded-circle d-flex justify-content-center btn_flecha">
                          <svg fill="white" width="24px" heigth="24px" viewBox="0 0 24 24">
                            <path d="m20.0008 12.0001-8-8.001-1.4143 1.414L16.1727 11H4v2h12.1723l-5.5868 5.5866 1.4141 1.4142 8.0012-8.0007z">
                            </path>
                            </svg>
                        </div>
                      </div>
                    </div>
                  </a> 
                </div>
              <div class="col">
                <a href="#" class="mejoresProductos">   
                  <div class="altoCartas pb-5">
                    <img src="./assets/images/homeImg/alitas.jpg" class="card-img-top" alt="Imagen de unas alitas de pollo">
                    <div class="mt-5 px-4">
                      <div class="alturaTxtSeccion2">
                        <h5 class="titulosCartas">Alitas de pollo</h5>
                        <p class="textosCartas mt-3">Disfruta estas 5 alitas de pollo con salsa barbacoa
                        por tan solo 3,99€</p>
                      </div>
                      <div class="rounded-circle d-flex justify-content-center btn_flecha">
                        <svg fill="white" width="24px" heigth="24px" viewBox="0 0 24 24">
                          <path d="m20.0008 12.0001-8-8.001-1.4143 1.414L16.1727 11H4v2h12.1723l-5.5868 5.5866 1.4141 1.4142 8.0012-8.0007z">
                          </path>
                          </svg>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
              <div class="col">
                <a href="#" class="mejoresProductos">   
                  <div class="altoCartas pb-5">
                    <img src="./assets/images/homeImg/desayuno_esca.jpg" class="card-img-top" alt="Imagen de un rollito de canela y un café">
                    <div class="mt-5 px-4">
                      <div class="alturaTxtSeccion2">
                        <h5 class="titulosCartas">Desayuno escandinavo</h5>
                        <p class="textosCartas mt-3">Tómate un rollito de canela + café por solo 0,99€</p>
                      </div>
                      <div class="rounded-circle d-flex justify-content-center btn_flecha">
                        <svg fill="white" width="24px" heigth="24px" viewBox="0 0 24 24">
                          <path d="m20.0008 12.0001-8-8.001-1.4143 1.414L16.1727 11H4v2h12.1723l-5.5868 5.5866 1.4141 1.4142 8.0012-8.0007z">
                          </path>
                          </svg>
                      </div>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </article>
        </section>
        <section class="mb-5 section3marginTop">
          <article class="row m-0 p-0 justify-content-center">
            <div class="col-12 col-md-8 col-lg-5 border-0 rounded-3 card m-4 fondoComerIKEA p-0">
              <div class="card-body paddingMarginCartasSeccion3">
                <div class="alturaTxtSeccion3">
                  <h5 class="titulosCartas2">Comer en IKEA</h5>
                  <p class="textosCartas2 mt-3">¿Ya sabes lo que vas a comer? Echa un vistazo a nuestros platos en el restaurante de tu tienda IKEA.</p>
                </div>
                <a href="<?=url."?controller=producto&action=carta"?>">
                  <button type="button" class="colorBtnSeccion3 container-fluid btn btn-dark rounded-5 py-3">Ver carta</button>
                </a>
              </div>
                <img class="card-img-bottom" src="./assets/images/homeImg/seccion31.jpg" alt="...">
            </div>
            <div class="col-12 col-md-8 col-lg-5 border-0 rounded-3 card m-4 fondoComidaEcologica p-0">
              <div class="card-body paddingMarginCartasSeccion3">
                <div class="alturaTxtSeccion3">
                  <h5 class="titulosCartas2">Comida ecológica</h5>
                  <p class="textosCartas2 mt-3">¿Ya sabes lo que vas a comer? Echa un vistazo a nuestros platos en el restaurante de tu tienda IKEA.</p>
                </div>
                <a href="<?=url."?controller=producto&action=carta"?>">
                  <button type="button" class="colorBtnSeccion3 container-fluid btn btn-dark rounded-5 py-3 ">Ver carta</button>
                </a>
              </div>
              <img class="card-img-bottom" src="./assets/images/homeImg/seccion32.jpg" alt="...">
            </div>
          </article>
        </section>
      </div>
    </main>