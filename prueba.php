

<link rel="stylesheet" href="./css/bootstrap.css">
<link rel="stylesheet" href="./css/body.css">
<?php
	
    include_once 'conectar.php';
session_start();
@$_SESSION["id_c"] = $_GET["id_c"];
@$weno = $_GET["id_c"];
@$_SESSION["id"] = $_GET["id"];
$olo =0;
 if( !empty($_SESSION["id_c"]) ){
			
				$consulta_update=$conectar->prepare(' UPDATE productos_vendidos SET  
					
					id_cliente=:id_cliente
					


					WHERE id_cliente=:id;'
				);
				$consulta_update->execute(array(
					
					':id_cliente' =>$weno,

					':id' =>$olo
				));
				echo "$olo";
				echo "$weno";
			} else {

				echo "noooooo";
				header('Location: VerMascotas.php');
			}

			