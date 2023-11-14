<?php
	include_once 'conectar.php';
	include 'top2.php';
	

	$sentencia_select=$conectar->prepare('SELECT *FROM compra_alproveedor p INNER JOIN proveedor d WHERE p.proveedor = d.id_p ');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$conectar->prepare('
			SELECT *FROM productos WHERE id LIKE :campo;'
		);

		$select_buscar->execute(array(
			':campo' =>"%".$buscar_text."%"
		));

		$resultado=$select_buscar->fetchAll();

	}

?>

<link rel="stylesheet" href="./css/bootstrap.css">
<link rel="stylesheet" href="./css/body.css">

	<div class="col-xs-12">
	<br>
	<br>
		<h1>Compras</h1>
		<div>
			<a class="btn btn-success" href="./RegistroCompra.php">Nuevo <i class="fa fa-plus"></i></a>
		</div>
		<br>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>ID</th>
					<th>Producto</th>
					<th>Cantidad</th>
					<th>Cédula del proveedor</th>
					<th>Nombre del proveedor</th>
					<th>Fecha</th>
					
				</tr>
			</thead>
			<tbody>
				<?php foreach($resultado as $fila){ ?>
				<tr>
					<td class="formularioesp"><?php echo $fila['id']; ?></td>
					<td class="formularioesp"><?php echo $fila['producto']; ?></td>
					<td class="formularioesp"><?php echo $fila['cantidad']; ?></td>
					<td class="formularioesp"><?php echo $fila['proveedor']; ?></td>
					<td class="formularioesp"><?php echo $fila['nombre_p']." ".$fila['apellido_p']; ?></td>
					<td class="formularioesp"><?php echo $fila['hecho']; ?></td>
					
				
				</tr>
				<?php } ?>
			</tbody>
		</table>
		<form action="ReposrteCompras.php"><button class="fa fa-plus">GENERAR REPORTE</button></form>
</tr></td>
	</div>
<?php include_once "pie.php" ?>