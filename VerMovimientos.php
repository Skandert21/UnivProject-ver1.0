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

	$sentencia_select=$conectar->prepare("SELECT * from movimientos");
		
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll(PDO::FETCH_OBJ);


	if (!$resultado) {?>
		<div class="alert alert-warning">
							<strong>Al parecer no has registrado ningún producto</strong>
						</div >
	<?php } 

	
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$conectar->prepare("SELECT stock.cantidad_minima, stock.cantidad_max, categoria.descripcion_cat, productos.idpr, productos.descripcion, productos.codigo,  productos.precioVenta, productos.existencia,
	 GROUP_CONCAT(	proveedor.id_p, '..',  proveedor.nombre_p SEPARATOR '__') 

		AS proveedor FROM productos 
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
		<h1 class="centrado">Movimientos</h1>
 <br>
            <br>



		<div class="jaula">
		</div>
		<br>
		<div class="container" style=" margin-bottom: 100px; padding: 20px; background-color: #fff; text-shadow: 0 0 30px #fff;
			       box-shadow: 0 0 20px #333">
		<table class="table table-bordered" id="tabla_ven">
			<thead>
				<tr>
					<th>ID</th>
					<th>Referencia</th>
					<th>Movimiento</th>
					<th>Motivo</th>
					<th>Producto</th>
					<th>Stock Inicial</th>
					<th>Entrada/salida</th>
					<th>Stock final</th>
			        <th>Fecha</th>
					<th>Factura</th>
				</tr>
			</thead>
			<?php foreach($resultado as $fila){ ?>
			
				
				<tr>
					<td class="formularioesp"><?php echo $fila->id; ?></td>
					<td class="formularioesp"><?php echo $fila->id_mov; ?></td>
					
					<td class="formularioesp"><?php echo $fila->movimiento; ?></td>
					<td class="formularioesp"><?php echo $fila->motivo; ?></td>
					<td class="formularioesp"><?php echo $fila->producto; ?></td>
					<td class="formularioesp"><?php echo $fila->stock_inicial; ?></td>
					<td class="formularioesp"><?php echo $fila->cambio; ?></td>
					<td class="formularioesp"><?php echo $fila->stock_final; ?></td>
					<td class="formularioesp"><?php echo $fila->fecha; ?></td>
				
				
					
					<td><a class="info" href="FacturaVenta.php?factura=<?php echo $Rem?>">Generar factura</a></td>


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
              /* language:Traduccion,*/
			});

		</script>

</body>
</html>>