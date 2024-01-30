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
    .then(response => response.text())
    .then(data => {
        asignarPuntos(data);
    })
    .catch(error => {
        console.error(error);
    });

});

function asignarPuntos(totalPuntos){
    console.log(totalPuntos);
    // Obtener el valor de 'puntos' del primer objeto en el arreglo
    let puntos = totalPuntos[0].puntos;

    // Obtener el elemento con el id 'tusPuntos'
    let inputPuntos = document.getElementById('tusPuntos');

    // Asignar el valor de 'puntos' al elemento
    inputPuntos.value = puntos;
};