<?php
	include_once 'conectar.php';
	include 'top.php';

	@session_start();


if (isset($_POST['btn_buscar'])) {

	$buscar_text=$_POST['buscar'];
		
$select_buscar=$conectar->prepare('SELECT *FROM user WHERE username LIKE :campo;');
	$select_buscar->execute(array(
			':campo' =>"%".$buscar_text."%"
		));

		$resultado=$select_buscar->fetchAll();
if (!$resultado) {?>
	   <div class="alert alert-warning">
							<strong>¡Vaya, no hay ningún usuario registrado con ese nombre!</strong>
						</div>
	 <?php }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>INVERSIONES MERLI</title>
	<link rel="stylesheet" href="./css/bootstrap.css">
<link rel="stylesheet" href="./css/body.css">
<link rel="stylesheet" href="./css/top.css">
</head>
<body>
	<div class="contenedor">
		<h2 class="centrado">Panel de usuario de <?php echo $_SESSION["username"]; ?> </h2>

	<?php	if(isset($_GET["status"])){
				if($_GET["status"] === "3"){
					?><br>
						<div class="alert alert-warning">
							
							<strong>¡Los nombres de usuario no pueden repetirse!</strong>
						</div>
					<?php
				 }
				 } ?>
	
		
		<div class="jaula"><td class="formularioesp"><a href="EditarPreguntasDeSeguridad.php?id=<?php echo $_SESSION["id"]; ?>"  class="success" >Editar preguntas de seguridad</a>

        <td class="formularioesp"><a href="EditarDatosUsuario.php?id=<?php echo $_SESSION["id"]; ?>"  class="success" >Editar usuario</a></td>
		</td></div>
		<table class="table table-bordered">
			<thead>
			<tr class="head">
				</thead>
			</tr>
			


<br>
<br>
			</tr>



		</table>
<br>
<br>
		
		<br>
	</div>
</body>
</html>