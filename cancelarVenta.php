<?php

session_start();

unset($_SESSION["carritoV"]);
$_SESSION["carritoV"] = [];


unset($_SESSION["id_c"]);
$_SESSION["id_c"] = [];

unset($_SESSION["nombre_c"]);
$_SESSION["nombre_c"] = [];


unset($_SESSION["apellido_c"]);
$_SESSION["apellido_c"] = [];



header("Location: ./VerClientesVentas.php?status=2");
?>