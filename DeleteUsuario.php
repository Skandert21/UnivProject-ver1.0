

<?php 
#codigo

	include_once 'conectar.php';
session_start();
 $idc = $_POST['borrado'];
$id_e = "eliminar";
$datetime = date('Y-m-d H:i:s');
$user_res = $_SESSION['username'];

$c = new SelectDatos();
$conectar = $c->Buscador();
#seleccionando datos varios para no borrar tu propio usuario
$sentencia_select=$conectar->prepare("SELECT * FROM user WHERE username LIKE '$user_res'");
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	foreach ($resultado as $dato) {
		#guardas los datos en variables, parte de la descripcion de la auditoria
		$idu = $dato['id'];
		
	
	}



#seleccionas datos a insertar en la auditoria
	$sentencia_select=$conectar->prepare("SELECT * FROM user WHERE id LIKE '$idc'");
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	foreach ($resultado as $dato) {
		#guardas los datos en variables, parte de la descripcion de la auditoria
		$username = $dato['username'];
		
		$lvl = $dato['lvl'];
	
	}


	if ($idc == $idu) {
unset($idc);

$msg = 32;

} 


if ($lvl==0) {
	$cargo = "administrador";
 } elseif ($lvl==1) {
	$cargo = "usuario";
}



$descripcion = "El usuario ".$_SESSION["username"]." eliminó al Usuario ".$username.", con el cargo ".$cargo.", sección *perruquería* satisfactoriamente";
#insertas en la tabla auditoria

$aud_datos = array($descripcion, $id_e, $datetime, $user_res);
$auditoria = new Auditoria();
$a = $auditoria->AuditoriaMetodo($aud_datos);


	if(isset($idc)){
		#se borran los datos
		$delete=$conectar->prepare('DELETE FROM user WHERE id=:id');
		$delete->execute(array(
			':id'=>$idc
		));
		header('Location: Inicio.php?status=1');

    } else {
       
		
		
header('Location: Inicio.php?status=2');

	}

	if ($msg==32) {
		header('Location: WarnUser.php');

		
	}

?>