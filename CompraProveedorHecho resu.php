<?php

if (!isset($_POST["total"])) {
    exit;
}

session_start();
$totalCompra = $_POST["total"];
include_once "conectar.php";

$ahora = date("Y-m-d H:i:s");
$_SESSION["total"] = $_REQUEST["total"];
$to = $_REQUEST["total"];

$sentencia = $conectar->prepare("INSERT INTO compra_alproveedor(proveedor, hecho, total) VALUES (?, ?, ?);");
$sentencia->execute([ $_SESSION['id_p'], $ahora, $totalCompra]);

$idVenta = $conectar->lastInsertId();

$conectar->beginTransaction();
$sentenciaProducto = $conectar->prepare("INSERT INTO productos_comprados(producto,  id_compra, cantidad) VALUES (?, ?, ?);");
$sentenciaExistencia = $conectar->prepare("UPDATE productos SET existencia = existencia + ? WHERE id = ?;");

$auditoriaProductos = array();
foreach ($_SESSION["carrito"] as $producto) {
    $sentenciaProducto->execute([$producto->id, $idVenta, $producto->cantidad]);
    $sentenciaExistencia->execute([$producto->cantidad, $producto->id]);
    $auditoriaProductos[] = [
        "id" => $producto->id,
        "cantidad" => $producto->cantidad,
    ];
}

$id_pro = $_SESSION['id_p'];
$sentencia_select = $conectar->prepare("SELECT * FROM proveedor WHERE id_p LIKE ?");
$sentencia_select->execute([$id_pro]);
$resultado = $sentencia_select->fetchAll();

foreach ($resultado as $dato) {
    $nombre_p = $dato['nombre_p'];
    $apellido_p = $dato['apellido_p'];
}

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

$id_e = 124;
$datetime = date('Y-m-d H:i:s');
$user_res = $_SESSION['username'];

$sentencia = $conectar->prepare("INSERT INTO auditoria_dos (descripcion_dos, id_evento_dos, datetime_dos, user_res_dos) VALUES (?, ?, ?, ?);");
$resultado = $sentencia->execute([$descripcion, $id_e, $datetime, $user_res]);

$conectar->commit();
unset($_SESSION["carrito"]);
unset($_SESSION["id_p"]);
unset($_SESSION["total"]);
header("Location: ./CompraProveedor.php?status=1");
exit;

?>