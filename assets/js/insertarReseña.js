document.addEventListener('DOMContentLoaded', function() {

    // Agrega un controlador de eventos para el evento 'submit' del formulario
    formulario.addEventListener('submit', function(event) {
        // Evita que el formulario se envíe automáticamente
        event.preventDefault();

        //Obtener los datos del formulario
        let comentario = document.getElementById('comentario').value;
        let valoracion = document.getElementById('valoracion').value;
        let pedido_id = document.getElementById('pedido_id').value;
        let usuario_id = document.getElementById('usuario_id').value;

        // Crear un objeto con los datos
        let datos = {
            comentario: comentario,
            valoracion: valoracion,
            pedido_id: pedido_id,
            usuario_id: usuario_id,
        };

        // Convertir el objeto a una cadena JSON
        let datosJSON = JSON.stringify(datos);

        // Realiza la solicitud a la API utilizando los datos del formulario
        fetch("http://localhost/DAW/ikea/?controller=api&action=addResena", {
            method: 'POST',
            headers: {
                'Content-Type':'application/json',
            },
            body: datosJSON,
        })
        .then(response => response.text())
        .then(data => {
            // Haz algo con la respuesta de la API si es necesario
            resetStars();
            let comentario = document.getElementById('comentario');
            comentario.value = "";
            setTimeout(() =>{
                location.reload();
            },3000);
            
        })
        .catch(error => {
            console.error(error);
        });
    });
});

// Obtén el formulario por su ID o cualquier otro selector
let formulario = document.getElementById('formReseña');

let starContainer = document.getElementById('estrellas');
let stars = starContainer.querySelectorAll('.star-icon');

let seleccionado;
let estrellaSeleccionada;



stars.forEach(function(star, index) {
    
    star.addEventListener('click', function() {
    resetStars(stars);
    markStars(index);
    estrellaSeleccionada = index + 1;
    star.classList.add('active');
    document.getElementById('valoracion').value = index + 1; // Asigna el valor de la estrella al input hidden
    seleccionado = index;
    });

    document.getElementsByClassName('hoverEstrellas')[index].addEventListener('mouseover', function() {
        resetStars(stars);
        markStars(this.id);
        if (seleccionado == true) {
            resetStars(stars);
            markStars(estrellaSeleccionada);
        }
    });

    document.getElementsByClassName('hoverEstrellas')[index].addEventListener('mouseout', function() {
        resetStars(stars);
        markStars(estrellaSeleccionada);
        if(seleccionado == true){
            resetStars(stars);
            markStars(estrellaSeleccionada);
        }
    });
});

function markStars(index) {
    for (let i = 0; i < index; i++) {
        stars[i].classList.add('active');
    }
}


function resetStars() {
    stars.forEach(function(star) {
        star.classList.remove('active');
    });
}

function asignarEstrella(numero){
    valoracion = numero;
};

let reseña = document.getElementById('dejarReseña');
reseña.addEventListener('click', function(){
    notie.alert({ type: 1, text: 'La reseña se ha insertado correctamente!', time: 3 })
});