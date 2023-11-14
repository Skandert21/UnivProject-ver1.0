<?php  

include "conectar.php";
session_start();
$categoria = $_POST['categoria'];
$user_res = $_SESSION['username'];
$datetime = date('Y-m-d H:i:s');
$id_e = "insertar";
$conectar = new Conectar();
$c = $conectar->ConectarMetodo();



$sql = "INSERT INTO categoria (descripcion_cat) values ('$categoria')";
$res = mysqli_query($c, $sql);



$descripcion_dos = "El usuario ".$_SESSION["username"]." añadió la categoria *".$categoria."* en el área de productos satisfactoriamente";


$aud_datos = array($descripcion_dos, $id_e, $datetime, $user_res);
$a = new Auditoria();
$auditoria = $a->AuditoriaMetodoDos($aud_datos);

header("location: Inicio.php?status=1");









?>