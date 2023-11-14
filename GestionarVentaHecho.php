<?php

session_start();


include_once "conectar.php";
$id_con = $_SESSION['id_con'];
$Total =$_SESSION['TotalReal'];
$id_e = "actualizar";
$datetime = date('Y-m-d h:i:s');
$user_res = $_SESSION['username'];


/*
$sql = "SELECT * FROM where id_con = '$id_con'";
$e = new Conectar();
$enlace = $e->ConectarMetodo();
$mysqli_query 

*/
if ($Total == 0) {
	header("Location: GestionarVenta.php?$_SESSION[id_con]&status=2");
} else {




/*
;
*/
$c = new SelectDatos();
$conectar = $c->Buscador();
$consulta_update=$conectar->prepare("UPDATE ventas SET total=:total WHERE id=:id;"
				);
				$consulta_update->execute(array(
					
					':total' =>$Total,

					
					':id' =>$id_con,
				));


$e = new Conectar();
$ee = $e->ConectarMetodo();

$sql = "SELECT * FROM productos_vendidos
 inner join productos on productos_vendidos.producto = productos.idpr
 where id_venta= '$id_con'";
$res = mysqli_query($ee, $sql);
foreach ($res as $key) {
	$precioVenta = $key['precioVenta'];
}
     
	 $Aud_prod[] = [
        "idpr" => $key['idpr'],
        "cantidad" => $key['cantidad'],
    ];

	}

	
 #inicio de datos para la auditoria

$sql = "SELECT * FROM ventas where id= '$id_con'";
$res = mysqli_query($ee, $sql);
foreach ($res as $prov) {
	$id_pro = $prov['cliente'];
}
	
	$sentencia_select=$conectar->prepare("SELECT *FROM cliente_venta WHERE id_c LIKE '$id_pro'");
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	foreach ($resultado as $dato) {
		$nombre_p = $dato['nombre_c'];
		$apellido_p = $dato['apellido_c'];
	}
     
/*
     foreach ($_SESSION["carrito"] as $producto) {
	     
	    $prod_id = $producto->id;
	     $prod_total_can = $producto->cantidad;
}
*/
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
	$descripcion_dos = "El usuario ".$_SESSION["username"]." registró actualizó la información de compra del proveedor de ".$nombre_p." ".$apellido_p.", cédula ".$id_pro.". La compra consiste en: ";

         foreach ($Aud_prod as $AP) {
         	 $sentencia_select = $conectar->prepare("SELECT * FROM productos WHERE idpr = ?");
    $sentencia_select->execute([$AP['idpr']]);
    $resultado = $sentencia_select->fetch(PDO::FETCH_ASSOC);
    $nombre_prod = $resultado['descripcion'];
    $cod_prod = $resultado['codigo'];
    $descripcion_dos .= " " . $AP['cantidad'] . " unidades de " . $nombre_prod . ", código " . $cod_prod.", ";
         }


	$descripcion_dos.= " y un total de ".$Total.", en el área de Compras sección 'Tienda' satisfactoriamente";

$id_e = 124;
$datetime = date('Y-m-d H:i:s');
$user_res = $_SESSION['username'];

$sentencia = $conectar->prepare("INSERT INTO auditoria_dos (descripcion_dos, id_evento_dos, datetime_dos, user_res_dos) VALUES (?, ?, ?, ?);");

$resultado = $sentencia->execute([$descripcion_dos, $id_e, $datetime, $user_res]);




		
unset($_SESSION["carrito"]);
$_SESSION["carrito"] = [];

unset($_SESSION["id_p"]);
$_SESSION["id_p"] = [];

unset($_SESSION["total"]);
$_SESSION["total"] = [];

header("Location: ./inicio.php?status=1");
?>