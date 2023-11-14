<?php
	include_once 'top.php';
    include_once 'conectar.php';
	if(isset($_GET['id_p'])){
		$id=(int) $_GET['id_p'];
		
		$c = new SelectDatos();
		$conectar = $c->Buscador();

		$buscar_id=$conectar->prepare('SELECT * FROM proveedor WHERE id_p=:id_p LIMIT 1');
		$buscar_id->execute(array(
			':id_p'=>$id
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: VerProveedores.php');
	}


	if(isset($_POST['guardar'])){

		$id=$_POST['id_p'];
		$nombre=$_POST['nombre_p'];
        
		$telefono=$_POST['telefono_p'];


		$id=(int) $_GET['id_p'];

		if(!empty($nombre) && !empty($apellido) && !empty($telefono) ){
			
				$consulta_update=$conectar->prepare(' UPDATE proveedor SET  
					
					
					nombre_p=:nombre_p,
					
					telefono_p=:telefono_p


					WHERE id_p=:id_p;'
				);
				$consulta_update->execute(array(
					
					
					':nombre_p' =>$nombre,
					
					':telefono_p' =>$telefono,

					':id_p' =>$id
				));

               $user_res_dos = $_SESSION['username'];
$id_eventos_dos = "actualizar";
$datetime_dos = date('Y-m-d H:i:s');
$descripcion_dos = "El usuario ".$_SESSION["username"]." actualizó la información del proveedor: ".$resultado['nombre_p']." ".$resultado['apellido_p'].", telefono: ".$resultado['telefono_p']." con la cédula ".$id." a *".$nombre." ".$apellido." y el numero de telefono: ".$telefono."* en el área de proveedores, sección *Tienda* satisfactoriamente";
#auditoria

$aud_datos = array($descripcion_dos, $id_eventos_dos, $datetime_dos, $user_res_dos);
$auditoria = new Auditoria();

$a = $auditoria->AuditoriaMetodoDos($aud_datos);


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

	<div class="contenedor" >
		<h2 class="centrado">Actualización de Proveedores</h2>
<br>
<br>
<div class="container" style="margin-bottom: 100px; padding: 20px; background-color: #fff; text-shadow: 0 0 30px #fff;
			       box-shadow: 0 0 20px #333; width: 50%">

		<table class="table table-bordered" >
		<form action="" method="post">

			<div class="">
			<div class="form-group" style="">
				
<!--
 <label for="id_p">Cédula</label>
<input class="form-control" name="id_p" required type="number" id="id_p" placeholder="Escribe la cédula" value="<?php if($resultado) echo $resultado['id_p']; ?>">-->


 <label for="nombre_p"><strong>Nombre:</strong></label>
<input class="form-control" name="nombre_p" required type="text" id="nombre_p" placeholder="Escribe el nombre" value="<?php if($resultado) echo $resultado['nombre_p']; ?>">



 <label for="telefono_p"><strong>Número del Teléfono:</strong></label>
<input class="form-control" name="telefono_p" required type="number"  min="04000000000" max="04999999999" id="telefono_p" placeholder="Ingrese el número de Teléfono" value="<?php if($resultado) echo $resultado['telefono_p']; ?>">


 
</div>
					<div class="btn__group">
				<input type="submit" name="guardar" value="guardar" class="btn_a">
				<a href="VerProveedores.php" class="cancel">Cancelar</a>
				
			</div>
		</form>
		</table>
	</div>
    </div>	
</div>
</body>
</html>
