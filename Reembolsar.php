<?php  

include_once "top.php";
include_once "conectar.php";

$id_rem = $_GET['Rem'];

$c = new SelectDatos();
$conectar = $c->Buscador();

$sentencia = $conectar->query("SELECT ventas.total, ventas.fecha, ventas.id, ventas.id_cliente_venta, GROUP_CONCAT(	productos.codigo, '..',  productos.descripcion, '..', productos_vendidos.cantidad, '..', productos_vendidos.idpv SEPARATOR '__') AS productos FROM ventas INNER JOIN productos_vendidos ON productos_vendidos.id_venta = ventas.id INNER JOIN productos ON productos.idpr = productos_vendidos.producto WHERE ventas.id = '$id_rem' GROUP BY ventas.id ORDER BY ventas.id;");
$ventas = $sentencia->fetchAll(PDO::FETCH_OBJ);




?>



<!DOCTYPE html>
<html>
<head>
	<title>REEMBOLSO</title>
</head>
<body style="background-color: #e9e9e9">
<h1 class="centrado">Reembolso</h1>

<br><br>

<h3 class="jaula">Compra a reembolsar</h3>
<br><div  class="jaula">
<a class="cancel" href="Ventas.php">Cancelar</a>
</div>
<div class="container" style="width: 68%; margin-right: 100px; margin-left: 240px; margin-bottom: 100px; padding: 20px; background-color: #fff; text-shadow: 0 0 30px #fff;
			       box-shadow: 0 0 20px #333" >
<table class="table table-bordered">
			<thead>
				<tr>
					<th>Número</th>
					<th>Cliente</th>
					<th>Fecha</th>
					<th>Productos vendidos</th>
					<th>Total</th>
				
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
					<td><?php echo $venta->id ?></td>
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
									<th>Cantidad para reembolsar</th>
									<th>Acción</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach(explode("__", $venta->productos) as $productosConcatenados){ 
								$producto = explode("..", $productosConcatenados)
								?>
								<form action="ProductoReembolsado.php" method="POST">
								<tr>
									<td><?php echo $producto[0] ?></td>
									<td><?php echo $producto[1] ?></td>
									<td><input required type="number" min="0" max="<?php echo $producto[2] ?>" value="<?php echo $producto[2] ?>" name="cantidad"></td>
									
                                     
									<td><button href="#" class="btn_a" required pattern="^(?!0)\d+$" type="submit" name="idpv" value="<?php echo $producto[3] ?>">Reembolsar</button></td></form>
								</tr>
								<?php } ?>
								

							</tbody>
						</table>
					</div>
					</td>
					<td><?php echo $venta->total."$" ?></td>


					<?php  } ?>












</body>
</html>

























