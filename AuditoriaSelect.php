<?php 
#$conectar=mysqli_connect('localhost','root','','inv');
$so = "";
#so de select option
$so=$_POST['so'];
include 'conectar.php';

$enlace = new Conectar();
$e = $enlace->ConectarMetodo();

$sql = "SELECT * FROM user";
$c = new SelectDatos();
$conectar = $c->Buscador();

$stmt = $conectar->prepare($sql);
$result = $stmt->execute();
$res=$stmt->fetchAll(\PDO::FETCH_OBJ);
	?>

	<!-- Poner opciones aquí -->
	<?php if ($so == "1") { ?>
	
	
			<form action="" class="centrado" method="post">
				<label>Desde: </label>
<input required type="date" name="dt1">
<label>Hasta: </label>
<input required type="date" name="dt2">

				<input type="submit" class="info" name="btn_buscar" value="Buscar">

				<br>
		
			</form>
	<?php	}elseif ($so == "2") { ?>
	<form action="" class="centrado" method="post">
				<label>Acción: </label>
<select name="accion" class="form-control" style="margin-left: 25%; width: 50%">
	<option value="insertar">Insertar</option>
	<option value="actualizar">Actualizar</option>
	<option value="eliminar">Eliminar</option>
	<option value="entrar">Entrar</option>
	<option value="salir">Salir</option>
</select>
				<br>
		<input type="submit" class="info" name="accion_buscar" value="Buscar">
			</form>
<?php }elseif ($so == "3") { ?>
<form action="" class="centrado" method="post">
	 <select name="user" class="form-control" style="margin-left: 25%; width: 50%">
     

 

    <?php foreach ($res as $userdato) {

	?>
    
	<option value="<?php echo $userdato->username; ?>"><?php echo $userdato->username; ?></option>
	<br>

     <?php } ?>
	</select>
	  <br>
	<input type="submit" class="info" name="user_buscar" value="Buscar">

</form>


<?php }else { ?>


<?php } ?>
	
</select>