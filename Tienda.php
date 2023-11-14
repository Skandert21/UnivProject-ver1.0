
<?php include_once "top2.php";
?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" href="./css/bootstrap.css">
<link rel="stylesheet" href="./css/body.css">
<head>
	<title>INVERSIONES MERLIZ</title>
</head>

<body class ="blanco">
<?php echo "Bienvenido, <strong>".$_SESSION['username']."</strong>";
?>

<h1 id="tit" class ="titulo">TIENDA INVERSIONES MERLIZ</h1>

<?php 
if(isset($_GET["status"])){
				if($_GET["status"] === "1"){
					?><br>
						<div class="alert alert-success">
							
							<strong>¡Proceso realizado satisfactoriamente!</strong>
						</div>
					<?php
				}else if($_GET["status"] === "2"){
					?>
					<div class="alert alert-info">
							<strong>El proceso ha fallado epicamente :(</strong>
						</div>
					<?php } elseif ($_GET['status']==="10") {
						?>
					<div class="alert alert-info">
							<strong>Estás intentando borrar un producto registrado en compras, primero borra las compras :(</strong>
						</div>
					<?php } elseif ($_GET['status']==="11") {
						?>
					<div class="alert alert-info">
							<strong>Estás intentando borrar un producto registrado en ventas, primero borra las ventas :(</strong>
						</div>
				
				<?php } elseif ($_GET['status']==="12") {
						?>
					<div class="alert alert-info">
							<strong>Estás intentando borrar un producto registrado en reembolsos, primero borra los reembolsos :(</strong>
						</div>
				
				<?php } elseif ($_GET['status']==="13") {
						?>
					<div class="alert alert-info">
							<strong>Estás intentando borrar a un proveedor con una compra registrada, primero borra la compra :(</strong>
						</div>
			<?php } elseif ($_GET['status']==="14") {
						?>
					<div class="alert alert-info">
							<strong>Estás intentando borrar a un cliente con una venta registrada, primero borra la venta :(</strong>
						</div>
					<?php } 
				} ?>



</div>
<?php include "pie.php";?>
</body>
</html>