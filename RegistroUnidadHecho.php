<?php  

include "conectar.php";
session_start();
$unidad = $_POST['unidad'];
$user_res = $_SESSION['username'];
$datetime = date('Y-m-d H:i:s');
$id_e = "insertar";
$conectar = new Conectar();
$c = $conectar->ConectarMetodo();



$sql = "INSERT INTO unidad_producto (descripcion_u) values ('$unidad')";
$res = mysqli_query($c, $sql);



$descripcion_dos = "El usuario ".$_SESSION["username"]." añadió la unidad de medida para un producto: *".$unidad."* en el área de productos satisfactoriamente";


$aud_datos = array($descripcion_dos, $id_e, $datetime, $user_res);
$a = new Auditoria();
$auditoria = $a->AuditoriaMetodoDos($aud_datos);

header("location: Inicio.php?status=1");









?>