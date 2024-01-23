document.addEventListener('DOMContentLoaded', function() {
    // Obtén el formulario por su ID o cualquier otro selector
    let formulario = document.getElementById('formReseña');

    let starContainer = document.getElementById('estrellas');
    let stars = starContainer.querySelectorAll('.star-icon');

    stars.forEach(function(star, index) {

        star.addEventListener('click', function() {
        resetStars();
        markStars(index);
        star.classList.add('active');
        document.getElementById('valoracion').value = index + 1; // Asigna el valor de la estrella al input hidden
        });
    });
    

    function resetStars() {
        stars.forEach(function(star) {
            star.classList.remove('active');
        });
    }
    
    function markStars(index) {
        for (let i = 0; i <= index; i++) {
            stars[i].classList.add('active');
        }
    }

    // Agrega un controlador de eventos para el evento 'submit' del formulario
    formulario.addEventListener('submit', function(event) {
        // Evita que el formulario se envíe automáticamente
        event.preventDefault();

        //Obtener los datos del formulario
        let comentario = document.getElementById('comentario').value;
        let valoracion = document.getElementById('valoracion').value;
        let pedido_id = document.getElementById('pedido_id').value;

        // Crear un objeto con los datos
        let datos = {
            accion: 'nuevaReseña',
            comentario: "\'"+comentario+"\'",
            valoracion: valoracion,
            pedido_id: pedido_id,
        };

        // Convertir el objeto a una cadena JSON
        let datosJSON = JSON.stringify(datos);

        // Realiza la solicitud a la API utilizando los datos del formulario
        fetch("http://localhost/DAW/ikea/?controller=api&action=api", {
            method: 'POST',
            headers: {
                'Content-Type':'application/json',
            },
            body: datosJSON,
        })
        .then(response => response.json())
        .then(data => {
            // Haz algo con la respuesta de la API si es necesario
            console.log(data);
        })
        .catch(error => {
            console.error(error);
        });
    });
});

function asignarEstrella(numero){
    valoracion = numero;
};