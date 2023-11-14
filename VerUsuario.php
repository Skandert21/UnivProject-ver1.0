<?php
	include_once 'conectar.php';
	include 'top.php';
    require "RestrictUserPage.php";
	

      $c=  new SelectDatos();
      $conectar= $c->Buscador();
	$sentencia_select=$conectar->prepare('SELECT *FROM user ORDER BY id ');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();


if (isset($_POST['btn_buscar'])) {

	$buscar_text=$_POST['buscar'];
		
$select_buscar=$conectar->prepare('SELECT *FROM user WHERE username LIKE :campo;');
	$select_buscar->execute(array(
			':campo' =>"%".$buscar_text."%"
		));

		$resultado=$select_buscar->fetchAll();
if (!$resultado) {?>
	   <div class="alert alert-warning">
							<strong>¡Vaya, no hay ningún usuario registrado con ese nombre!</strong>
						</div>
	 <?php }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>INVERSIONES MERLI</title>
	<link rel="stylesheet" href="./css/bootstrap.css">
<link rel="stylesheet" href="./css/body.css">
<link rel="stylesheet" href="./css/top.css">
</head>
<body style="background-color: #e9e9e9">
	<div class="contenedor">
		<h2 class="centrado">Usuarios</h2>

	<?php	if(isset($_GET["status"])){
				if($_GET["status"] === "3"){
					?><br>
						<div class="alert alert-warning">
							
							<strong>¡Los nombres de usuario no pueden repetirse!</strong>
						</div>
					<?php
				 }
				 } ?>
		<div class="barra__buscador">
<br>
		<br>
			<form action="" class="centrado" method="post">

				<input type="text" name="buscar" placeholder="buscar nombre de usuario" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">

				<input type="submit" class="info" name="btn_buscar" value="Buscar">

			</form>
			<br>
		<br>
		</div>
		
		<div class="jaula">
<td class="formularioesp"><a href="InsertUsuario.php"  class="btn_a">Nuevo</a></td>
<td class="formularioesp"><a href="VerPanelDeUsuario.php"  class="info">Ver panel de usuario</a></td>
</div>
		<div  class="container" style=" margin-bottom: 100px; padding: 20px; background-color: #fff; text-shadow: 0 0 30px #fff;
			       box-shadow: 0 0 20px #333">
		<table class="table table-bordered" id="tabla_u">
			<thead>
			<tr class="head">
				<th class="formularioesp2">Id</th>
				<th class="formularioesp2">Nombre</th>
				<th class="formularioesp2">Nivel de usuario</th>
				<th class="formularioesp2">Estado</th>
				<th class="formularioesp2">Editar</th>
				<th class="formularioesp2">Editar preguntas</th>
				<th class="formularioesp2">Eliminar</th>
				
				</thead>
			</tr>
			<?php foreach($resultado as $fila):?>
				<tr >
					<td class="formularioesp"><?php echo $fila['id']; ?></td>
					<td class="formularioesp"><?php echo $fila['username']; ?></td>
			        <td class="formularioesp"><select>
					<option value="<?php echo $fila['level']; ?>">nivel de usuario = <?php if($fila['level'] == 0){

						echo "Administrador";
					}
                        else{

                        	echo "Secretario";
                        } ?></option>
                     </select></td>
                     <td class="formularioesp"><?php if ($fila['estado']== 0) { echo "Activo";
					}else { echo "Inactivo";} ?></td>

					<td class="formularioesp"><a href="UpdateUsuario.php?id=<?php echo $fila['id']; ?>"  class="success" >Editar usuario</a></td>


					<td class="formularioesp"><a href="EditarPreguntasDeSeguridad.php?id=<?php echo $fila['id']; ?>"  class="success" >Editar preguntas de seguridad</a></td>


<form method="POST" action="DeleteUsuario.php">


					<td class="formularioesp" id=""><button class="delete" type="submit" id="borrado" name="borrado" onclick="return borrar()" value="<?php echo $fila['id']; ?>">Eliminar</button></td>

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
<br>
<br>
			</tr>



		</table>
	</div>
		<script>

	new DataTable('#tabla_u',{
               language:Traduccion,
			});

		</script>
<br>
<br>
		
		<br>
	</div>
</body>
</html>