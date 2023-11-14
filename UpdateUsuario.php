<?php
	include_once 'conectar.php';
	@include "top.php";
	#session_start();

	$e = new Conectar();
	$enlace =$e->ConectarMetodo();

	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];

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
         
         if ($_POST["clave"] != $_POST["Confirmclave"]) {
          
		header("Location: UpdateUsuario.php?id=$id&status=4");

         } else{

		$nombre=$_POST['nombre'];
		$clave=$_POST['clave'];
		 $password = password_hash($clave, PASSWORD_DEFAULT);
		$lvl=$_POST['level'];
		$estado = $_POST['estado'];
		if ($estado == 0) {
		
         $sql = "DELETE FROM validar WHERE username_val = '$nombre'";
         $res = mysqli_query($enlace, $sql);
		}
		
		$id=(int) $_GET['id'];

		
         $sql = "SELECT * FROM user WHERE username = '$nombre' and id != '$id'";
         $res = mysqli_query($enlace, $sql);
         foreach ($res as $userdato) {
         	$usercompare = $userdato['username'];
         }
		if ($usercompare == $nombre) {
			header("Location: UpdateUsuario.php?id=$id&status=3");
		} else{

		if(!empty($nombre) && !empty($clave)){
			
				$consulta_update=$conectar->prepare(' UPDATE user SET  
					username=:username,
					password=:password,
					level= :level,
					estado =:estado
					WHERE id=:id;'
				);
				$consulta_update->execute(array(
					':username' =>$nombre,
					':password' =>$password,
					':level'=>$lvl,
					':estado'=>$estado,

					':id' =>$id
                     

				));


if ($lvl==0) {
	$cargo = "Administrador";

 } elseif ($lvl==1) {
	$cargo = "Secretario";
}

if ($niv==0) {
	$car = "Administrador";

 } elseif ($niv==1) {
	$car = "Secretario";
}

$user_res = $_SESSION['username'];
$id_e = "actualizar";
$datetime = date('Y-m-d H:i:s');
$descripcion = "El usuario ".$_SESSION["username"]." actualizó la información del usuario con la id ".$id.", cuales datos eran: *".$user_name." , contraseña: ".$pass." y cargo: ".$car."* a *".$nombre." , contraseña: ".$clave." y cargo ".$cargo."* en el área de mascotas satisfactoriamente";
#auditoria

$aud_datos = array($descripcion, $id_e, $datetime, $user_res);
$auditoria = new Auditoria();
$a = $auditoria->AuditoriaMetodo($aud_datos);

				 
            
				header('Location: Inicio.php?status=1');
			}
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
<body style="background-color: #e9e9e9">
	<div class="contenedor">
		<h2 class="centrado">Actualización de Usuarios</h2>
		<br>
		<div class="container" style=" margin-left: 120px; margin-right: 120px; margin-bottom: 100px; padding: 20px;  background-color: #fff; text-shadow: 0 0 30px #fff;
			       box-shadow: 0 0 20px #333">
			<br>
<?php 
if(isset($_GET["status"])){
				if($_GET["status"] === "3"){	?>

					    <br>
						<div class="alert alert-warning">
							
							<strong>¡Estás tomando el nombre de usuario de alguien más!</strong>
						</div>
					<?php
				} elseif($_GET["status"] === "4"){ ?>

                        <br>
						<div class="alert alert-warning">
							
							<strong>¡Estás ingresando contraseñas diferentes!</strong>
						</div>
				<?php }

			}
			?>
			<link rel="stylesheet" href="./css/body.css">
			<div class=""  >
		<form action="" method="post">
			<div class="form-group" style="">
				<label for="nombre"><strong>Nombre de usuario:</strong></label>
				<input required type="text" name="nombre" minlength="4" maxlength="10" value="<?php if($resultado) echo $resultado['username']; ?>" class="form-control">
                 <label for="clave"><strong>Contraseña:</strong></label>
				<input required type="text" name="clave" minlength="4" maxlength="15" value="" placeholder="Contraseña" class="form-control">

                <label for="clave"><strong>Confirmar contraseña:</strong></label>
				<input required type="text" name="Confirmclave" minlength="4" maxlength="15" placeholder="Confirme contraseña" value="" class="form-control">


				<label for="level"><strong>Rango de usuario:</strong></label>
				<select class="form-control" name="level">

					<option  name="level" value="0">Administrador</option>
					<option  name="level" value="1">Secretario</option>
				</select>

				<label for="estado"><strong>Estado:</strong></label>
				<select class="form-control" name="estado">

					<option  name="estado" value="0">Activo</option>
					<option  name="estado" value="1">Inactivo</option>
				</select>
			</div>
			<br>
			<div class="btn__group">
				<input class="btn_a" type="submit" name="guardar" value="Guardar" class="btn btn__primary">
				<a href="VerUsuario.php"  class="cancel">Cancelar</a>
				</div>
			</div>
		</div>
		<br>
		</form>
	</div>
</body>
</html>
