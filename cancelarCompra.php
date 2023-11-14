<?php

session_start();

unset($_SESSION["carrito"]);
$_SESSION["carrito"] = [];


unset($_SESSION["id_p"]);
$_SESSION["id_p"] = [];




header("Location: ./VerProveedores.php?status=2");
?>