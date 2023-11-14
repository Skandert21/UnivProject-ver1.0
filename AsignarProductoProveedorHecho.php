<?php
include "conectar.php";
$producto = $_POST["producto"];
$proveedor = $_POST["proveedor"];

if (!$proveedor) {

header("location: AsignarProductoProveedor.php?id=$producto&status=2");

} else{

$c = new Conectar();
$conectar = $c->ConectarMetodo();
$sql = "INSERT INTO producto_proveedor (id_prov, id_prod) values ('$proveedor', '$producto') ";
$res = mysqli_query($conectar, $sql);
header("location: inicio.php?status=1");

}








?>