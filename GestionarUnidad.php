<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body style="background-color: #e9e9e9">



<?php

include "conectar.php";
include "top.php";









 
$c= new SelectDatos();
	$conectar = $c->Buscador();

	$sentencia_select=$conectar->prepare('SELECT *FROM unidad_producto');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();
	if (!$resultado) {?>
		<div class="alert alert-warning">
							<strong>Al parecer no has registrado ninguna unidad</strong>
						</div >
	<?php } 

	
	if(isset($_POST['btn_buscar'])){
		$buscar_text=$_POST['buscar'];
		$select_buscar=$conectar->prepare('
			SELECT *FROM productos WHERE descripcion LIKE :campo;'
		);

		$select_buscar->execute(array(
			':campo' =>"%".$buscar_text."%"
		));

		$resultado=$select_buscar->fetchAll();
          
          if (!$resultado) {?>
          	<div class="alert alert-warning">
							<strong>¡Vaya, no hay ningún producto registrado con ese nombre!</strong>
						</div>
         <?php } 
	}

?>

<link rel="stylesheet" href="./css/bootstrap.css">
<link rel="stylesheet" href="./css/body.css">

	<div class="col-xs-12">
	<br>
	<br>
		<h1 class="centrado">Unidad de producto</h1>
 <br>
            <br>

	
			<br>
			<br>

<?php 

if (isset($_GET['status'])) {
	if ($_GET['status']==="3") {?>
		<br>
						<div class="alert alert-warning">
							
							<strong>¡Para borrar una unidad debes borrar primero los productos con esta unidad!</strong>
						</div>
<?php	}
}


 ?>

		<div class="jaula">
			<a class="btn_a" href="./RegistroUnidad.php">Nueva unidad</a>
			<a href="VerProductos.php" class="cancel">Cancelar</a>

			
		</div>
		<br>
		<div class="container" style=" margin-bottom: 100px; padding: 20px; background-color: #fff; text-shadow: 0 0 30px #fff;
			       box-shadow: 0 0 20px #333"> 
		<table class="table table-bordered" id="tabla_cat">
			<thead>
				<tr>
					<th>ID</th>
					<th>Descripción</th>
					<th>Eliminar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($resultado as $fila){ ?>
				<tr>
					<td class="formularioesp"><?php echo $fila['id']; ?></td>
					
					<td class="formularioesp"><?php echo $fila['descripcion_u']; ?></td>
					
				
					
					<form action="DeleteUnidad.php" method="post">
					<td class="formularioesp"><button onclick="return borrar()" name="borrado" id="borrado" value="<?php echo $fila['id']; ?>" class="delete">Eliminar</button></td>
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
</script></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		<script>

	new DataTable('#tabla_ven',{
              /* language:Traduccion,*/
			});

		</script>
	</div>
		
</tr></td>
	</div>


</body>
</html>