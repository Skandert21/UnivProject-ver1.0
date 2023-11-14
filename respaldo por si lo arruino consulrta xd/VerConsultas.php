<?php
 include_once "conectar.php";
 include_once "top.php";

/*

codigo de concatenado que no usé porque esta vaina solo funciona si uso diferentes tipos de codigo
$sentencia_select = $conectar->query("SELECT * FROM consulta p 
		INNER JOIN perro d ON p.i_perro = d.nombre_perro INNER JOIN cliente c ON p.id_dueno = c.nombre_cliente");
$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

*/
 /*

	codigo 2 para concatenar tablas

*/
	$sql= "SELECT * FROM consulta c 
		INNER JOIN perro p ON p.id_perro = c.id_perro
	    INNER JOIN cliente d WHERE d.id_cliente LIKE c.id_dueno ORDER BY id_consulta ASC";
	$ver = new SelectDatos();
	$resultado=$ver->SeleccionarDatos($sql);

?>


<?php

$c = new SelectDatos();
$conectar= $c->Buscador();
if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$conectar->prepare('
			SELECT * FROM consulta c 
		INNER JOIN perro p ON p.id_perro = c.id_perro
	    INNER JOIN cliente d WHERE d.id_cliente LIKE c.id_dueno AND fecha LIKE :campo ORDER BY id_consulta ASC;'
		);

		$select_buscar->execute(array(
			':campo' =>"%".$buscar_text."%"
		));

		$resultado=$select_buscar->fetchAll();
header('VerConsultas.php');
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>INVERSIONES MERLIZ</title>
	<link rel="stylesheet" href="./css/bootstrap.css">
<link rel="stylesheet" href="./css/body.css">
<link rel="stylesheet" href="./css/top.css">
</head>
<body>


<h3 class="centrado">Registro de Consultas</h3>
<!--
Codigo que no me funcionó pa un coño


	<div class="contenedor">
		<h3 class="centrado">Registros de Consultas</h3>
		<div class="barra__buscador">
<?php foreach($resultado as $fila):?>

<select class="centrado">
	
	<option value=" <?php echo $fila['nombre_perro']; ?>"></option>
    <option value="asasa"></option>
    <option value="asaas"></option>
    <option value="asasa">3</option>
    </select>

<?php endforeach ?>-->
			<form action="" class="centrado" method="post">
           <br> 
                <div class="centrado">
				<input class="centrado" type="text" name="buscar" placeholder="AAAA-MM-DD" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">

				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
                </div>
			</form>
			
		</div>




<div class="col-xs-12">
<table class="table table-bordered">
	
<!-- Top-->
<thead>
<th>id</th>
<th>cédula del cliente</th>
<th>Nombre del cliente</th>
<th>Nombre del perro</th>
<th>Servicios</th>
<th>Precio</th>
<th>Fecha</th>
<th>Acción</th>
</thead>
<br>
<br>
<tbody>
<tr>
<?php foreach($resultado as $fila): ?>
	<td><?php echo $fila["id_consulta"];?></td>
    <td><?php echo $fila["id_dueno"];?></td>
    <td><?php echo $fila["nombre_cliente"];?></td>
    <td><?php echo $fila["nombre_perro"];?></td>
    <td><?php echo $fila["observacion"];?></td>
    <td><?php echo $fila["precio"];?></td>
    <td><?php echo $fila["fecha"];?></td>


                    <!--<td class="formularioesp"><a href="#?id=<?php echo $fila['id']; ?>"  >Editar</a></td>
					<td class="formularioesp"><a href="#?id=<?php echo $fila['id']; ?>" >Eliminar</a></td>
					-->
    

<td class="formularioesp"><a href="UpdateConsulta.php?id_consulta=<?php echo $fila['id_consulta']; ?>"  class="btn_a" >Editar</a></td>

<td><a class="btn_a" href="FacturaConsulta.php?id_consulta=<?php echo $fila['id_consulta']; ?>">Generar factura</a></td>
<form method="POST" action="DeleteConsulta.php">


					<td class="formularioesp" id=""><button class="boton" type="submit" id="borrado" name="borrado" onclick="return borrar()" value="<?php echo $fila['id_consulta']; ?>">Eliminar</button></td>

                     </form>
				<script type="text/javascript">
	function borrar(){
		var del = confirm('¿Está seguro que desea borrarlo? Los datos no se recuperarán');
		

if (del==true){
     
    }

else {

event.preventDefault()


	alert('Proceso cancelado')

}
}</script>

</tr>
 
<?php endforeach ?>
</tbody>
</table>

	<td class="formularioesp"><a href="InsertarConsulta.php"  class="btn_a">Nuevo</a></td>
	<td class="formularioesp"><a href="HistorialDeConsultas.php"  class="btn_a">Historial de consultas</a></td>
</div>



















<!--

		<table class="formulario">
			<tr class="head">
				<td class="formularioesp2">Id</td>
				<td class="formularioesp2">Nombre</td>
				<td class="formularioesp2">Raza</td>
					<td class="formularioesp2">Cédula del dueño</td>
				
			</tr>
			<?php foreach($resultado as $fila):?>
				<tr >
					<td class="formularioesp"><?php echo $fila['id_consulta'];?>

					<td class="formularioesp"> <?php echo $fila['nombre_perro']; ?></td>
					<td class="formularioesp"><?php echo $fila['raza_perro']; ?></td>
					
                     <td class="formularioesp"><?php echo $fila['id_dueno']; ?></td>
					
					<td class="formularioesp"><a href="#?id=<?php echo $fila['id']; ?>"  class="btn btn__nuevo" >Editar</a></td>
					<td class="formularioesp"><a href="#?id=<?php echo $fila['id']; ?>" class="btn btn__nuevo">Eliminar</a></td>
					<td class="formularioesp"><a href="#?id=<?php echo $fila['id']; ?>" class="btn btn__nuevo">x</a></td>
				</tr>
			<?php endforeach ?>

		</table>
		-->
	</div>
</body>
</html>
