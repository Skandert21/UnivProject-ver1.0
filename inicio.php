
<?php include_once "conectar.php"; ?>
<?php include_once "top.php";

  ?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" href="./css/bootstrap.css">
<link rel="stylesheet" href="./css/body.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<script type="text/javascript" src="js/cdn.js"></script>


<head>
	<title>INVERSIONES MERLIZ</title>
</head>
<body style="background-color: #e9e9e9">
	
	<div><?php# include "menu.php" ?></div>
	
<?php #echo "Bienvenido, <strong>".$_SESSION['username']."</strong>";
?>

<h1 id="tit" class ="titulo"> "TU PERRUQUERÍA" INVERSIONES MERLIZ, C.A </h1>
<br>

<div style="z-index: 0; position: relative;

margin-bottom: -50px;
margin-left: 15%;
margin-right: 15%;
"><?php 
if(isset($_GET["status"])){
				if($_GET["status"] === "1"){
					?><br>
						<div class="alert alert-success">
							
							<strong>¡Proceso realizado satisfactoriamente!</strong>
						</div>
					<?php
				}else if($_GET["status"] === "2"){
					?>
					<br>
					<div class="alert alert-info">
							<strong>El proceso ha fallado por un error desconocido</strong>
						</div>
					<?php } else if($_GET["status"] === "3") {    ?>
                   <div class="alert alert-warning">
                   	<br>
							<strong>¡Esta ID ya está registrada!</strong>
						</div>
<?php } elseif ($_GET["status"] === "5") {?>
	<div class="alert alert-info">
							<strong>Necesitas borrar las mascotas del cliente antes de proceder</strong>
						</div> <?php
} elseif ($_GET['status'] === "6") {?>
	<div class="alert alert-info">
							<strong>Necesitas borrar las consultas de la mascota antes de proceder</strong>
						</div>
					</div>
<?php }elseif ($_GET['status']==="10") {
						?>
					<div class="alert alert-info">
							<strong>Estás intentando borrar un producto registrado en compras, primero borra las compras</strong>
						</div>
					<?php } elseif ($_GET['status']==="11") {
						?>
					<div class="alert alert-info">
							<strong>Estás intentando borrar un producto registrado en ventas, primero borra las ventas</strong>
						</div>
				
				<?php } elseif ($_GET['status']==="12") {
						?>
					<div class="alert alert-info">
							<strong>Estás intentando borrar un producto registrado en reembolsos, primero borra los reembolsos</strong>
						</div>
				
				<?php } elseif ($_GET['status']==="13") {
						?>
					<div class="alert alert-info">
							<strong>Estás intentando borrar a un proveedor con una compra registrada, primero borra la compra</strong>
						</div>
			<?php } elseif ($_GET['status']==="14") {
						?>
					<div class="alert alert-info">
							<strong>Estás intentando borrar a un cliente con una venta registrada, primero borra la venta</strong>
						</div>
					<?php } 



}

$C = new Conectar();
$conectar = $C->ConectarMetodo();

$sql = "SELECT productos.descripcion, SUM(productos_vendidos.cantidad) as total
FROM productos_vendidos
INNER JOIN productos ON productos.idpr = productos_vendidos.producto
GROUP BY productos.idpr limit 5";
$res = mysqli_query($conectar, $sql);
$dataArray = array(['Task', 'Hours per Day']); // Inicializa el array de datos
$i = "";
foreach ($res as $p) {
	
    $dataArray[] = [$p['descripcion'], intval($p['total'])]; // Añade los datos de cada producto al array
}

// Convierte el array de datos a formato JSON para usarlo en JavaScript
$dataJson = json_encode($dataArray);
?>




			<!--	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>-->
				<script type="text/javascript" src="js/chart/Chart.min.js"></script>
				<script type="text/javascript" src="js/chart/chart.umd.js"></script>
				<script type="text/javascript" src="js/ChartReal.js"></script>

    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable(<?php echo $dataJson; ?>);

        var options = {
          title: 'Ventas de productos',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }

    </script>


    <div id="piechart_3d" style="width: 943px; height: 500px; margin-bottom: 100px; background-color: #fff; text-shadow: 0 0 30px #fff;
			       box-shadow: 0 0 20px #333"></div>

</div>
				
</div>
</body>

</html>