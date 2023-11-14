<?php
session_start();
include "conectar.php";
$c = new Conectar();
$enlace = $c->ConectarMetodo();

$id_con = $_SESSION['id_con'];

if (isset($id_con)) {
	
	$sql = "DELETE FROM consulta where id_consulta = '$id_con'";
	$resultado = mysqli_query($enlace, $sql);


	unset($_SESSION['id_con']);
	unset($_SESSION['TotalReal']);
	header("Location: VerConsultas.php");

}


?>
