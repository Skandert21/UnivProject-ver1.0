<?php
include "conectar.php";
session_start();
$id = $_SESSION["userunlock"];
		$c = new SelectDatos();
		$conectar = $c->Buscador();


				$consulta_update=$conectar->prepare(' UPDATE user SET  
					
					
					estado=:estado


					WHERE id=:id;'
				);
				$consulta_update->execute(array(
					
					
					':estado' =>0,

					':id' =>$id
				));

				$e = new Conectar();
				$enlace = $e->ConectarMetodo();

                $sql = "SELECT * FROM user where id= $id";
                $res = mysqli_query($enlace, $sql);
                foreach ($res as $k) {
                	$uv = $k["username"];
                }

                $sql = "DELETE FROM validar where username_val = '$uv'";
                $res = mysqli_query($enlace, $sql);

                header("location: login.php?status=1");
?>