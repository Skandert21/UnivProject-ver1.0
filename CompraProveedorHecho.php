<?php
if(!isset($_POST["total"])) exit;

if ($_POST['total'] == 0) {
	header("Location:CompraProveedor.php?status=1");
} else
{

session_start();
$total = $_POST["total"];

include_once "conectar.php";
$c = new SelectDatos();
$conectar = $c->Buscador();



header("Location: ./inicio.php?status=1");

$ahora = date("Y-m-d");

$_SESSION["total"] = $_REQUEST["total"];
$to = $_REQUEST["total"];


$sentencia = $conectar->prepare("INSERT INTO compra_alproveedor(proveedor, hecho, total) VALUES (?, ?, ?);");
$sentencia->execute([ $_SESSION['id_p'], $ahora, $total,]);

$sentencia = $conectar->prepare("SELECT id FROM compra_alproveedor ORDER BY id DESC LIMIT 1;");
$sentencia->execute();
$resultado = $sentencia->fetch(PDO::FETCH_OBJ);

$idVenta = $resultado === false ? 1 : $resultado->id;
$idm = $resultadp->id;
$id_pro = $_SESSION['id_p'];

$e = new Conectar();
$ee = $e->ConectarMetodo();






$conectar->beginTransaction();
$sentencia = $conectar->prepare("INSERT INTO productos_comprados(producto,  id_compra, cantidad, subtotal, precioProducto) VALUES (?, ?, ?, ?,?);");


/*hacer un select para llamar los datos antes de hacerle update a productos*/
foreach ($_SESSION["carrito"] as $p) {
$st = $conectar->prepare("SELECT * FROM productos WHERE idpr = '$p->idpr';");
$st->execute();
$resultado = $st->fetchAll(PDO::FETCH_OBJ);
foreach ($resultado as $k) {
$ExisProd[] = ["existencia" => $k->existencia];

}
}

/*aqui inicia lo demas*/
$sentenciaExistencia = $conectar->prepare("UPDATE productos SET existencia = existencia + ? WHERE idpr = ?;");
foreach ($_SESSION["carrito"] as $producto) {
	$total += $producto->total;
	$subtotal = $producto->precioVenta * $producto->cantidad;
	$precioProducto = $subtotal/$producto->cantidad;

$sql = "SELECT * FROM productos where idpr = '$producto->idpr'";
$res = mysqli_query($ee, $sql);
foreach ($res as $key) {
	$precioVenta = $key['precioVenta'];
}
    
	$sentencia->execute([$producto->idpr, $idVenta, $producto->cantidad, $subtotal,$precioProducto]);
	$sentenciaExistencia->execute([$producto->cantidad, $producto->idpr]);

	 $Aud_prod[] = [
        "idpr" => $producto->idpr,
        "cantidad" => $producto->cantidad,
    ];

	}

	
 #inicio de datos para la auditoria

	$id_pro = $_SESSION['id_p'];
	
	$sentencia_select=$conectar->prepare("SELECT *FROM proveedor WHERE id_p LIKE '$id_pro'");
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	foreach ($resultado as $dato) {
		$nombre_p = $dato['nombre_p'];
		$apellido_p = $dato['apellido_p'];
	}
     

#movimiento
	/* id del movimiento*/
$idm;
/*Especificar si es entrada o salida*/
$movimiento = "Entrada";
/* especificar motivo*/
$motivo = " Compra de productos al proveedor "."J-".$id_pro.", ".$nombre_p;
/*las ids de los productos.   $Aud_prod[] tiene los productos junto a sus cantidades a insertar*/
$producto ="";
/*el stock inicial de dicho producto.   en teoria los datos de esta variable deberían estar en ExisProd[]*/
$stock_init ="";
/*que es lo que entra o sale del inventario*/
$cambio = "";
/*el stock posterior a la transacción. aqui solo sumo o resto el init con la cantidad que va a entrar*/
$stock_fin ="";
foreach ($_SESSION["carrito"] as $producto) {
$sta = $conectar->prepare("INSERT INTO movimientos(id_mov, movimiento,  motivo, producto, stock_inicial, cambio, stock_final, fecha) VALUES (?, ?, ?, ?,?, ?, ?, ?);");

$sta->execute([$idVenta, $movimiento, $motivo, $producto->descripcion, $producto->existencia, $producto->cantidad, $producto->existencia+$producto->cantidad, $ahora]);
}
#codigo con el que me ayude de una ia
/*
$sentencia_select=$conectar->prepare("SELECT *FROM productos WHERE id LIKE '$prod_id'");
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	foreach ($resultado as $dato) {
		$nombre_prod = $dato['descripcion'];
		$cod_prod = $dato['codigo'];
		}

*/
/*
$descripcion = "El usuario " . $_SESSION["username"] . " registró la compra al proveedor " . $nombre_p . " " . $apellido_p . ", cédula " . $id_pro . ". La compra consiste en:";
foreach ($auditoriaProductos as $p) {
    $sentencia_select = $conectar->prepare("SELECT * FROM productos WHERE id = ?");
    $sentencia_select->execute([$p['id']]);
    $resultado = $sentencia_select->fetch(PDO::FETCH_ASSOC);
    $nombre_prod = $resultado['descripcion'];
    $cod_prod = $resultado['codigo'];
    $descripcion .= "\n- " . $p['cantidad'] . " unidades de " . $nombre_prod . ", código " . $cod_prod;
}
$descripcion .= "\nTotal de la compra: " . $totalCompra . ".\nÁrea de Compras sección 'Tienda' satisfactoriamente";
*/
	$descripcion_dos = "El usuario ".$_SESSION["username"]." registró la compra al proveedor ".$nombre_p." ".$apellido_p.", cédula ".$id_pro.". La compra consiste en: ";

         foreach ($Aud_prod as $AP) {
         	 $sentencia_select = $conectar->prepare("SELECT * FROM productos WHERE idpr = ?");
    $sentencia_select->execute([$AP['idpr']]);
    $resultado = $sentencia_select->fetch(PDO::FETCH_ASSOC);
    $nombre_prod = $resultado['descripcion'];
    $cod_prod = $resultado['codigo'];
    $descripcion_dos .= " " . $AP['cantidad'] . " unidades de " . $nombre_prod . ", código " . $cod_prod.", ";
         }


	$descripcion_dos.= " y un total de ".$total.", en el área de Compras sección 'Tienda' satisfactoriamente";

$id_e = "insertar";
$datetime = date('Y-m-d H:i:s');
$user_res = $_SESSION['username'];

$sentencia = $conectar->prepare("INSERT INTO auditoria_dos (descripcion_dos, evento_dos, datetime_dos, user_res_dos) VALUES (?, ?, ?, ?);");

$resultado = $sentencia->execute([$descripcion_dos, $id_e, $datetime, $user_res]);




		
$conectar->commit();
unset($_SESSION["carrito"]);
$_SESSION["carrito"] = [];

unset($_SESSION["id_p"]);
$_SESSION["id_p"] = [];

unset($_SESSION["total"]);
$_SESSION["total"] = [];

}

?>