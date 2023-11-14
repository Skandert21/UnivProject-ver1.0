<?php
	include_once 'top.php';
    include_once 'conectar.php';
	if(isset($_GET['id_c'])){
		$id=(int) $_GET['id_c'];
		$c= new SelectDatos();
		$conectar = $c->Buscador();

		$buscar_id=$conectar->prepare('SELECT * FROM cliente_venta WHERE id_c=:id_c LIMIT 1');
		$buscar_id->execute(array(
			':id_c'=>$id
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: VerClientesVentas.php');
	}


	if(isset($_POST['guardar'])){

		$id=$_POST['id_c'];
		$nombre=$_POST['nombre_c'];
        $apellido=$_POST['apellido_c'];
		$telefono=$_POST['telefono_c'];


		$id=(int) $_GET['id_c'];

		if(!empty($nombre) && !empty($apellido) && !empty($telefono) ){
			
				$consulta_update=$conectar->prepare(' UPDATE cliente_venta SET  
					
			
					nombre_c=:nombre_c,
					apellido_c=:apellido_c,
					telefono_c=:telefono_c


					WHERE id_c=:id_c;'
				);
				$consulta_update->execute(array(
					
					
					':nombre_c' =>$nombre,
					':apellido_c' =>$apellido,
					':telefono_c' =>$telefono,

					':id_c' =>$id
				));
$user_res = $_SESSION['username'];
$id_e = "actualizar";
$datetime = date('Y-m-d H:i:s');
$descripcion = "El usuario ".$_SESSION["username"]." actualizó la información del Cliente ".$resultado['nombre_c']." ".$resultado['apellido_c']."con la cédula: ".$id." y telefono ".$resultado['telefono_c']." a *".$nombre." ".$apellido.", y el numero de telefono: ".$telefono."* en el área de Clientes, sección *Tienda* satisfactoriamente";
#auditoria

$aud_datos = array($descripcion, $id_e, $datetime, $user_res);
$auditoria = new Auditoria();
$a = $auditoria->AuditoriaMetodoDos($aud_datos);

/*
$sentencia = $conectar->prepare("INSERT INTO auditoria_dos (descripcion_dos, id_evento_dos, datetime_dos, user_res_dos) VALUES (?, ?, ?, ?);");

$resultado = $sentencia->execute([$descripcion, $id_e, $datetime, $user_res]);
				 
            */
	




				header('Location: inicio.php?status=1');
			}
		}else{
	
		}
	

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Actualizar Clientes</title>
	
</head>
<body style="background-color: #e9e9e9">
	<div class="contenedor">
		<h2 class="centrado">Actualización de Clientes</h2>
<div class="jaula" style="width: 50%">
		<table class="table table-bordered" >
		<form action="" method="post">
			<br>
			<br>
			<div class="form-group" style=" margin-bottom: 100px; padding: 20px; background-color: #fff; text-shadow: 0 0 30px #fff;
			       box-shadow: 0 0 20px #333">
				
<!--
 <label for="id_c">Cédula</label>
<input class="form-control" name="id_c" required type="number" id="id_c" placeholder="Escribe la cédula" value="<?php if($resultado) echo $resultado['id_c']; ?>">
-->

 <label for="nombre_c"><strong>Nombre: </strong></label>
<input class="form-control" name="nombre_c" required type="text" id="nombre_c" placeholder="Escribe el nombre" value="<?php if($resultado) echo $resultado['nombre_c']; ?>">


 <label for="Apellido_c"><strong>Apellido:</strong></label>
<input class="form-control" name="apellido_c" required type="text" id="apellido_c" placeholder="Escribe el apellido" value="<?php if($resultado) echo $resultado['apellido_c']; ?>">


 <label for="telefono_c"><strong>Teléfono:</strong></label>
<input class="form-control" name="telefono_c" required type="number" id="telefono_c" placeholder="Ingrese el número de Teléfono" value="<?php if($resultado) echo $resultado['telefono_c']; ?>">


 

			</div>
			<div class="btn__group">
				<input type="submit" name="guardar" value="Guardar" class="btn_a">
				<a href="VerClientesVentas.php" class="cancel">Cancelar</a>
			</div>
		</form>
		</table>
	</div>
</div>
</body>
</html>
