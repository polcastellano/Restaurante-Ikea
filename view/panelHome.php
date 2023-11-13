<!DOCTYPE html>
<html lang="es">
<head>
    <title>IKEA</title>

    <meta charset="UTF-8">
    <meta name="description" content="Descripció web">
    <meta name="keywords" content="Paraules clau">
    <meta name="author" content="Autor">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/full_estil.css" rel="stylesheet" type="text/css" media="screen">

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
        <section class="mt-5 mb-5">
          <h2 class="textosTitulo mt-5 mb-5">Restaurante IKEA</h2>
          <div class="m-0 p-0 row">
            <div class="p-0 col-12 col-xl-6 pe-3">
              <p class="textosP">Comer no es solo alimentarse. 
              Es una excusa perfecta para reunir a familiares y amigos alrededor de una mesa. 
              Es el olor a café del desayuno, a bollería recién hecha. 
              Es toda una experiencia en conjunto.</p>
              <p class="textosP mt-5">Siempre puedes desayunar en nuestro restaurante para iniciar tus compras con energía, o descansar en él durante tu viaje en la tienda y aprovechar para comer algo rico. 
                La elección de alimentos saludables y equilibrados puede ser una experiencia que mejore nuestra calidad de vida. 
                Toda experiencia mejora con el estómago lleno.</p>
            </div>
            <div class="d-none d-xl-block col-xl-6 d-flex justify-content-end p-0 ps-3">
              <img width="100%" height="auto" src="./assets/images/homeImg/plato_mesa.jpg" alt="Imagen de una mesa vista desde arriba con un plato de comida encima">
            </div>
          </div>
        </section>
        <section class="mt-5 mb-5">
          <h2 class="textosTitulo mt-5 mb-5">Mejores productos del restaurante IKEA</h2>
          <div class="m-0 p-0 row">
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
          </div>
        </section>
        <section class="mb-5 section3marginTop">
          <div class="row m-0 p-0 justify-content-center">
            <div class="col-12 col-md-5 border-0 rounded-3 card m-4 fondoComerIKEA p-0">
              <div class="card-body paddingMarginCartasSeccion3">
                <div class="alturaTxtSeccion3">
                  <h5 class="titulosCartas2">Comer en IKEA</h5>
                  <p class="textosCartas2 mt-3">¿Ya sabes lo que vas a comer? Echa un vistazo a nuestros platos en el restaurante de tu tienda IKEA.</p>
                </div>
                <button type="button" class="colorBtnSeccion3 container-fluid btn btn-dark rounded-5 py-3">Visitar Restaurante</button>
              </div>
                <img class="card-img-bottom" src="./assets/images/homeImg/seccion31.jpg" alt="...">
            </div>
            <div class="col-12 col-md-5 border-0 rounded-3 card m-4 fondoComidaEcologica p-0">
              <div class="card-body paddingMarginCartasSeccion3">
                <div class="alturaTxtSeccion3">
                  <h5 class="titulosCartas2">Comida ecológica</h5>
                  <p class="textosCartas2 mt-3">¿Ya sabes lo que vas a comer? Echa un vistazo a nuestros platos en el restaurante de tu tienda IKEA.</p>
                </div>
                <button type="button" class="colorBtnSeccion3 container-fluid btn btn-dark rounded-5 py-3 ">Visitar Restaurante</button>
              </div>
              <img class="card-img-bottom" src="./assets/images/homeImg/seccion32.jpg" alt="...">
            </div>
          </div>
        </section>
      </div>
    </main>

    <footer>

    </footer>
</body>
</html>