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
$sql = "SELECT *from ventas WHERE id ='$id_con'";
$resultado = mysqli_query($enlace, $sql);
foreach ($resultado as $dato) {
	
	
}

# esto es para hacer un total?
$sql = "SELECT * from productos_vendidos WHERE id_venta = '$id_con'";
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
<h1 class="centrado">Venta</h1>
<br>


<br>
<div  class="container" style="width: 65%; margin-right: 100px; margin-left: 240px; margin-bottom: 100px; padding: 20px; background-color: #fff; text-shadow: 0 0 30px #fff;
			       box-shadow: 0 0 20px #333">
<h4 class="centrado">Ingresar producto</h4>

<?php   if(isset($_GET["status"])){
               if($_GET["status"] === "2"){
                    ?>
                    <div class="alert alert-info">
                            <strong>El total no puede ser de 0$ :(</strong>
                        </div>
                         <?php } elseif ($_GET["status"] === "8") {?>
                          <div class="alert alert-info">
                            <strong>Error: </strong>Estás tratando de añadir una cantidad mayor a la existencia
                        </div>
                        <?php
                         } elseif ($_GET["status"] === "5") {?>
                         <div class="alert alert-info">
                            <strong>Error: </strong>No ingresaste un valor
                        </div>
                        
                        <?php }
                    }
                         ?>

<!-- registrar?-->
<div  class="" style="margin-left: 45px ; margin-right: 45px;">
<form action="" method="POST">
	 <?php 

$c = new Conectar();
$conectar = $c->ConectarMetodo();


$e= new SelectDatos();
$enlace = $e->Buscador();

if (isset($_POST['cantidad'])) {

$producto  = $_POST['idprod'];
$cantidad = $_POST['cantidad'];
$sql = "SELECT * FROM productos where idpr = '$producto' and pp_check = 0";
$res = mysqli_query($conectar, $sql);
foreach ($res as $k) {
    
	$precioVenta = $k['precioVenta'];
}
$sbt = $precioVenta * $cantidad;

	#escoger valor de venta del producto
$sql = "SELECT *from productos where idpr= '$producto' and pp_check = 0 limit 1";
$resultado= mysqli_query($conectar, $sql);
foreach ($resultado as $pr) {
	$sbtBorrado = $cantidad * $pr['precioVenta'];
	$existenciaConfirm = $pr['existencia'];
	$pd = $pr['descripcion'];
}

if ($cantidad > $existenciaConfirm) {
	header("Location: GestionarVenta.php?idc=$_SESSION[id_con]&status=8");
}

else {

$sql = "SELECT * FROM productos_vendidos where id_venta = '$id_con' and producto = '$producto'";
$r = mysqli_query($conectar, $sql);
foreach ($r as $con) {

$confirm = $con['producto'];
}
if ($confirm) {

	foreach ($r as $con2) {
		$idprodcom = $con2['idpv'];
	}



$consulta_update=$enlace->prepare("UPDATE productos_vendidos SET cantidad= cantidad+:cantidad, subtotal = subtotal +:subtotal WHERE idpv=:id;");
				$consulta_update->execute(array(
					
					':cantidad' =>$cantidad,
					':subtotal' => $sbt,
					':id' =>$idprodcom,
				));
		
}else{

	$sql = "INSERT INTO productos_vendidos(producto,id_venta, cantidad, subtotal) values('$producto','$id_con','$cantidad', '$sbt')";
$resultado = mysqli_query($conectar, $sql);


$consulta_update=$enlace->prepare('UPDATE ventas SET 


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
	$cambio = $existenciaConfirm-$cantidad;
$movimiento = "Salida";
$motivo = " Gestión de la venta con la id: ".$_SESSION["id_con"];
$producto;
$sql = "INSERT INTO movimientos(id_mov, movimiento,  motivo, producto, stock_inicial, cambio, stock_final, fecha) VALUES ('$_SESSION[id_con]', '$movimiento','$motivo', '$pd', '$existenciaConfirm', '$cantidad','$cambio' , '$ahora')";
$resultado = mysqli_query($conectar, $sql);

$enlace = $e->Buscador();
$consulta_update=$enlace->prepare('UPDATE productos SET 


                    existencia= existencia- :existencia
					
					


					WHERE idpr=:idpr;'
				);
				$consulta_update->execute(array(
					
					':existencia' =>$cantidad,
					
					':idpr' =>$producto,
				));


header("Location:GestionarVenta.php?idc=$_SESSION[id_con]");
}
}
 ?> 


<br>
<br>
<br>
<?php


$sql = "SELECT * FROM productos where pp_check = 0";

$stmt = $enlace->prepare($sql);
$result = $stmt->execute();
$cosos=$stmt->fetchAll(\PDO::FETCH_OBJ);
?>
<label><strong>Producto:</strong></label>
<select class ="form-control"  id="id" name="idprod">



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
<br>
<tr>

<label for="text"></label></tr>
<br>
<br>
<tr>
<label><strong>cantidad:</strong></label>
<input class="form-control" style="" id= "total" min="1" name="cantidad" required type="number" placeholder="cantidad" autocomplete="off">
</tr>
<br>
<br>
<tr><button style="margin-top: ;" type="submit" class="success">Registrar producto</button></tr>
<!--terminar-->
<tr><a class="btn_a" href="GestionarVentaHecho.php">Finalizar</a></tr>
<!--<tr><a class="btn_a" href="VerConsultas.php">Regresar</a></tr>-->
</form>
</div>
</div>

<?php 

if(isset($_SESSION['id_con'])) {
	

$id_con = $_SESSION['id_con'];
	$sql= "SELECT *
	         FROM productos_vendidos
	         INNER JOIN productos ON productos_vendidos.producto = productos.idpr 
	         WHERE id_venta = '$id_con'";
	$resultado = mysqli_query($conectar, $sql);

	?>

	<br>
	

	<h2 class="centrado">productos</h2>
	<br>

		<div class="col-xs-12">

			<div class="container" style=" margin-bottom: 100px; padding: 20px; background-color: #fff; text-shadow: 0 0 30px #fff;
			       box-shadow: 0 0 20px #333">
<table class="table table-bordered">
<thead>

<th>producto</th>
<th>Cantidad a borrar</th>
<th>Cantidad que posee</th>
<th>subtotal</th>

<th>Borrar</th>
</thead>
<br>
<br>
	<?php foreach ($resultado as $fila) { ?>

<tbody>
<tr>
	<!-- borrar-->
	<form action="GestionarVentaBorrarProducto.php" method="POST">
	<td><?php echo $fila["descripcion"];?></td>
	<td><input style=" width: 90%" name="cantidad" minlength="1" type="number" min="1" max="<?php echo $fila['cantidad']?>" placeholder="cantidad que desee borrar"></input></td>
	<td><?php echo $val = $fila["cantidad"];?></td>
    <td><?php echo $fila["subtotal"]."$";?></td>


<td><button type="submit" value="<?php echo $fila["idpv"]; ?>" class="delete" name="id" >Borrar</button></td>



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

