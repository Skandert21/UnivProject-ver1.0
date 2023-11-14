<?php
if(!isset($_POST["total"])) exit;
if ($_POST["total"] == 0) {
  header("Location:NuevaVenta.php?status=9");
} else {


session_start();
$total = $_POST["total"];

include_once "conectar.php";

$c= new SelectDatos();
$conectar= $c->Buscador();

header("Location: ./inicio.php?status=1");

$ahora = date("Y-m-d H:i:s");

$_SESSION["total"] = $_REQUEST["total"];
$to = $_REQUEST["total"];

$sentencia = $conectar->prepare("INSERT INTO ventas(fecha, total, id_cliente_venta) VALUES (?, ?, ?);");
$sentencia->execute([$ahora, $total, $_SESSION['id_c']]);

$sentencia = $conectar->prepare("SELECT id FROM ventas ORDER BY id DESC LIMIT 1;");
$sentencia->execute();
$resultado = $sentencia->fetch(PDO::FETCH_OBJ);

$idVenta = $resultado === false ? 1 : $resultado->id;

$e = new Conectar();
$ee = $e->ConectarMetodo();

$conectar->beginTransaction();
$sentencia = $conectar->prepare("INSERT INTO productos_vendidos(producto, id_venta, cantidad, subtotal) VALUES (?, ?, ?, ?);");

$sentenciaExistencia = $conectar->prepare("UPDATE productos SET existencia = existencia - ? WHERE idpr = ?;");
foreach ($_SESSION["carritoV"] as $producto) {
	$total += $producto->total;

$sql = "SELECT * FROM productos where idpr = '$producto->idpr'";
$res = mysqli_query($ee, $sql);
foreach ($res as $key) {
    $precioVenta = $key['precioVenta'];
}
    $subtotal = $producto->cantidad * $precioVenta;
	$sentencia->execute([$producto->idpr, $idVenta, $producto->cantidad, $subtotal]);
	$sentenciaExistencia->execute([$producto->cantidad, $producto->idpr]);
     $Aud_prod[] = [
        "idpr" => $producto->idpr,
        "cantidad" => $producto->cantidad,
    ];
}

$id_cli = $_SESSION['id_c'];

$sentencia = $conectar->prepare("SELECT *FROM cliente_venta WHERE id_c LIKE '$id_cli'");
$sentencia->execute();
$resultado=$sentencia->fetchAll();


foreach ($resultado as $dato) {
	$nombre_c = $dato['nombre_c'];
	$apellido_c = $dato['apellido_c'];
}


#movimiento
    /* id del movimiento*/
$idm;
/*Especificar si es entrada o salida*/
$movimiento = "Salida";
/* especificar motivo*/
$motivo = " Venta de productos al cliente "."V-".$id_cli.", ".$nombre_c." ".$apellido_c;
/*las ids de los productos.   $Aud_prod[] tiene los productos junto a sus cantidades a insertar*/
$producto ="";
/*el stock inicial de dicho producto.   en teoria los datos de esta variable deberían estar en ExisProd[]*/
$stock_init ="";
/*que es lo que entra o sale del inventario*/
$cambio = "";
/*el stock posterior a la transacción. aqui solo sumo o resto el init con la cantidad que va a entrar*/
$stock_fin ="";
foreach ($_SESSION["carritoV"] as $producto) {
$sta = $conectar->prepare("INSERT INTO movimientos(id_mov, movimiento,  motivo, producto, stock_inicial, cambio, stock_final, fecha) VALUES (?, ?, ?, ?,?, ?, ?, ?);");

$sta->execute([$idVenta, $movimiento, $motivo, $producto->descripcion, $producto->existencia, $producto->cantidad, $producto->existencia-$producto->cantidad, $ahora]);
}

$descripcion_dos = "El usuario ".$_SESSION["username"]." registró la venta al cliente ".$nombre_c." ".$apellido_c.", cédula ".$id_cli.". La venta consiste en: ";

         foreach ($Aud_prod as $AP) {
         	 $sentencia_select = $conectar->prepare("SELECT * FROM productos WHERE idpr = ?");
    $sentencia_select->execute([$AP['idpr']]);
    $resultado = $sentencia_select->fetch(PDO::FETCH_ASSOC);
    $nombre_prod = $resultado['descripcion'];
    $cod_prod = $resultado['codigo'];
    $descripcion_dos .= " " . $AP['cantidad'] . " unidades de " . $nombre_prod . ", código " . $cod_prod.", ";
         }


	$descripcion_dos.= " y un total de ".$total.", en el área de Ventas sección 'Tienda' satisfactoriamente";

$id_e = "insertar";
$datetime = date('Y-m-d H:i:s');
$user_res = $_SESSION['username'];

$sentencia = $conectar->prepare("INSERT INTO auditoria_dos (descripcion_dos, id_evento_dos, datetime_dos, user_res_dos) VALUES (?, ?, ?, ?);");

$resultado = $sentencia->execute([$descripcion_dos, $id_e, $datetime, $user_res]);

		



$conectar->commit();
unset($_SESSION["carritoV"]);
$_SESSION["carritoV"] = [];

unset($_SESSION["id_c"]);
$_SESSION["id_c"] = [];

unset($_SESSION["total"]);
$_SESSION["total"] = [];

}













?>