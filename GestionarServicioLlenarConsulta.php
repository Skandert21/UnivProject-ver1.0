<?php 
session_start();
include "conectar.php";
$c = new Conectar();
$conectar = $c->ConectarMetodo();
$observacion = $_POST['observacion'];
$total = $_POST['total'];

$sql = "INSERT INTO consulta_detalle(id_con,servicio,subtotal) values('$id_con','$observacion','$total')";
$resultado = mysqli_query($conectar, $sql);


 ?>