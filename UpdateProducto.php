<?php
	include_once 'top.php';
    include_once 'conectar.php';
	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];

		$c = new SelectDatos();
		$conectar = $c->Buscador();

		$buscar_id=$conectar->prepare('SELECT * FROM productos inner join stock on stock.id_producto = productos.idpr WHERE idpr=:id LIMIT 1');
		$buscar_id->execute(array(
			':id'=>$id
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: inicio.php?status=2');
	}


	if(isset($_POST['guardar'])){

		$codigo=$_POST['codigo'];
		$descripcion=$_POST['descripcion'];
        $precioventa=$_POST['precioVenta'];
		$existencia=$_POST['existencia'];
		$minStock = $_POST["minStock"];
		$maxStock = $_POST["maxStock"];
		$categoria = $_POST["categoria"];
		$unidad = $_POST["unidad"];


if ($minStock > $maxStock) {
	unset($minStock);
	unset($maxStock);
header("Location: UpdateProducto.php?id=$id&status=2");
} else {

		$id=(int) $_GET['id'];

			
				$consulta_update=$conectar->prepare(' UPDATE productos SET  
					
					codigo=:codigo,
					descripcion=:descripcion,
					precioVenta=:precioVenta,
				    id_cat=:id_cat,
				    unidad=:unidad


					WHERE idpr=:id;'
				);
				$consulta_update->execute(array(
					
					':codigo' =>$codigo,
					':descripcion' =>$descripcion,
					':precioVenta' =>$precioventa,
					':id_cat' =>$categoria,
					':unidad' =>$unidad,

					

					':id' =>$id
				));


					$consulta_update=$conectar->prepare(' UPDATE stock SET  
					
					
					cantidad_minima=:cantidad_minima,
					cantidad_max=:cantidad_max


					WHERE id_producto=:id'
				);
				$consulta_update->execute(array(
					
					':cantidad_minima' =>$minStock,
					':cantidad_max' =>$maxStock,

					':id' =>$id
				));


               $user_res = $_SESSION['username'];
$id_e = "actualizar";
$datetime = date('Y-m-d H:i:s');
$descripcion = "El usuario ".$_SESSION["username"]." actualizó la información del producto ".$resultado["descripcion"]." con el codigo:".$resultado['codigo']." precio de venta: ".$resultado['precioVenta']." y existencia:".$resultado['existencia']." a *
".$descripcion." con el codigo: ".$codigo.", el precio de venta ".$precioventa." y existencia de: ".$existencia."* en el área de productos, sección *Tienda* satisfactoriamente";
#auditoria
$aud_datos = array($descripcion, $id_e, $datetime, $user_res);
$a = new Auditoria();
$auditoria = $a->AuditoriaMetodoDos($aud_datos);

	
				header('Location: inicio.php?status=1');
			
		}
		}else{
	
		}
	

/*
$sentencia = $conectar->prepare("INSERT INTO auditoria_dos (descripcion_dos, id_evento_dos, datetime_dos, user_res_dos) VALUES (?, ?, ?, ?);");

$resultado = $sentencia->execute([$descripcion, $id_e, $datetime, $user_res]);

				header('Location: VerProductos.php');
			}
		}else{
	
		}
	*/
	


?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Actualizar Productos</title>
	
</head>
<body style="background-color: #e9e9e9">
	<div class="">
		<h2 class="centrado">Actualización de Productos</h2>
        <div style="padding-left: 280px">
         <div class="" style=" margin: 60px; margin-bottom: 100px; padding: 20px; background-color: #fff; text-shadow: 0 0 30px #fff;
			       box-shadow: 0 0 20px #333; width: 60%" >
		<table class="table table-bordered" >
		<form action="" method="post">
			<div class="form-group">
				<br>
				<br>
				<?php	if(isset($_GET["status"])){
				if($_GET["status"] === "2"){
					?><br>
						<div class="alert alert-warning">
							
							<strong>¡El stock mínimo no puede superar el stock máximo!</strong>
						</div>
					<?php
				 }
				 } ?>

 <label for="codigo"><strong>Código:</strong></label>
<input class="form-control" name="codigo" required type="text" id="codigo" placeholder="Escribe el código" value="<?php if($resultado) echo $resultado['codigo']; ?>">

 <label for="descripcion"><strong>Descripción:</strong></label>
<textarea class="form-control" name="descripcion" required type="text" id="descripcion" placeholder="Escribe una descripción" value="<?php if($resultado) echo $resultado['descripcion']; ?>"><?php if($resultado) echo $resultado['descripcion']; ?></textarea>

<label for="minStock"><strong>Cantidad mínima de Stock:</strong></label>
		<input class="form-control" name="minStock" min="0" maxlength="10" required type="number" id="precioVenta" placeholder="Cantidad mínima de Stock" value="<?php if($resultado) echo $resultado['cantidad_minima']; ?>">

		<label for="maxStock"><strong>Cantidad máxima de Stock:</strong></label>
		<input class="form-control" name="maxStock" min="0" maxlength="2" required type="number" id="precioVenta" placeholder="Cantidad Máxima de Stock" value="<?php if($resultado) echo $resultado['cantidad_max']; ?>">

 <label for="precioVenta"><strong>Precio de venta:</strong></label>
<input class="form-control" name="precioVenta" required type="number" id="precioVenta" placeholder="Escribe el precio de venta" value="<?php if($resultado) echo $resultado['precioVenta']; ?>">



		<label for="categoria"><strong>Categoria:</strong></label>
		<?php
$sql = "SELECT * FROM categoria";
$c = new SelectDatos();
$conectar = $c->Buscador();

$stmt = $conectar->prepare($sql);
$result = $stmt->execute();
$cosos=$stmt->fetchAll(\PDO::FETCH_OBJ);
?>

<select class ="form-control"  id="categoria" name="categoria">



<?php

foreach ($cosos as $coso) {
	# code...


?>
<option name="id_dueno" value="<?php print($coso->id_cat);?>"><?php print ($coso->descripcion_cat);?>
	
	<?php ?>
</option>
<?php
}
?>
</select>
<label for="categoria"><strong>unidad de medida:</strong></label>
<?php
$sqll = "SELECT * FROM unidad_producto";
$c = new SelectDatos();
$conectar = $c->Buscador();

$stmt = $conectar->prepare($sqll);
$result = $stmt->execute();
$cosos=$stmt->fetchAll(\PDO::FETCH_OBJ);
?>

<select class ="form-control"  id="categoria" name="unidad">



<?php

foreach ($cosos as $cos) {
	# code...


?>
<option name="id_dueno" value="<?php print($cos->id);?>"><?php print ($cos->descripcion_u);?>
	
	<?php ?>
</option>
<?php
} ?>

</select>
</tr>



 

			</div>
			<div class="btn__group">
				<input type="submit" name="guardar" value="guardar" class="btn_a">
				<a href="VerProductos.php" class="cancel">Cancelar</a>
				
			</div>
		
		</form>
		</table>
		</div>
	</div>
	</div>
</body>
</html>
