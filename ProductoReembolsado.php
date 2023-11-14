<?php


include_once "conectar.php";
$datoventacheck="";
$cantidad = $_POST['cantidad'];
$idpv = $_POST['idpv'];
$fecha =  date('Y-m-d H:i:s');

$c = new SelectDatos();
$conectar = $c->Buscador();

$e = new Conectar();
$enlace = $e->ConectarMetodo();
#datos de producto vendido
$sql = "SELECT * FROM productos_vendidos where idpv = '$idpv'";
$resultado = mysqli_query($enlace, $sql);

foreach ($resultado as $res ) {
	$idp = $res['producto'];
	$id_venta = $res['id_venta'];
	$cantidad_original = $res['cantidad'];
}
#datos de la venta
$sql = "SELECT * FROM ventas where id = '$id_venta'";
$resultado = mysqli_query($enlace, $sql);

foreach ($resultado as $ventas) {
	$id_cliente = $ventas['id_cliente_venta'];
}

#datos del producto en cuestión
$sql = "SELECT * FROM productos where idpr = '$idp'";
$resultado = mysqli_query($enlace, $sql);

foreach ($resultado as $pr ) {
	$precioVenta = $pr['precioVenta'];
	$nombreproducto = $pr['descripcion'];
}

$total_sol = $precioVenta * $cantidad;

var_dump($cantidad, $cantidad_original);



if ($cantidad > $cantidad_original) {

	header("Location: Tienda.php?status=2");
	exit();
} else {
#Codigo para insertar datos del reembolso
$sql = "INSERT INTO Reembolso(fecha_r, total_r, id_cliente_r) VALUES ('$fecha', '$total_sol', '$id_cliente')";
$res = mysqli_query($enlace, $sql);

#preparando los detalles del reembolso

$sql = "SELECT id_r FROM Reembolso ORDER BY id_r DESC LIMIT 1;";
$res = mysqli_query($enlace, $sql);
foreach ($res as $key) {
	$id_reembolso = $key['id_r'];
}

$sql = "INSERT INTO productos_reembolsados(producto, id_venta_r, cantidad) VALUES ('$idp', '$id_reembolso', '$cantidad')";
$res = mysqli_query($enlace, $sql);

$sql ="SELECT* FROM productos where idpr = '$idp'";
$res = mysqli_query($enlace, $sql);
foreach ($res as $product) {
	$sub = $product['precioVenta'];
	$existenciaConfirm = $product['existencia'];
	$pd = $product['descripcion'];
}

$subresta = $sub * $cantidad;

	#proceso de update

$consulta_update=$conectar->prepare(' UPDATE productos_vendidos SET  
					
					 cantidad = cantidad - :cantidad,
                      subtotal = subtotal - :subtotal

					WHERE idpv= :idpv;'
				);
				$consulta_update->execute(array(
					
					':cantidad' =>$cantidad,
					':subtotal' =>$subresta,
					':idpv' =>$idpv
				));


#consulta para actualizar la venta


$consulta_update=$conectar->prepare(' UPDATE ventas SET  
					
					 total = total - :total_sol


					WHERE id= :id;'
				);
				$consulta_update->execute(array(
					
					':total_sol' =>$total_sol,
					
					':id' =>$id_venta
				));

				$consulta_update=$conectar->prepare(' UPDATE productos SET  
					
					 existencia = existencia + :cantidad


					WHERE id= :id;'
				);
				$consulta_update->execute(array(
					
					':cantidad' =>$cantidad,
					
					':id' =>$idp
				));

$sql = "SELECT * FROM cliente_venta where id_c = '$id_cliente'";
$resultado = mysqli_query($enlace, $sql);
foreach ($resultado as $dato) {
	$nombre = $dato['nombre_c'];
	$apellido = $dato['apellido_c'];
}


#hacer el borrado de productos que quedan en 0
$sql = "SELECT * FROM productos_vendidos where idpv = '$idpv'";
$resultado = mysqli_query($enlace, $sql);

foreach ($resultado as $ck ) {
	$cantidad_restante = $ck['cantidad'];
}

if ($cantidad_restante == 0) {
	$sql = "DELETE FROM productos_vendidos where idpv = '$idpv'";
$resultado = mysqli_query($enlace, $sql);
}

#lo mismo pero para la venta completa
$sql = "SELECT * FROM ventas where id = '$id_venta'";
$resultado = mysqli_query($enlace, $sql);
foreach ($resultado as $datoventa) {
	$total_res = $datoventa['total'];
}
if ($total_res == 0) {
	$sql = "DELETE FROM ventas where id = '$id_venta'";
$resultado = mysqli_query($enlace, $sql);
$datoventacheck = 1;
}



$descripcion_dos = "El usuario ".$user_res." ha reembolsado la venta del cliente ".$nombre." ".$apellido.", portador de la cedula ".$id_cliente.". El reembolso consiste en ".$cantidad." unidad o unidades de ".$nombreproducto." en el area de Ventas, sección Tienda satisfactoriamente.";

if($datoventacheck==1){

$descripcion_dos .=" Se han reembolsado todos los productos de la venta por lo que se ha borrado el registro en el area de ventas.";
}



#mov

$ahora = date("Y-m-d H:i:s");
$cambio = $existenciaConfirm+$cantidad;
$movimiento = "Entrada";
$motivo = "Reembolso  de la venta con la id: ".$id_venta;
$producto;

$sql = "INSERT INTO movimientos(id_mov, movimiento,  motivo, producto, stock_inicial, cambio, stock_final, fecha) VALUES ('$id_venta', '$movimiento','$motivo', '$pd', '$existenciaConfirm', '$cantidad','$cambio' , '$ahora')";
$resultado = mysqli_query($enlace, $sql);

$id_e = "insertar";
$datetime = date('Y-m-d H:i:s');
$user_res = $_SESSION['username'];
$sql= "INSERT INTO auditoria_dos (descripcion_dos, evento_dos, datetime_dos, user_res_dos) VALUES ('$descripcion_dos', '$id_e',' $datetime', '$user_res')";
$resultado = mysqli_query($enlace, $sql);


Header("Location: inicio.php?status=1");

}




?>