const form = document.getElementById('contactForm');

//escuchando el evento Submit
form.addEventListener('submit', function(event) {
    //detengo el envío del formulario
    event.preventDefault();
    //Al usar event.preventDefault();
    //detienes ese comportamiento automático, lo que te permite:
    //Capturar los datos del formulario manualmente.
    //enviarlos tú mismo
    //Mostrar resultados sin recargar la página.

    const formData = new FormData(form);
    //FormData: se usa para recoger todos los
    //de un formulario HTML y prepararlos para el envío
    //con fetch

    const name = formData.get('name').trim();
    const email = formData.get('email').trim();
    const phone = formData.get('phone').trim(); // NUEVO

    const errors = [];

    // Validación del lado cliente
    if (name === '') {
        errors.push("El nombre es obligatorio.");
    }

    if (email === '') {
        errors.push("El correo electrónico es obligatorio.");
    } else if (!/^\S+@\S+\.\S+$/.test(email)) {
        errors.push("Formato de correo inválido.");
    }

    // NUEVA VALIDACIÓN PARA TELÉFONO
    if (phone === '') {
        errors.push("El teléfono es obligatorio.");
    } else if (!/^\d{3}-\d{3}-\d{4}$/.test(phone)) {
        errors.push("Formato de teléfono inválido. Use 123-456-7890.");
    }

    const errorDiv = document.getElementById('errors');
    errorDiv.innerHTML = '';

    if (errors.length > 0) {
        errorDiv.innerHTML = errors.join("<br>");
        return;
    }

    fetch(form.action, {
        method: 'POST',
        body: formData
    })
    //then que maneja la repuesta del servidor 
    //después de enviar el formulario con fetch
    //=>response.text() convierte la respuesta 
    //servidor en texto plano
    //.then(data=>{ recibe el texto procesado})
    //Luego inserta ese texto dentro del 
    //elemento con id response en el HTML
    .then(response => response.text())
    .then(data => {
        document.getElementById('response').innerHTML = data;
        errorDiv.innerHTML = ''; // Limpiar errores si todo fue bien
    })
    .catch(error => {
        console.error('Error:', error);
    });
});
