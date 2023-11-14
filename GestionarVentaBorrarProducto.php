<?php 

include "conectar.php";

$ahora = date("Y-m-d H:i:s");
session_start();
$e= new SelectDatos();
$enlace = $e->Buscador();

if (isset($_POST['id'])) {
#id de la compra (de productos comprados)
$ids = $_POST['id'];
#cantidad a borrar
$cantidadAborrar = $_POST['cantidad'];

if ($cantidadAborrar==0) {
	header("Location:GestionarVenta.php?idc=$_SESSION[id_con]&status=5");
}else{

$sbtBorrado = 0;
$c= new Conectar();
$conectar = $c->ConectarMetodo();

$sql = "SELECT *from productos_vendidos where idpv = '$ids' limit 1";
$resultado= mysqli_query($conectar, $sql);
foreach ($resultado as $key) {
	 $resta = $key['subtotal'];
	 $producto = $key['producto'];
}

#escoger valor de venta del producto
$sql = "SELECT *from productos where idpr = '$producto' limit 1";
$resultado= mysqli_query($conectar, $sql);
foreach ($resultado as $pr) {
	$sbtBorrado = $cantidadAborrar * $pr['precioVenta'];
	$existenciaConfirm = $pr['existencia'];
	$pd = $pr['descripcion'];
}

#mov

	$cambio = $existenciaConfirm+$cantidadAborrar;
$movimiento = "Entrada";
$motivo = " Gestión de la venta con la id: ".$_SESSION["id_con"];
$producto;
$sql = "INSERT INTO movimientos(id_mov, movimiento,  motivo, producto, stock_inicial, cambio, stock_final, fecha) VALUES ('$_SESSION[id_con]', '$movimiento','$motivo', '$pd', '$existenciaConfirm', '$cantidadAborrar','$cambio' , '$ahora')";
$resultado = mysqli_query($conectar, $sql);

#hasta aqui bien

$enlace = $e->Buscador();
$consulta_update=$enlace->prepare('UPDATE productos SET existencia = existencia + :existencia WHERE idpr=:idpr;');
$consulta_update->execute(array(':existencia' =>$cantidadAborrar,
					':idpr' =>$producto,
				));

$consulta_update=$enlace->prepare('UPDATE productos_vendidos SET 


                    cantidad= cantidad - :cantidad,
					subtotal= subtotal - :subtotal
					


					WHERE idpv=:id;'
				);
				$consulta_update->execute(array(
					
					':cantidad' =>$cantidadAborrar,
					':subtotal' =>$sbtBorrado,
					':id' =>$ids,
				));

#comprobar borrado

$sql = "SELECT* FROM productos_vendidos where idpv = '$ids'";
$resultado = mysqli_query($conectar, $sql);
foreach ($resultado as $ver) {
	$cantidadVer = $ver['cantidad'];
	}

#cambiar subtotal
if ($cantidadVer== 0) {

$sql = "DELETE FROM productos_vendidos where idpv = '$ids'";
$resultado = mysqli_query($conectar, $sql);
}



header("Location:GestionarVenta.php?idc=$_SESSION[id_con]");

}
}
?>