<?php include_once "top.php"; ?>

<link rel="stylesheet" href="./css/bootstrap.css">
<link rel="stylesheet" href="./css/body.css">
<link rel="stylesheet" href="./css/top.css">



<!DOCTYPE html>
<html >
<head>
	<title>INVERSIONES MERLIZ</title>
</head>

<body style="background-color: #e9e9e9">
<h2 class ="centrado">Registro de mascotas</h2>

<br>
<div class="jaula" style="margin: 60px; margin-bottom: 100px; padding: 20px; background-color: #fff; text-shadow: 0 0 30px #fff;
			       box-shadow: 0 0 20px #333">
<form action="RegistroMascotaHecho.php" method="POST">
<!--
<label for="id_perro">ID de la mascota</label>
<input class ="form-control" id="id_perro" name="id_perro"  min="100000000" max="9999999999" required type ="number"  placeholder="id de la mascota" autocomplete="off">
-->
<label for="indice_mascota"><strong>Indice de la mascota:</strong></label>
<input class ="form-control" id="indice_mascota" min="1" max="999" minlength="1" maxlength="4" name="indice_mascota" required type ="number" placeholder="Indice de la mascota" autocomplete="off">

<label for="nombre_perro"><strong>Nombre de la mascota:</strong></label> 
<input class ="form-control" id="nombre_perro" minlength="3" maxlength="15" required pattern="[A-Za-z ]+" name="nombre_perro" required type ="text"  placeholder="Nombre de la mascota" autocomplete="off">


<label for="raza_perro"><strong>Tipo de mascota:</strong></label>
<input class = "form-control" id="raza_perro" minlength="3" maxlength="20" required pattern="[A-Za-z ]+" name="tipo_perro" required type ="text" placeholder="Tipo de mascota" autocomplete="off">

<label for="raza_perro"><strong>Raza de la mascota:</strong></label>
<input class = "form-control" id="raza_perro" minlength="3" maxlength="20" required pattern="[A-Za-z ]+" name="raza_perro" required type ="text" placeholder="Raza de la mascota" autocomplete="off">

<label for="observaciones"><strong>Observaciones:</strong></label>
<textarea   id="observaciones" name="observaciones" placeholder="observaciones" cols="30" rows="5" class="form-control" autocomplete="off"></textarea>

<br>

<script type="text/javascript" src="./js/validar.js">
	
</script>

<label for="id_dueno">Escoja un dueño</label>
<!--

<input class = "form-control" id="id_dueno" name="id_dueno" required type ="text" value="ci" autocomplete="off">
-->

<?php
#include ("conectar.php");
$dis = "";
$opt = "";

#$conectar = conectar();

$sql = "SELECT * FROM cliente where c_check = 0";
$c = new SelectDatos();
$conectar = $c->Buscador();
$variable ="";
$stmt = $conectar->prepare($sql);
$result = $stmt->execute();
$cosos=$stmt->fetchAll(\PDO::FETCH_OBJ);

if (isset($_GET['dueno'])) {
	$dueno = $_GET['dueno'];
	$dis = "style='background-color: #ddd; color: #999;' readonly value = '$dueno'";

$sql = "SELECT * FROM cliente where c_check = 0 and id_cliente = '$dueno'";
$c = new SelectDatos();
$conectar = $c->Buscador();

$stmt = $conectar->prepare($sql);
$result = $stmt->execute();
$cosos=$stmt->fetchAll(\PDO::FETCH_OBJ);

}
?>

<select class ="caja"  id="id_dueno" name="id_dueno">

<?php

foreach ($cosos as $coso) {
	
if (isset($_GET['dueno'])) { ?>


<option selected=""  name="id_dueno" value="<?php print($coso->id_cliente);?>"><?php print($coso->id_cliente).","."\n".($coso->nombre_cliente)."\n".($coso->apellido_cliente);?>
</option>
<?php
} else{


?>
<option  name="id_dueno" value="<?php print($coso->id_cliente);?>"><?php print($coso->id_cliente).","."\n".($coso->nombre_cliente)."\n".($coso->apellido_cliente);?>
</option>


 
   <?php 
}

}?>

</select>
</tr>

<br>
<br>

<tr><button class="btn_a" style="margin-left: 50px" type="submit" >Enviar</button></tr>
<a style="margin-left: ;" class="cancel" href="VerClientes.php">Volver</a>




</form>
</div>

</body>
</html>

<?php include_once 'pie.php' ?>