<?php
//idc es el id de la compra
$idv = $_POST['borrado'];
session_start();
include_once "conectar.php";

$c = new SelectDatos();
$conectar =$c->Buscador();
# datos de auditoria

#obtengo datos de la venta
$sentencia_select=$conectar->prepare("SELECT * FROM ventas WHERE id LIKE '$idv'");
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

foreach ($resultado as $dato) {
	$id_cli = $dato['id_cliente_venta'];
	
	$total = $dato['total'];

}
//obtengo datos del cliente
$sentencia_select=$conectar->prepare("SELECT * FROM cliente_venta WHERE id_c LIKE '$id_cli'");
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	foreach ($resultado as $dato) {
	$nombre = $dato['nombre_c'];
	$apellido = $dato['apellido_c'];
	}

//obtengo variables de los productos comprados
$sentencia_select=$conectar->prepare("SELECT * FROM productos_vendidos WHERE id_venta LIKE '$idv'");
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	foreach ($resultado as $dato) {
	$aud_venta[] = [
        "producto" => $dato['producto'],
        "cantidad" => $dato['cantidad']
    ];
}
	


$descripcion_dos = "El usuario ".$_SESSION["username"]." eliminó la venta de ".$nombre." ".$apellido." con la cédula ".$id_cli.". La venta consistía en: ";

foreach ($aud_venta as $ac) {
	 $sentencia_select = $conectar->prepare("SELECT * FROM productos WHERE id = ?");
    $sentencia_select->execute([$ac['producto']]);
    $resultado = $sentencia_select->fetch(PDO::FETCH_ASSOC); 

     $nombre_prod = $resultado['descripcion'];
    $cod_prod = $resultado['codigo'];
    $descripcion_dos .= " " . $ac['cantidad'] . " unidades de " . $nombre_prod . ", código " . $cod_prod.", ";
         }






$descripcion_dos .=" con un total de: ".$total." en el área de Compras, sección 'Tienda' satisfactoriamente";
$id_e = "eliminar";
$datetime = date('Y-m-d H:i:s');
$user_res = $_SESSION['username'];

#auditoria
$sentencia = $conectar->prepare("INSERT INTO auditoria_dos ( descripcion_dos, id_evento_dos, datetime_dos, user_res_dos) VALUES ( ?, ?, ?, ?);");

$resultado = $sentencia->execute([ $descripcion_dos, $id_e, $datetime, $user_res]);




$sentencia = $conectar->prepare("DELETE FROM ventas WHERE id = ?;");
$resultado = $sentencia->execute([$idv]);
if($resultado === TRUE){
	header("Location: ./Ventas.php");
	exit;
}
else echo "Algo salió mal";
?>