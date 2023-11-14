<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body style="background-color: #e9e9e9">


<?php include_once "top.php" ?>
<?php
include_once "conectar.php";

unset($_SESSION['carrito']);



$c = new SelectDatos();
$conectar = $c->Buscador();
$sentencia = $conectar->query("SELECT productos_comprados.subtotal, compra_alproveedor.total, compra_alproveedor.hecho, compra_alproveedor.id, compra_alproveedor.proveedor, GROUP_CONCAT(	productos.codigo, '..',  productos.descripcion, '..', productos_comprados.cantidad, '..', productos_comprados.subtotal, '..', productos_comprados.precioProducto SEPARATOR '__') AS productos FROM compra_alproveedor INNER JOIN productos_comprados ON productos_comprados.id_compra = compra_alproveedor.id INNER JOIN productos ON productos.idpr = productos_comprados.producto GROUP BY compra_alproveedor.id ORDER BY compra_alproveedor.id;");
$compras = $sentencia->fetchAll(PDO::FETCH_OBJ);


if (!$compras) {?>
	<div class="alert alert-warning">
							<strong>Al parecer no has realizado ninguna compra</strong>
						</div>
<?php

} 




if(isset($_POST['btn_buscar'])){
	$dt1 = $_POST['dt1'];
	$dt2 = $_POST['dt2'];

$sentencia = $conectar->query("SELECT productos_comprados.subtotal, compra_alproveedor.total, compra_alproveedor.hecho, compra_alproveedor.id, compra_alproveedor.proveedor, GROUP_CONCAT(	productos.codigo, '..',  productos.descripcion, '..', productos_comprados.cantidad, '..', productos_comprados.subtotal, '..', productos_comprados.precioProducto SEPARATOR '__') AS productos
    FROM compra_alproveedor 
	INNER JOIN productos_comprados ON productos_comprados.id_compra = compra_alproveedor.id 
	INNER JOIN productos ON productos.idpr = productos_comprados.producto

WHERE hecho BETWEEN '$dt1' and '$dt2' 
GROUP BY compra_alproveedor.id 
ORDER BY compra_alproveedor.id;

");
$compras = $sentencia->fetchAll(PDO::FETCH_OBJ);

foreach ($compras as $key) {
	@$totaltotal = $totaltotal + $key->total;
}
if (!$compras) {?>
	<div class="alert alert-warning">
							<strong>¡Vaya, no hay ninguna compra registrada en esas fechas!</strong>
						</div>
<?php
}
}



?>
	<div class="col-xs-12">
		<h1 class="centrado">Compras</h1>
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

<div class="jaula">
			<a class="btn_a" href="VerProveedores.php">Nueva</a>
		</div>

<?php if(isset($totaltotal)) {?>
<strong>Total de la fecha marcada : <?php echo $totaltotal."$";  ?></strong>

<?php } ?>

<div class="" style="margin: 30px ; margin-bottom: 100px; padding: 20px; background-color: #fff; text-shadow: 0 0 30px #fff;
			       box-shadow: 0 0 20px #333">
		<table class="table table-bordered" id="tabla_com">

			<thead>
				<tr>
					<th>Número</th>
					<th>Proveedor</th>
					<th>Fecha</th>
					<th>Productos comprados</th>
					<th>Total</th>
					<th>Gestionar</th>
					<th>Eliminar</th>
					<th>Factura</th>
				</tr>
			</thead>
			<tbody>
				
				<?php foreach($compras as $compra){
#$totaltotal = $totaltotal + $compra->total;
					$idpc = $compra->proveedor;
$e = new Conectar();
$enlace = $e->ConectarMetodo();
$sel ="SELECT * FROM proveedor WHERE id_p = '$idpc'";

$res = mysqli_query($enlace, $sel);

foreach ($res as $result) {
$nombre = $result['nombre_p'];



}
					?> 
					
				<tr>
					<td><?php echo $idc = $compra->id ?></td>
                    <td><?php echo $idpc = "J-".$compra->proveedor."<br>->".$nombre."</br>" ?></td>
					<td><?php echo $compra->hecho ?></td>
					
					<td>

						<table class="table table-bordered" >
							<thead>
								<tr>
									<th>Código</th>
									<th>Descripción</th>
									<th>Cantidad</th>
									<th>Precio por unidad</th>
									<th>Subtotal</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach(explode("__", $compra->productos) as $productosConcatenados){ 
								$producto = explode("..", $productosConcatenados)
								?>
								<tr>
									<td><?php echo $producto[0] ?></td>
									<td><?php echo $producto[1] ?></td>
									<td><?php echo $producto[2] ?></td>
									<td><?php echo $producto[4]."$"?></td>
									<td><?php echo $producto[3]."$"?></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</td>
					<td><?php echo $compra->total."$" ?></td>
					<form method="POST" action="DeleteCompra.php">
					<td><a  class="success" href="GestionarCompra.php?idc=<?php echo $compra->id ?>">Gestionar Compra</a></td>
					<td class="formularioesp" id=""><button class="delete" type="submit" id="borrado" name="borrado" onclick="return borrar()" value="<?php echo $compra->id; ?>">Eliminar</button></td>
					</form>
					<td><a  class="info" href="FacturaCompra.php?factura=<?php echo $idc ?>" >Generar factura</a></td>
					
					
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
</tbody>
				</tr>
				<?php } ?>
			
		</table>
	</div>
		   <script>

	new DataTable('#tabla_com',{
              /* language:Traduccion,*/
			});

		</script>   
	</div>
	</body>
</html>
