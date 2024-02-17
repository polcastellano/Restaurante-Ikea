document.addEventListener('DOMContentLoaded', function(){

    fetch("http://localhost/DAW/ikea/?controller=api&action=consultaProductos", {
        method : 'POST',
    })
    .then(response => {
    
        return response.json();
       
    })
    .then(data => {
        // console.log(data);
        mostrarProductos(data);

        // Obtén todos los formularios por su clase
        let formFav = document.getElementsByClassName('guardarFav');

        // Itera sobre cada formulario
        for (let i = 0; i < formFav.length; i++) {
            // Agrega un controlador de eventos para el evento 'submit' de cada formulario
            formFav[i].addEventListener('submit', function(event) {
                // Evita que el formulario se envíe automáticamente
                event.preventDefault();

                // Obtener los datos del formulario actual
                let producto_id = formFav[i].querySelector('#producto_id').value;
                let categoria_id = formFav[i].querySelector('#categoria_id').value;

                // Crear un objeto con los datos
                let datos = {
                    producto_id: producto_id,
                    categoria_id: categoria_id,
                };

                // Convertir el objeto a una cadena JSON
                let datosJSON = JSON.stringify(datos);
                // Realiza la solicitud a la API utilizando los datos del formulario
                fetch("http://localhost/DAW/ikea/?controller=producto&action=favorito", {
                    method: 'POST',
                    headers: {
                        'Content-Type':'application/json',
                    },
                    body: datosJSON,
                })
                .then(response => {
                    if (response.redirected) {
                        // Si la respuesta es una redirección, obtén la URL de redirección
                        const redirectedUrl = response.url;
                        // Redirige a la URL obtenida
                        window.location.href = redirectedUrl;
                    } else {
                        return response.text();
                    }
                })
                .catch(error => {
                    console.error(error);
                });

            });
        }


        // Obtén todos los formularios por su clase
        let formCarr = document.getElementsByClassName('guardarCarr');

        // Itera sobre cada formulario
        for (let i = 0; i < formCarr.length; i++) {
            // Agrega un controlador de eventos para el evento 'submit' de cada formulario
            formCarr[i].addEventListener('submit', function(event) {
                // Evita que el formulario se envíe automáticamente
                event.preventDefault();

                // Obtener los datos del formulario actual
                let producto_id = formCarr[i].querySelector('#producto_id').value;
                let categoria_id = formCarr[i].querySelector('#categoria_id').value;

                // Crear un objeto con los datos
                let datos = {
                    producto_id: producto_id,
                    categoria_id: categoria_id,
                };

                // Convertir el objeto a una cadena JSON
                let datosJSON = JSON.stringify(datos);
                // Realiza la solicitud a la API utilizando los datos del formulario
                fetch("http://localhost/DAW/ikea/?controller=producto&action=carrito", {
                    method: 'POST',
                    headers: {
                        'Content-Type':'application/json',
                    },
                    body: datosJSON,
                })
                .then(response => {
                    if (response.redirected) {
                        // Si la respuesta es una redirección, obtén la URL de redirección
                        const redirectedUrl = response.url;
                        // Redirige a la URL obtenida
                        window.location.href = redirectedUrl;
                    } else {
                        return response.text();
                    }
                })
                .catch(error => {
                    console.error(error);
                });

            });
        }


    })
    .catch(error => {
        console.error(error);
    });

});

// Función para guardar los filtros seleccionados en el localStorage
function guardarFiltrosSeleccionados() {
    const filtrosSeleccionados = [];
    // Obtiene todos los filtros marcados
    const allFiltros = document.querySelectorAll('.filtrosProd:checked');
    allFiltros.forEach(filtro => {
        filtrosSeleccionados.push(filtro.id);
    });
    // Guarda los filtros seleccionados en el localStorage
    localStorage.setItem('filtrosSeleccionados', JSON.stringify(filtrosSeleccionados));
}


//Array para guardar los productos y filtrar estos mismos
let arrayProductos;

function mostrarProductos(productos){
    arrayProductos = productos;
    buscarFiltros();
    
};

function buscarFiltros() {
    let allFiltros = document.querySelectorAll('.filtrosProd:checked');
    // Intenta obtener los filtros guardados del localStorage
    const filtrosGuardados = JSON.parse(localStorage.getItem('filtrosSeleccionados'));
    console.log(filtrosGuardados)

    allFiltros.forEach(filtro => {
        
        if (filtro.checked) {
            let arrayFiltrado = arrayProductos.filter((producto) => producto.categoria_id == filtro.id);
            montarProductos(arrayFiltrado);
            filtro.parentElement.classList.add('active');
            actualizarEstadoFiltro(filtro, true);
            
        }
        if(filtrosGuardados !== null && !filtrosGuardados.includes(filtro.id)){
                filtro.parentElement.classList.remove('active');
                actualizarEstadoFiltro(filtro, false);
                filtro.checked = false;
        }

        filtro.addEventListener('change', function(e) {
            if (this.checked) {
                filtro.parentElement.classList.add('active');
                actualizarEstadoFiltro(this, true);

            } else {
                // Verificar si aún hay algún filtro activo
                if (document.querySelectorAll('.filtrosProd:checked').length === 0) {
                    // Si no hay, volver a marcar este checkbox
                    this.checked = true;
                    notie.force({
                        type: 3,
                        text: 'Debe mínimo un filtro seleccionado',
                        buttonText: 'Continuar',
                      })
                } else {
                    filtro.parentElement.classList.remove('active');
                    actualizarEstadoFiltro(this, false);
                }
            }
            guardarFiltrosSeleccionados();
        });
    });
}

function actualizarEstadoFiltro(filtro, estado) {
    // Seleccionar el elemento seccion con la clase 'categoriaX'
    let seccion = document.querySelector('.categoria' + filtro.id);
    // Verificar si la sección existe
    if (seccion) {
        seccion.style.display = estado ? 'flex' : 'none';
        // Obtener el elemento h2 hermano anterior de la sección
        let h2Element = seccion.previousElementSibling;
        // Verificar si el elemento h2 existe
        if (h2Element && h2Element.tagName.toLowerCase() === 'h2') {
            h2Element.style.display = estado ? 'flex' : 'none';
        }
    }
}

function montarProductos(arrayFiltrado){
    let body = document.getElementById('productos');
    let seccion = document.createElement('section');
    seccion.classList.add('categoria'+arrayFiltrado[0]['categoria_id']);
    // Crear el elemento 'h2'
    let tituloCat = document.createElement('h2');
    // Obtener el padre de 'seccion'
    let parentElement = document.getElementById('productos');
    switch (arrayFiltrado[0]['categoria_id']){
        case 1:
            
            tituloCat.classList.add('mt-5', 'textosTituloCat');
            tituloCat.textContent = "Platos Principales";
            parentElement.appendChild(tituloCat);
            
            break;
        case 2:
            
            tituloCat.classList.add('mt-5', 'textosTituloCat');
            tituloCat.textContent = "Desayunos";
            parentElement.appendChild(tituloCat);
            break;
        case 3:
            
            tituloCat.classList.add('mt-5', 'textosTituloCat');
            tituloCat.textContent = "Entrantes";
            parentElement.appendChild(tituloCat);
            break;
        case 4:
            
            tituloCat.classList.add('mt-5', 'textosTituloCat');
            tituloCat.textContent = "Pizzas";
            parentElement.appendChild(tituloCat);
            break;
        default:
    }
    seccion.classList.add("contenido", "row", "p-0", "m-0", "mt-5");
    body.appendChild(seccion);
    arrayFiltrado.forEach( producto => {
        
        let contenidoProds = document.createElement('div');
        contenidoProds.classList.add("card", "border-0", "rounded-0", "border-bottom", "col-12", "col-sm-6", "col-md-4", "col-lg-3", "mb-5", "justify-content-center");
        contenidoProds.innerHTML = `
            <div class="mx-auto">
                <img style="width: 100%;" src="assets/images/foto_productos/${producto.img}" alt="${producto.descripcion}>"> 
            </div>                   
            <div class="card-body">
                <h5 class="card-title tituloProducto">${producto.nombre.toUpperCase()}</h5>
                <p class="card-text descProd">${producto.descripcion}</p>
                <div class="d-flex justify-content-between">
                    <span class="d-flex">
                        <p class="card-text precioEntProd">${producto.precioE}</p>
                        <p class="card-text precioDecProd">,${producto.precioD}€</p>
                    </span>
                    <div class="w-auto d-flex justify-content-end">
                        <form class="guardarFav" method="post">
                            <input id="producto_id" value="${producto.producto_id}" hidden />
                            <input id="categoria_id" value="${producto.categoria_id}" hidden />
                            <button type="submit" class="border-0 rounded-circle btnProdFav me-2">
                                <a>
                                <svg width="24" height="24" viewBox="0 0 24 24">
                                    <path d="M19.205 5.599c.9541.954 1.4145 2.2788 1.4191 3.6137 0 3.0657-2.2028 5.7259-4.1367 7.5015-1.2156 1.1161-2.5544 2.1393-3.9813 2.9729L12 20.001l-.501-.3088c-.9745-.5626-1.8878-1.2273-2.7655-1.9296-1.1393-.9117-2.4592-2.1279-3.5017-3.5531-1.0375-1.4183-1.8594-3.1249-1.8597-4.9957-.0025-1.2512.3936-2.5894 1.419-3.6149 1.8976-1.8975 4.974-1.8975 6.8716 0l.3347.3347.336-.3347c1.8728-1.8722 4.9989-1.8727 6.8716 0zm-7.2069 12.0516c.6695-.43 1.9102-1.2835 3.1366-2.4096 1.8786-1.7247 3.4884-3.8702 3.4894-6.0264-.0037-.849-.2644-1.6326-.8333-2.2015-1.1036-1.1035-2.9413-1.0999-4.0445.0014l-1.7517 1.7448-1.7461-1.7462c-1.1165-1.1164-2.9267-1.1164-4.0431 0-1.6837 1.6837-.5313 4.4136.6406 6.0156.8996 1.2298 2.0728 2.3207 3.137 3.1722a24.3826 24.3826 0 0 0 2.0151 1.4497z"></path>
                                </svg>
                                </a>
                            </button>
                        </form>
                        <form class="guardarCarr" method="post">
                            <input id="producto_id" value="${producto.producto_id}" hidden />
                            <input id="categoria_id" value="${producto.categoria_id}" hidden />
                            <button type="submit" class="border-0 rounded-circle btnProdCarrito me-2">
                                <a>
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="white">
                                        <path fill-rule="evenodd" d="M10.4372 4h3.1244l.2922.4801 3.3574 5.517h5.0694l-.3104 1.2425L21.5303 13h-2.0615l.2506-1.0029H4.2808l1.3106 5.2426a1 1 0 0 0 .9702.7574H15v2H6.5616c-1.3766 0-2.5766-.9369-2.9105-2.2724L2.03 11.2397l-.3107-1.2426H6.788l3.357-5.517L10.4372 4zm2.0003 2L14.87 9.9971H9.1291L11.5614 6h.8761zm5.5586 10v-2h2v2h2v2h-2v2h-2v-2h-2v-2h2z"></path>
                                    </svg>
                                </a>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        `;
        seccion.appendChild(contenidoProds);
    });
}