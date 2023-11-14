//script para max length en numeros
	document.querySelectorAll('input[type="number"]').forEach(input=>{

		input.oninput = () =>{

			if(input.value.length > input.maxLength) input.value = input.value.slice(0, input.maxLength);
		}
	})