// Obtiene la información actual del usuario (nombre, email, contraseña) desde elementos HTML <span>.
// Rellena campos de edición (<input>) con la información actual.
// Muestra campos de edición y oculta elementos <span> y otros elementos.
function editarInformacion() {

    // Obtener la información actual del usuario desde los elementos <span>
    let nombreActual = document.getElementById('nombre').textContent;
    let emailActual = document.getElementById('email').textContent;
    let passwordActual = document.getElementById('password').textContent;

    // Autorellenar los campos de edición con la información actual
    document.getElementById('inputNombre').value = nombreActual;
    document.getElementById('inputEmail').value = emailActual;

    // Mostrar los campos de edición y ocultar los elementos <span>
    document.querySelectorAll('span').forEach(span => span.style.display = 'none');
    document.querySelectorAll('.inputsUsuario').forEach(input => input.style.display = 'inline-block');
    document.getElementById('botones').style.display = 'block';
}

// Detiene el comportamiento predeterminado de un formulario al ser llamada con un evento.
// Muestra elementos <span> (mostrando la información actual).
// Oculta campos de edición.
// Restaura la información original en los elementos <span>.
function cancelarEdicion(event) {
    event.preventDefault(); // Esto detiene el comportamiento predeterminado del formulario

    document.querySelectorAll('span').forEach(span => span.style.display = 'inline');
    document.querySelectorAll('.inputsUsuario').forEach(input => input.style.display = 'none');
    document.getElementById('botones').style.display = 'none';

    // Autorellenar los campos de edición con la información original
    document.getElementById('nombre').innerHTML = nombreActual;
    document.getElementById('email').innerHTML = emailActual;
    document.getElementById('password').innerHTML = passwordActual;
}

// Obtiene los nuevos valores introducidos por el usuario en los campos de edición.
// Actualiza los elementos <span> con los nuevos valores introducidos.
// Llama a cancelarEdicion(), que oculta los campos de edición y muestra los elementos <span> con los valores actualizados.
function guardarCambios() {
    let nuevoNombre = document.getElementById('inputNombre').value;
    let nuevoEmail = document.getElementById('inputEmail').value;
    let nuevaPassword = document.getElementById('inputPassword').value;

    // Después de la actualización exitosa, actualiza los valores mostrados
    document.getElementById('nombre').textContent = nuevoNombre;
    document.getElementById('email').textContent = nuevoEmail;
    document.getElementById('password').textContent = nuevaPassword;
    cancelarEdicion(); // Vuelve a mostrar los textos y oculta los inputs
}
