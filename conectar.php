<?php

include "./class/class.php";


 $conectar = new Conectar();

if ($conectar->conectarMetodo()) {
	echo "";

	
}else {

	echo "Fallo al conectar";
	include "FalloAlConectar.php";
}
	
?>