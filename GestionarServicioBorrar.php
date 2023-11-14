<?php 
session_start();

$ids = $_GET['id_servicio'];
include "Conectar.php";
$c= new Conectar();
$conectar = $c->ConectarMetodo();

$sql = "SELECT *from consulta_detalle where id= '$ids' limit 1";
$resultado= mysqli_query($conectar, $sql);
foreach ($resultado as $key) {
	 $resta = $key['subtotal'];
}


$sql = "DELETE FROM consulta_detalle where id = '$ids'";
$resultado = mysqli_query($conectar, $sql);

header("Location: GestionarServicio.php");


 ?>