//script para max length en numeros
	/*document.querySelectorAll('input[type="number"]').forEach(input=>{

		input.oninput = () =>{

			if(input.value.length > input.max) input.value = input.value.slice(0, input.max);
		}
	})

*/

function validarFormulario(event) {
  event.preventDefault();

  // Validar la cédula del cliente
  var idClienteInput = document.getElementById("id_cliente");
  var idClienteValue = idClienteInput.value;
  if (idClienteValue.length !== 7 && idClienteValue.length !== 8) {
    alert("La cédula debe tener 7 u 8 dígitos.");
    return;
  }
/*
  // Validar el nombre del cliente
  var nombreInput = document.getElementById("nombre");
  var nombreValue = nombreInput.value;
  if (!/^[A-Za-z ]+$/.test(nombreValue)) {
    alert("El nombre debe contener solo letras y espacios.");
    return;
  }
*/
  // Validar el teléfono del cliente
  var telefonoInput = document.getElementById("telefono_cliente");
  var telefonoValue = telefonoInput.value;
  if (telefonoValue.length !== 10) {
    alert("El teléfono debe tener 10 dígitos.");
    return;
  }
  if (!/^041[246]\d{7}$/.test(telefonoValue)) {
    alert("El teléfono debe empezar con 0414, 0412 o 0416.");
    return;
  }

  // Si llegamos hasta aquí, el formulario es válido y podemos enviarlo
  alert("El formulario se ha enviado correctamente.");
  event.target.submit();
}
