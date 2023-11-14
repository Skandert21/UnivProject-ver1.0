<?php 

include "conectar.php";
include "top.php";
 ?>


 <!DOCTYPE html>
 <html>
 <head>
 	<title>INVERSIONES MERLI</title>
 </head>
 <body style="background-color: #e9e9e9">
 
<div class="col-xs-12">
	<div class="jaula" style="width: 50%">
	<h1>Nueva Unidad</h1>
	<br>
	<form method="post" action="RegistroUnidadHecho.php">
		<div class="container" style=" margin-bottom: 100px; padding: 20px; background-color: #fff; text-shadow: 0 0 30px #fff;
			       box-shadow: 0 0 20px #333">

		<label for="descripcion">Nombre:</label>
		<input placeholder="ingrese nombre de la Unidad" required id="descripcion" maxlength="20" pattern="[a-zA-Z ]+" name="unidad" cols="30" rows="5" class="form-control">
		<br><br><input class="btn_a" type="submit" value="Guardar">
		<a href="GestionarUnidad.php" class="cancel">Cancelar</a>
</div>
	</form>
</div>
</div>

 </body>
 </html>