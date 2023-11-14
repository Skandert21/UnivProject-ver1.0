<?php


#Si alguno de los campos esta vacio te marca error, pum que te pego
if( !isset($_POST["id_perro"]) || !isset($_POST["nombre_perro"]) || !isset($_POST["raza_perro"]) ||  !isset($_POST["observaciones"]) ||  !isset($_POST["id_dueno"])) echo "Algo salió mal. Por favor verifica que la info exista";



#Si estan todos los datos, coronaste

#el include para incluir el codigo de conex con bd
include_once "conectar.php";


session_start();

#saco las variables y las enlazo con los datos enviados del formulario, el id es incrementativo asi que no lo pedira.
$idp = $_POST["indice_mascota"];

$nombre = $_POST["nombre_perro"];
$race = $_POST["raza_perro"];
$obs = $_POST["observaciones"];
$idd = $_POST["id_dueno"];
$tipo = $_POST['tipo_perro'];
if (!$obs) {
	$obs = "ninguna";
}

$buscar = new SelectDatos();
$conectar = $buscar->Buscador();

$sentencia_select = $conectar->prepare("SELECT indice FROM perro WHERE indice = ?");
$sentencia_select->execute([$idp]);
$perro_existente = $sentencia_select->fetch(PDO::FETCH_OBJ);

if ($perro_existente) {
    header("Location: ./IdMascota.php");
    exit();
}



$sentencia_select = $conectar->query("SELECT nombre_cliente FROM cliente WHERE id_cliente LIKE '$idd'");
	$sentencia_select->execute();
	$datos=$sentencia_select->fetchAll();


   foreach ($datos as $dato) {
   $nc = $dato['nombre_cliente'];
   }




$descripcion = "El usuario ".$_SESSION["username"]." añadió a la mascota ".$_POST["nombre_perro"]." del dueño ".$nc. " portador de la cédula ".$_POST["id_dueno"]." con el indice ".$idp." en el área de mascotas satisfactoriamente";
$id_e = "insertar";
$datetime = date('Y-m-d H:i:s');
$user_res = $_SESSION['username'];

$datos = array( $idp, $nombre, $tipo, $race,$obs);
$sql ="INSERT INTO perro ( indice, nombre_perro,tipo, raza_perro, observaciones) VALUES ( '$datos[0]', '$datos[1]', '$datos[2]', '$datos[3]','$datos[4]')";


$i = new Mascota();
$Insertar = $i->InsertarMascota($datos, $sql);

/*
#se prepara para enviar los datos
$sentencia = $conectar->prepare("INSERT INTO perro ( id_perro, nombre_perro, raza_perro, observaciones) VALUES ( ?, ?, ?, ?);");

#se envia
$resultado = $sentencia->execute([ $idp, $nombre, $race, $obs]);
#Si se hace correctamente, se envia al inicio de la pagina, si no...

*/
/*
$id = $_POST["id_perro"];
$sentencia = $conectar->prepare("SELECT * FROM perro WHERE id_perro = ?;");
$sentencia->execute([$id]);
$perro = $sentencia->fetch(PDO::FETCH_OBJ);
if($perro === FALSE){
	echo "¡No existe algún perro con ese ID!";
	exit();
}
*/
?>

<?php 
$conect = new Conectar();
$con = $conect->ConectarMetodo();
$sql = "SELECT* FROM perro order by id_perro desc limit 1";
$res = mysqli_query($con, $sql);
foreach ($res as $key) {
	$idp = $key['id_perro'];
}
	
$sentencia2 = $conectar->prepare("INSERT INTO detalle_perro (id_dueno, id_perro) VALUES (  ?, ?);");



$resulta2 = $sentencia2->execute([ $idd, $idp]);

#$sentencia = $conectar->prepare("SELECT nombre_cliente FROM cliente WHERE id_cliente = '$idd'");


$aud_datos = array($descripcion, $id_e, $datetime, $user_res);
$auditoria = new Auditoria();

 $auditoria->AuditoriaMetodo($aud_datos)==3;



/*
$sentencia = $conectar->prepare("INSERT INTO auditoria (descripcion, id_evento, datetime, user_res) VALUES (?, ?, ?, ?);");

$resultado = $sentencia->execute([$descripcion, $id_e, $datetime, $user_res]);
*/


if($resulta2 === TRUE){
	unset($idp);
	unset($idp2);
	header("Location: ./inicio.php?status=1");
	exit;
}

#te borra todo, no mentira, te suelta este mensaje
header("Location: ./inicio.php?status=2");
?>
