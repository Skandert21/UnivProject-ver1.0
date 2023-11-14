<?php
//idc es el id de la compra
$idc = $_POST['borrado'];
session_start();
include_once "conectar.php";


# datos de auditoria
$c = new SelectDatos();
$conectar = $c->Buscador();

#obtengo datos de la compra
$sentencia_select=$conectar->prepare("SELECT * FROM reembolso WHERE id_r LIKE '$idc'");
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

foreach ($resultado as $dato) {
	$id_pro = $dato['id_cliente_r'];
	$hecho = $dato['fecha_r'];
	$total = $dato['total_r'];

}
//obtengo datos del proveedor
$sentencia_select=$conectar->prepare("SELECT * FROM cliente_venta WHERE id_c LIKE '$id_pro'");
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	foreach ($resultado as $dato) {
	$nombre = $dato['nombre_c'];
	$apellido = $dato['apellido_c'];
	}

//obtengo variables de los productos comprados
$sentencia_select=$conectar->prepare("SELECT * FROM productos_reembolsados WHERE id_venta_r = '$idc'");
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	foreach ($resultado as $dato) {
	$aud_compra[] = [
        "producto" => $dato['producto'],
        "cantidad" => $dato['cantidad']
    ];
}
	


$descripcion_dos = "El usuario ".$_SESSION["username"]." eliminó la venta reembolsada de ".$nombre." ".$apellido." con la cédula ".$idc.". La venta reembolsada consistía en: ";

foreach ($aud_compra as $ac) {
	 $sentencia_select = $conectar->prepare("SELECT * FROM productos WHERE id = ?");
    $sentencia_select->execute([$ac['producto']]);
    $resultado = $sentencia_select->fetch(PDO::FETCH_ASSOC); 

     $nombre_prod = $resultado['descripcion'];
    $cod_prod = $resultado['codigo'];
    $descripcion_dos .= " " . $ac['cantidad'] . " unidades de " . $nombre_prod . ", código " . $cod_prod.", ";
         }






$descripcion_dos .="con un total de: ".$total." en el área de ventas reembolsadas, sección 'Tienda' satisfactoriamente";
$id_e = 124;
$datetime = date('Y-m-d H:i:s');
$user_res = $_SESSION['username'];

#auditoria
$sentencia = $conectar->prepare("INSERT INTO auditoria_dos ( descripcion_dos, id_evento_dos, datetime_dos, user_res_dos) VALUES ( ?, ?, ?, ?);");

$resultado = $sentencia->execute([ $descripcion_dos, $id_e, $datetime, $user_res]);




$sentencia = $conectar->prepare("DELETE FROM reembolso WHERE id_r = ?;");
$resultado = $sentencia->execute([$idc]);
if($resultado === TRUE){
	header("Location: ./VentasReembolsadas.php");
	exit;
}
else echo "Algo salió mal";
?>