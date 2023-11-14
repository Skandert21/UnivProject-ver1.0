<?php

session_start();

if( !isset($_POST["id_dueno"]) || !isset($_POST["id_perro"]) || !isset($_POST["observacion"]) ||  !isset($_POST["total"])) echo "Algo salió mal. Por favor verifica que la info exista";

include_once "conectar.php";

$idd = $_POST["id_dueno"];
$idp = $_POST["id_perro"];
$observaciones = $_POST["observacion"];
$precio = $_POST["total"];
$fecha = date("Y-m-d H:i:s");

$id_e = 123;
$datetime = date('Y-m-d H:i:s');
$user_res = $_SESSION['username'];


/*
$sentencia = $conectar->prepare("INSERT INTO consulta ( id_dueno, id_perro, observacion, medicamentos, precio, fecha) VALUES ( ?, ?, ?, ?, ?, ?);");
*/
/*
$datos = array($idd, $idp, $observaciones, $precio, $fecha);
$sql="INSERT INTO consulta ( id_dueno, id_perro, observacion, precio, fecha) VALUES ( '$datos[0]', '$datos[1]', '$datos[2]', '$datos[3]', '$datos[4]')";
*/
$c = new SelectDatos();

$conectar = $c->Buscador();

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

$c1 = array($idd, $idp, $observaciones, $precio, $fecha);
$c2 = array($idd, $ncr, $npr, $observaciones,$precio, $fecha, $user_res);
$r = new Consulta();
$registrar = $r->ConsultaPerro($c1,$c2);
/*
$i = new Persona();
$insertar = $i->InsertarCliente($datos,$sql);
*/


/*

#se envia
$resultado = $sentencia->execute([ $idd, $idp, $observaciones, $medicamentos, $precio, $fecha]);
#Si se hace correctamente, se envia al inicio de la pagina, si no...
*/

/*
$sql ="INSERT INTO consulta_respaldo ( id_cliente_cr, nombre_cliente_cr, nombre_perro_cr, observaciones_cr, precio_cr, date_cr, user_res_cr) VALUES ( '$datos[0]', '$datos[1]', '$datos[2]', '$datos[3]','$datos[4]', '$datos[5]', '$datos[6]')";
*/
/*
$r = new Consulta();
$registrar = $r->ConsultaPerro($datos);
*/
#se envia
/*
$resultado = $sentencia->execute([ $idd, $ncr, $npr, $observaciones,$precio, $fecha, $user_res]);
*/
#declaro esta variable despues para que pueda usar las otras variables

$descripcion = "El usuario ".$_SESSION["username"]." añadió la consulta del cliente ".$ncr." portador de la cédula ".$idd." y su mascota ".$npr." en el área de mascotas *perruquería* satisfactoriamente";

#auditoria
/*
$sentencia = $conectar->prepare("INSERT INTO auditoria (descripcion, id_evento, datetime, user_res) VALUES (?, ?, ?, ?);");

$resultado = $sentencia->execute([$descripcion, $id_e, $datetime, $user_res]);

*/


$aud_datos = array($descripcion, $id_e, $datetime, $user_res);
$auditoria = new Auditoria();

 if($auditoria->AuditoriaMetodo($aud_datos)==3)

#Si se hace correctamente, se envia al inicio de la pagina, si no...
{
	header("Location: ./inicio.php?status=1");
	exit;
} else{

 
#te borra todo, no mentira, te suelta este mensaje
header("Location: ./inicio.php?status=2");}
?>

