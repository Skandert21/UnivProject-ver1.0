<?php

include "conectar.php";
include "top.php";


$idpr = $_GET['id'];

$e = new Conectar();
$enlace = $e->ConectarMetodo();

$sql = "SELECT * FROM productos where idpr = '$idpr'";
$res = mysqli_query($enlace, $sql);
foreach ($res as $k) {
	$producto = $k["descripcion"];
	

}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Actualizar Productos</title>
	
</head>
<body style="background-color: #e9e9e9">
	<div class="contenedor">
		<h2 class="centrado">Asignarle producto a un proveedor</h2>
		<br>
         <div class="jaula" style="width: 55%">
         	<div class="container" style=" margin-bottom: 100px; padding: 20px; background-color: #fff; text-shadow: 0 0 30px #fff;
			       box-shadow: 0 0 20px #333">

		<table class="table table-bordered" >
		<form action="AsignarProductoProveedorHecho.php" method="post">
			<div class="form-group">
				<br>
				<br>
				<?php	if(isset($_GET["status"])){
				if($_GET["status"] === "2"){
					?><br>
						<div class="alert alert-warning">
							
							<strong>¡El campo de proveedores no puede estar vacío!</strong>
						</div>
					<?php
				 } elseif($_GET["status"] === "15"){
					?><br>
						<div class="alert alert-danger">
							
							<strong>¡No puedes eliminar a todos los proveedores de un producto!</strong>
						</div>
						<br>
					<?php
				}
				 } ?>

 <label for="codigo"><strong>Producto:</strong></label>
<select  class ="form-control"  id="producto" name="producto">
	<option  class ="form-control" value="<?php echo $idpr ?>"  id="producto" name="producto"><?php echo $producto; ?></option>
</select>


<label for="Proveedor"><strong>Proveedor:</strong></label>
<?php
#include ("conectar.php");
$c = new SelectDatos();
$conectar = $c->Buscador();


$sql = "SELECT * FROM proveedor WHERE p_check = 0 AND id_p NOT IN (SELECT id_prov FROM producto_proveedor WHERE id_prod = '$idpr')";



$stmt = $conectar->prepare($sql);
$result = $stmt->execute();
$cosos=$stmt->fetchAll(\PDO::FETCH_OBJ);

?>

<select class ="form-control"  id="proveedor" name="proveedor">



<?php

foreach ($cosos as $coso) {
	


?>
<option name="proveedor" value="<?php print($coso->id_p);?>"><?php print($coso->id_p).","."\n".($coso->nombre_p);?>
	
	<?php ?>
</option>
<?php
}
?>

</select>
</tr>
 
<br>
<br>
			
			<div class="btn__group">
				<input type="submit" name="guardar" value="guardar" class="btn_a">
				<a href="VerProductos.php" class="cancel">Cancelar</a>
				
			</div>
		</div>
		</form>
		</table>
	</div>
</div>
	<?php 


$sql = "SELECT * FROM producto_proveedor inner join proveedor on producto_proveedor.id_prov = Proveedor.id_p where id_prod = '$idpr'";
$res = mysqli_query($enlace, $sql); ?>

<h3 class="centrado">Borrar proveedores registrados</h3>
<br>
<div class="container" style=" margin-bottom: 100px; padding: 20px; background-color: #fff; text-shadow: 0 0 30px #fff;
			       box-shadow: 0 0 20px #333">
<table   class="table table-bordered">
			<tr class="head">
				<th>Id</th>
				<th>Nombre</th>
				
				<th>Teléfono</th>

				<th colspan="2">Acción</th>
			</tr>
			<?php foreach($res as $fila):?>
				<tr >
					<td><?php echo "J-".$fila['id_p']; ?></td>
					<td><?php echo $fila['nombre_p']; ?></td>
					
					<td><?php echo $fila['telefono_p']; ?></td>
				
										<form action="DeleteAsignarProductoProveedor.php" method="post">
			    <td class="formularioesp"><button type="submit" id="borrado" name="borrado" onclick="return borrar()" value="<?php echo $fila['id_p']; ?>" class="delete">Eliminar</button></td>

               <td> <input type="hidden" value="<?php echo $idpr ?>" name="producto"></td>
			</form>


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

				</tr>
			<?php endforeach ?>
			</table>
			</div>

<br>
</tr>
</br>






</body>
</html>