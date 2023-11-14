<?php
	include_once 'conectar.php';
     include_once 'top.php';
	if(isset($_GET['id_cliente'])){
		$id_cliente=(int) $_GET['id_cliente'];

		$c = new SelectDatos();
		$conectar = $c->Buscador();


		$buscar_id=$conectar->prepare('SELECT * FROM cliente WHERE id_cliente=:id_cliente LIMIT 1');
		$buscar_id->execute(array(
			':id_cliente'=>$id_cliente
		));
		$resultado=$buscar_id->fetch();


          $nombre_guardado = $resultado['nombre_cliente'];
          $apellido_guardado = $resultado['apellido_cliente'];
          $telefono_guardado = $resultado['telefono_cliente'];
          

	}else{
		header('Location: Inicio.php?status=2');
	}


	if(isset($_POST['guardar'])){

		$nombre_cliente=$_POST['nombre_cliente'];
		$apellido_cliente=$_POST['apellido_cliente'];
		$telefono_cliente=$_POST['telefono_cliente'];


		$id_cliente=(int) $_GET['id_cliente'];

		if( !empty($nombre_cliente) && !empty($apellido_cliente) && !empty($telefono_cliente) ){
			
				$consulta_update=$conectar->prepare(' UPDATE cliente SET  
					
					nombre_cliente=:nombre_cliente,
					apellido_cliente=:apellido_cliente,
					telefono_cliente=:telefono_cliente


					WHERE id_cliente=:id_cliente;'
				);
				$consulta_update->execute(array(
					
					':nombre_cliente' =>$nombre_cliente,
					':apellido_cliente' =>$apellido_cliente,
					':telefono_cliente' =>$telefono_cliente,

					':id_cliente' =>$id_cliente
				));

$user_res = $_SESSION['username'];
$id_e = "actualizar";
$datetime = date('Y-m-d H:i:s');
$descripcion = "El usuario ".$_SESSION["username"]." actualizó la información del cliente anteriormente llamado:*".$nombre_guardado." ".$apellido_guardado." , número de telefono: ".$telefono_guardado."* a: *".$nombre_cliente." ".$apellido_cliente." con la cédula ".$id_cliente.", y el número de télefono: ".$telefono_cliente."*. En la sección *Perruquería* área mascotas satisfactoriamente";
#auditoria
$aud_datos=array($descripcion, $id_e, $datetime, $user_res);

$auditoria = new Auditoria();

$Aud = $auditoria->AuditoriaMetodo($aud_datos);




				header('Location: Inicio.php?status=1');

			}
		}else{
			
		}
	

?>
<!DOCTYPE >
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Actualizar Clientes</title>
	
</head>
<body style="background-color: #e9e9e9">
	
	<div class="contenedor">
		<h2 class="centrado">Actualización de Clientes</h2>
		<br>
		<br>

<div class="container" style=" width: 50%; margin-left: 340px; margin-right: 280px; margin-bottom: 100px; padding: 20px; background-color: #fff; text-shadow: 0 0 30px #fff;
			       box-shadow: 0 0 20px #333">
		<div class="">

		<form action="" method="post">
			<div class="form-group" style="width:">
				<label for="nombre_cliente"><strong>Nombre:</strong></label>
				<input type="text" name="nombre_cliente" value="<?php if($resultado) echo $resultado['nombre_cliente']; ?>" class="form-control">
			
			<label for="apellido_cliente"><strong>Apellido: </strong></label>
				<input type="text" name="apellido_cliente" value="<?php if($resultado) echo $resultado['apellido_cliente']; ?>" class="form-control">
			
			<label for="telefono_cliente"><strong>Telefono: </strong></label>
				<input type="text" name="telefono_cliente"  min="04000000000" max="04999999999" value="<?php if($resultado) echo $resultado['telefono_cliente']; ?>" class="form-control">
			
			</div>
			<br>

			<div class="btn__group">
				<input type="submit" name="guardar" value="guardar" class="btn_a">
				<a href="VerClientes.php" class="cancel">Cancelar</a>
				
			</div>
		</form>
	</div>
	</div>
</div>
</body>
</html>
