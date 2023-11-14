<?php
	include_once 'conectar.php';
	include 'top.php';
	
#el codigo para concatenar tablas
	
	$ver= new SelectDatos();
	$BuscarMascotas = $ver->BuscarMascotasFuera();
	  $resultado = $ver->SeleccionarDatos($BuscarMascotas);

	  if (!$resultado) {?>
	   <div  style="" class="alert alert-warning">
							<strong>Al parecer aun no tienes registrada ninguna mascota</strong>
						</div>
	 <?php }
/*

	$sentencia_select = $conectar->query("SELECT * FROM perro p 
		INNER JOIN detalle_perro d  INNER JOIN cliente c  ON c.id_cliente = d.id_dueno");
$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();
*/

$c = new SelectDatos();
$conectar= $c->Buscador();
	
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$conectar->prepare('
			SELECT *FROM perro p INNER JOIN detalle_perro d  INNER JOIN cliente c INNER JOIN perro_fuera f on f.id_perro_fuera = p.id_perro WHERE d.id_perro LIKE p.id_perro and d.id_dueno LIKE c.id_cliente AND nombre_perro LIKE :campo;'
		);

		$select_buscar->execute(array(
			':campo' =>"%".$buscar_text."%"
		));

		$resultado=$select_buscar->fetchAll();

		if (!$resultado) {?>

			 <div style="" class="alert alert-warning">
							<strong style="">¡Vaya, no hay ninguna mascota con ese nombre!</strong>
						</div>
						<?php
			
		}
header('VerMascotas.php');
}



?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>INVERSIONES MERLI</title>
	<link rel="stylesheet" href="./css/bootstrap.css">
<link rel="stylesheet" href="./css/body.css">
<link rel="stylesheet" href="./css/top.css">
</head>
<body style="background-color: #e9e9e9">
	<div class="contenedor">
		<h3 class="centrado">Mascotas fuera de servicio</h3>
		<div class="barra__buscador">

			<!--<form action="" class="centrado" method="post">

				<input type="text" name="buscar" placeholder="nombre de la mascota" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">

				<input type="submit" class="info" name="btn_buscar" value="Buscar">

			</form>
		-->
			
		</div>
		<br>
		<br>
		<div class="container" style="margin-bottom: 100px; padding: 20px; background-color: #fff; text-shadow: 0 0 30px #fff;
			       box-shadow: 0 0 20px #333">
		<table class="table table-bordered" id="tabla_fds">
			<thead>
			<tr class="head">
				<th class="formularioesp2">ID</th>
				<th class="formularioesp2">Nombre</th>
				<th class="formularioesp2">Raza</th>
				<th class="formularioesp2">Observaciones</th>
				<th class="formularioesp2">Motivo</th>
				<th class="formularioesp2">Fecha</th>
				<th class="formularioesp2">Dueño</th>
				
				<th class="formularioesp2">Ver historial</th>
				</thead>
			</tr>

			<?php
			 foreach($resultado as $fila):
              
?>
				<tr>
					
                    <td class="formularioesp"><?php echo $fila['id_perro']; ?></td>
					<td class="formularioesp"><?php echo $fila['nombre_perro']; ?></td>
					<td class="formularioesp"><?php echo $fila['raza_perro']; ?></td>
					<td class="formularioesp"><?php echo $fila['observaciones']; ?></td>
					<td class="formularioesp"><?php echo $fila['motivo']; ?></td>
					<td class="formularioesp"><?php echo $fila['fecha']; ?></td>
                    <td class="formularioesp"><?php echo $fila['id_dueno'].","."\n".$fila['nombre_cliente']."\n".$fila['apellido_cliente']; ?></td>
                
                         <!-- poner en el if un header-->

					

					<td class="formularioesp"><a href="HistorialMascota.php?id_perro=<?php echo $fila['id_perro']; ?>"  class="info" >Ver Historial</a></td>
				</tr>

 

			<?php endforeach ?>

			</tr>
             </div>


		</table>
<script>

	new DataTable('#tabla_fds',{
               language:Traduccion,
			});

		</script>
<br>
		
	</div>
</body>
</html>