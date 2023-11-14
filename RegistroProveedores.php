<?php include_once "top.php" ?>
<body style="background-color: #e9e9e9">
<div class="jaula" style="width: 50%;">
<div class="col-xs-12">
	<h1 class="centrado">Nuevo Proveedor</h1>
	<br>
	<br>
	<div style="margin-bottom: 100px; padding: 20px; background-color: #fff; text-shadow: 0 0 30px #fff;
			       box-shadow: 0 0 20px #333">
	<form method="post" action="RegistroProveedorHecho.php">
		
		<label for="id_p"><strong>ID de proveedor:</strong></label>
		<input class="form-control" name="id_p" min="1000000" max="40000000000" title="el formato de documento permitido es entre 6 y 9 digitos" required minlength="8" maxlength="9" required type="number" id="id_p" placeholder="Escribe la cédula">

		<label for="nombre_p"><strong>Nombre de proveedor:</strong></label>
		<input class="form-control" name="nombre_p"  maxlength="35" required pattern="[A-Za-z ]+" required type="text" id="nombre_p" placeholder="Escriba el nombre">

		<label for="telefono_p"><strong>Telefono:</strong></label>
		<input class="form-control" name="telefono_p" min="04000000000" max="04999999999" required minlength="10" maxlength="10" required type="number" id="telefono_p" placeholder="Ingrese el número de teléfono">
		<br><br><input class="btn_a" type="submit" value="Guardar">
		<a class="cancel" href="VerProveedores.php">Cancelar</a>


	

	</form>
</div>
</div>
</body>


<!--Poner un IF para que el codigo no se repita-->