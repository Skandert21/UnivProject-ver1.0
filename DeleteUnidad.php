<?php 


include "conectar.php";
session_start();
$id_unit = $_POST['borrado'];
$id_e = "eliminar";
$datetime = date('Y-m-d H:i:s');
$user_res = $_SESSION["username"];

$c = new Conectar();
$conectar = $c->ConectarMetodo();

#verifica si hay productos on esta cat
$sql = "SELECT * FROM productos where unidad = '$id_unit'";
$res = mysqli_query($conectar, $sql);
foreach ($res as $idp) {
$idcheck = $idp['unidad'];
}
if ($idcheck == $id_unit) {
	header("Location: GestionarUnidad.php?status=3");
} else {
#datos para la auditoria
	$sql = "SELECT * FROM unidad_producto where id = '$id_unit'";
$res = mysqli_query($conectar, $sql);
foreach ($res as $cat) {
$desc = $cat['descripcion_u'];
}


$descripcion_dos = "El usuario ".$_SESSION["username"]." eliminó la categoria ".$desc." en el área de productos satisfactoriamente";

$aud_datos = array($descripcion_dos, $id_e, $datetime, $user_res);
$a = new Auditoria();
$auditoria = $a->AuditoriaMetodoDos($aud_datos);

$sql = "DELETE FROM unidad_producto where id = '$id_unit'";
$res = mysqli_query($conectar, $sql);

header("Location: inicio.php?status=1");

}

 ?>