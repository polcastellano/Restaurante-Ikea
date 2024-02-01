document.addEventListener('DOMContentLoaded', function(){
    let usuario_id = document.getElementById('usuario_id').value;

    // Crear un objeto con los datos
    let datos = {
        usuario_id: usuario_id,
    };

    // Convertir el objeto a una cadena JSON
    let datosJSON = JSON.stringify(datos);

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
    let inputPrecioTotal = document.getElementById('inputPrecioTotal');
    let inputPrecioDescuento = document.getElementById('inputPrecioDescuento');
    let precioDescuento = document.getElementById('precioDescuento');

    let descuento = puntos.value / 1000;

    let preciototal = inputPrecioTotal.value - descuento;
    
    if(descuento > inputPrecioTotal.value){
        preciototal = 0;
    };
    precioDescuento.innerHTML = preciototal.toFixed(2);

    inputPrecioDescuento.value = preciototal.toFixed(2);
};