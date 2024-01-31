document.addEventListener('DOMContentLoaded', function(){
    let usuario_id = document.getElementById('usuario_id').value;

    // Crear un objeto con los datos
    let datos = {
        usuario_id: usuario_id,
    };

    // Convertir el objeto a una cadena JSON
    let datosJSON = JSON.stringify(datos);

    actualizarPrecio();

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
    let inputPrecioDescuento = document.getElementById('inputPrecioDescuento');
    let precioDescuento = document.getElementById('precioDescuento');


    let puntosSeleccionados = puntos.value;
        
    let descuento = puntosSeleccionados / 100;

    let preciototal = inputPrecioDescuento.value - descuento;
    
    if(descuento > inputPrecioDescuento.value){
        preciototal = 0;
    }
    precioDescuento.innerHTML = `<?= CalculadoraPrecios::formatPrecios(CalculadoraPrecios::calcularPrecioPedido(${preciototal}) ?>€`;
    
    puntos.onchange = () => {
        
        puntosSeleccionados = puntos.value;
        
        descuento = puntosSeleccionados / 100;

        preciototal = inputPrecioDescuento.value - descuento;
        
        if(descuento > inputPrecioDescuento.value){
            preciototal = 0;
        }
        precioDescuento.innerHTML = `<?= CalculadoraPrecios::formatPrecios(CalculadoraPrecios::calcularPrecioPedido(${preciototal}) ?>€`;
    };
}