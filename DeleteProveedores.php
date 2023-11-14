<?php 

	include_once 'conectar.php';

      session_start();
      
      $idp = $_POST['borrado'];


      $id_e = "eliminar";
$datetime = date('Y-m-d H:i:s');
$user_res = $_SESSION['username'];

# datos de auditoria

$c = new SelectDatos();
$conectar = $c->Buscador();

$idcheck = "";
/*
$sentencia_select=$conectar->prepare("SELECT * FROM compra_alproveedor WHERE proveedor = '$idp'");
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

foreach ($resultado as $id) {
 $idcheck = $id['proveedor'];
}
if ($idcheck == $idp) {
	header("Location: Tienda.php?status=13");
	exit();
}*/

$sentencia_select=$conectar->prepare("SELECT * FROM proveedor WHERE id_p LIKE '$idp'");
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

foreach ($resultado as $dato) {
	$nombre = $dato['nombre_p'];
	$apellido = $dato['apellido_p'];
	$telefono = $dato['telefono_p'];

}




$descripcion = "El usuario ".$_SESSION["username"]." eliminó al proveedor ".$nombre." ".$apellido." con la cédula: ".$idp.", y el número de telefono ".$telefono." en el área de Clientes, sección *Tienda* satisfactoriamente";




$aud_datos = array($descripcion, $id_e, $datetime, $user_res);
$auditoria = new Auditoria();

 if($auditoria->AuditoriaMetodoDos($aud_datos)==3)

#Si se hace correctamente, se envia al inicio de la pagina, si no...
{


$consulta_update=$conectar->prepare(' UPDATE proveedor SET  
					
					
					p_check =:p_check

					WHERE id_p=:id_p;'
				);
				$consulta_update->execute(array(
					
					
					':p_check' =>1,
					

					':id_p' =>$idp
				));

#borrar

/*
$Borrar = new Persona($idp);
$Borrar->Borrar_P();
/*


		$delete=$conectar->prepare('DELETE FROM proveedor WHERE id_p=:id_p');
		$delete->execute(array(
			':id_p'=>$idp
		));
*/
		
	header("Location: ./inicio.php?status=1");
	exit;
} else{

 
#te borra todo, no mentira, te suelta este mensaje
header("Location: ./inicio.php?status=2");}

#auditoria
/*
$sentencia = $conectar->prepare("INSERT INTO auditoria_dos ( descripcion_dos, id_evento_dos, datetime_dos, user_res_dos) VALUES ( ?, ?, ?, ?);");

$resultado = $sentencia->execute([ $descripcion, $id_e, $datetime, $user_res]);
*/
	

 ?>