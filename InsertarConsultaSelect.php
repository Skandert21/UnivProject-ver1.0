<?php 
#$conectar=mysqli_connect('localhost','root','','inv');
$rd = "";
$idd = "";
$idd=$_POST['idd'];
include 'conectar.php';
/*
	$sql="SELECT id_perro from  detalle_perro 
		 where  id_dueno like '$idd'";

	$result=mysqli_query($conectar,$sql);
*/
$c = new SelectDatos();
$conectar = $c->Buscador();
$sentencia_select = $conectar->query("SELECT * FROM perro  

	INNER JOIN detalle_perro on perro.id_perro = detalle_perro.id_perro 
	INNER JOIN cliente on cliente.id_cliente = detalle_perro.id_dueno
	where nombre_perro LIKE '%$idd%' and m_check = 0 and c_check = 0");
	$sentencia_select->execute();
	$datos=$sentencia_select->fetchAll();


if (isset($_GET["idp"])) {
	$idp = $_GET["idp"];
	$sentencia_select = $conectar->query("SELECT * FROM perro  

	INNER JOIN detalle_perro on perro.id_perro = detalle_perro.id_perro 
	INNER JOIN cliente on cliente.id_cliente = detalle_perro.id_dueno
	where nombre_perro LIKE '%$idd%' and m_check = 0 and c_check = 0 and perro.id_perro = '$idp'");
	$sentencia_select->execute();
	$datos=$sentencia_select->fetchAll();


}





	?>
	<label>Resultados :</label>
<select class="form-control" style="width: 50%" id="id_perro" name="id_perro">
	<?php foreach ($datos as $dato) {

	  ?>
	<option value="<?php echo $dato['id_perro'];?>"><?php echo $dato['tipo'].": ".$dato['nombre_perro'].", ".$dato['raza_perro'].". Dueño: ".$dato['nombre_cliente']." ".$dato['apellido_cliente'];  ?></option>

	<?php 
}
?>
</select>
<br>
<br>


	
