<?php include_once "top.php" ?>
<body style="background-color: #e9e9e9">
<div class="col-xs-12">
	<div class="jaula" style="width: 50%">
	<h1 class="centrado">Nuevo producto</h1>
<?php
if(isset($_GET["status"])){
				if($_GET["status"] === "4"){
					?><br>
						<div class="alert alert-warning">
							
							<strong>¡Para registrar un producto necesitas registrar una categoria, un proveedor y una unidad definida!</strong>
						</div>
					<?php
				} elseif($_GET["status"] === "2"){
					?><br>
						<div class="alert alert-warning">
							
							<strong>¡El stock mínimo no puede superar el stock máximo!</strong>
						</div>
					<?php
				 }
				 } ?>

<br>
<br>
<div style="margin-bottom: 100px; padding: 20px; background-color: #fff; text-shadow: 0 0 30px #fff;
			       box-shadow: 0 0 20px #333;">
	<form method="post" action="RegistroProductoHecho.php">
		<label for="codigo"><strong>Código:</strong></label>
		<input class="form-control" min="001"  name="codigo" minlength="6" maxlength="6" required type="text" id="codigo" placeholder="Escribe el código">

		<label for="descripcion"><strong>Descripción:</strong></label>
		<textarea placeholder="Producto" required id="descripcion" maxlength="50" pattern="[a-zA-Z]+" name="descripcion" cols="30" rows="5" class="form-control"></textarea>

		<label for="minStock"><strong>Cantidad mínima de Stock:</strong></label>
		<input class="form-control" name="minStock" min="0" maxlength="10" required type="number" id="precioVenta" placeholder="Cantidad mínima de Stock">

		<label for="maxStock"><strong>Cantidad máxima de Stock:</strong></label>
		<input class="form-control" name="maxStock" min="0" maxlength="2" required type="number" id="precioVenta" placeholder="Cantidad Máxima de Stock">

		<label for="precioVenta"><strong>Precio de venta:</strong></label>
		<input class="form-control" name="precioVenta" min="0"  maxlength="3" required type="number" id="precioVenta" placeholder="Precio de venta">

		
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

<label for="Proveedor"><strong>Proveedor:</strong></label>
<?php
#include ("conectar.php");


#$conectar = conectar();

$sql = "SELECT * FROM proveedor where p_check = 0";
$c = new SelectDatos();
$conectar = $c->Buscador();

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
		
		<br><br><input class="btn_a" type="submit" value="Guardar">
		<a href="VerProductos.php" class="cancel">Cancelar</a>


	</form>
</div>
</div>
</div>

</body>
<!--Poner un IF para que el codigo no se repita-->