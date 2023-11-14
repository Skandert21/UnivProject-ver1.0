<!DOCTYPE html>
<html>
<head>
	<title>INVMERLIZ</title>
</head>
<body style="background-color: #e9e9e9">


<?php 

include "top.php"; 

include_once "conectar.php";

$c = new SelectDatos();
$conectar = $c->Buscador();
$sentencia = $conectar->query("SELECT reembolso.total_r, reembolso.fecha_r, reembolso.id_r, reembolso.id_cliente_r, GROUP_CONCAT(	productos.codigo, '..',  productos.descripcion, '..', productos_reembolsados.cantidad, '..', productos.precioVenta SEPARATOR '__') AS productos FROM reembolso INNER JOIN productos_reembolsados ON productos_reembolsados.id_venta_r = reembolso.id_r INNER JOIN productos ON productos.idpr = productos_reembolsados.producto GROUP BY reembolso.id_r ORDER BY reembolso.id_r;");
$ventas = $sentencia->fetchAll(PDO::FETCH_OBJ);

if (!$ventas) {?>
	<div class="alert alert-warning">
							<strong>Al parecer no tienes ningún reembolso registrado</strong>
						</div>
<?php }

if(isset($_POST['btn_buscar'])){
	$dt1 = $_POST['dt1'];
	$dt2 = $_POST['dt2'];
$sentencia = $conectar->query("SELECT reembolso.total_r, reembolso.fecha_r, reembolso.id_r, reembolso.id_cliente_r, GROUP_CONCAT(	productos.codigo, '..',  productos.descripcion, '..', productos_reembolsados.cantidad, '..', productos.precioVenta SEPARATOR '__') AS productos FROM reembolso 
	INNER JOIN productos_reembolsados ON productos_reembolsados.id_venta_r = reembolso.id_r 
	INNER JOIN productos ON productos.idpr = productos_reembolsados.producto 
	 WHERE fecha_r BETWEEN '$dt1' and '$dt2' 
	GROUP BY reembolso.id_r ORDER BY reembolso.id_r;");
$ventas = $sentencia->fetchAll(PDO::FETCH_OBJ);

if (!$ventas) {?>
	<div class="alert alert-warning">
							<strong>¡Vaya, no hay ningún reembolso registrado en esas fechas!</strong>
						</div>
<?php
}
}
?>


	<div class="col-xs-12">
		<h1 class="centrado">Ventas reembolsadas</h1>
		<br>
		<br>
		<br>
		<br>
<br>
<form class="centrado" method="post" action="">
<label for="dt1">Desde :</label>
<input type="date" name="dt1">
<label for="dt2">Hasta :</label>
<input type="date" name="dt2">
<input type="submit" class="info" name="btn_buscar" value="Buscar">
</form>
		<br>
		<div class="container" style=" margin-bottom: 100px; padding: 20px; background-color: #fff; text-shadow: 0 0 30px #fff;
			       box-shadow: 0 0 20px #333">
		<table class="table table-bordered" id="tabla_ven">
			<thead>
				<tr>
					<th>Número</th>
					<th>Cliente</th>
					<th>Fecha</th>
					<th>Productos reembolsados</th>
					<th>Total</th>
					<th>Factura</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($ventas as $venta){ 

					$idcv = $venta->id_cliente_r;
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
					<td><?php echo $Rem =$venta->id_r ?></td>
					<td><?php echo $idcv = "C.I ".$venta->id_cliente_r."<br>->".$nombre." ".$apellido."</br>" ?></td>
					<td><?php echo $venta->fecha_r ?></td>

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
									<td><?php echo $producto[3] * $producto[2]?></td>


								</tr>
								<?php } ?>
							</tbody>
						</table>
					</td>
					<td><?php echo $venta->total_r ?></td>




<td><a class="info" href="FacturaReembolso.php?factura=<?php echo $Rem ?>">Generar factura</a></td>
<form method="post" action="DeleteReembolso.php">
<td><button type="submit" name="borrado" value="<?php echo $Rem; ?>" onclick="return borrar()" class="delete">Eliminar</button>
</td>
<script>

	function borrar(){
		var del = confirm('¿Está seguro que desea borrarlo? Los datos no se recuperarán');
		

if (del==true){

 alert('Hecho');       
    }

else {
//no se si sirve xdd
event.preventDefault()



	alert('Proceso cancelado')

}
}
</script>
</form>
				<?php } ?>

</tr>
</tbody>
</table>
</div>
<script>

	new DataTable('#tabla_ven',{
               language:Traduccion,
			});

		</script>



</body>
</html>