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
        
        // Obtener referencia al botón de 3%
        let btn3Porciento = document.getElementById('btn3Porciento');
        let botonesPropina = document.querySelectorAll('.btnPropina');
        let botonSeleccionado;

        // Obtener referencia al div de botones de propina
        let botonesPropinaDiv = document.getElementById('botonesPropina');

        // Agregar evento change al checkbox
        propinasCheckbox.addEventListener('change', function() {
            // Mostrar u ocultar el div de botones de propina según el estado del checkbox
            if (propinasCheckbox.checked) {
                botonesPropinaDiv.style.display = 'flex'; // Mostrar el div
                document.getElementById('tituloPropina').textContent = 'Propinas'; // Cambiar el texto
                botonesPropina.forEach(function(boton) {
                    boton.classList.remove('active');
                });
                btn3Porciento.classList.add('active');
                botonSeleccionado = btn3Porciento.value;
                propina = calcularDescuentoPropina(botonSeleccionado);
                calcularPrecio(propina);
                tusPropinas.textContent = 'Propina: ' + propina + ' €';
            } else {
                botonesPropinaDiv.style.display = 'none'; // Ocultar el div
                document.getElementById('tituloPropina').textContent = 'Quieres dejar propina?'; // Restaurar el texto
                propina = 0;
                calcularPrecio(propina);
                tusPropinas.textContent = '';
            }
        }); 

        // Agregar la clase 'active' al botón de 3%
        btn3Porciento.classList.add('active');
        botonSeleccionado = btn3Porciento.value;
        let propina = calcularDescuentoPropina(botonSeleccionado);
        let tusPropinas = document.getElementById('tusPropinas');
        tusPropinas.textContent = 'Propina: ' + propina + ' €';
        botonesPropina.forEach(function(boton) {
            
            boton.addEventListener('click', function() {
                botonesPropina.forEach(function(boton) {
                    boton.classList.remove('active');
                });
                boton.classList.add('active');
                botonSeleccionado = boton.value;
                propina = calcularDescuentoPropina(botonSeleccionado);
                tusPropinas.textContent = 'Propina: ' + propina + ' €';
                calcularPrecio(propina);
            });
        });
            
        calcularPrecio(propina);
        
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
        propina = 0;
        calcularPrecio(propina);
    });
};

function calcularPrecio(propina) {
    let puntos = document.getElementById('tusPoints');
    let puntosUsados = document.getElementById('puntosUsados');
    let inputPrecioTotal = document.getElementById('inputPrecioTotal');
    let inputPrecioDescuento = document.getElementById('inputPrecioDescuento');
    let precioDescuento = document.getElementById('precioDescuento');

    let descuento = puntos.value / 1000;

    let preciototal = parseFloat(inputPrecioTotal.value) - descuento; // Convertir a número flotante

    preciototal += parseFloat(propina); // Sumar la propina al precio total

    preciototal = preciototal.toFixed(2); // Redondear a dos decimales
    let precioFormat = preciototal.replace(".", "'"); // Reemplazar el punto decimal con comillas simples

    precioDescuento.innerHTML = precioFormat + " €"; // Mostrar el precio con el formato deseado en el HTML

    inputPrecioDescuento.value = preciototal; // Establecer el valor del input con el precio total

    puntosUsados.value = puntos.value; // Establecer el valor de los puntos usados
}  

// Obtener referencia al checkbox
let propinasCheckbox = document.getElementById('quieresPropina');
function calcularDescuentoPropina(botonSeleccionado) {
    let descPropinas = 0;
    if (propinasCheckbox.checked) {
        descPropinas = (botonSeleccionado / 100) * inputPrecioTotal.value;
        return parseFloat(descPropinas.toFixed(2));
    }else{
        descPropinas = 0;
        return parseFloat(descPropinas.toFixed(2));
    }
}