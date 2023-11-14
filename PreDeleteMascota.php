<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php include "top.php";
 ?>
<div class="centrado"><h3>Indique el motivo de retiro de la mascota</h3></div>
<div class="jaula" > 
	<br>
<table class="table table-bordered">
	<form method="POST" action="DeleteMascota.php">
<input class ="form-control" required type="text" minlength="5" style=" width: 60%" name="motivo" placeholder="Indique aquí">
<input type="hidden" value="<?php echo $_POST['borrado'] ?>" name="borrado">
<br>
<button class="btn_a" style="margin-right: 4px" type="submit">Enviar</button>
<a class="cancel" href="VerMascotas.php">Cancelar</a>
</form>
</table>
</div>
</body>
</html>