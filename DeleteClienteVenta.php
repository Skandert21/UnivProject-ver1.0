<?php 

	include_once 'conectar.php';
	session_start();
	$idc = $_POST['borrado'];

$id_e = "eliminar";
$datetime = date('Y-m-d H:i:s');
$user_res = $_SESSION['username'];

$c = new SelectDatos();
$conectar = $c->Buscador();


/*
$sentencia_select=$conectar->prepare("SELECT * FROM ventas WHERE id_cliente_venta = '$idc'");
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

foreach ($resultado as $id) {
 $idcheck = $id['id_cliente_venta'];
}
if ($idcheck == $idc) {
	header("Location: Tienda.php?status=14");
	exit();
}

*/





# datos de auditoria
$sentencia_select=$conectar->prepare("SELECT * FROM cliente_venta WHERE id_c LIKE '$idc'");
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

foreach ($resultado as $dato) {
	$nombre = $dato['nombre_c'];
	$apellido = $dato['apellido_c'];
	$telefono = $dato['telefono_c'];

}


$descripcion = "El usuario ".$_SESSION["username"]." eliminó al cliente ".$nombre." ".$apellido." con la cédula: ".$idc.", y el número de telefono ".$telefono." en el área de Clientes, sección 'Tienda' satisfactoriamente";


#auditoria
$sentencia = $conectar->prepare("INSERT INTO auditoria_dos ( descripcion_dos, id_evento_dos, datetime_dos, user_res_dos) VALUES ( ?, ?, ?, ?);");

$resultado = $sentencia->execute([ $descripcion, $id_e, $datetime, $user_res]);


$consulta_update=$conectar->prepare(' UPDATE cliente_venta SET  
					
					
					c_check =:c_check

					WHERE id_c=:id_c;'
				);
				$consulta_update->execute(array(
					
					
					':c_check' =>1,
					

					':id_c' =>$idc
				));


/*
$Borrar = new Persona($idc);
$Borrar->Borrar_CV();

*/	header('Location: inicio.php?status=1');
/*
		$delete=$conectar->prepare('DELETE FROM cliente_venta WHERE id_c =:id');
		$delete->execute(array(
			':id'=>$idc
		));
		header('Location: VerClientesVentas.php');

*/
 ?>