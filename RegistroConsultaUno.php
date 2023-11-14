<?php

if(!$_POST["id_perro"]) {

	
	header("Location: InsertarConsulta.php?status=2");
} else{


include "conectar.php";
#$idd = $_POST["id_dueno"];
$idp = $_POST["id_perro"];
$obs = $_POST['obs'];

$c= new Conectar();
$enlace = $c->ConectarMetodo();



if ($obs == "") {
	$obs = "No se realizaron observaciones";
}

	$sql = "SELECT * FROM detalle_perro WHERE id_perro = '$idp'";
	$resultado = mysqli_query($enlace, $sql);
	foreach ($resultado as $key) {
		$idd = $key['id_dueno'];
	}


$sql = "INSERT INTO consulta (id_dueno, id_perro, observacion) values ('$idd','$idp','$obs')";
$resultado = mysqli_query($enlace, $sql);
header("Location: RegistroConsultaDos.php");
}
?>