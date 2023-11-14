<?php

#crear la tabla y la session
include "Conectar.php";
session_start();
$c= new Conectar();
$enlace = $c->ConectarMetodo();

$sql = 'SELECT *from consulta order by id_consulta desc limit 1';
$resultado = mysqli_query($enlace, $sql);
foreach ($resultado as $dato) {
	
	$id_con = $dato['id_consulta'];
	$id_d= $dato['id_dueno'];
	$id_p = $dato['id_perro'];
}



$_SESSION['id_con'] = $id_con;
unset($id_con);

@$_SESSION["TotalReal"] = $_SESSION["TotalReal"] + 0;

?>
<!DOCTYPE html>
<html>
<head>
	<title>INVERSIONES MERLIZ</title>
</head>
<body style="background-color: #e9e9e9">


	<link rel="stylesheet" href="./css/bootstrap.css">
<link rel="stylesheet" href="./css/body.css">
<link rel="stylesheet" type="text/css" href="./css/top.css">

<br>
<br>
<h1 class="centrado">Servicio</h1>
<br>



<div class="" style="margin-left:250px; margin-right:250px; margin-top: -5px; margin-bottom: 50px; padding: 20px; background-color: #fff; text-shadow: 0 0 30px #fff;
			       box-shadow: 0 0 20px #333; height:30% ">
			       <?php   if(isset($_GET["status"])){
               if($_GET["status"] === "2"){
                    ?>
                    <div class="alert alert-info">
                            <strong>El total no puede ser de 0$</strong>

                        </div>
                           <br>
                            <br>
                         <?php } }
                         ?>
<form method="post" action="RegresarDeConsulta.php">

</form>

<form action="LlenarConsulta.php" method="POST" >
<br>
<br>
<br>

<textarea class="form-control" style="width: 50%; margin-left: 200px" id= "observacion" name="observacion" required type="text" equired pattern="[A-Za-z ]+" placeholder="Servicio aplicado" autocomplete="off"></textarea>

</tr>
<br>
<tr>

<label for="text"></label></tr>
<br>
<br>
<tr>

<input class="form-control" style="width: 30%; margin-left: 200px" id= "total" name="total" min="1" required type="number" placeholder="Coste del servicio" autocomplete="off">
</tr>
<br>
<br>
<tr><button style="margin-top: 50px;" type="submit" class="success">Registrar servicio</button></tr>
<tr><a class="btn_a" href="RegistroConsultaHecho.php">Finalizar</a></tr>
<tr><a class="cancel" href="RegresarDeConsultaServicio.php">Cancelar</a></tr>

</form>
</div>

<?php 

if(isset($_SESSION['id_con'])) {
	

$id_con = $_SESSION['id_con'];
	$sql= "SELECT * from consulta_detalle where id_con = '$id_con'";
	$resultado = mysqli_query($enlace, $sql);
	?>

	<br>
	<br>
	<br>
	<h3 class="centrado">Servicios</h3>
	<br>
	<br>
		<div class="col-xs-12">
			<div class="container" style="margin-bottom: 50px; padding: 20px; background-color: #fff; text-shadow: 0 0 30px #fff;
			       box-shadow: 0 0 20px #333; height:30% ">
<table class="table table-bordered" id="tabla_rcd">
<thead>

<th>Servicio</th>
<th>subtotal</th>

<th>Borrar</th>
</thead>
<br>
<br>
	<?php foreach ($resultado as $fila) { ?>

<tbody>
<tr>
	<td><?php echo $fila["servicio"];?></td>
    <td><?php echo $fila["subtotal"]."$";?></td>



<td><a class="btn_a" href="BorrarServicio.php?id_servicio=<?php echo $fila['id']; ?>">Borrar</a></td>
	<?php }?>

	<strong class="centrado">Total: <?php echo $_SESSION["TotalReal"]."$";?></strong><?php } ?>
</tr>

</tbody>

</table>
</div>
	<script>

	new DataTable('#tabla_rcd',{
              /* language:Traduccion,*/
			});

		</script>
</div>



</body>
</html>


