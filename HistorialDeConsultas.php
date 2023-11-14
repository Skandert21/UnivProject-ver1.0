
<?php
include "conectar.php";
include "top.php";
$c = new SelectDatos();
$conectar= $c->Buscador();

$sentencia_select = $conectar->query("SELECT * FROM consulta_respaldo");
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

?>

<?php if(isset($_POST['filtro'])){
		$buscar_text=$_POST['filtro'];
		$select_buscar=$conectar->prepare('
			SELECT *FROM consulta_respaldo WHERE user_res_cr LIKE :campo;'
		);

		$select_buscar->execute(array(
			':campo' =>"%".$buscar_text."%"
		));

		$resultado=$select_buscar->fetchAll();
header('HistorialDeConsultas.php');
} ?>



<!DOCTYPE html>
<html>
<head>
	<title>INVERSIONES</title>
</head>
<body>

<h2 class="centrado">Historial de consultas</h2>
<br>
<br>
<form method="post">
<?php  	$sql = "SELECT * FROM user";

$stmt = $conectar->prepare($sql);
$result = $stmt->execute();
$res=$stmt->fetchAll();

?>

<select name="filtro">

	<?php foreach ($res as $datos) {
	 ?>
	<option name="filtro" value="<?php print($datos['username']);?>"><?php print($datos['username']);?></option>
<?php } ?>
</select>

<input class="btn btn__nuevo" type="submit" name="" value="Filtrar">
<label for="filtro"></label>

</form>

<div class="col-xs-12">
<table class="table table-bordered">

	<thead>

<th>id</th>
<th>cédula del cliente</th>
<th>Nombre del cliente</th>
<th>Nombre del perro</th>
<th>Observaciones</th>
<th>Precio</th>
<th>Fecha</th>
<th>usuario</th>

    </thead>
<br>
<br>
<tbody>
	<tr>
<?php foreach($resultado as $fila): ?>
	<td><?php echo $fila["id"];?></td>
    <td><?php echo $fila["id_cliente_cr"];?></td>
    <td><?php echo $fila["nombre_cliente_cr"];?></td>
    <td><?php echo $fila["nombre_perro_cr"];?></td>
    <td><?php echo $fila["observaciones_cr"];?></td>
    <td><?php echo $fila["precio_cr"];?></td>
    <td><?php echo $fila["date_cr"];?></td>
    <td><?php echo $fila["user_res_cr"];?></td>
<?php  

?>




<td class="formularioesp"><a href=""  class="btn btn__nuevo" >Editar</a></td>


<form method="POST" action="DeleteConsulta.php">


					<td class="formularioesp" id=""><button class="btn btn__nuevo" type="submit" id="borrado" name="borrado" onclick="return borrar()" value="">Eliminar</button></td>

                     </form>






</tr>
<?php endforeach ?>
</tbody>
</table>
</div>


</body>
</html>