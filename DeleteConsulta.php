<?php  

include 'conectar.php';
session_start();

$c = new SelectDatos();
$conectar = $c->Buscador();
$user_res = $_SESSION['username'];
$idc = $_POST['borrado'];
$sentencia_select=$conectar->prepare("SELECT * FROM user WHERE username LIKE '$user_res'");
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	foreach ($resultado as $dato) {
		#guardas los datos en variables, parte de la descripcion de la auditoria
		$idu = $dato['id'];
		
	    $lvl = $dato['level'];
	}


if ($lvl == 0) {
	#datos de la consulta

$sentencia_select=$conectar->prepare("SELECT * FROM consulta WHERE id_consulta LIKE '$idc'");
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
$id_e = "eliminar";
$datetime = date('Y-m-d H:i:s');
$descripcion = "El usuario ".$_SESSION["username"]." eliminó la consulta del cliente ".$ncr." portador de la cédula ".$idd." y su mascota ".$npr." en el área de mascotas satisfactoriamente";
#auditoria

$aud_datos = array($descripcion, $id_e, $datetime, $user_res);
$auditoria = new Auditoria();

 if($auditoria->AuditoriaMetodo($aud_datos)==3)

#Si se hace correctamente, se envia al inicio de la pagina, si no...
{
	

} else {

 
#te borra todo, no mentira, te suelta este mensaje
header("Location: ./inicio.php?status=2");}

} else {


unset($idc);
header('location:WarnUserDos.php');
}

	

	if(isset($idc)){
		#se borran los datos

       $b = new Consulta();
       $borrar = $b->BorrarConsulta($idc);

		
		
		header("Location: ./inicio.php?status=1");
	}else {
		
		
header('Location: Inicio.php?status=2');




}















 ?>