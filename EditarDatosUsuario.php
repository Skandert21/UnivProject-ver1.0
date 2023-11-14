<?php
	include_once 'conectar.php';
	@include "top.php";
	#session_start();

	$e = new Conectar();
	$enlace =$e->ConectarMetodo();

	if(isset($_GET['id'])){
		$id= $_SESSION["id"];

		$c = new SelectDatos();
		$conectar = $c->Buscador();

		$buscar_id=$conectar->prepare('SELECT * FROM user WHERE id=:id LIMIT 1');
		$buscar_id->execute(array(
			':id'=>$id
		));
		$resultado=$buscar_id->fetch();
         
         $user_name = $resultado['username'];
         $pass = $resultado['password'];
         $niv = $resultado['level'];
         $est = $resultado['estado'];
#check

	}else{
		header('Location: VerUsuario.php');
	}


	if(isset($_POST['guardar'])){
		$nombre=$_POST['nombre'];
		
		$clave=$_POST['clave'];
		 $password = password_hash($clave, PASSWORD_DEFAULT);
		$lvl=$_POST['level'];
		$estado = $_POST['estado'];
		
		
	$id= $_SESSION["id"];


		
         $sql = "SELECT * FROM user WHERE username = '$nombre' and id != '$id'";
         $res = mysqli_query($enlace, $sql);
         foreach ($res as $userdato) {
         	$usercompare = $userdato['username'];
         }
		if ($usercompare == $nombre) {
		header("Location: VerPanelDeUsuario.php?status=3");
		} else{

		if(!empty($nombre) && !empty($clave)){
			
				$consulta_update=$conectar->prepare(' UPDATE user SET  
					username=:username,
					password=:password
					
					WHERE id=:id;'
				);
				$consulta_update->execute(array(
					':username' =>$nombre,
					':password' =>$password,
					

					':id' =>$id
                     

				));



$user_res = $_SESSION['username'];
$id_e = "actualizar";
$datetime = date('Y-m-d H:i:s');
$descripcion = "El usuario ".$_SESSION["username"]." actualizó su información del usuario, cuales datos eran: *".$user_name." , contraseña: ".$pass."* a *".$nombre." , contraseña: ".$clave."* en el área de mascotas satisfactoriamente";
#auditoria

$aud_datos = array($descripcion, $id_e, $datetime, $user_res);
$auditoria = new Auditoria();
$a = $auditoria->AuditoriaMetodo($aud_datos);

				 
            
				header('Location: Inicio.php?status=1');
			}
		}

			
		}else{
			
		}
	

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Actualizar Usuarios</title>
	
</head>
<body>
	<div class="contenedor">
		<h2 class="centrado">Actualización de Usuarios</h2>
		<div class="jaula">
			<br>

			<link rel="stylesheet" href="./css/body.css">
		<form action="" method="post">
			<div class="form-group" style="width: 75%">
				<label for="nombre"><strong>Nombre de usuario:</strong></label>
				<input required type="text" name="nombre" minlength="4" maxlength="10" value="<?php if($resultado) echo $resultado['username']; ?>" class="form-control">
                 <label for="clave"><strong>Contraseña:</strong></label>
				<input required type="text" name="clave" minlength="4" maxlength="15" placeholder="Contraseña" value="" class="form-control">

			</div>
			<br>
			<div class="btn__group">
				<input class="btn_a" type="submit" name="guardar" value="Guardar" class="btn btn__primary">
				<a href="VerUsuario.php"  class="cancel">Cancelar</a>
				
			</div>
		</div>
		<br>
		</form>
	</div>
</body>
</html>
