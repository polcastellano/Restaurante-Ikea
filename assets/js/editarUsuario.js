let nombreOriginal, emailOriginal, passwordOriginal;
function editarInformacion() {
    // Obtener la información actual del usuario desde los elementos <span>
    nombreOriginal = document.getElementById('nombre').textContent;
    emailOriginal = document.getElementById('email').textContent;
    passwordOriginal = document.getElementById('password').textContent;

    // Obtener la información actual del usuario desde los elementos <span>
    let nombreActual = document.getElementById('nombre').textContent;
    let emailActual = document.getElementById('email').textContent;
    let passwordActual = document.getElementById('password').textContent;

    // Autorellenar los campos de edición con la información actual
    document.getElementById('inputNombre').value = nombreActual;
    document.getElementById('inputEmail').value = emailActual;
    document.getElementById('inputPassword').value = passwordActual;

    // Mostrar los campos de edición y ocultar los elementos <span>
    document.querySelectorAll('span').forEach(span => span.style.display = 'none');
    document.querySelectorAll('.inputsUsuario').forEach(input => input.style.display = 'inline-block');
    document.getElementById('botones').style.display = 'block';
}


function cancelarEdicion(event) {
    event.preventDefault(); // Esto detiene el comportamiento predeterminado del formulario

    document.querySelectorAll('span').forEach(span => span.style.display = 'inline');
    document.querySelectorAll('.inputsUsuario').forEach(input => input.style.display = 'none');
    document.getElementById('botones').style.display = 'none';

    // Autorellenar los campos de edición con la información original
    document.getElementById('nombre').innerHTML = nombreOriginal;
    document.getElementById('email').innerHTML = emailOriginal;
    document.getElementById('password').innerHTML = passwordOriginal;
}

function guardarCambios() {
    let nuevoNombre = document.getElementById('inputNombre').value;
    let nuevoEmail = document.getElementById('inputEmail').value;
    let nuevaPassword = document.getElementById('inputPassword').value;

    // Aquí debes enviar los nuevos valores a través de una petición AJAX o del método que uses para actualizar los datos en el backend

    // Después de la actualización exitosa, actualiza los valores mostrados
    document.getElementById('nombre').textContent = nuevoNombre;
    document.getElementById('email').textContent = nuevoEmail;
    document.getElementById('password').textContent = nuevaPassword;

    cancelarEdicion(); // Vuelve a mostrar los textos y oculta los inputs
}
