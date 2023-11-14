<?php 


include "conectar.php";
session_start();
$id_cat = $_POST['borrado'];
$id_e = "eliminar";
$datetime = date('Y-m-d H:i:s');
$user_res = $_SESSION["username"];

$c = new Conectar();
$conectar = $c->ConectarMetodo();

#verifica si hay productos on esta cat
$sql = "SELECT * FROM productos where id_cat = '$id_cat'";
$res = mysqli_query($conectar, $sql);
foreach ($res as $idp) {
$idcheck = $idp['id_cat'];
}
if ($idcheck == $id_cat) {
	header("Location: GestionarCategorias.php?status=3");
} else {
#datos para la auditoria
	$sql = "SELECT * FROM categoria where id_cat = '$id_cat'";
$res = mysqli_query($conectar, $sql);
foreach ($res as $cat) {
$desc = $cat['descripcion_cat'];
}


$descripcion_dos = "El usuario ".$_SESSION["username"]." eliminó la categoria ".$desc." en el área de productos satisfactoriamente";

$aud_datos = array($descripcion_dos, $id_e, $datetime, $user_res);
$a = new Auditoria();
$auditoria = $a->AuditoriaMetodoDos($aud_datos);

$sql = "DELETE FROM categoria where id_cat = '$id_cat'";
$res = mysqli_query($conectar, $sql);

header("Location: inicio.php?status=1");

}

 ?>