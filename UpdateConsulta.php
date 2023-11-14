<link rel="stylesheet" href="./css/bootstrap.css">
<link rel="stylesheet" href="./css/body.css">
<?php
	include_once 'top.php';
    include_once 'conectar.php';



$c = new SelectDatos();
$conectar = $c->Buscador();
    $user_res = $_SESSION['username'];
$sentencia_select=$conectar->prepare("SELECT * FROM user WHERE username LIKE '$user_res'");
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	foreach ($resultado as $dato) {
		#guardas los datos en variables, parte de la descripcion de la auditoria
		$idu = $dato['id'];
		
	    $lvl = $dato['level'];
	}





if ($lvl == 0) {
	if(isset($_GET['id_consulta'])){
		$id_consulta=(int) $_GET['id_consulta'];


		$buscar_id=$conectar->prepare('SELECT * FROM consulta WHERE id_consulta=:id_consulta LIMIT 1');
		$buscar_id->execute(array(
			':id_consulta'=>$id_consulta
		));
		$resultado=$buscar_id->fetch();

            $obs=$resultado['observacion'];
		 
			$pr=$resultado['precio'];


	}else{
	header('location:Inicio.php?status=2');
	}


	} else { 
	unset($id_consulta);

	header('location:WarnUserDos.php');
	
}

	if(isset($_POST['guardar'])){

		$observacion=$_POST['observacion'];
			$precio=$_POST['precio'];


		$id_consulta=(int) $_GET['id_consulta'];

		if( !empty($observacion) && !empty($precio) ){
			
				$consulta_update=$conectar->prepare(' UPDATE consulta SET  
					
					observacion=:observacion,
					
					precio=:precio


					WHERE id_consulta=:id_consulta;'
				);
				$consulta_update->execute(array(
					
					':observacion' =>$observacion,
					
							':precio' =>$precio,

					':id_consulta' =>$id_consulta
				));


#inicia auditoria
$sentencia_select=$conectar->prepare("SELECT * FROM consulta WHERE id_consulta LIKE '$id_consulta'");
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	foreach ($resultado as $dato) {
		#guardas los datos en variables, parte de la descripcion de la auditoria
		$idd = $dato['id_dueno'];
		
	    $idp = $dato['id_perro'];
	}


#datos de cliente

$sentencia_select = $conectar->query("SELECT nombre_cliente FROM cliente WHERE id_cliente LIKE '$idd'");
	$sentencia_select->execute();
	$datos=$sentencia_select->fetchAll();


   foreach ($datos as $dato) {
   $ncr = $dato['nombre_cliente'];
   }

	#datos de la mascota
	$sentencia_select = $conectar->query("SELECT nombre_perro FROM perro WHERE id_perro LIKE '$idp'");
	$sentencia_select->execute();
	$datos=$sentencia_select->fetchAll();

	foreach ($datos as $dato) {
	$npr = $dato['nombre_perro'];
	}
$id_e = 123;
$datetime = date('Y-m-d H:i:s');
$descripcion = "El usuario ".$_SESSION["username"]." actualizó la consulta del cliente ".$ncr." portador de la cédula ".$idd." y su mascota ".$npr.", datos anteriores;  observación: *".$obs.", medicamentos: ".$med." y el precio: ".$pr."* a *observación: ".$observacion.", medicamentos: ".$medicamentos." y el precio: ".$precio."* en la sección *Perruquería* área de mascotas satisfactoriamente";
#auditoria
$aud_datos = array($descripcion, $id_e, $datetime, $user_res);
$auditoria = new Auditoria();

 if($auditoria->AuditoriaMetodo($aud_datos)==3)

#Si se hace correctamente, se envia al inicio de la pagina, si no...
{
	header("Location: ./inicio.php?status=1");
	exit;

} else {

 
#te borra todo, no mentira, te suelta este mensaje
header("Location: ./inicio.php?status=2");}

}
}

?>
<!DOCTYPE >
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Actualizar Mascotas</title>
	
</head>
<body>
	<div class="contenedor">
		<h2>Actualización de Usuarios</h2>
		<form action="" method="post">
			<div class="form-group">
				<label>observacion</label>
				<input type="text" name="observacion" value="<?php if($resultado) echo $resultado['observacion']; ?>" class="input__text">
			
				
				<label>precio</label>
				<input type="text" name="precio" value="<?php if($resultado) echo $resultado['precio']; ?>" class="input__text">

			</div>
			<div class="btn__group">
				<a href="VerConsultas.php" class="btn_a">Cancelar</a>
				<input type="submit" name="guardar" value="guardar" class="btn_a">
			</div>
		</form>
	</div>
</body>
</html>
