
<!DOCTYPE html>
<html>
<head>
	<title>INVMERLIZ</title>
</head>
<body style="background-color: #e9e9e9">


<?php
	include_once 'conectar.php';
	include 'top.php';
	
	$c= new SelectDatos();
	$conectar = $c->Buscador();

	$sentencia_select=$conectar->prepare("SELECT unidad_producto.descripcion_u,stock.cantidad_minima, stock.cantidad_max, categoria.descripcion_cat, productos.idpr, productos.descripcion, productos.codigo,  productos.precioVenta, productos.existencia,
	 GROUP_CONCAT(	proveedor.id_p, '..',  proveedor.nombre_p SEPARATOR '__') 

		AS proveedor FROM productos
		
		inner join unidad_producto on unidad_producto.id = productos.unidad 
		inner join categoria on categoria.id_cat = productos.id_cat
		inner join stock on stock.id_producto = productos.idpr
	INNER JOIN producto_proveedor ON producto_proveedor.id_prod = productos.idpr
	INNER JOIN proveedor ON proveedor.id_p = producto_proveedor.id_prov 
    WHERE pp_check = 0
	GROUP BY productos.idpr ORDER BY productos.idpr;");
		
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll(PDO::FETCH_OBJ);


	if (!$resultado) {?>
		<div class="alert alert-warning">
							<strong>Al parecer no has registrado ningún producto</strong>
						</div >
	<?php } 

	
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$conectar->prepare("SELECT unidad_producto.descripcion_u, stock.cantidad_minima, stock.cantidad_max, categoria.descripcion_cat, productos.idpr, productos.descripcion, productos.codigo,  productos.precioVenta, productos.existencia,
	 GROUP_CONCAT(	proveedor.id_p, '..',  proveedor.nombre_p SEPARATOR '__') 

		AS proveedor FROM productos 
		inner join unidad_producto on unidad_producto.id = productos.unidad
		inner join categoria on categoria.id_cat = productos.id_cat
		inner join stock on stock.id_producto = productos.idpr
	INNER JOIN producto_proveedor ON producto_proveedor.id_prod = productos.idpr
	INNER JOIN proveedor ON proveedor.id_p = producto_proveedor.id_prov 
         where descripcion like :campo
	GROUP BY productos.idpr ORDER BY productos.idpr;"
		);

		$select_buscar->execute(array(
			':campo' =>"%".$buscar_text."%"
		));

		$resultado=$select_buscar->fetchAll(PDO::FETCH_OBJ);
          
          if (!$resultado) {?>
          	<div class="alert alert-warning">
							<strong>¡Vaya, no hay ningún producto registrado con ese nombre!</strong>
						</div>
         <?php } 
	}

?>

<link rel="stylesheet" href="./css/bootstrap.css">
<link rel="stylesheet" href="./css/body.css">

	<div class="col-xs-12">
	<br>
	<br>
		<h1 class="centrado">Productos</h1>
 <br>
            <br>





		<div class="jaula">
			<a class="btn_a" href="./RegistroProducto.php">Nuevo producto</a>
			<a class="btn_a" href="./GestionarCategorias.php">Gestionar categorias</a>

			<a class="btn_a" href="./GestionarUnidad.php">Gestionar unidad de producto</a>
			
		</div>
		<br>
		<div class="" style=" margin: 60px; margin-bottom: 100px; padding: 20px; background-color: #fff; text-shadow: 0 0 30px #fff;
			       box-shadow: 0 0 20px #333">
		<table class="table table-bordered" id="tabla_ven">
			<thead>
				<tr>
					<th>ID</th>
					<th>Código</th>
					<th>Descripción</th>
					<th>Precio de venta</th>
					<th>Existencia</th>
					<th>Categoria</th>
					<th>Unidad de medida</th>
					<th>Proveedor</th>
					<th>Editar</th>
					<th>Eliminar</th>
					<th>Asignar proveedor</th>
				</tr>
			</thead>
			<?php foreach($resultado as $fila){ ?>
			
				
				<tr>
					<td class="formularioesp"><?php echo $fila->idpr; ?></td>
					<td class="formularioesp"><?php echo $fila->codigo; ?></td>
					<td class="formularioesp" <?php if ($fila->existencia < $fila->cantidad_minima) { ?>
						 style="text-shadow: 0 0 30px #fff;
             box-shadow: 0 0 20px #bb3322; "
			        
		<?php }elseif ($fila->existencia > $fila->cantidad_max) { ?>
		                 style="text-shadow: 0 0 30px #fff;
             box-shadow: 0 0 20px #4f9; "
		<?php } ?>
		 ><?php echo $fila->descripcion."<br>";?> <?php if ($fila->existencia < $fila->cantidad_minima) { 
			         echo "(Has excedido la cantidad mínima del stock, debes comprar más)";
		 }elseif ($fila->existencia > $fila->cantidad_max) { 
			echo "(Has excedido la cantidad máxima del stock, no necesitas comprar más)";
		 } ?></td>
					<td class="formularioesp"><?php echo $fila->precioVenta."$"; ?></td>
					<td class="formularioesp"><?php echo $fila->existencia; ?></td>
					<td class="formularioesp"><?php echo $fila->descripcion_cat; ?></td>
					<td class="formularioesp"><?php echo $fila->descripcion_u; ?></td>
					
					<td>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Proveedor</th>
									
								</tr>
							</thead>
							<tbody>
					<?php foreach(explode("__", $fila->proveedor) as $productosproveedores){ 
								$proveedores = explode("..", $productosproveedores)
								?>
								<td class="formularioesp">
									<?php echo $proveedores[0] ?>
								    <?php echo $proveedores[1] ?>
									
</tr>
								<?php } ?>
							</tbody>
						</table>
					</td>
				
					<td class="formularioesp"><a href="UpdateProducto.php?id=<?php echo $fila->idpr; ?>"  class="success" >Editar</a></td>
					<form action="DeleteProducto.php" method="post">
					<td class="formularioesp"><button onclick="return borrar()" name="borrado" id="borrado" value="<?php echo$fila->idpr; ?>" class="delete">Eliminar</button></td>
					<td class="formularioesp"><a class="success" href="AsignarProductoProveedor.php?id=<?php echo $fila->idpr; ?>">Asignarle proveedor</a></td>
</form>

 <!-- cree una funcion que no se meter en un archivo por separado y que se ejecute aqui, arreglar eso-->  
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
</script></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		</div>
<script>

	new DataTable('#tabla_ven',{
            language:Traduccion,
			});

		</script>

</body>
</html>>