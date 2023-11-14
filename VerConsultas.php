<?php
 include_once "conectar.php";
 include_once "top.php";

/*


*/


$c = new SelectDatos();
$conectar = $c->Buscador();
$sentencia = $conectar->query("SELECT consulta.id_consulta,  consulta.precio, consulta.fecha, cliente.id_cliente, cliente.nombre_cliente,cliente.apellido_cliente, cliente.telefono_cliente, perro.nombre_perro,  perro.raza_perro, consulta.observacion,/**/GROUP_CONCAT(consulta_detalle.servicio, '..',consulta_detalle.subtotal SEPARATOR '__') AS Servicios
FROM consulta
INNER JOIN cliente ON consulta.id_dueno = cliente.id_cliente
INNER JOIN perro ON consulta.id_perro = perro.id_perro
INNER JOIN consulta_detalle ON consulta.id_consulta = consulta_detalle.id_con
GROUP BY consulta.id_consulta
ORDER BY consulta.id_consulta DESC;");
$resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);

if (!$resultado) {?>
	   <div class="alert alert-warning">
							<strong>Al parecer aun no has registrado ningún servicio</strong>
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
WHERE fecha BETWEEN '$dt1' and '$dt2' 
GROUP BY consulta.id_consulta
ORDER BY consulta.id_consulta asc
;");
$resultado = $sentencia->fetchAll(PDO::FETCH_OBJ);

if (!$resultado) {?>
	   <div class="alert alert-warning">
							<strong>¡Vaya, no hay ningún servicio registrado en esas fechas!</strong>
						</div>
	 <?php }
$totaltotal = 0;
foreach ($resultado as $key) {
	
	$totaltotal = $totaltotal + $key->precio;
}

#$array = array($result->precio);
#$totaltotal = array_sum(intval($array));

}?>




<html style="">
<body style="background-color: #e9e9e9">
<div class="col-xs-12">
	<h1 class="centrado">Servicios</h1>
		<br>
		<br>
		
		<div>
<form action="" class="centrado" method="post">
           <br> 
                <div class="centrado">
                	<label>Desde :</label>
				<input type="date" name="dt1">
				<label>Hasta :</label>
				<input type="date" name="dt2">
				<input type="submit" class="info" name="btn_buscar" value="Buscar">
                </div>
			</form>
			<br>
			<br>
		</div>


<?php if (isset($totaltotal)) {?>
<strong>Total de la fecha marcada : <?php echo $totaltotal."$";  ?></strong>

<?php } ?>

<div class="jaula">
		<td class="formularioesp"><a href="InsertarConsulta.php"  class="btn_a">Nuevo</a></td>
</div>
<div class="" style="margin: 30px ; margin-bottom: 100px; padding: 20px; background-color: #fff; text-shadow: 0 0 30px #fff;
			       box-shadow: 0 0 20px #333">
<table class="table table-bordered" id="tabla_consul">
	
<!-- Top-->
<thead>
<th>id</th>

<th>Cliente</th>
<th>Nombre de la mascota</th>
<th>Servicio</th>
<th>Total</th>
<th>Fecha</th>
<th>Observación</th>
<th>Eliminar</th>
<th>Factura</th>
<th>Gestionar</th>

</thead>
	<tbody>
				<?php  foreach($resultado as $result){ 

		/*
$e = new Conectar();
$enlace = $e->ConectarMetodo();
$sel ="SELECT * FROM cliente_venta WHERE id_c = '$idcv'";

$res = mysqli_query($enlace, $sel);

foreach ($res as $result) {
$nombre = $result['nombre_c'];
$apellido = $result['apellido_c'];
}*/
					?>
				<tr>
					<td><?php echo $Rem =$result->id_consulta ?></td>
					<td><?php echo $idcv = "C.I ".$result->id_cliente."<br>->".$result->nombre_cliente." ".$result->apellido_cliente."</br>" ?></td>
					<td><?php echo $result->nombre_perro."<br>->".$result->raza_perro." "?></td>
					
<?php 

 ?>
					
					<td>
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Servicio</th>
									<th>Subtotal</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach(explode("__", $result->Servicios) as $Serviciosapli){ 
								$serv = explode("..", $Serviciosapli)
								?>
								<tr>
									<td><?php echo $serv[0] ?></td>
									<td><?php echo $serv[1]."$" ?></td>

								</tr>
								
								<?php } ?>
							</tbody>
						</table>
					</td>
                    <td><?php echo $result->precio."$" ?></td>
					<td><?php echo $result->fecha?></td>

				<td>
					<p style="padding: 20px;
				              background-color: #999999;
				              overflow: auto;
				              float: left;
				              position: relative;
				              width: relative;
				              height: relative;"><strong><?php echo $result->observacion ?></strong></p>
				          </td>


					<!--
<td class="formularioesp"><a href="UpdateConsulta.php?id_consulta=<?php echo $result->id_consulta; ?>"  class="btn_a" >Editar</a></td>
-->
					<form action="DeleteConsulta.php" method="post">
					<td><button class="delete" id="borrado" onclick="return borrar()" name="borrado" value="<?php echo $result->id_consulta?>">Eliminar</button></td></form>

					<td><a class="info" href="FacturaConsulta.php?id_consulta=<?php echo $result->id_consulta?>">Generar factura</a></td>
					<td><a class="success" href="GestionarServicio.php?idc=<?php echo $result->id_consulta ?>">Gestionar Servicio</a></td>
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

	new DataTable('#tabla_consul',{
              /* language:Traduccion,*/
			});

		</script>
				
</div>
</body>
</html>
