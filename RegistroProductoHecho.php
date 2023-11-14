<?php

session_start();

include_once "conectar.php";
$c = new SelectDatos();
$conectar = $c->Buscador();

$codigo = $_POST["codigo"];
$descripcion = $_POST["descripcion"];
$precioVenta = $_POST["precioVenta"];
$minStock = $_POST["minStock"];
$maxStock = $_POST["maxStock"];
$unidad = $_POST["unidad"];
$user_res = $_SESSION['username'];
$categoria = $_POST['categoria'];
$proveedor = $_POST['proveedor'];
if (!$categoria  || !$proveedor || !$unidad) {
	header("Location: RegistroProducto.php?status=4");
} else {

if ($minStock>$maxStock) {
	header("Location: RegistroProducto.php?status=2");
}else{


$e = new Conectar();
$enlace = $e->ConectarMetodo();
#productos
$sql = "SELECT * FROM productos where idpr = '$codigo'";
$res = mysqli_query($enlace, $sql);
foreach ($res as $prod) {
	$idpr = $prod['codigo'];
}
#datos del prov
$sql = "SELECT * FROM proveedor where id_p = '$proveedor'";
$res = mysqli_query($enlace, $sql);
foreach ($res as $prov) {
	$idp = "J-".$prov['id_p'];
	$nomprov = $prov['nombre_p'];
}
#datos de la cat
$sql = "SELECT * FROM categoria where id_cat = '$categoria'";
$res = mysqli_query($enlace, $sql);
foreach ($res as $cat) {
	
	$nombre_cat = $cat['descripcion_cat'];
}




if ($idpr) {
	header("Location: inicio.php?status=2");
} else {
/*
$sentencia = $conectar->prepare("INSERT INTO productos(codigo, descripcion, precioVenta, existencia) VALUES (?, ?, ?, ?);");
$resultado = $sentencia->execute([$codigo, $descripcion, $precioVenta, $existencia]);
*/
$datos =  array($codigo, $descripcion, $precioVenta, $categoria, $unidad);
$p = new Producto();
$producto = $p->InsertarProducto($datos);

$sql = "SELECT * FROM productos order by idpr desc limit 1";
$res = mysqli_query($enlace, $sql);
foreach ($res as $p) {
	
	$prod = $p['idpr'];
}

$sql = "INSERT INTO stock (id_producto, cantidad_minima, cantidad_max) values ('$prod','$minStock','$maxStock')";
$res = mysqli_query($enlace, $sql);

$sql = "INSERT INTO producto_proveedor (id_prov, id_prod) values ('$proveedor','$prod')";
$res = mysqli_query($enlace, $sql);




$descripcion_dos = "El usuario ".$_SESSION["username"]." añadió el producto ".$descripcion. " con el código: ".$codigo.", con el precio de venta ".$precioVenta." en la categoria de ".$nombre_cat.", con el stock minimo de ".$minStock." y el stock maximo de ".$maxStock.", suministrado por el proveedor ".$idp." ".$nomprov." en el área de productos sección *Tienda* satisfactoriamente";
$id_e = "insertar";
$datetime = date('Y-m-d H:i:s');
$user_res = $_SESSION['username'];


$aud_datos = array($descripcion_dos, $id_e, $datetime, $user_res);
$a = new Auditoria();

$auditoria = $a->AuditoriaMetodoDos($aud_datos);
 

 	header("Location: inicio.php?status=1");

}
}
}

/*
$sentencia = $conectar->prepare("INSERT INTO auditoria_dos (descripcion_dos, id_evento_dos, datetime_dos, user_res_dos) VALUES (?, ?, ?, ?);");

$resultado = $sentencia->execute([$descripcion_dos, $id_e, $datetime, $user_res]);

if($resultado === TRUE){
	header("Location: ./VerProductos.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista";
*/
?>
