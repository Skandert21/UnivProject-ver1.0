<?php
if (!isset($_POST["codigo"])) {
    return;
}
include_once "conectar.php";
$c = new SelectDatos();
$conectar = $c->Buscador();
$codigo = $_POST["codigo"];
$cantidadV = $_POST["cantidad"];

$sentencia = $conectar->prepare("SELECT * FROM productos inner join unidad_producto on unidad_producto.id = productos.unidad WHERE codigo = ? LIMIT 1;");
$sentencia->execute([$codigo]);
$producto = $sentencia->fetch(PDO::FETCH_OBJ);
# Si no existe, salimos y lo indicamos
if (!$producto) {
    header("Location: ./NuevaVenta.php?status=4");
    exit;
}
# Si no hay existencia...
if ($producto->existencia < 1) {
    header("Location: ./NuevaVenta.php?status=5");
    exit;
}
session_start();
# Buscar producto dentro del cartito
$indice = false;
for ($i = 0; $i < count($_SESSION["carritoV"]); $i++) {
    if ($_SESSION["carritoV"][$i]->codigo === $codigo) {
        $indice = $i;
        break;
    }
}
if ($_SESSION["carritoV"][$i]->codigo === $codigo) {
        $indice = $i;
        
header("Location: ./NuevaVenta.php?status=7");
    exit;
 }

if ( $cantidadV  > $producto->existencia) {
        header("Location: ./NuevaVenta.php?status=11");
        exit;
    }
# Si no existe, lo agregamos como nuevo
if ($indice === false) {
    $producto->cantidad = $cantidadV;
    $producto->total = $producto->precioVenta * $cantidadV;
    array_push($_SESSION["carritoV"], $producto);
} else {
    # Si ya existe, se agrega la cantidad
    # Pero espera, tal vez ya no haya
   # $cantidadExistente = $_SESSION["carritoV"][$indice]->cantidad;
    # si al sumarle uno supera lo que existe, no se agrega
   

    $_SESSION["carritoV"][$indice]->total =$_SESSION["carritoV"][$indice]->cantidad * $_SESSION["carritoV"][$indice]->precioVenta;
}
 
header("Location: ./NuevaVenta.php");
