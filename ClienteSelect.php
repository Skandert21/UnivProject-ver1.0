<?php 
#$conectar=mysqli_connect('localhost','root','','inv');
$rd = "";
$idd = "";
$idd=$_POST['idc'];
$dueno = $_GET["id_dueno"];
include 'conectar.php';
/*
	$sql="SELECT id_perro from  detalle_perro 
		 where  id_dueno like '$idd'";

	$result=mysqli_query($conectar,$sql);
*/
$c = new SelectDatos();
$conectar = $c->Buscador();
$sentencia_select = $conectar->query(" SELECT * FROM cliente 
	
	where cliente.nombre_cliente = '$idd' and cliente.c_check = 0 and cliente.id_cliente != '$dueno' ");
	$sentencia_select->execute();
	$datos=$sentencia_select->fetchAll();







	?>
	<label style="color: #fff">Resultados :</label>
<select class="form-control" style="" id="id_cli" name="id_cli">
	<?php foreach ($datos as $dato) {

	  ?>
	<option value="<?php echo $dato['id_cliente'];?>"><?php echo "Cédula: ".$dato['id_cliente'].", ".$dato['nombre_cliente']." ".$dato['apellido_cliente'];  ?></option>

	<?php 
}
?>
</select>
<br>
<br>


	
