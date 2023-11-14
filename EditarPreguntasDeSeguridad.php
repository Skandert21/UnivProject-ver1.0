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



		$buscar_id=$conectar->prepare('SELECT * FROM preguntas_seguridad WHERE id_user=:id_user');
		$buscar_id->execute(array(
			':id_user'=>$id

		));
		$resultado=$buscar_id->fetch();
         
       $pu = $resultado["pregunta_uno"];
       $ru = $resultado["respuesta_uno"];
       $pd = $resultado["pregunta_dos"];
       $rd = $resultado["respuesta_dos"];
       $pt = $resultado["pregunta_tres"];
       $rt = $resultado["respuesta_tres"];
	}

if(isset($_POST['guardar'])){



		$puu=$_POST['preguntauno'];
		$ruu=$_POST['respuestauno'];
		
        $pud=$_POST['preguntados'];
		$rud=$_POST['respuestados'];


		$put=$_POST['preguntatres'];
		$rut=$_POST['respuestatres'];



	if(!empty($puu) && !empty($ruu) && !empty($pud)&& !empty($rud) && !empty($put) && !empty($rut)){
			
				$consulta_update=$conectar->prepare(' UPDATE preguntas_seguridad SET  
					pregunta_uno=:pregunta_uno,
					respuesta_uno=:respuesta_uno,
					pregunta_dos=:pregunta_dos,
					respuesta_dos=:respuesta_dos,
					pregunta_tres=:pregunta_tres,
					respuesta_tres=:respuesta_tres

					WHERE id_user=:id_user;'
				);
				$consulta_update->execute(array(
					':pregunta_uno' =>$puu,
                    ':respuesta_uno' =>$ruu,
					':pregunta_dos' =>$pud,
					':respuesta_dos' =>$rud,
					':pregunta_tres' =>$put,
					':respuesta_tres' =>$rut,

					':id_user' =>$id
                     

				));


				
$user_res = $_SESSION['username'];
$id_e = "actualizar";
$datetime = date('Y-m-d H:i:s');
$descripcion = "El usuario ".$_SESSION["username"]." actualizó las preguntas frecuentes del usuario con la id ".$id.", las preguntas frecuentes ahora son; pregunta uno: ".$puu.", respuesta uno: ".$ruu.". pregunta dos: ".$pud.", respuesta dos: ".$rud.". pregunta tres: ".$put.", respuesta tres: ".$rut;
#auditoria

$aud_datos = array($descripcion, $id_e, $datetime, $user_res);
$auditoria = new Auditoria();
$a = $auditoria->AuditoriaMetodo($aud_datos);

				 
            
				header('Location: Inicio.php?status=1');
}

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
		<h2 class="centrado">Actualización de preguntas de seguridad</h2>
		<div class="jaula">
			<br>

			<link rel="stylesheet" href="./css/body.css">
		<form action="" method="POST">
<tr>	
	<div class="form-group" style="width: 75%; margin-bottom: 100px; padding: 20px; background-color: #fff; text-shadow: 0 0 30px #fff;
			       box-shadow: 0 0 20px #333">
	<label for="id_cliente" ><strong>Pregunta de seguridad 1:</strong></label> 
<input class ="form-control" id="preguntauno" maxlength="20" name="preguntauno" required type ="text" value="<?php if($resultado) echo $pu; ?>"  placeholder="Pregunta de seguridad 1" autocomplete="off">

<label for="id_cliente" ><strong>Respuesta 1:</strong></label> 
<input class ="form-control" id="respuestauno" maxlength="12" name="respuestauno" required type ="text" value="<?php if($resultado) echo $ru; ?>"  placeholder="Respuesta 1" autocomplete="off">

</tr>
<!-- Recuerda poner un limitador de digitos a las cajas de texto/numero, arreglar el porqué no se guarda el 0 en telefono-->
<tr>	
	<label for="nombre_cliente"><strong>Pregunta de seguridad 2:</strong> </label>
<input class ="form-control" id="preguntados"  maxlength="20" required pattern="[A-Za-z ]+" value="<?php if($resultado) echo $pd; ?>" name="preguntados" required type ="text"  placeholder="Pregunta de seguridad 2" autocomplete="off">
 
 <label for="id_cliente" ><strong>Respuesta 2:</strong></label> 
<input class ="form-control" id="respuestados"  maxlength="12" name="respuestados" required type ="text" value="<?php if($resultado) echo $rd; ?>"  placeholder="Respuesta 2" autocomplete="off">

</tr>

<tr>	
	<label for="apellido_cliente"><strong>Pregunta de seguridad 3:</strong> </label>
<input class ="form-control" id="preguntatres" maxlength="20"  pattern="[A-Za-z ]+" name="preguntatres" value="<?php if($resultado) echo $pt; ?>" required type ="text"  placeholder="Pregunta de seguridad 3" autocomplete="off">

<label for="id_cliente" ><strong>Respuesta 3:</strong></label> 
<input class ="form-control" id="respuestatres" maxlength="12" name="respuestatres" value="<?php if($resultado) echo $rt; ?>" required type ="text"  placeholder="Respuesta 3" autocomplete="off">


</tr>

<br>
<br>
</div>
<input type="submit" name="guardar" value="guardar" class="btn_a">

<tr> <a class="cancel" href="VerUsuario.php">Regresar</a></tr>
</form>
	</div>
</body>
</html>
