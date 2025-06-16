# Lab_ValidacionesFormulario
Validación de formularios con PHP y JavaScript usando Fetch API
Punto 3
1. ¿Qué validaciones se aplican?
R: Validación de campos requeridos y validación de formato de email

2. ¿Qué pasa si no se valida bien?
R: Se bloquea el envío del formulario y se lanza un mensaje de error específico (ej: "name is required" o "Invalid email format").
El usuario recibe feedback inmediato sobre qué campo debe corregir, gracias a las excepciones capturadas en el código.

3. ¿Qué hace fetch()?
R: El método fetch() se encarga de:
Enviar los datos del formulario (mediante FormData) al servidor sin recargar la página (AJAX).
Recibir la respuesta del servidor (ej: mensajes de éxito/error).

4. ¿Cómo se recibe y muestra la respuesta?
Cuando el usuario envía el formulario, fetch() realiza una petición POST al servidor (ej: process.php) con los datos del formulario. La respuesta del servidor (mensajes de éxito, errores de validación, etc.) se recibe como texto plano gracias a response.text(). Este texto se inserta directamente en el elemento HTML con ID response (un div en la página), mostrando así el feedback al usuario sin recargar la página.
