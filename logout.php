<?php

session_start();
include "conectar.php";
$datetime = date('Y-m-d h:i:s');
$user_res = $_SESSION['username'];
$descripcion = "El usuario ".$_SESSION["username"]." cerró sesión el ".$datetime;
$id_e = "salir";
$aud_datos = array($descripcion, $id_e, $datetime, $user_res);
$auditoria = new Auditoria();
$auditoria->AuditoriaMetodo($aud_datos)==3;

include "ps.bat";
include "./res/respaldo.php";

$_SESSION = array();

session_destroy();





 
header("location: login.php");
exit;
?>