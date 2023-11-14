<?php

if( !isset($_POST["id_perro"]) ||  !isset($_POST["id_dueno"])) echo "Algo salió mal. Por favor verifica que la info exista";

include_once "conectar.php";

$sentencia = $conectar->prepare("INSERT INTO detalle_perro (id_dueño, id_perro) VALUES (  ?, ?);");



$resultado = $sentencia->execute([ $idd, $idp2]);




if($resultado === TRUE){
	header("Location: ./inicio.php");
	exit;
}

#te borra todo, no mentira, te suelta este mensaje
else echo "Algo salió mal. Por favor verifica que la información sea correcta $idd y $idp2 ";

?>