<?php
if (!isset($_POST["codigo"])) {
    return;
}

$cantidadC =$_POST["cantidad"];
$precioCompra = $_POST['precioCompra'];
$codigo = $_POST["codigo"];
include_once "conectar.php";
$c= new SelectDatos();
$conectar = $c->Buscador();

$sentencia = $conectar->prepare("SELECT * FROM productos WHERE codigo = ? LIMIT 1;");
$sentencia->execute([$codigo]);
$producto = $sentencia->fetch(PDO::FETCH_OBJ);

$codigodo = "";


# Si no existe, salimos y lo indicamos
if (!$producto) {
    header("Location: ./CompraProveedor.php?status=4");
    exit;
}



# Si no hay existencia...



session_start();
# Buscar producto dentro del cartito
$indice = false;
for ($i = 0; $i < count($_SESSION["carrito"]); $i++) {
    if ($_SESSION["carrito"][$i]->codigo === $codigo) {
        $indice = $i;
        break;
    }
}


if ($_SESSION["carrito"][$i]->codigo === $codigo) {
        $indice = $i;
        
header("Location: ./CompraProveedor.php?status=7");
    exit;
 }

# Si no existe, lo agregamos como nuevo
if ($indice === false) {
    $producto->cantidad = $cantidadC;
    $producto->total = $precioCompra * $cantidadC;
    $producto->precioVenta = $precioCompra;
    array_push($_SESSION["carrito"], $producto);
} else {
    # Si ya existe, se agrega la cantidad
    # Pero espera, tal vez ya no haya
    $cantidadExistente = $_SESSION["carrito"][$indice]->cantidad;
   
    
#ca,mboar

   $_SESSION["carrito"][$indice]->cantidad;
    $_SESSION["carrito"][$indice]->total = $_SESSION["carrito"][$indice]->cantidad * $precioCompra;
}

header("Location: ./CompraProveedor.php");


