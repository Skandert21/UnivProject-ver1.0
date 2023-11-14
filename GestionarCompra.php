<!DOCTYPE html>
<html>
<head>
	<title>INVERSIONES MERLIZ</title>
</head>
<body style="background-color: #e9e9e9">

<?php 
include "Conectar.php";
include "top.php"; 
include "restrict2.php";

$c= new Conectar();
$enlace = $c->ConectarMetodo();

#for each para mostrar la info
@$id_con = $_GET['idc'];
$sql = "SELECT *from compra_alproveedor WHERE id ='$id_con'";
$resultado = mysqli_query($enlace, $sql);
foreach ($resultado as $dato) {
	$idprov = $dato['proveedor'];
	
}

# esto es para hacer un total?
$sql = "SELECT * from productos_comprados WHERE id_compra = '$id_con'";
$resultado = mysqli_query($enlace, $sql);
$_SESSION['TotalReal'] = 0;
foreach ($resultado as $key) {
	
	$_SESSION['TotalReal'] = $_SESSION['TotalReal']+ $key['subtotal'];
}

$_SESSION['id_con'] = $id_con;


?>


	<link rel="stylesheet" href="./css/bootstrap.css">
<link rel="stylesheet" href="./css/body.css">


<br>
<br>
<h1 class="centrado">Compra</h1>
<br>

<?php   if(isset($_GET["status"])){
               if($_GET["status"] === "2"){
                    ?>
                    <div class="alert alert-info">
                            <strong>El total no puede ser de 0$ :(</strong>
                        </div>
                         <?php } elseif ($_GET["status"] === "8") {?>
                          <div class="alert alert-info">
                            <strong>Error: </strong>Estás tratando de borrar una cantidad mayor a la existencia
                        </div>
                        <?php
                         } elseif ($_GET["status"] === "5") {?>
                         	<div class="alert alert-info">
                            <strong>Error: </strong>No ingresaste un valor
                        </div>
                        <?php
                         }}
                         ?>

<!-- registrar?-->
<div   class="container" style="margin-bottom: 100px; padding: 20px; background-color: #fff; text-shadow: 0 0 30px #fff;
			       box-shadow: 0 0 20px #333">
<div  class="">
<form action="" method="POST">
	 <?php 

$c = new Conectar();
$conectar = $c->ConectarMetodo();


$e= new SelectDatos();
$enlace = $e->Buscador();

if (isset($_POST['cantidad'])) {
	
$producto         = $_POST['idprod'];
$cantidad = $_POST['cantidad'];
$sql = "SELECT * FROM productos where idpr = '$producto'";
$res = mysqli_query($conectar, $sql);
foreach ($res as $k) {
    
	$precioVenta = $k['precioVenta'];
	$pd = $k['descripcion'];
	$existenciaConfirm= $k['existencia'];
}



$sql = "SELECT * FROM productos_comprados where id_compra = '$id_con' and producto = '$producto'";
$r = mysqli_query($conectar, $sql);
foreach ($r as $con) {
$sub = $con['subtotal'];
$k = $con['cantidad'];
$confirm = $con['producto'];
}

$sbr = $sub/$k;
$sbt = $sbr * $cantidad;
if ($confirm) {

	foreach ($r as $con2) {
		$idprodcom = $con2['id'];
	}


$consulta_update=$enlace->prepare("UPDATE productos_comprados SET cantidad= cantidad+:cantidad, subtotal = subtotal +:subtotal WHERE id=:id;");
				$consulta_update->execute(array(
					
					':cantidad' =>$cantidad,
					':subtotal' => $sbt,
					':id' =>$idprodcom,
				));

				
}else{

	$sql = "INSERT INTO productos_comprados(producto,id_compra, cantidad, subtotal) values('$producto','$id_con','$cantidad', '$sbt')";
$resultado = mysqli_query($conectar, $sql);


$consulta_update=$enlace->prepare('UPDATE compra_alproveedor SET 


                    total=:total
					
					


					WHERE id=:id;'
				);
				$consulta_update->execute(array(
					
					':total' =>$_SESSION['TotalReal'],
					
					':id' =>$id_con,
				));




}


#mov

$ahora = date("Y-m-d H:i:s");
	$cambio = $existenciaConfirm + $cantidad;
$movimiento = "Entrada";
$motivo = " Gestión de la compra con la id: ".$_SESSION["id_con"];
$producto;
$sql = "INSERT INTO movimientos(id_mov, movimiento,  motivo, producto, stock_inicial, cambio, stock_final, fecha) VALUES ('$_SESSION[id_con]', '$movimiento','$motivo', '$pd', '$existenciaConfirm', '$cantidad','$cambio' , '$ahora')";
$resultado = mysqli_query($conectar, $sql);

$enlace = $e->Buscador();
$consulta_update=$enlace->prepare('UPDATE productos SET 


                    existencia= existencia+ :existencia
					
					


					WHERE idpr=:idpr;'
				);
				$consulta_update->execute(array(
					
					':existencia' =>$cantidad,
					
					':idpr' =>$producto,
				));


header("Location:GestionarCompra.php?idc=$_SESSION[id_con]");
}
 ?> 


<br>
<br>
<br>
<?php


$sql = "SELECT * FROM productos
 inner join producto_proveedor on producto_proveedor.id_prod = productos.idpr
 inner join compra_alproveedor on compra_alproveedor.proveedor = producto_proveedor.id_prov
 inner join productos_comprados on compra_alproveedor.id = productos_comprados.id_compra
 where id_prov = '$idprov' 
 and productos_comprados.producto = productos.idpr
 and compra_alproveedor.id = '$_SESSION[id_con]' ";

$stmt = $enlace->prepare($sql);
$result = $stmt->execute();
$cosos=$stmt->fetchAll(\PDO::FETCH_OBJ);
?>

<select class ="form-control" style="" id="id" name="idprod">



<?php

foreach ($cosos as $coso) {
	# code...

?>
<option name="id" value="<?php print($coso->idpr);?>"><?php print($coso->codigo)."\n".($coso->descripcion);?></option>

<button>continuar</button>
<?php
}
?>

</select>

</tr>

<tr>

<label for="text"></label></tr>
<br>
<br>
<tr>

<input class="form-control" style="" id= "total" min="1" name="cantidad" required type="number" placeholder="cantidad" autocomplete="off">
</tr>
<br>

<tr><button style="margin-top: 50px;" type="submit" class="success">Registrar producto</button></tr>
<!--terminar-->
<tr><a class="btn_a" href="GestionarCompraHecho.php">Finalizar</a></tr>
<!--<tr><a class="btn_a" href="VerConsultas.php">Regresar</a></tr>-->
</form>
</div>
</div>
<?php 

if(isset($_SESSION['id_con'])) {
	

$id_con = $_SESSION['id_con'];
	$sql= "SELECT *
	         FROM productos_comprados
	         INNER JOIN productos ON productos_comprados.producto = productos.idpr 
	         WHERE id_compra = '$id_con'";
	$resultado = mysqli_query($conectar, $sql);

	?>

	
	<br>
	<h3 class="centrado">productos</h3>
	<br>

	<div  class="container" style="width: 65%; margin-right: 100px; margin-left: 240px; margin-bottom: 100px; padding: 20px; background-color: #fff; text-shadow: 0 0 30px #fff;
			       box-shadow: 0 0 20px #333">
	
<div class="col-xs-12">
<table class="table table-bordered">
<thead>

<th>producto</th>
<th>Cantidad a borrar</th>
<th>Cantidad que posee</th>
<th>Precio por unidad</th>
<th>subtotal</th>

<th>Borrar</th>
</thead>
<br>
<br>
	<?php foreach ($resultado as $fila) { ?>

<tbody>
<tr>
	<!-- borrar-->
	<form action="GestionarCompraBorrarProducto.php" method="POST">
	<td><?php echo $fila["descripcion"];?></td>
	<td><input type="number" name="cantidad" min="1" style="width: 90%" max="<?php echo $fila["cantidad"];?>" placeholder="cantidad que desee borrar"></input></td>
	<td><?php echo $fila["cantidad"];?></td>
	<td><?php echo $fila["precioProducto"]."$";?></td>
    <td><?php echo $fila["subtotal"]."$";?></td>



<!--<td><a class="btn_a" href="GestionarServicioBorrar.php?id_servicio=<?php echo $fila['id']; ?>">Borrar</a></td>-->
<td><button type="submit" value="<?php echo $fila['id']; ?>" class="delete" name="id" >Borrar</button></td>



</form>
	<?php }?>

	<strong class="centrado">Total: <?php echo $_SESSION["TotalReal"]."$";?></strong><?php } ?>
</tr>

</tbody>

</table>
</div>
</div>



</body>
</html>

