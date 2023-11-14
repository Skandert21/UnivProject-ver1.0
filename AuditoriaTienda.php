
<?php 

include "conectar.php";
include "top.php";
include "restrict2.php";

$c = new SelectDatos();
$conectar = $c->Buscador();

	$sentencia_select=$conectar->prepare('SELECT *FROM auditoria_dos ORDER BY id_dos ASC');
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();

	
	if(isset($_POST['btn_buscar'])){
		
		$dt1 = $_POST['dt1'];
		$dt2 = $_POST['dt2'];
		$sentencia_select= $conectar->prepare("
			SELECT *FROM auditoria_dos WHERE datetime_dos BETWEEN '$dt1' and '$dt2'  ORDER BY id_dos DESC"
		);
        $sentencia_select->execute();
		$resultado=$sentencia_select->fetchAll();

	}

	if (isset($_POST['accion_buscar'])) {
    	$accion = $_POST['accion'];


		$sentencia_select= $conectar->prepare("
			SELECT *FROM auditoria_dos WHERE evento_dos = '$accion' ORDER BY id_dos DESC"
		);
        $sentencia_select->execute();
		$resultado=$sentencia_select->fetchAll();

    }

    if (isset($_POST['user_buscar'])) {
    	$usern = $_POST['user'];
		$sentencia_select= $conectar->prepare("
			SELECT *FROM auditoria_dos WHERE user_res_dos = '$usern' ORDER BY id_dos DESC"
		);
        $sentencia_select->execute();
		$resultado=$sentencia_select->fetchAll();

    }

 ?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>INVERSIONES MERLI</title>
	 <script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
	<link rel="stylesheet" href="./css/bootstrap.css">
<link rel="stylesheet" href="./css/body.css">

</head>
<body style="background-color: #e9e9e9">
	<div class="contenedor">
		<h3 class="centrado">Auditoria</h3>

		
		<div class="barra__buscador">



			<br>
			<br>
			<div class="centrado">
			<select class="form-control" style="margin-left: 25%; width: 50%" id="so" name="so" class="">
			<option value="0">Seleccione metodo de busqueda: </option>
			<option value="1">Por rango de fechas: </option>
			<option value="2">Por evento: </option>
			<option value="3">Por usuario: </option>
		</select>
		<br>
		<br>
		</div>

		<div id="ShowOption">aa</div>

		
		 <br>
		<br>
		 <br>
		<br>

		<div class="jaula">
<a href="Auditorias.php" class="btn_a">sección Perruquería</a>
</div>
<div class="container" style="width: 65%; margin-right: 100px; margin-left: 240px; margin-bottom: 100px; padding: 20px; background-color: #fff; text-shadow: 0 0 30px #fff;
			       box-shadow: 0 0 20px #333">
		<table class="table table-bordered" id="tabla_a">
		
			<thead>
			<tr class="head">
				<th class="formularioesp2">ID</th>
				<th class="formularioesp2">Evento</th>
				<th class="formularioesp2">Acción</th>
				<th class="formularioesp2">Fecha</th>
				<th class="formularioesp2">Usuario</th>
			</thead>
			</tr>
			<?php foreach($resultado as $fila):?>
				<tr ><td class="formularioesp"><?php echo $fila['id_dos']; ?></td>
					<td class="formularioesp"><?php echo $fila['descripcion_dos']; ?></td>
					<td class="formularioesp"><?php echo $fila['evento_dos']; ?></td>
					<td class="formularioesp"><?php echo $fila['datetime_dos']; ?></td>
					<td class="formularioesp"><?php echo $fila['user_res_dos']; ?></td>
				</tr>
			<?php endforeach ?>

		</table>
		<script>

	new DataTable('#tabla_a',{
               language:Traduccion,
			});

		</script>
	</div>
	</div>
</body>
</html>

<script type="text/javascript">
    $(document).ready(function(){
        $('#so').val();
        recargarLista();

        $('#so').change(function(){
            recargarLista();
        });
    })
</script>
<script type="text/javascript">
    function recargarLista(){
        $.ajax({
            type:"POST",
            url:"AuditoriaSelect.php",
            data:"so=" + $('#so').val(),
            success:function(r){
                $('#ShowOption').html(r);
            }
        });
    }
</script>