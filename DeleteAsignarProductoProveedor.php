<?php 
include "conectar.php";

$idborrado = $_POST["borrado"];
$producto = $_POST["producto"];

$e = new Conectar();
$enlace = $e->ConectarMetodo();
$i = "";
$sql = "SELECT * FROM producto_proveedor where id_prod = '$producto'";
$res = mysqli_query($enlace, $sql);
foreach ($res as $k) {
	$provs = $k["id_prov"];
     $i++;

}


if ($i == 1) {

#Impide que borres el ultimo proveedor registrado a un producto

header("location: AsignarProductoProveedor.php?id=$producto&status=15");
} else {
#lo borra
$sql = "DELETE FROM producto_proveedor where id_prov = '$idborrado' and id_prod = '$producto'";
$res = mysqli_query($enlace, $sql);
header("location: Inicio.php?status=1");
}
 ?>