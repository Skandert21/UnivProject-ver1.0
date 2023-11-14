<!DOCTYPE html>
<html>
<head>
	<title>INVMERLIZ</title>
</head>
<body style="background-color: #e9e9e9">



<?php include_once "top.php" ?>
<?php
include_once "conectar.php";

unset($_SESSION['carritoV']);


$c = new SelectDatos();
$conectar = $c->Buscador();
$sentencia = $conectar->query("SELECT productos_vendidos.subtotal, ventas.total, ventas.fecha, ventas.id, ventas.id_cliente_venta, GROUP_CONCAT(	productos.codigo, '..',  productos.descripcion, '..', productos_vendidos.cantidad, '..', productos_vendidos.subtotal SEPARATOR '__') AS productos FROM ventas 
	INNER JOIN productos_vendidos ON productos_vendidos.id_venta = ventas.id 
	INNER JOIN productos ON productos.idpr = productos_vendidos.producto GROUP BY ventas.id ORDER BY ventas.id;");
$ventas = $sentencia->fetchAll(PDO::FETCH_OBJ);



if (!$ventas) {?>
	<div class="alert alert-warning">
							<strong>Al parecer no has realizado ninguna venta</strong>
						</div>
<?php

} 

if(isset($_POST['btn_buscar'])){
	$dt1 = $_POST['dt1'];
	$dt2 = $_POST['dt2'];

	$sentencia = $conectar->query("SELECT productos_vendidos.subtotal, ventas.total, ventas.fecha, ventas.id, ventas.id_cliente_venta, GROUP_CONCAT(	productos.codigo, '..',  productos.descripcion, '..', productos_vendidos.cantidad, '..', productos_vendidos.subtotal, SEPARATOR '__') AS productos FROM ventas 
	INNER JOIN productos_vendidos ON productos_vendidos.id_venta = ventas.id 
	INNER JOIN productos ON productos.idpr = productos_vendidos.producto 
    WHERE fecha BETWEEN '$dt1' and '$dt2' 
	GROUP BY ventas.id ORDER BY ventas.id;");
$ventas = $sentencia->fetchAll(PDO::FETCH_OBJ);

if (!$ventas) {?>
	<div class="alert alert-warning">
							<strong>¡Vaya, no hay ninguna venta registrada en esas fechas!</strong>
						</div>
<?php
}
}

?>

	<div class="col-xs-12">
		<h1 class="centrado">Ventas</h1>
		
<br>
<form class="centrado" method="post" action="">
<label for="dt1">Desde :</label>
<input type="date" name="dt1">
<label for="dt2">Hasta :</label>
<input type="date" name="dt2">
<input type="submit" class="info" name="btn_buscar" value="Buscar">
</form>

<div class="jaula">
			<a class="btn_a" href="VerClientesVentas.php">Nueva</a>

		</div>
		<br>
		<div class="" style="margin: 30px ; margin-bottom: 100px; padding: 20px; background-color: #fff; text-shadow: 0 0 30px #fff;
			       box-shadow: 0 0 20px #333">
		<table class="table table-bordered" id="tabla_ven">
			<thead>
				<tr>
					<th>Número</th>
					<th>Cliente</th>
					<th>Fecha</th>
					<th>Productos vendidos</th>
					<th>Total</th>
					<th>Gestionar</th>
					<th>Eliminar</th>
					<th>Reembolsar</th>
					<th>Factura</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($ventas as $venta){ 

					$idcv = $venta->id_cliente_venta;
$e = new Conectar();
$enlace = $e->ConectarMetodo();
$sel ="SELECT * FROM cliente_venta WHERE id_c = '$idcv'";

$res = mysqli_query($enlace, $sel);

foreach ($res as $result) {
$nombre = $result['nombre_c'];
$apellido = $result['apellido_c'];
}
					?>
				<tr>
					<td><?php echo $Rem =$venta->id ?></td>
					<td><?php echo $idcv = "C.I ".$venta->id_cliente_venta."<br>->".$nombre." ".$apellido."</br>" ?></td>
					<td><?php echo $venta->fecha ?></td>
<?php 

 ?>
					
					<td>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Código</th>
									<th>Descripción</th>
									<th>Cantidad</th>
									<th>Subtotal</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach(explode("__", $venta->productos) as $productosConcatenados){ 
								$producto = explode("..", $productosConcatenados)
								?>
								<tr>
									<td><?php echo $producto[0] ?></td>
									<td><?php echo $producto[1] ?></td>
									<td><?php echo $producto[2] ?></td>
									<td><?php echo $producto[3]."$"?></td>


								</tr>
								<?php } ?>
							</tbody>
						</table>
					</td>
					<td><?php echo $venta->total."$" ?></td>

					<form action="DeleteVenta.php" method="post">
					<td><a class="success" href="GestionarVenta.php?idc=<?php echo $Rem?>">Gestionar Venta</a></td>
					<td><button class="delete" id="borrado" onclick="return borrar()" name="borrado" value="<?php echo $venta->id?>">Eliminar</button></td></form>

					<td><a href="Reembolsar.php?Rem=<?php echo $Rem ?>" class="cancel" id="Rem" name="Rem">Reembolsar</a></td>
					<td><a class="info" href="FacturaVenta.php?factura=<?php echo $Rem?>">Generar factura</a></td>
					
<!-- cree una funcion que no se meter en un archivo por separado y que se ejecute aqui, arreglar eso. -->
<script type="text/javascript">
	function borrar(){
		var del = confirm('¿Está seguro que desea borrarlo? Los datos no se recuperarán');
		

if (del==true){

 alert('Hecho');       
    }

else {


event.preventDefault();

	alert('Proceso cancelado')

}
}</script>


				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	<script>

	new DataTable('#tabla_ven',{
              /* language:Traduccion,*/
			});

		</script>

</body>
</html>