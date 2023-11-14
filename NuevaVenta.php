<?php
	include_once 'conectar.php';
	include_once 'top.php';

$c = new SelectDatos();
$conectar = $c->Buscador();
?>




	<?php 





#@$_SESSION["id_c"] = $_GET["id_c"];
#@$weno = $_GET["id_c"];


	#si no hay nada en el carrito se pone el valor " "
if(!isset($_SESSION["carritoV"])) $_SESSION["carritoV"] = [];
$granTotal = 0;

 #echo " $weno";



?>
<body style="background-color: #e9e9e9" >
<!-- Esto de los status indican los posibles futuros, como venta hecha o cancelada, etc-->
	<div class="col-xs-12">
	
	<div class="jaula" style="width: 50%">
		<h1 class="jaula">Vender</h1>
		<?php
			if(isset($_GET["status"])){
				if($_GET["status"] === "1"){
					?>
						<div class="alert alert-success">
							<strong>¡Correcto!</strong> Venta realizada correctamente
						</div>
					<?php
				}else if($_GET["status"] === "2"){
					?>
					<div class="alert alert-info">
							<strong>Venta cancelada</strong>
						</div>
					<?php
				}else if($_GET["status"] === "3"){
					?>
					<div class="alert alert-info">
							<strong>Ok</strong> Producto quitado de la lista
						</div>
					<?php
				}else if($_GET["status"] === "4"){
					?>
					<div class="alert alert-warning">
							<strong>Error:</strong> El producto que buscas no existe
						</div>
					<?php
				}else if($_GET["status"] === "5"){
					?>
					<div class="alert alert-danger">
							<strong>Error: </strong>El producto está agotado
						</div>
					<?php
				}else if ($_GET["status"] === "9"){?>


<div class="alert alert-info">
							<strong>Error: </strong>Una venta no puede acabar en 0$
						</div>
				<?php } elseif ($_GET["status"] === "7"){?>
					 
					 <div class="alert alert-danger">
							<strong>Error: </strong> El producto ya está en uso, por favor, eliminelo y vuelva a añadirlo
						</div>
			<?php	}  elseif ($_GET["status"] === "11") {?>
				

					 <div class="alert alert-danger">
							<strong>Error: </strong> Estás tratando de añadir una cantidad mayor a la existente
						</div>
			<?php 

		} else {
					?>
					<div class="alert alert-danger">
							<strong>Error:</strong> Algo salió mal mientras se realizaba la venta
						</div>
					<?php
				}

			}
		?>
		<br>

		<!-- se envía a agregar al carrito para procesar los datos, y de ahí nos redirige hacia arriba-->
		<form method="post" action="agregarAlCarrito.php">
			<label for="codigo" style="margin-left: 33px;">Código de barras:</label>
			

<?php



#$conectar = conectar();

$sql = "SELECT * FROM productos 
 where pp_check = 0";

$stmt = $conectar->prepare($sql);
$result = $stmt->execute();
$cosos=$stmt->fetchAll(\PDO::FETCH_OBJ);
?>


<select class ="caja"  id="codigo" name="codigo">



<?php

foreach ($cosos as $coso) {
	# code...

?>
<option name="codigo" class=""value="<?php print($coso->codigo);?>"><?php print($coso->descripcion).". Codigo: ".($coso->codigo);?></option>

 
<?php
}
?>

</select>
<br>
<br>
<input autocomplete = "off"   required type="number" min="1" maxlength="6" minlength="1" autofocus class="form-control" name="cantidad"  id = "cantidad" placeholder="cantidad">
               <br><div class="centrado">
               <button type="submit" class="success">agregar</button>
                  </div>
              </div>



                </form>


            

			 <?php #echo $_SESSION['id_c'].","."\n".$_SESSION['nombre_c'].","."\n";
                      
			 	if(isset($_GET['id_c'])){
		$idc=(int) $_GET['id_c'];

}
#ESTO MANTIENE LA CEDULA DEL CLIENTE, EL OTRO NO FUNCIONA XDDD
if (!isset($idc)) {
   
    $idc = $_SESSION['id_c'];
}

$_SESSION['id_c'] = $idc;


#	echo $idc;
?>
		
		

			</form>
		<br><br>
		<div class="container" style=" margin-bottom: 100px; padding: 20px; background-color: #fff; text-shadow: 0 0 30px #fff;
			       box-shadow: 0 0 20px #333">
		<table class="table table-bordered" >
			<thead>
				<tr>
					<th>ID</th>
					<th>Código</th>
					<th>Descripción</th>
					<th>Precio de venta</th>
					<th>Unidad</th>
					<th>Cantidad</th>
					<th>Total</th>
					<th>Eliminar</th>

				</tr>
			</thead>
			<tbody>
			<?php					

?>
				<?php foreach($_SESSION["carritoV"] as $indice => $producto){ 
						$granTotal += $producto->total;
						?>

				<tr>
					<td><?php echo $producto->idpr ?></td>
					<td><?php echo $producto->codigo ?></td>
					<td><?php echo $producto->descripcion ?></td>
					<td><?php echo $producto->precioVenta."$" ?></td>
					<td><?php echo $producto->descripcion_u ?></td>
					<td><?php echo $producto->cantidad ?></td>
					<td><?php echo $producto->total."$" ?></td>
					<td><a class="delete" href="<?php echo "quitarDelCarrito.php?indice=" . $indice?>"><i class="fa fa-trash"></i>Eliminar</a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>

			<h3 class="centrado">Total: <?php echo $granTotal."$"; ?></h3>
		<form class="centrado" action="NuevaVentaHecho.php" method="POST">
			<input name="total" type="hidden" value="<?php echo $granTotal;?>">
			<button type="submit" class="btn_a">Continuar</button>
			<a href="./cancelarVenta.php" class="cancel">Cancelar venta</a>

		</form>
	</div>
		
            
       
	
			</div>

</body>
</html>
