
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


/*
	$sentencia_select=$conectar->prepare("SELECT * FROM detalle_perro WHERE id_dueno = '$idc'");
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

foreach ($resultado as $id) {
 $idcheck = $id['id_dueno'];
}
if ($idcheck == $idc) {
	header("Location: Inicio.php?status=5");
	exit();
}


*/





#seleccionas datos a insertar en la auditoria

	$sentencia_select=$conectar->prepare("SELECT * FROM cliente WHERE id_cliente LIKE '$idc'");
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	foreach ($resultado as $dato) {
		#guardas los datos en variables, parte de la descripcion de la auditoria
		$id_cliente = $dato['id_cliente'];
		$nombre_cliente = $dato['nombre_cliente'];
		$apellido_cliente = $dato['apellido_cliente'];
	
	}

$descripcion = "El usuario ".$_SESSION["username"]." eliminó al cliente ".$nombre_cliente." ".$apellido_cliente.", portador de la cédula ".$id_cliente." en el área de Clientes sección *perruquería* satisfactoriamente";
#insertas en la tabla auditoria

/*
$sentencia = $conectar->prepare("INSERT INTO auditoria ( descripcion, id_evento, datetime, user_res) VALUES ( ?, ?, ?, ?);");

$resultado = $sentencia->execute([ $descripcion, $id_e, $datetime, $user_res]);

*/
#auditoria
$aud_datos = array($descripcion, $id_e, $datetime, $user_res);
$auditoria = new Auditoria();

 $auditoria->AuditoriaMetodo($aud_datos)==3;

#borrar

/*
$Borrar = new Persona($idc);
$Borrar->Borrar_C();
*/
$c_check = 1;
$consulta_update=$conectar->prepare(' UPDATE cliente SET  
					
					c_check=:c_check
					


					WHERE id_cliente=:id_cliente;'
				);
				$consulta_update->execute(array(
					
					':c_check' =>$c_check,
					

					':id_cliente' =>$id_cliente
				));

				$e = new Conectar();
				$enlace = $e->ConectarMetodo();
#selecciona  todas las mascotas de este dueño y las pone en fuera de servicio
				#$sql = "SELECT * from detalle_perro where id_dueno = '$id_cliente'";
$sentencia_select=$conectar->prepare("SELECT * FROM detalle_perro d inner join perro p on d.id_perro = p.id_perro WHERE d.id_dueno LIKE '$idc' and m_check = 0");
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();
$m_check = 1;
$indice = 0;
$motivo = "ausente";
foreach ($resultado as $mascota) {
$mascota['id_perro'];


$consulta_update=$conectar->prepare(' UPDATE perro SET  
					
					m_check=:m_check,
					indice = :indice
					


					WHERE id_perro=:id_perro;'
				);
				$consulta_update->execute(array(
					
					':m_check' =>$m_check,
					':indice' =>$indice,

					':id_perro' =>$mascota['id_perro']
				));


				$sql = "INSERT INTO perro_fuera(id_perro_fuera, motivo) VALUES('$mascota[id_perro]','$motivo')";
				$resultado = mysqli_query($enlace, $sql);


}


header("Location: Inicio.php?status=1");

/*
	if(isset($idc)){
		#se borran los datos
		$delete=$conectar->prepare('DELETE FROM cliente WHERE id_cliente=:id_cliente');
		$delete->execute(array(
			':id_cliente'=>$idc
		));
		header('Location: VerClientes.php');
	}else{
		
		
header('Location: VerClientes.php');
	}
*/
  
?>