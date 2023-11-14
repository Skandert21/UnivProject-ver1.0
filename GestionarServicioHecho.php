<?php

session_start();


include_once "conectar.php";
$id_con = $_SESSION['id_con'];
$Total =$_SESSION['TotalReal'];
$id_e = "actualizar";
$datetime = date('Y-m-d h:i:s');
$user_res = $_SESSION['username'];


/*
$sql = "SELECT * FROM where id_con = '$id_con'";
$e = new Conectar();
$enlace = $e->ConectarMetodo();
$mysqli_query 

*/
if ($Total == 0) {
	header("Location: GestionarServicio.php?idc=$_SESSION[id_con]&status=2");
} else {




/*
;
*/
$c = new SelectDatos();
$conectar = $c->Buscador();
$consulta_update=$conectar->prepare("UPDATE consulta SET precio=:precio WHERE id_consulta=:id_consulta;"
				);
				$consulta_update->execute(array(
					
					':precio' =>$Total,

					
					':id_consulta' =>$id_con,
				));



$sentencia_select = $conectar->query("SELECT * FROM consulta WHERE id_consulta = '$id_con'");
	$sentencia_select->execute();
	$datos=$sentencia_select->fetchAll();

	foreach ($datos as $dato) {
	$idd = $dato['id_dueno'];
	$idp = $dato['id_perro'];
	}

$sentencia_select = $conectar->query("SELECT nombre_perro FROM perro WHERE id_perro LIKE '$idp'");
	$sentencia_select->execute();
	$datos=$sentencia_select->fetchAll();

	foreach ($datos as $dato) {
	$npr = $dato['nombre_perro'];
	}

$sentencia_select = $conectar->query("SELECT nombre_cliente FROM cliente WHERE id_cliente LIKE '$idd'");
	$sentencia_select->execute();
	$datos=$sentencia_select->fetchAll();


   foreach ($datos as $dato) {
   $ncr = $dato['nombre_cliente'];
   }
/*
$c1 = array($idd, $idp, $observaciones, $precio, $datetime);
$c2 = array($idd, $ncr, $npr, $observaciones,$precio, $datetime, $user_res);
$r = new Consulta();
$registrar = $r->ConsultaPerro($c1,$c2);
*/
/*

*/
#declaro esta variable despues para que pueda usar las otras variables

$descripcion = "El usuario ".$_SESSION["username"]." Actualizó los servicios del cliente ".$ncr." portador de la cédula ".$idd." y su mascota ".$npr." en el área de mascotas *perruquería* satisfactoriamente. Los servicios aplicados a la mascota son los siguientes: ";


$sql = "SELECT * FROM consulta_detalle where id_con = '$id_con'";
$c = new Conectar();
$enlace = $c->ConectarMetodo();
$resultado = mysqli_query($enlace, $sql);
foreach ($resultado as $key) {
	
	$descripcion .=" Un servicio de ".$key['servicio']." con un costo de ".$key['subtotal']."$,";
}


$descripcion .=" Haciendo un total de ".$Total."$";
#auditoria
/*

*/


$aud_datos = array($descripcion, $id_e, $datetime, $user_res);
$auditoria = new Auditoria();

 if($auditoria->AuditoriaMetodo($aud_datos)==3)

#Si se hace correctamente, se envia al inicio de la pagina, si no...
{
	unset($_SESSION['TotalReal']);
	unset($_SESSION['id_con']);
	header("Location: ./inicio.php?status=1");
	exit;
} else{

 unset($_SESSION['TotalReal']);
	unset($_SESSION['id_con']);
#te borra todo, no mentira, te suelta este mensaje
header("Location: ./inicio.php?status=2");}
}
?>

