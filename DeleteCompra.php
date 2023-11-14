<?php
//idc es el id de la compra
$idc = $_POST['borrado'];
session_start();
include_once "conectar.php";


# datos de auditoria
$c = new SelectDatos();
$conectar = $c->Buscador();

#obtengo datos de la compra
$sentencia_select=$conectar->prepare("SELECT * FROM compra_alproveedor WHERE id LIKE '$idc'");
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

foreach ($resultado as $dato) {
	$id_pro = $dato['proveedor'];
	$hecho = $dato['hecho'];
	$total = $dato['total'];

}
//obtengo datos del proveedor
$sentencia_select=$conectar->prepare("SELECT * FROM proveedor WHERE id_p LIKE '$id_pro'");
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	foreach ($resultado as $dato) {
	$nombre = $dato['nombre_p'];
	$apellido = $dato['apellido_p'];
	}

//obtengo variables de los productos comprados
$sentencia_select=$conectar->prepare("SELECT * FROM productos_comprados WHERE id_compra LIKE '$idc'");
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	foreach ($resultado as $dato) {
	$aud_compra[] = [
        "producto" => $dato['producto'],
        "cantidad" => $dato['cantidad']
    ];
}
	


$descripcion_dos = "El usuario ".$_SESSION["username"]." eliminó la compra de ".$nombre." ".$apellido." con la cédula ".$idc.". La compra consistía en: ";

foreach ($aud_compra as $ac) {
	 $sentencia_select = $conectar->prepare("SELECT * FROM productos WHERE id = ?");
    $sentencia_select->execute([$ac['producto']]);
    $resultado = $sentencia_select->fetch(PDO::FETCH_ASSOC); 

     $nombre_prod = $resultado['descripcion'];
    $cod_prod = $resultado['codigo'];
    $descripcion_dos .= " " . $ac['cantidad'] . " unidades de " . $nombre_prod . ", código " . $cod_prod.", ";
         }






$descripcion_dos .="con un total de: ".$total." en el área de Compras, sección 'Tienda' satisfactoriamente";
$id_e = "eliminar";
$datetime = date('Y-m-d H:i:s');
$user_res = $_SESSION['username'];

#auditoria
$sentencia = $conectar->prepare("INSERT INTO auditoria_dos ( descripcion_dos, id_evento_dos, datetime_dos, user_res_dos) VALUES ( ?, ?, ?, ?);");

$resultado = $sentencia->execute([ $descripcion_dos, $id_e, $datetime, $user_res]);




$sentencia = $conectar->prepare("DELETE FROM compra_alproveedor WHERE id = ?;");
$resultado = $sentencia->execute([$idc]);
if($resultado === TRUE){
	header("Location: ./Compras.php");
	exit;
}
else echo "Algo salió mal";
?>