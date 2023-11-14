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
	header("Location:GestionarCompra.php?idc=$_SESSION[id_con]&status=5");
} else {

$sbtBorrado = 0;
$c= new Conectar();
$conectar = $c->ConectarMetodo();

$sql = "SELECT *from productos_comprados where id= '$ids' limit 1";
$resultado= mysqli_query($conectar, $sql);
foreach ($resultado as $key) {
	 
	
	 $resta = $key['subtotal'];
	 $k = $key['cantidad'];
	 $producto = $key['producto'];
}

 $sbt = $resta/$k;
 $sbtBorrado = $cantidadAborrar * $sbt;

#escoger valor de venta del producto
$sql = "SELECT *from productos where idpr= '$producto' limit 1";
$resultado= mysqli_query($conectar, $sql);
foreach ($resultado as $pr) {
	$existenciaConfirm = $pr['existencia'];
	$pd = $pr["descripcion"];
}

if ($cantidadAborrar > $existenciaConfirm) {
	header("Location: GestionarCompra.php?idc=$_SESSION[id_con]&status=8");
} else {
#hasta aqui bien


#mov
	$cambio = $existenciaConfirm-$cantidadAborrar;
$movimiento = "Salida";
$motivo = " Gestión de la compra con la id: ".$_SESSION["id_con"];
$producto;
$sql = "INSERT INTO movimientos(id_mov, movimiento,  motivo, producto, stock_inicial, cambio, stock_final, fecha) VALUES ('$_SESSION[id_con]', '$movimiento','$motivo', '$pd', '$existenciaConfirm', '$cantidadAborrar','$cambio' , '$ahora')";





$enlace = $e->Buscador();
$consulta_update=$enlace->prepare('UPDATE productos SET 


                    existencia= existencia - :existencia
					
					


					WHERE idpr=:idpr;'
				);
				$consulta_update->execute(array(
					
					':existencia' =>$cantidadAborrar,
					
					':idpr' =>$producto,
				));


$consulta_update=$enlace->prepare('UPDATE productos_comprados SET 


                    cantidad= cantidad - :cantidad,
					subtotal= subtotal - :subtotal
					


					WHERE id=:id;'
				);
				$consulta_update->execute(array(
					
					':cantidad' =>$cantidadAborrar,
					':subtotal' =>$sbtBorrado,
					':id' =>$ids,
				));


$resultado = mysqli_query($conectar, $sql);
#comprobar borrado

$sql = "SELECT* FROM productos_comprados where id = '$ids'";
$resultado = mysqli_query($conectar, $sql);
foreach ($resultado as $ver) {
	$cantidadVer = $ver['cantidad'];
	}

#cambiar subtotal
if ($cantidadVer== 0) {

$sql = "DELETE FROM productos_comprados where id = '$ids'";
$resultado = mysqli_query($conectar, $sql);
}



header("Location:GestionarCompra.php?idc=$_SESSION[id_con]");
}
}
}
?>