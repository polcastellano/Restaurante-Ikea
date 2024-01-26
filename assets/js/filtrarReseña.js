document.addEventListener('DOMContentLoaded', function(){

    // Obtén el formulario por su ID o cualquier otro selector
    let formulario = document.getElementById('filtroReseña');


    formulario.addEventListener('submit', function(event) {
        // Evita que el formulario se envíe automáticamente
        event.preventDefault();
        
        let starContainer = document.getElementById('estrellas');
        let stars = starContainer.querySelectorAll('.star-icon');

        stars.forEach(function(star, index) {

            star.addEventListener('click', function() {
            resetStars();
            markStars(index);
            star.classList.add('active');
            document.getElementById('valoracion').value = index + 1; // Asigna el valor de la estrella al input hidden
            console.log(index);
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
    });
});