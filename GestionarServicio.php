<!DOCTYPE html>
<html>
<head>
	<title>INVERSIONES MERLIZ</title>
</head>
<body style="background-color: #e9e9e9" >

<?php 
include "Conectar.php";
include "top.php"; 
include "restrict.php";

$c= new Conectar();
$enlace = $c->ConectarMetodo();

@$id_con = $_GET['idc'];
$sql = "SELECT *from consulta WHERE id_consulta ='$id_con'";
$resultado = mysqli_query($enlace, $sql);
foreach ($resultado as $dato) {
	
	$id_con = $dato['id_consulta'];
	$id_d= $dato['id_dueno'];
	$id_p = $dato['id_perro'];
	$obss = $dato['observacion'];
}

$sql = "SELECT * from consulta_detalle WHERE id_con = '$id_con'";
$resultado = mysqli_query($enlace, $sql);
$_SESSION['TotalReal'] = 0;
foreach ($resultado as $key) {
	$_SESSION['TotalReal'] = $_SESSION['TotalReal']+ $key['subtotal'];
}

$_SESSION['id_con'] = $id_con;


?>


<?php
#update observaciones
if(isset($_POST['obs'])) {
	$obs = $_POST['obs'];

	if ($obs == "") {
	$obs = "No se realizaron observaciones";
}

	$c = new SelectDatos();
$cc = $c->Buscador();

$consulta_update=$cc->prepare('UPDATE consulta SET 

                    observacion=:observacion
				

					WHERE id_consulta=:id_consulta;'
				);
				$consulta_update->execute(array(
					
					':observacion' =>$obs,
		
					':id_consulta' =>$id_con,
				));


				$id_e = "actualizar";
				$user_res = $_SESSION['username'];
$datetime = date('Y-m-d H:i:s');
$descripcion = "El usuario ".$_SESSION["username"]."actualizó la observación de la consulta número ".$id_con." a *".$obs."*";
$aud_datos = array($descripcion, $id_e, $datetime, $user_res);
$auditoria = new Auditoria();

 $auditoria->AuditoriaMetodo($aud_datos)==3;

Header("Location: GestionarServicio.php?idc=$id_con");
}
?>

<?php 

#update servicios
if (isset($_POST['id'])) {



$ids = $_POST['id'];
$c= new Conectar();
$conectar = $c->ConectarMetodo();

$sql = "SELECT *from consulta_detalle where id= '$ids' limit 1";
$resultado= mysqli_query($conectar, $sql);
foreach ($resultado as $key) {
	 $resta = $key['subtotal'];
}


$sql = "DELETE FROM consulta_detalle where id = '$ids'";
$resultado = mysqli_query($conectar, $sql);
header("Location:GestionarServicio.php?idc=$_SESSION[id_con]");
}

?> 
<?php 
#update el total y salir
$c = new Conectar();
$conectar = $c->ConectarMetodo();

if (isset($_POST['total'])) {
	
$observacion = $_POST['observacion'];
$total = $_POST['total'];

$sql = "INSERT INTO consulta_detalle(id_con,servicio,subtotal) values('$id_con','$observacion','$total')";
$resultado = mysqli_query($conectar, $sql);

$c = new SelectDatos();
$conectar = $c->Buscador();
$consulta_update=$conectar->prepare('UPDATE consulta SET 


                    precio=:precio
					
					


					WHERE id_consulta=:id_consulta;'
				);
				$consulta_update->execute(array(
					
					':precio' =>$total,
					
					':id_consulta' =>$id_con,
				));


header("Location:GestionarServicio.php?idc=$_SESSION[id_con]");

}
?> 


	<link rel="stylesheet" href="./css/bootstrap.css">
<link rel="stylesheet" href="./css/body.css">
<link rel="stylesheet" type="text/css" href="./css/top.css">

<br>
<br>
<h2 class="centrado">Servicio</h2>
<br>
<div>

<div style="background-color: #fff;
            padding-top: 50px;
            padding-left: 50px;
            padding-bottom: 50px;
            margin-right:300px;
            border-radius: 10px; text-shadow: 0 0 30px #fff;
			       box-shadow: 0 0 20px #333" class="form">
			       <h5 class="">Observación:</h5>
<br>
<br>

<form action="" method="POST">
<div style="color:">
<textarea type="text" name="obs"  class="form-control" style="width: 50%; margin-left: 130px;" placeholder="Observaciones">
<?php echo $obss;?>	
</textarea>
<br>
<button style="margin-left: 240px;" class="success" type="submit" style="margin-top: 10px">Actualizar</button>
</div>
</form>
</div>
</div>
<br>

<div  class="container" style="width:65% ; margin-right: 200px; margin-left: 250px; margin-bottom: 100px; padding: 20px; background-color: #fff; text-shadow: 0 0 30px #fff;
			       box-shadow: 0 0 20px #333">



<h4 class="centrado">Ingresar Servicio</h4>

<?php   if(isset($_GET["status"])){
               if($_GET["status"] === "2"){
                    ?>
                    <div class="alert alert-info">
                            <strong>El total no puede ser de 0$ :(</strong>
                        </div>
<?php } }
?>

<div  class="">
<form action="" method="POST">

<br>
<br>
<br>

<input class="form-control" style="
                                    height: 60px; padding: 40px; margin-left: 30px; width:92% " id= "observacion" minlength="5" name="observacion"  type="text"  placeholder="Servicio aplicado" autocomplete="off"></input>

</tr>
<br>
<tr>

<label for="text"></label></tr>
<br>
<br>
<tr>

<input class="form-control" style="width: 40%; padding-left: 30px; margin-left: 40px" id= "total" min="1" name="total" required type="number" placeholder="Coste del servicio" autocomplete="off">
</tr>
<br>
<br>
<tr><button style="margin-top: 50px; margin-left: 20px" type="submit" class="success">Registrar servicio</button></tr>

<tr><a class="btn_a" href="GestionarServicioHecho.php">Finalizar</a></tr>
<!--<tr><a class="btn_a" href="VerConsultas.php">Regresar</a></tr>-->
</form>
</div>
</div>
<?php 

if(isset($_SESSION['id_con'])) {
	

$id_con = $_SESSION['id_con'];
	$sql= "SELECT * from consulta_detalle where id_con = '$id_con'";
	$resultado = mysqli_query($enlace, $sql);

?>

	<br>
	<br>
	<br>

<div class="container" style="width: 64.6%; margin-right: 200px; margin-left: 250px; margin-bottom: 100px; padding: 20px; background-color: #fff; text-shadow: 0 0 30px #fff;
			       box-shadow: 0 0 20px #333">
	<h3 class="centrado">Servicios</h3>
		<div class="col-xs-12">
<table class="table table-bordered">
<thead>

<th>Servicio</th>
<th>subtotal</th>

<th>Borrar</th>
</thead>
<br>
<br>
	<?php foreach ($resultado as $fila) { ?>

<tbody>
<tr>
	<td><?php echo $fila["servicio"];?></td>
    <td><?php echo $fila["subtotal"]."$";?></td>


<form action="" method="POST">
<!--<td><a class="btn_a" href="GestionarServicioBorrar.php?id_servicio=<?php echo $fila['id']; ?>">Borrar</a></td>-->
<td><button type="submit" value="<?php echo $fila['id']; ?>" class="delete" name="id" >Borrar</button></td>
</form>
<?php }?>

	<strong class="centrado">Total: <?php echo $_SESSION["TotalReal"]."$";?></strong><?php } ?>
</tr>

</tbody>

</table>
</div>
</div>


</body>
</html>

