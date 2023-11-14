<link rel="stylesheet" href="./css/bootstrap.css">
<link rel="stylesheet" href="./css/body.css">
<?php
	include_once 'top.php';
    include_once 'conectar.php';
	if(isset($_GET['id_perro'])){
		$id_perro=(int) $_GET['id_perro'];
$c = new SelectDatos();

$conectar= $c->Buscador();
		$buscar_id=$conectar->prepare('SELECT * FROM perro WHERE id_perro=:id_perro LIMIT 1');
		$buscar_id->execute(array(
			':id_perro'=>$id_perro
		));
		$resultado=$buscar_id->fetch();
  


          $nom_perro = $resultado['nombre_perro'];
          $raa_perro = $resultado['raza_perro'];
          $obs_perro = $resultado['observaciones'];


	}else{
		header('Location: VerMascotas.php');
	}


	if(isset($_POST['guardar'])){

		$nombre_perro=$_POST['nombre_perro'];
		$tipo=$_POST['tipo'];
		$raza_perro=$_POST['raza_perro'];
		$observaciones=$_POST['observaciones'];


		$id_perro=(int) $_GET['id_perro'];

		if( !empty($nombre_perro) && !empty($raza_perro) && !empty($observaciones) ){
			
				$consulta_update=$conectar->prepare(' UPDATE perro SET  
					
					nombre_perro=:nombre_perro,
					tipo=:tipo,
					raza_perro=:raza_perro,
					observaciones=:observaciones


					WHERE id_perro=:id_perro;'
				);
				$consulta_update->execute(array(
					
					':nombre_perro' =>$nombre_perro,
					':tipo' =>$tipo,
					':raza_perro' =>$raza_perro,
					':observaciones' =>$observaciones,

					':id_perro' =>$id_perro
				));

#datos de detalles
				$sentencia_select = $conectar->query("SELECT id_dueno FROM detalle_perro WHERE id_perro LIKE '$id_perro'");
	$sentencia_select->execute();
	$datos=$sentencia_select->fetchAll();


	foreach ($datos as $dato) {
		$idd = $dato['id_dueno'];
	}

#datos de cliente

$sentencia_select = $conectar->query("SELECT * FROM cliente WHERE id_cliente LIKE '$idd'");
	$sentencia_select->execute();
	$datos=$sentencia_select->fetchAll();


   foreach ($datos as $dato) {
   $ncr = $dato['nombre_cliente'];
   $acr = $dato['apellido_cliente'];
   }

$user_res = $_SESSION['username'];
$id_e = "actualizar";
$datetime = date('Y-m-d H:i:s');
$descripcion = "El usuario ".$_SESSION["username"]." actualizó la información de la mascota del dueño ".$ncr." ".$acr." portador de la cédula ".$idd."; anteriormente llamado *".$nom_perro." de raza ".$raa_perro."  y observaciones: ".$obs_perro."* a *".$nombre_perro." con la id ".$id_perro.", de raza: ".$raza_perro." y observaciones: ".$observaciones."* en la sección *Perruquería* área de mascotas satisfactoriamente";


#auditoria

$aud_datos = array($descripcion, $id_e, $datetime, $user_res);
$auditoria = new Auditoria();

 $auditoria->AuditoriaMetodo($aud_datos)==3;




				header('Location: Inicio.php?status=1');
			}
		}else{
		
		}
	

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Actualizar Mascotas</title>
	
</head>
<body style="background-color: #e9e9e9">
	<div class="contenedor" style=" padding: 0px; 
	margin-right: 200px;  margin-left: 320px; width :50%;">
		<h2 class="centrado">Actualización de Mascotas</h2>
		<br>
		<div  class="container" style=" margin-bottom: 100px; padding: 30px; background-color: #fff; text-shadow: 0 0 30px #fff;
			       box-shadow: 0 0 20px #333">
		<form action="" method="post">
			<div class="form-group" style="">
				<label for="nombre_perro"><strong>Nombre de la mascota:</strong></label>
				<input type="text" name="nombre_perro" value="<?php if($resultado) echo $resultado['nombre_perro']; ?>" class="form-control">
				<label for="raza_perro"><strong>Tipo:</strong></label>
				<input type="text" name="tipo" value="<?php if($resultado) echo $resultado['tipo']; ?>" class="form-control">
				
				<label for="raza_perro"><strong>Raza:</strong></label>
				<input type="text" name="raza_perro" value="<?php if($resultado) echo $resultado['raza_perro']; ?>" class="form-control">
				<label for="observaciones"><strong>Observaciones:</strong></label>
				<input type="text" name="observaciones" value="<?php if($resultado) echo $resultado['observaciones']; ?>"class="form-control">

			</div>
			<br>
			<div class="btn__group">
				
				<input type="submit" name="guardar" value="guardar" class="btn_a">
				<a href="VerMascotas.php" class="cancel">Cancelar</a>
			</div>
		</div>
		</form>
	</div>
</body>
</html>
