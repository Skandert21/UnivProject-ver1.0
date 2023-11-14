<?php
	include_once 'conectar.php';
	include 'top.php';
	
#el codigo para concatenar tablas


$c = new SelectDatos();
$conectar= $c->Buscador();

$e = new Conectar();
$enlace = $e->ConectarMetodo();

?>


<?php

	$sentencia = $conectar->query("SELECT * FROM adopcion a INNER JOIN perro p on a.id_perro = p.id_perro order by id desc");

                               $resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);
                               
 if (!$resultado) {
 	?>
	   <div class="alert alert-warning">
							<strong>Al parecer aun no tienes ringún registro </strong>
						</div>
	 <?php }



	if(isset($_POST['btn_buscar'])){
		
		$dt1 = $_POST['dt1'];
	$dt2 = $_POST['dt2'];

	
		$sentencia = $conectar->query("
			SELECT * FROM adopcion a INNER JOIN perro p on a.id_perro = p.id_perro WHERE fecha BETWEEN '$dt1' and '$dt2' 
  order by id desc");



		$resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);

		if (!$resultado) {?>

			 <div class="alert alert-warning">
							<strong>¡Vaya, no hay ningún registro en esa fecha!</strong>
						</div>
						<?php
			
		}
header('VerMascotasAdoptadas.php');
}



?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>INVERSIONES MERLI</title>
</head>

	<link rel="stylesheet" href="./css/bootstrap.css">
<link rel="stylesheet" href="./css/body.css">
<link rel="stylesheet" href="./css/top.css">
<body style="background-color: #e9e9e9">
	<h2 class="centrado">Registros de Mascotas adoptadas</h2>

<br>
	<form action="" class="centrado" method="post">
           <br> 
                <div class="">
                	<label>Desde :</label>
				<input type="date" name="dt1">
				<label>Hasta :</label>
				<input type="date" name="dt2">
				<input type="submit" class="info" name="btn_buscar" value="Buscar">
                </div>
	</form>
			<br>


   <div class="container" style="margin-bottom: 50px; padding: 20px; background-color: #fff; text-shadow: 0 0 30px #fff;
			       box-shadow: 0 0 20px #333; height:30% ">
<table class="table table-bordered" style="padding-bottom: 0%" id="tabla_maa">
	<thead>
			<tr class="head">
				<th class="formularioesp2">Id</th>
				<th class="formularioesp2">Antiguo Dueño</th>
				<th class="formularioesp2">Dueño actual</th>
				<th class="formularioesp2">Mascota</th>
				<th class="formularioesp2">fecha de adopción</th>
				<th class="formularioesp2">Acción</th>
</tr>
</thead>

<?php
foreach ($resultado as $adop) { 


                              $sentencia = $conectar->query("SELECT * FROM cliente where id_cliente = '$adop->id_dueno_uno'");
                              $resuluno = $sentencia->fetchAll(PDO::FETCH_OBJ);

                              foreach ($resuluno as $duenouno) {
                              	

                              $sentencia = $conectar->query("SELECT * FROM cliente where id_cliente = '$adop->id_dueno_dos'");
                             $resuldos = $sentencia->fetchAll(PDO::FETCH_OBJ);

                              foreach ($resuldos as $duenodos) {
                              


                                ?>      
                                    
                                <tr>        
                    <td class="formularioesp"><?php echo $adop->id; ?></td>
                    <td class="formularioesp"><?php echo $adop->id_dueno_uno." ->".$duenouno->nombre_cliente." ".$duenouno->apellido_cliente; ?></td>
                    <td class="formularioesp"><?php echo $adop->id_dueno_dos." ->".$duenodos->nombre_cliente." ".$duenodos->apellido_cliente; ?></td>
					<td class="formularioesp"><?php echo $adop->nombre_perro.". Raza: ".$adop->raza_perro; ?></td>
					<td class="formularioesp"><?php echo $adop->fecha; ?></td>
					<td class="formularioesp"><a href="GenerarActaDeAdopcion.php?id=<?php echo $adop->id; ?>" class="info" >Generar acta de adopción</a></td>
					<br>

					<?php } 
				             }
			                    }

			?>
		</tr>
			</table>
            </div>
	<script>

	new DataTable('#tabla_maa',{
              language:Traduccion,
			});

		</script>


</body>
</html>