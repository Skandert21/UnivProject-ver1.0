<?php
session_start();
include "conectar.php";
$_SESSION["id"];


$e = new Conectar();
$enlace = $e->ConectarMetodo();

$c = new SelectDatos();
		$conectar = $c->Buscador();



$_POST["preguntauno"];
$_POST["preguntados"];
$_POST["preguntatres"];

#$preguntas = array($_POST["preguntauno"], $_POST["preguntados"], $_POST["preguntatres"]);


$_POST["respuestauno"];
$_POST["respuestados"];
$_POST["respuestatres"];

#$respuestas = array($_POST["respuestauno"], $_POST["respuestados"], $_POST["respuestatres"]);

#$idxd = array($_SESSION["id"],$_SESSION["id"],$_SESSION["id"]);





$sql = "INSERT INTO preguntas_seguridad (id_user, pregunta_uno, respuesta_uno, pregunta_dos, respuesta_dos, pregunta_tres, respuesta_tres) values ('$_SESSION[id]', '$_POST[preguntauno]', '$_POST[respuestauno]','$_POST[preguntados]', '$_POST[respuestados]', '$_POST[preguntatres]', '$_POST[respuestatres]')";
$res = mysqli_query($enlace, $sql);



$consulta_update=$conectar->prepare(' UPDATE user SET  
					
					estado=:estado


					WHERE id=:id;'
				);
				$consulta_update->execute(array(
					
					':estado' =>0,

					':id' =>$_SESSION["id"]
				));

$_SESSION["estado"] = 0;
header("location:inicio.php");


?>
