<!DOCTYPE html>
<html lang="en">
<head>
<title>IKEA</title>

<meta charset="UTF-8">
<meta name="description" content="Descripció web">
<meta name="keywords" content="Paraules clau">
<meta name="author" content="Autor">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/css/cabecera.css" rel="stylesheet" type="text/css" media="screen">
<link href="assets/css/carrito.css" rel="stylesheet" type="text/css" media="screen">
<link href="assets/css/colores.css" rel="stylesheet" type="text/css" media="screen">
<link href="assets/css/favoritos.css" rel="stylesheet" type="text/css" media="screen">
<link href="assets/css/footer.css" rel="stylesheet" type="text/css" media="screen">
<link href="assets/css/fuentes.css" rel="stylesheet" type="text/css" media="screen">
<link href="assets/css/general.css" rel="stylesheet" type="text/css" media="screen">
<link href="assets/css/home.css" rel="stylesheet" type="text/css" media="screen">
<link href="assets/css/login.css" rel="stylesheet" type="text/css" media="screen">
<link href="assets/css/modificarProductos.css" rel="stylesheet" type="text/css" media="screen">
<link href="assets/css/productos.css" rel="stylesheet" type="text/css" media="screen">
<link href="assets/css/query.css" rel="stylesheet" type="text/css" media="screen">
<link href="assets/css/resenas.css" rel="stylesheet" type="text/css" media="screen">
<link rel="icon" href="assets/images/logo.svg" type="image/svg">

<link rel="stylesheet" type="text/css" href="https://unpkg.com/notie/dist/notie.min.css">
<!-- script para utilizar el notieJS -->


<!-- Incluye la biblioteca QRCodeJS desde jsDelivr -->
<script src="https://cdn.jsdelivr.net/gh/davidshimjs/qrcodejs/qrcode.min.js"></script>


</head>

<body>
  <header>
        <div class="container-fluid contenido header">
          <div class="row align-items-center msg-header">
              <div class="col-12 col-md-4 d-flex justify-content-center">
                <a href="#" class="d-flex link-underline link-underline-opacity-0 link-underline-opacity-100-hover link-light">
                  <svg class="headerIcons me-2" viewBox="0 0 24 24" fill="white">
                    <path d="M1 4h15v3h3.0246l3.9793 5.6848V18h-2.6567c-.4218 1.3056-1.6473 2.25-3.0933 2.25-1.446 0-2.6715-.9444-3.0932-2.25h-3.9044c-.4217 1.3056-1.6472 2.25-3.0932 2.25S4.4916 19.3056 4.0698 18H1V4zm3.0698 12c.4218-1.3056 1.6473-2.25 3.0933-2.25 1.446 0 2.6715.9444 3.0932 2.25H14V6H3v10h1.0698zM16 14.0007a3.24 3.24 0 0 1 1.2539-.2507c1.446 0 2.6715.9444 3.0933 2.25h.6567v-2.6848L17.9833 9H16v5.0007zM7.163 15.75c-.6903 0-1.25.5596-1.25 1.25s.5597 1.25 1.25 1.25c.6904 0 1.25-.5596 1.25-1.25s-.5596-1.25-1.25-1.25zm10.0909 0c-.6904 0-1.25.5596-1.25 1.25s.5596 1.25 1.25 1.25 1.25-.5596 1.25-1.25-.5596-1.25-1.25-1.25z"></path>
                  </svg>
                  <p class="m-0">Envíos gratis a partir de 10€</p>
                </a> 
              </div>
              <div class="col-md-4 d-flex justify-content-center ocultos">
                <a href="#" class="d-flex link-underline link-underline link-underline-opacity-0 link-underline-opacity-100-hover link-light">
                  <svg class="headerIcons me-2" viewBox="0 0 24 24" fill="white">
                    <path d="M8.8537 15.1459c1.7878 1.7878 4.1511 3.0648 5.9849 3.8667 1.227.5365 2.6806.1958 3.7192-.8428l1.1086-1.1087-3.3672-2.2897-.6809.6809c-.4336.4337-1.1097.6959-1.8154.4933-.7847-.2253-2.2164-.7943-3.5855-2.1634-1.3691-1.3691-1.938-2.8008-2.1634-3.5855-.2026-.7057.0596-1.3818.4933-1.8155l.6809-.6808-2.2897-3.3672-1.1087 1.1086C4.7912 6.4804 4.4505 7.934 4.987 9.161c.8019 1.8337 2.0789 4.1971 3.8667 5.9849zm5.1836 5.6991c-1.9323-.8449-4.5553-2.2423-6.5979-4.2849-2.0425-2.0425-3.4399-4.6655-4.2848-6.5978-.9168-2.0965-.2653-4.4084 1.261-5.9347l1.9632-1.9631 1.534.1448L11.3473 7.26l-.1198 1.2694-1.2198 1.2199c.1809.5804.6195 1.6143 1.6239 2.6187s2.0383 1.443 2.6187 1.6239l1.2199-1.2198 1.2694-.1199 5.0507 3.4346.1448 1.534-1.9631 1.9632c-1.5263 1.5263-3.8383 2.1778-5.9347 1.261z"></path>
                  </svg>
                  <p class="m-0">Comprar por teléfono</p>
                </a>
              </div>
              <div class="col-md-4 d-flex justify-content-center ocultos">
                <a href="#" class="d-flex link-underline link-underline link-underline-opacity-0 link-underline-opacity-100-hover link-light">
                  <img class="me-2" src="assets/images/calendario.png" alt="Icono calendario">
                  <p class="m-0">Reserva ahora tu mesa</p>
                </a>  
              </div>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg contenido container-fluid">
          <div class="container-fluid p-0">
            <a href="<?=url."?controller=producto"?>" class="navbar-brand me-3">
              <img src="assets/images/logo.svg" alt="Logo IKEA">
            </a>
            <div class="ocultos col-4 col-md-6 col-lg-8">
              <form class="d-flex" role="search">
                <div class="d-flex container-fluid justify-content-start align-items-center fondoBuscador rounded-5">
                  <svg class="ms-2" width="24" height="24" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M13.98 15.395a6.294 6.294 0 111.414-1.414l4.602 4.601-1.414 1.414-4.602-4.601zm.607-5.101a4.294 4.294 0 11-8.587 0 4.294 4.294 0 018.587 0z" fill="currentColor"></path>
                  </svg>  
                  <input class="form-control me-2 border-0 bg-transparent py-2" type="search" placeholder="¿Qué es lo que buscas?" aria-label="Search">
                </div>
              </form>
            </div>
            
            <div class="d-flex justify-content-end">
              <a href="<?= url . "?controller=usuario&action=logUsuarios" ?>">
                <div class="position-relative">
                  <div class="rounded-circle iconosBusqueda d-flex justify-content-center align-items-center">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="black" >
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M10.6724 6.4678c.2734-.2812.6804-.4707 1.3493-.4707.3971 0 .705.0838.9529.2225.241.1348.4379.3311.5934.6193l.0033.006c.1394.2541.237.6185.237 1.1403 0 .7856-.2046 1.2451-.4796 1.5278l-.0048.005c-.2759.2876-.679.4764-1.334.4764-.3857 0-.6962-.082-.956-.2241-.2388-.1344-.4342-.3293-.5888-.6147-.1454-.275-.2419-.652-.2419-1.1704 0-.7902.2035-1.2442.4692-1.5174zm1.3493-2.4717c-1.0834 0-2.054.3262-2.7838 1.0766-.7376.7583-1.0358 1.781-1.0358 2.9125 0 .7656.1431 1.483.4773 2.112l.0031.0058c.3249.602.785 1.084 1.3777 1.4154l.0062.0035c.5874.323 1.2368.4736 1.9235.4736 1.0818 0 2.0484-.3333 2.7755-1.0896.7406-.7627 1.044-1.786 1.044-2.9207 0-.7629-.1421-1.4784-.482-2.0996-.3247-.6006-.7844-1.0815-1.376-1.4125-.5858-.3276-1.2388-.477-1.9297-.477zM6.4691 16.8582c.2983-.5803.7228-1.0273 1.29-1.3572.5582-.3191 1.2834-.5049 2.2209-.5049h4.04c.9375 0 1.6626.1858 2.2209.5049.5672.3299.9917.7769 1.29 1.3572.3031.5896.4691 1.2936.4691 2.1379v1h2v-1c0-1.1122-.2205-2.1384-.6904-3.0523a5.3218 5.3218 0 0 0-2.0722-2.1769c-.9279-.5315-2.0157-.7708-3.2174-.7708H9.98c-1.1145 0-2.2483.212-3.2225.7737-.8982.5215-1.5928 1.2515-2.0671 2.174C4.2205 16.8577 4 17.8839 4 18.9961v1h2v-1c0-.8443.166-1.5483.4691-2.1379z"></path>
                    </svg>
                  </div>
                </div>
              </a> 
              <a href="<?= url . "?controller=producto&action=irFavorito" ?>" class="ms-2">
                <div class="position-relative d-flex align-items-center">
                  <div class="rounded-circle iconosBusqueda d-flex justify-content-center align-items-center">
                    <svg width="24" height="24" viewBox="0 0 24 24">
                      <path d="M19.205 5.599c.9541.954 1.4145 2.2788 1.4191 3.6137 0 3.0657-2.2028 5.7259-4.1367 7.5015-1.2156 1.1161-2.5544 2.1393-3.9813 2.9729L12 20.001l-.501-.3088c-.9745-.5626-1.8878-1.2273-2.7655-1.9296-1.1393-.9117-2.4592-2.1279-3.5017-3.5531-1.0375-1.4183-1.8594-3.1249-1.8597-4.9957-.0025-1.2512.3936-2.5894 1.419-3.6149 1.8976-1.8975 4.974-1.8975 6.8716 0l.3347.3347.336-.3347c1.8728-1.8722 4.9989-1.8727 6.8716 0zm-7.2069 12.0516c.6695-.43 1.9102-1.2835 3.1366-2.4096 1.8786-1.7247 3.4884-3.8702 3.4894-6.0264-.0037-.849-.2644-1.6326-.8333-2.2015-1.1036-1.1035-2.9413-1.0999-4.0445.0014l-1.7517 1.7448-1.7461-1.7462c-1.1165-1.1164-2.9267-1.1164-4.0431 0-1.6837 1.6837-.5313 4.4136.6406 6.0156.8996 1.2298 2.0728 2.3207 3.137 3.1722a24.3826 24.3826 0 0 0 2.0151 1.4497z"></path>
                    </svg>
                  </div>
                  <!-- Verifica si hay elementos en favoritos para mostrar el contador -->
                  <?php if(count($_SESSION['favoritos']) >= 1){?>
                  <span class="position-absolute top-10 start-100 translate-middle badge rounded-pill iconoCarritoFavoritos">
                    <?= count($_SESSION['favoritos'])?>
                  </span>
                  <?php }?>
                </div>
              </a> 
              <a href="<?= url."?controller=producto&action=irCarrito" ?>" class="ms-2">
                <div class="position-relative d-flex align-items-center">
                  <div class="rounded-circle iconosBusqueda d-flex justify-content-center align-items-center">
                    <svg width="24" height="24" viewBox="0 0 24 24">
                      <path fill-rule="evenodd" d="M10.9994 4h-.5621l-.2922.4802-3.357 5.517h-5.069l.3107 1.2425 1.6212 6.4851c.334 1.3355 1.5339 2.2724 2.9105 2.2724h10.8769c1.3766 0 2.5765-.9369 2.9104-2.2724l1.6213-6.4851.3106-1.2425h-5.0695l-3.3574-5.517L13.5618 4h-2.5624zm3.8707 5.9972L12.4376 6h-.8761L9.1292 9.9972h5.7409zm-9.2787 7.2425-1.3106-5.2425h15.4384l-1.3106 5.2425a1 1 0 0 1-.9701.7575H6.5615a1 1 0 0 1-.97-.7575z"></path>
                    </svg>
                  </div>
                  <!-- Verifica si hay elementos en el carrito para mostrar el contador -->
                  <?php if(count($_SESSION['selecciones']) >= 1){?>
                  <!-- Contador de elementos en el carrito -->
                  <span class="position-absolute top-10 start-100 translate-middle badge rounded-pill iconoCarritoFavoritos">
                    <?php
                    // Calcula la cantidad total de elementos en el carrito
                    $cantidadTotal = 0;
                      foreach ($_SESSION['selecciones'] as $pedido){
                        $cantidadTotal += $pedido->getCantidad();
                      }?>
                    <?= $cantidadTotal?>
                  </span>
                  <?php }?>
                </div>
              </a>

              <button class="navbar-toggler ms-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
            </div>
              

          </div>
        </nav>

        <nav class="navbar navbar-expand-lg contenido container-fluid">
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item me-sm-3">
                <a href=<?=url."?controller=producto"?> class="link-dark link-underline-opacity-0 link-underline-opacity-100-hover"><p class="textosMenu my-0">Inicio</p></a>
              </li>
              <li class="nav-item me-sm-3">
              <a href=<?=url."?controller=producto&action=carta"?> class="link-dark link-underline-opacity-0 link-underline-opacity-100-hover"><p class="textosMenu my-0">Carta</p></a>
              </li>
              <li class="nav-item me-sm-3">
              <a href=<?=url."?controller=resena"?> class="link-dark link-underline-opacity-0 link-underline-opacity-100-hover"><p class="textosMenu my-0">Reseñas</p></a>
              </li>
            </ul>
            </div>
        </nav>


        <div class="contenido">
          <section class="border-bottom pb-3 d-flex align-items-center ">
            <div class="col-md-12 d-flex justify-content-end align-items-center">
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
        </div>
    </header>

<script src="./assets/js/bootstrap.bundle.min.js"></script>