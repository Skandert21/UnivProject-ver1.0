<?php
	include_once 'conectar.php';
	include 'top.php';
	
#el codigo para concatenar tablas
	
	$ver= new SelectDatos();
	$BuscarMascotas = $ver->BuscarMascotas();
	  $resultado = $ver->SeleccionarDatos($BuscarMascotas);

	  if (!$resultado) {?>
	   <div class="alert alert-warning">
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
		<h3 class="centrado">Mascotas</h3>
		<?php if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$conectar->prepare('
			SELECT *FROM perro p INNER JOIN detalle_perro d  INNER JOIN cliente c WHERE d.id_perro LIKE p.id_perro AND d.id_dueno LIKE c.id_cliente and m_check = 0 AND nombre_perro LIKE :campo;'
		);

		$select_buscar->execute(array(
			':campo' =>"%".$buscar_text."%"
		));

		$resultado=$select_buscar->fetchAll();

		if (!$resultado) {?>

			 <div class="alert alert-warning">
							<strong>¡Vaya, no hay ninguna mascota con ese nombre!</strong>
						</div>
						<?php
			
		}
header('VerMascotas.php');
} ?>
<!--
		<div class="barra__buscador">

			<form action="" class="centrado" method="post">

				<input type="text" name="buscar" placeholder="nombre de la mascota" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">

				<input type="submit" class="info" name="btn_buscar" value="Buscar">

			</form>
			
		</div>
	-->
		<br>
		<br>
		<div class="jaula">
		<!--<td class=""><div style="margin-left: 50px;"><a href="RegistroMascota.php" id="a" class="btn_a">Nuevo</a></div></td>-->
		<br>
</div>


<div class="container" style="margin-bottom: 100px; padding: 20px; background-color: #fff; text-shadow: 0 0 30px #fff;
			       box-shadow: 0 0 20px #333">
		<table class="table table-bordered" id="tabla_mascota">
			<thead>
			<tr class="head">
				
				<th class="formularioesp2">Indice</th>
				<th class="formularioesp2">Nombre</th>
				<th class="formularioesp2">Tipo</th>
				<th class="formularioesp2">Raza</th>
				<th class="formularioesp2">Observaciones</th>
				<th class="formularioesp2">Dueño</th>
				<th class="formularioesp2">Editar</th>
				<th class="formularioesp2">Eliminar</th>
				<th class="formularioesp2">Servicio</th>
				<th class="formularioesp2">Historial</th>
				
			</tr>
</thead>
			<?php
			$can = 0;
			foreach ($resultado as $cuantos) {
				$can = $can + 1;
			}

			echo "<strong>Tienes ".$can." mascotas registradas</strong>";
              $i=0;
			 foreach($resultado as $fila):
              $i++;
?>
				<tr>
					
                   
                    <td class="formularioesp"><?php echo /*$i*/$fila['indice']; ?></td>
					<td class="formularioesp"><?php echo $fila['nombre_perro']; ?></td>
					<td class="formularioesp"><?php echo $fila['tipo']; ?></td>
					<td class="formularioesp"><?php echo $fila['raza_perro']; ?></td>
					<td class="formularioesp"><?php echo $fila['observaciones']; ?></td>
                     <td class="formularioesp"><?php echo $fila['id_dueno'].","."\n".$fila['nombre_cliente']."\n".$fila['apellido_cliente']; ?></td>
                
                         <!-- poner en el if un header-->

					<td class="formularioesp"><a href="UpdateMascota.php?id_perro=<?php echo $fila['id_perro']; ?>"  class="success" >Editar</a></td>
					<form method="POST" action="PreDeleteMascota.php">


					<td class="" id=""><button  class="delete" type="submit" id="borrado" name="borrado" onclick="return borrar()" value="<?php echo $fila['id_perro']; ?>">Eliminar</button></td>

                     </form>
					<td class="formularioesp"><a href="InsertarConsulta.php?id_perro=<?php echo $fila['id_perro']; ?>&id_dueno=<?php echo $fila['id_dueno']; ?>" class="info">Realizar Servicio</a></td>

					<td class="formularioesp"><a href="HistorialMascota.php?id_perro=<?php echo $fila['id_perro']; ?>"  class="info" >Ver Historial</a></td>
				</tr>
</div>
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
</script>


			<?php endforeach ?>

			</tr>

</table>
		<script>

	new DataTable('#tabla_mascota',{
               language:Traduccion,
			});

		</script>

<br>
		
	</div>
</body>
</html>