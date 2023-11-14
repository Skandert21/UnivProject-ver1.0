<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body style="background-color: #e9e9e9">


<?php
	
include_once 'top.php';

$c = new SelectDatos();
$conectar = $c->Buscador();


@session_start();
?>


 <?php #echo $_SESSION['id_c'].","."\n".$_SESSION['nombre_c'].","."\n";
                      
			  	if(isset($_GET['id_p'])){
		$idc=(int) $_GET['id_p'];
		$_SESSION['prov'] = $idc;

}
#ESTO MANTIENE LA CEDULA DEL CLIENTE, EL OTRO NO FUNCIONA XDDD
if (!isset($idc)) {
   
    $idc = $_SESSION['id_p'];
}

$_SESSION['id_p'] = $idc;


	#echo $idc;
?>

	<?php 





#@$_SESSION["id_c"] = $_GET["id_c"];
#@$weno = $_GET["id_c"];
if(!isset($_SESSION["carrito"])) $_SESSION["carrito"] = [];
$granTotal = 0;

 #echo $_SESSION['prov'];



?>

	<div class="col-xs-12">
	<div class="jaula" style="width: 50%">
		<h1>Comprar</h1>
		<?php
			if(isset($_GET["status"])){
				if($_GET["status"] === "1"){
					?>
						<div class="alert alert-info">
							<strong>¡Error!</strong> Una compra no puede acabar en 0$ 
						</div>
					<?php
				}else if($_GET["status"] === "2"){
					?>
					<div class="alert alert-info">
							<strong>Compra cancelada</strong>
						</div>
					<?php
				}else if($_GET["status"] === "3"){
					?>
					<div class="alert alert-info">
							<strong>Producto quitado de la lista</strong> 
						</div>
					<?php
				}else if($_GET["status"] === "4"){
					?>
					<div class="alert alert-warning">
							<strong>Error:</strong> El producto que buscas no existe
						</div>


                    s<?php
				} else if($_GET["status"] === "7") {
					?>
					<div class="alert alert-danger">
							<strong>Error:</strong> El producto ya está en uso, por favor, eliminelo y vuelva a añadirlo
						</div>







					<?php
				} else{
					?>
					<div class="alert alert-danger">
							<strong>Error:</strong> Algo salió mal mientras se realizaba la venta
						</div>
					<?php
				}
			}
		?>
		<br>

		<form method="post" action="agregarAlCarrito2.php">
			<label for="codigo">Código:</label>
			

<?php



#$conectar = conectar();

$sql = "SELECT * FROM productos inner join producto_proveedor on producto_proveedor.id_prod = productos.idpr where id_prov = '$_SESSION[prov]' and pp_check = 0";

$stmt = $conectar->prepare($sql);
$result = $stmt->execute();
$cosos=$stmt->fetchAll(\PDO::FETCH_OBJ);
?>

<select class ="caja"  id="id" name="codigo">



<?php

foreach ($cosos as $coso) {
	# code...

?>
<option name="id" value="<?php print($coso->codigo);?>"><?php print($coso->codigo)."\n".($coso->descripcion);?></option>

<button>continuar</button>
<?php
}
?>

</select>
          
			<!--<input autocomplete="off" maxlength="6" autofocus class="form-control" name="codigo" required type="text" id="codigo" placeholder="Escribe el código">-->

                <br>
               <input autocomplete = "off" required type="number" min="1" maxlength="6" minlength="1" autofocus class="form-control" name="cantidad"  id = "cantidad" placeholder="cantidad">
               <br>
               <input autocomplete = "off" required type="number" min="1" maxlength="6" minlength="1" autofocus class="form-control" name="precioCompra"  id = "precioCompra" placeholder="Precio de compra">
<br>
               <button type="submit" class="success">Registrar producto</button>


<script type="text/javascript" src="./js/validar.js">
	
</script>
	
            </form>
</div>
			
		
		<br><br>
		<div class="container" style=" margin-bottom: 100px; padding: 20px; background-color: #fff; text-shadow: 0 0 30px #fff;
			       box-shadow: 0 0 20px #333">
		<table class="table table-bordered" id="tabla_pc">
			<thead>
				<tr>
					<th>ID</th>
					<th>Código</th>
					<th>Descripción</th>
					<th>Precio de Compra</th>
					<th>Cantidad</th>
					<th>Total</th>

				</tr>
			</thead>
			<tbody>
			<?php					

?>
				<?php foreach($_SESSION["carrito"] as $indice => $producto){ 
						$granTotal += $producto->total;
						?>

				<tr>
					<td><?php echo $producto->idpr ?></td>
					<td><?php echo $producto->codigo ?></td>
					<td><?php echo $producto->descripcion ?></td>
					<td><?php echo $producto->precioVenta."$"; ?></td>
					
					<td><?php echo $producto->cantidad ?></td>
					<td><?php echo $producto->total."$" ?></td>
					<td><a class="delete" href="<?php echo "quitarDelCarrito2.php?indice=" . $indice?>"><i class="fa fa-trash"></i>Eliminar</a></td>
				</tr>


				<?php } ?>
			</tbody>
		</table>

        <div class="jaula" style="width: 50%">
		<h3>Total: <?php echo $granTotal."$"; ?></h3>
		<form action="CompraProveedorHecho.php" method="POST">
			<input name="total" type="hidden" value="<?php echo $granTotal;?>">
			
			<br>
			<button type="submit" class="btn_a">Finalizar</button>
			<a href="./cancelarCompra.php" class="cancel">Cancelar compra</a>

		</form>
	</div>
		</br>
	</div>
</div>

</body>
</html>
