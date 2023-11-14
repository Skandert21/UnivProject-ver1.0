<?php
include "conectar.php";
@$idp = $_POST["idp"];
#id del cliente a adoptar
$cliente_adopta = $_POST['id_cli'];
if ($_POST["idp"]=='') {
	header("Location:DarMascotaEnAdopcion.php?status=8");
} else {

session_start();


#id mascota


$fecha = date('Y-m-d h:i:s');
$c = new Conectar();
$enlace = $c->ConectarMetodo();
$res_confirm = "";
#sacar datos del dueño
$sql = "SELECT * FROM detalle_perro WHERE id_perro = '$idp'";
$resultado = mysqli_query($enlace, $sql);
foreach ($resultado as $dueno) {
	$id_dueno_uno = $dueno['id_dueno'];
}
#datos mascota
$sql = "SELECT * FROM perro where id_perro = '$idp'";
$r = mysqli_query($enlace, $sql);
foreach ($r as $key) {
$nombre_mas = $key['nombre_perro'];
	$detalles = "de tipo ".$key['tipo']." y raza ".$key['raza_perro'];
}
#datos de cliente que va a adoptar
$sql ="SELECT * FROM cliente where id_cliente = '$cliente_adopta'";
$re = mysqli_query($enlace, $sql);
foreach ($re as $duenodato) {
	$nombre_du = $duenodato['nombre_cliente']." ".$duenodato['apellido_cliente'];
}
#datos del cliente que ya era dueno 
$sql ="SELECT * FROM cliente where id_cliente = '$id_dueno_uno'";
$re = mysqli_query($enlace, $sql);
foreach ($re as $duenodos) {
	$nombre_dd = $duenodos['nombre_cliente']." ".$duenodos['apellido_cliente'];
}

#confirmar
$sql = "SELECT * FROM detalle_perro WHERE id_perro = '$idp' and id_dueno = '$cliente_adopta'";
$resultado = mysqli_query($enlace, $sql);
foreach ($resultado as $key) {
	$res_confirm = $key['id_dueno'];
}


if ($_POST["idp"]=='' || $cliente_adopta == '') {
	header("Location:DarMascotaEnAdopcion.php?status=8&id_perro=$_POST[idp]");
	

}elseif($res_confirm == $cliente_adopta) {
header("Location:DarMascotaEnAdopcion.php?status=7&id_perro=$_POST[idp]");

} else {
$c = new SelectDatos();
		$conectar = $c->Buscador();

		$descripcion = "El usuario ".$_SESSION["username"]." realizó una constancia de adopción entre el anterior dueño ".$nombre_dd." portador de la cédula: ".$id_dueno_uno.", adopta el cliente ".$nombre_du." portadorde la cédula: ".$cliente_adopta.". La mascota a adoptar es ".$nombre_mas." ".$detalles." en el area de mascotas satisfactoriamente";
$id_e = "actualizar";
$datetime = date('Y-m-d H:i:s');
$user_res = $_SESSION['username'];

$aud_datos = array($descripcion, $id_e, $datetime, $user_res);
$auditoria = new Auditoria();

 $auditoria->AuditoriaMetodo($aud_datos)==3;



				$sql = "INSERT INTO adopcion(id_perro, id_dueno_uno, id_dueno_dos, fecha) VALUES('$idp','$id_dueno_uno', '$cliente_adopta', '$fecha')";
	            $resultado = mysqli_query($enlace, $sql);


$consulta_update=$conectar->prepare(' UPDATE detalle_perro SET  
					id_dueno=:id_dueno
					
					WHERE id_perro=:id_perro;'
				);
				$consulta_update->execute(array(
					':id_dueno' =>$cliente_adopta,
					
					':id_perro' =>$idp
                     

				));


				

	            header("Location: Inicio.php?status=1");
} 
}


?>