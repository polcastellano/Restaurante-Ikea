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