<?php 
#$conectar=mysqli_connect('localhost','root','','inv');
$idd=$_POST['idd'];
include 'conectar.php';
/*
	$sql="SELECT id_perro from  detalle_perro 
		 where  id_dueno like '$idd'";

	$result=mysqli_query($conectar,$sql);
*/
$c = new SelectDatos();
$conectar = $c->Buscador();
$sentencia_select = $conectar->query("SELECT * FROM perro p  INNER JOIN detalle_perro d where d.id_perro LIKE p.id_perro AND d.id_dueno LIKE '$idd'");
	$sentencia_select->execute();
	$datos=$sentencia_select->fetchAll();
	?>
	<label>Seleccione una Mascota</label>
<select id="id_perro" name="id_perro">
	<?php foreach ($datos as $dato) {
	  ?>
	<option value="<?php echo $dato['id_perro'];?>"><?php echo $dato['id_perro'].", ".$dato['nombre_perro'];  ?></option>

	<?php 
}
?>
</select>


	
