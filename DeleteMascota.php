


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
	$sentencia_select=$conectar->prepare("SELECT * FROM consulta WHERE id_perro = '$idc'");
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

foreach ($resultado as $id) {
 $idcheck = $id['id_perro'];
}
if ($idcheck == $idc) {
	header("Location: Inicio.php?status=6");
	exit();
}
*/




#insertar datos varios para completar la auditoria
$sentencia_select=$conectar->prepare("SELECT id_dueno FROM detalle_perro WHERE id_perro LIKE '$idc'");
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	foreach ($resultado as $dato) {
		$id_dueno = $dato['id_dueno'];

			}
#insertar datos varios pt2
			$sentencia_select=$conectar->prepare("SELECT * FROM cliente WHERE id_cliente LIKE '$id_dueno'");
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	foreach ($resultado as $dato) {
		
		$nombre_cliente = $dato['nombre_cliente'];
		$apellido_cliente = $dato['apellido_cliente'];
	}


#seleccionas datos a insertar en la auditoria
	$sentencia_select=$conectar->prepare("SELECT * FROM perro WHERE id_perro LIKE '$idc'");
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	foreach ($resultado as $dato) {
		#guardas los datos en variables, parte de la descripcion de la auditoria
		$id_perro = $dato['id_perro'];
		$nombre_perro = $dato['nombre_perro'];
		$raza_perro = $dato['raza_perro'];
	
	}

$descripcion = "El usuario ".$_SESSION["username"]." eliminó a la mascota ".$nombre_perro." de la raza ".$raza_perro.", portador de la ID ".$id_perro." del dueño ".$nombre_cliente." ".$apellido_cliente.", portador de la cédula ".$id_dueno." en el área de Mascotas, sección *perruquería* satisfactoriamente";
#insertas en la tabla auditoria

/*
$sentencia = $conectar->prepare("INSERT INTO auditoria ( descripcion, id_evento, datetime, user_res) VALUES ( ?, ?, ?, ?);");

$resultado = $sentencia->execute([ $descripcion, $id_e, $datetime, $user_res]);
*/


$aud_datos = array($descripcion, $id_e, $datetime, $user_res);
$auditoria = new Auditoria();

 $auditoria->AuditoriaMetodo($aud_datos)==3;

/*
$BorrarMascota = new Mascota();
*/

$motivo = $_POST['motivo'];

				$e = new Conectar();
				$enlace = $e->ConectarMetodo();

				$sql = "INSERT INTO perro_fuera(id_perro_fuera, motivo, fecha) VALUES('$idc','$motivo', '$datetime')";
				$resultado = mysqli_query($enlace, $sql);


$consulta_update=$conectar->prepare(' UPDATE perro SET  
					
					indice=:indice,
					m_check =:m_check

					WHERE id_perro=:id_perro;'
				);
				$consulta_update->execute(array(
					
					':indice' =>0,
					':m_check' =>1,
					

					':id_perro' =>$idc
				));

				

if($resultado){

/*
	if(isset($idc)){
		#se borran los datos
		$delete=$conectar->prepare('DELETE FROM perro WHERE id_perro=:id_perro');
		$delete->execute(array(
			':id_perro'=>$idc
		));
		*/
		header('Location: inicio.php?status=1');
	}else{
		
		
header('Location: VerMascotas.php');
	}

?>