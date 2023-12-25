function editarInformacion() {
    document.querySelectorAll('span').forEach(span => span.style.display = 'none');
    document.querySelectorAll('input').forEach(input => input.style.display = 'inline-block');
    document.getElementById('botones').style.display = 'block';
}

function cancelarEdicion() {
    document.querySelectorAll('span').forEach(span => span.style.display = 'inline');
    document.querySelectorAll('input').forEach(input => input.style.display = 'none');
    document.getElementById('botones').style.display = 'none';
}

function guardarCambios() {
    const nuevoNombre = document.getElementById('inputNombre').value;
    const nuevoEmail = document.getElementById('inputEmail').value;
    const nuevaPassword = document.getElementById('inputPassword').value;

    // Aquí debes enviar los nuevos valores a través de una petición AJAX o del método que uses para actualizar los datos en el backend

    // Después de la actualización exitosa, actualiza los valores mostrados
    document.getElementById('nombre').textContent = nuevoNombre;
    document.getElementById('email').textContent = nuevoEmail;
    document.getElementById('password').textContent = nuevaPassword;

    cancelarEdicion(); // Vuelve a mostrar los textos y oculta los inputs
}
