
<?php include_once "top.php" ?>
<body style=" background-color: #e9e9e9"> 
<div class="jaula" style="width: 50%;">
<div class="col-xs-12">
	
	<h1>Nuevo Cliente</h1>
	<form method="post" action="RegistroClienteVentaHecho.php">
		<br>
		<div style=" margin-bottom: 100px; padding: 20px; background-color: #fff; text-shadow: 0 0 30px #fff;
			       box-shadow: 0 0 20px #333">
		<label for="id"><strong>Cédula: </strong></label>
		<input class="form-control" name="id_c" min="1000000" max="40000000" title="el formato de cédula permitido es de xx.xxx.xxx o x.xxx.xxx" required minlength="7" maxlength="8" required type="number" id="id_C" placeholder="Escribe la cédula">

		<label for="nombre"><strong>Nombre:</strong></label>
		<input class="form-control" name="nombre_c" minlength="3" maxlength="10" required pattern="[A-Za-z ]+" required type="text" id="nombre_c" placeholder="Escriba el nombre">

		<label for="apellido"><strong>Apellido:</strong></label>
		<input class="form-control" name="apellido_c" minlength="3" maxlength="10" required pattern="[A-Za-z ]+" required type="text" id="apellido_C" placeholder="Escriba el apellido">

		<label for="telefono"><strong>Telefono</strong></label>
		<input class="form-control" name="telefono_c"  min="04000000000" max="04999999999" required minlength="10" maxlength="10" required type="number" id="telefono_c" placeholder="Ingrese el número de teléfono">
		<br><br><input class="btn_a" type="submit" value="Guardar">
		<td class="formularioesp"><a class ="cancel" href="VerClientesVentas.php"  style="text-decoration:none">Cancelar</a></td>


<script type="text/javascript" src="./js/validar.js">
	
</script>
	
	</form>
</div>
</div>
</div>


</body>
<!--Poner un IF para que el codigo no se repita-->