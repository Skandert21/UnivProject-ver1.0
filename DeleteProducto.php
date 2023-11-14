<?php 

	include_once 'conectar.php';


	session_start();

	$idc = $_POST['borrado'];
$id_e = "eliminar";
$datetime = date('Y-m-d H:i:s');
$user_res = $_SESSION['username'];

# datos de auditoria

$c = new SelectDatos();
$conectar = $c->Buscador();
/*
#verifica si el producto que se va a borrar se encuentra en las compras
$sentencia_select=$conectar->prepare("SELECT * FROM productos_comprados WHERE producto = '$idc'");
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

foreach ($resultado as $id) {
 $idcheck = $id['producto'];
}
if ($idcheck == $idc) {
	header("Location: inicio.php?status=10");
	exit();
}
#verifica si el producto que se va a borrar se encuentra en las ventas
$sentencia_select=$conectar->prepare("SELECT * FROM productos_vendidos WHERE producto = '$idc'");
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

foreach ($resultado as $id) {
 $idcheck = $id['producto'];
}
if ($idcheck == $idc) {
	header("Location: Tienda.php?status=11");
	exit();
}

#verifica si el producto que se va a borrar se encuentra en los reembolsos
$sentencia_select=$conectar->prepare("SELECT * FROM productos_reembolsados WHERE producto = '$idc'");
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

foreach ($resultado as $id) {
 $idcheck = $id['producto'];
}
if ($idcheck == $idc) {
	header("Location: Tienda.php?status=12");
	exit();
}
*/








$sentencia_select=$conectar->prepare("SELECT * FROM productos WHERE idpr LIKE '$idc'");
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

foreach ($resultado as $dato) {
	$codigo = $dato['codigo'];
	$descripcion = $dato['descripcion'];
	$precio = $dato['precioVenta'];
	$existencia = $dato['existencia'];
}


$descripcion_dos = "El usuario ".$_SESSION["username"]." eliminó el producto ".$descripcion." con el codigo ".$codigo.", el precio de venta de ".$precio." y tenía una existencia de: ".$existencia." en el área de Productos, sección *Tienda* satisfactoriamente";


#auditoria
/*
$sentencia = $conectar->prepare("INSERT INTO auditoria_dos ( descripcion_dos, id_evento_dos, datetime_dos, user_res_dos) VALUES ( ?, ?, ?, ?);");

$resultado = $sentencia->execute([ $descripcion, $id_e, $datetime, $user_res]);
*/
$aud_datos = array($descripcion_dos, $id_e, $datetime, $user_res);
$a = new Auditoria();
$auditoria = $a->AuditoriaMetodoDos($aud_datos);




		$consulta_update=$conectar->prepare(' UPDATE productos SET  
					
					pp_check = :ppcheck


					WHERE idpr=:id;'
				);
				$consulta_update->execute(array(
					
					':ppcheck' =>1,
				

					':id' =>$idc
				));

header('Location: inicio.php?status=1');

		
	



	#Recuerda cambiar el else por un mensaje
 ?>