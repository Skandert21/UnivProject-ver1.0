
<?php
include "conectar.php"; 
include "top.php";

$idmas = $_GET['id_perro'];

$c= new Conectar();
$conectar = $c->ConectarMetodo();
$sql= "SELECT * FROM perro WHERE id_perro = '$idmas'";
$res = mysqli_query($conectar, $sql);
foreach ($res as $key) {

?>
<!DOCTYPE html>
<html>
<head>
	<title>INVERSIONES</title>
</head>
<body style="background-color: #e9e9e9">

<h3 class="centrado"> Historial de <?php echo $key['nombre_perro'] ?></h3>
<?php
#endforeach
}

$c = new SelectDatos();
$conectar = $c->Buscador();
$sentencia = $conectar->query("SELECT consulta.id_consulta,  consulta.precio, consulta.fecha, cliente.id_cliente, cliente.nombre_cliente,cliente.apellido_cliente, cliente.telefono_cliente, perro.nombre_perro,  perro.raza_perro, consulta.observacion,/**/GROUP_CONCAT(consulta_detalle.servicio, '..',consulta_detalle.subtotal SEPARATOR '__') AS Servicios
FROM consulta
INNER JOIN cliente ON consulta.id_dueno = cliente.id_cliente
INNER JOIN perro ON consulta.id_perro = perro.id_perro
INNER JOIN consulta_detalle ON consulta.id_consulta = consulta_detalle.id_con
WHERE consulta.id_perro = '$idmas'
GROUP BY consulta.id_consulta
ORDER BY consulta.id_consulta DESC;");
$resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);

if (!$resultado) {
	 ?>

			 <div class="alert alert-warning">
							<strong>Nota: Esta mascota no tiene ninguna visita</strong>
						</div>
						<?php }

?>

<?php if(isset($_POST['btn_buscar'])){
	$dt1 = $_POST['dt1'];
	$dt2 = $_POST['dt2'];

$sentencia = $conectar->query("SELECT consulta.id_consulta,  consulta.precio, consulta.fecha, cliente.id_cliente, cliente.nombre_cliente,cliente.apellido_cliente, cliente.telefono_cliente, perro.nombre_perro,  perro.raza_perro, consulta.observacion,/**/GROUP_CONCAT(consulta_detalle.servicio, '..',consulta_detalle.subtotal SEPARATOR '__') AS Servicios
FROM consulta
INNER JOIN cliente ON consulta.id_dueno = cliente.id_cliente
INNER JOIN perro ON consulta.id_perro = perro.id_perro
INNER JOIN consulta_detalle ON consulta.id_consulta = consulta_detalle.id_con
WHERE consulta.id_perro = '$idmas' and fecha BETWEEN '$dt1' and '$dt2' 
GROUP BY consulta.id_consulta
ORDER BY consulta.id_consulta asc
;");
$resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);

if (!$resultado) {
	 ?>

			 <div class="alert alert-warning">
							<strong>¡Vaya, esta Mascota no tiene registro de las fechas marcadas!</strong>
						</div>
						<?php }

} ?>

<br>
<div class="centrado">
<form method="post" action="">
<label for="dt1">Desde :</label>
<input type="date" name="dt1">
<label for="dt2">Hasta :</label>
<input type="date" name="dt2">
<input type="submit" class="info" name="btn_buscar" value="Buscar">
</form>
</div>
<br>
<div class="jaula">
			       <a style="margin-left: 15px;" class="cancel" href="VerClientes.php">Volver</a>
			   </div>

<div class="" style="margin:30px ; margin-bottom: 100px; padding: 20px; background-color: #fff; text-shadow: 0 0 30px #fff;
			       box-shadow: 0 0 20px #333; ">
<table class="table table-bordered" id="tabla_historial_mascota">
	
<!-- Top-->
<thead>
	<tr class="head">
<th class="formularioesp2">id</th>
<th class="formularioesp2">Cliente</th>
<th class="formularioesp2">Nombre de la mascota</th>
<th class="formularioesp2">Servicio</th>
<th class="formularioesp2">Total</th>
<th  class="formularioesp2">Fecha</th>
<th class="formularioesp2">Observacion</th>
<th class="formularioesp2">Gestionar Servicios</th>
<th class="formularioesp2">Eliminar</th>
<th class="formularioesp2">Factura</th>
</tr>
</thead>
	<tbody>
				<?php foreach($resultado as $result){ 

					?>
				<tr>
					<td class="formularioesp"><?php echo $Rem =$result->id_consulta ?></td>
					<td class="formularioesp"><?php echo $idcv = "C.I ".$result->id_cliente."<br>->".$result->nombre_cliente." ".$result->apellido_cliente."</br>" ?></td>
					<td class="formularioesp"><?php echo $result->nombre_perro."<br>->".$result->raza_perro." "?></td>
					
<?php 

 ?>
					
					<td>
						<table class="table table-bordered">
							<thead >
								<tr>
									<th  class="formularioesp">Servicio</th>
									<th class="formularioesp">Subtotal</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach(explode("__", $result->Servicios) as $Serviciosapli){ 
								$serv = explode("..", $Serviciosapli)
								?>
								<tr>
									<td  class="formularioesp"><?php echo $serv[0] ?></td>
									<td  class="formularioesp"><?php echo $serv[1]."$" ?></td>

								</tr>
								
								<?php } ?>
							</tbody>
						</table>
					</td>
                    <td class="formularioesp"><?php echo $result->precio."$" ?></td>
					<td class="formularioesp"><?php echo $result->fecha?></td>
				<td>
					<p class="formularioesp" style="padding: 20px;
				              background-color: #999999;
				              overflow: auto;
				              float: left;
				              position: relative;
				              width: relative;
				              height: relative;"><strong ><?php echo $result->observacion ?></strong></p>
				          </td>


				<form action="DeleteConsulta.php" method="post">
					<td><a class="success" href="GestionarServicio.php?idc=<?php echo $result->id_consulta ?>">Gestionar Servicio</a></td>
					<td><button class="delete" id="borrado" onclick="return borrar()" name="borrado" value="<?php echo $result->id_consulta?>">Eliminar</button></td></form>

					<td><a class="info" href="FacturaConsulta.php?id_consulta=<?php echo $result->id_consulta?>">Generar factura</a></td>
					
<!-- cree una funcion que no se meter en un archivo por separado y que se ejecute aqui, arreglar eso. -->
<script type="text/javascript">
	function borrar(){
		var del = confirm('¿Está seguro que desea borrarlo? Los datos no se recuperarán');
		

if (del==true){

 alert('Hecho');       
    }

else {


event.preventDefault();

	alert('Proceso cancelado')

}
}</script>


				</tr>


				<?php } ?>
			</tbody>
		</table>
          </div>
          <script>

	new DataTable('#tabla_historial_mascota',{
              /* language:Traduccion,*/
			});

		</script>
</body>
</html>

<?php #INNER JOIN consulta on perro.id_perro = consulta.id_perro ?>