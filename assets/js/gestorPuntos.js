document.addEventListener('DOMContentLoaded', function(){
    let usuario_id = document.getElementById('usuario_id').value;

    // Crear un objeto con los datos
    let datos = {
        usuario_id: usuario_id,
    };

    // Convertir el objeto a una cadena JSON
    let datosJSON = JSON.stringify(datos);

    let formulario = document.getElementById('hacerPedido');

    // Agrega un controlador de eventos para el evento 'submit' del formulario
    formulario.addEventListener('submit', function(event) {
        // Evita que el formulario se envíe automáticamente
        event.preventDefault();

        let preciototal = document.getElementById('inputPrecioDescuento').value;
        let puntos = document.getElementById('puntos').value;
        let puntosUsados = document.getElementById('puntosUsados').value;
        
        // Crear un objeto con los datos
        let datos = {
            preciototal: preciototal,
            puntos: puntos,
            puntosUsados: puntosUsados,
        };

        // Convertir el objeto a una cadena JSON
        let datosJSON = JSON.stringify(datos);

        // Realiza la solicitud a la API utilizando los datos del formulario
        fetch("http://localhost/DAW/ikea/?controller=pedido&action=confirmar", {
            method: 'POST',
            headers: {
                'Content-Type':'application/json',
            },
            body: datosJSON,
        })
        .then(response => response.text())
        .then(data => {
            location.href = "http://localhost/DAW/ikea/?controller=usuario";
        })
        .catch(error => {
            console.error(error);
        });
    });

    fetch("http://localhost/DAW/ikea/?controller=api&action=conseguirPuntos", {
        method : 'POST',
        headers: {
            'Content-Type':'application/json',
        },
        body: datosJSON,
    })
    .then(response => {
        return response.json();
    })
    .then(data => {
        asignarPuntos(data);
        actualizarPrecio();

        
    })
    .catch(error => {
        console.error(error);
    });

});

function asignarPuntos(totalPuntos){
    // Obtener el valor de 'puntos' del primer objeto en el arreglo
    let puntos = totalPuntos[0].puntos;

    // Asignar el valor de 'puntos' al elemento
    document.getElementById('tusPoints').value = puntos;

    document.getElementById('tusPoints2').textContent = puntos;

    let precioPedido = document.getElementById('inputPrecioPed').value;
    precioPedido = precioPedido * 1000;
    let inputPuntos = document.getElementById('tusPoints');
    let puntosUtilizados = document.getElementById('tusPoints3');
    
    if(precioPedido > puntos){
        inputPuntos.setAttribute('max', puntos);
    }else{
        inputPuntos.setAttribute('max', precioPedido);
    }
    
    inputPuntos.value = 0;
    puntosUtilizados.textContent = 'Puntos utilizados: ' + inputPuntos.value;
    inputPuntos.addEventListener('input', function(){
        puntosUtilizados.textContent = 'Puntos utilizados: ' + inputPuntos.value;
        actualizarPrecio();
    });
};

function actualizarPrecio(){
    let puntos = document.getElementById('tusPoints');
    calcularPrecio();
    
    puntos.onkeyup = () => {
        
        calcularPrecio();
    };

    puntos.onchange = () => {
        
        calcularPrecio();
    };
};

function calcularPrecio(){
    let puntos = document.getElementById('tusPoints');
    let puntosUsados = document.getElementById('puntosUsados');
    let inputPrecioTotal = document.getElementById('inputPrecioTotal');
    let inputPrecioDescuento = document.getElementById('inputPrecioDescuento');
    let precioDescuento = document.getElementById('precioDescuento');

    let descuento = puntos.value / 1000;

    let preciototal = inputPrecioTotal.value - descuento;
    
    if(descuento > inputPrecioTotal.value){
        preciototal = 0;
    };
    let precioFormat = preciototal.toFixed(2).replace(".", "'");
    precioDescuento.innerHTML = precioFormat + " €";

    inputPrecioDescuento.value = preciototal.toFixed(2);

    puntosUsados.value = puntos.value;
};


    // Obtener referencia al checkbox
    let propinasCheckbox = document.getElementById('quieresPropina');

    // Obtener referencia al botón de 3%
    let btn3Porciento = document.getElementById('btn3Porciento');

    // Obtener referencia al div de botones de propina
    let botonesPropinaDiv = document.getElementById('botonesPropina');

    // Agregar evento change al checkbox
    propinasCheckbox.addEventListener('change', function() {
        // Mostrar u ocultar el div de botones de propina según el estado del checkbox
        if (propinasCheckbox.checked) {
            botonesPropinaDiv.style.display = 'flex'; // Mostrar el div
            document.getElementById('tituloPropina').textContent = 'Propinas'; // Cambiar el texto
        } else {
            botonesPropinaDiv.style.display = 'none'; // Ocultar el div
            document.getElementById('tituloPropina').textContent = 'Quieres dejar propina?'; // Restaurar el texto
        }
    });

    // Obtener referencia a todos los botones de propina
    let botonesPropina = document.querySelectorAll('.btnPropina');

    // Agregar evento click a cada botón de propina
    botonesPropina.forEach(function(boton) {
        // Agregar la clase 'active' al botón de 3%
    btn3Porciento.classList.add('active');
        boton.addEventListener('click', function() {
            // Quitar la clase 'active' de todos los botones
            botonesPropina.forEach(function(boton) {
                boton.classList.remove('active');
            });
            // Agregar la clase 'active' al botón clickeado
            boton.classList.add('active');
        });
    });