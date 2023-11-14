<?php
if(!isset($_GET["indice"])) return;
$indice = $_GET["indice"];

session_start();
array_splice($_SESSION["carritoV"], $indice, 1);
header("Location: ./NuevaVenta.php?status=3");
?>