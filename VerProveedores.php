<?php
	include_once 'conectar.php';
?>
<div style="/*background-color: #ffca55;

                                " >

	<?php
		include 'top.php';

unset($_SESSION['carrito']);
	$sql='SELECT *FROM proveedor where p_check = 0 ORDER BY id_p DESC';
	
	$con = $conectar->conectarMetodo();

    $ver= new SelectDatos();

    $resultado = $ver->SeleccionarDatos($sql);


		if (!$resultado) {?>
	   <div class="alert alert-warning">
							<strong>Al parecer aun no tienes registrado ningún proveedor</strong>
						</div>
	 <?php }

	#1
	if(isset($_POST['btn_buscar'])){

		$buscar = $ver->Buscador();

		$buscar_text=$_POST['buscar'];
		
		$select_buscar=$buscar->prepare('
			SELECT *FROM cliente_venta WHERE nombre_cliente  LIKE :campo and c_check = 0;'
		);

		$select_buscar->execute(array(
			':campo' =>"%".$buscar_text."%"
		));

		$resultado=$select_buscar->fetchAll();

		if (!$resultado) {?>
	   <div class="alert alert-warning">
							<strong>¡Vaya, no hay ningún cliente con ese nombre!</strong>
						</div>
	 <?php }

	}

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>INVERSIONES MERLIZ</title>

	<link rel="stylesheet" href="./css/bootstrap.css">

<link rel="stylesheet" href="./css/body.css">

<link rel="stylesheet" href="./css/top.css">

</head>

<script src="js/jquery-3.6.4.min.js"></script>

<link rel="stylesheet" href="DataTables/DataTables-1.13.6/css/dataTables.bootstrap5.min.css">
	<link rel="stylesheet" href="DataTables/datatables.css" rel="stylesheet">
	<script src="DataTables/datatables.min.js"></script>


<script type="text/javascript" src="DataTables/datatables.min.js"></script>
<div style="/*background-color: FFFCC4;
     padding-top: 25px;
     margin-top: -30px;
     margin-right: 15%;
     margin-left: 15%;
     backd
     border-right: 2px solid #333;
     border-left: 2px solid#333; ">
<body style="background-color: #e9e9e9" >
	
		<h2 class="centrado">Proveedores</h2>

		<br>
		
		</br>

		<!--<div class="barra__buscador">

			<form action="" class="centrado" method="post">

				<input type="text" name="buscar" placeholder="buscar nombre o apellidos" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">

				<input type="submit" class="info" name="btn_buscar" value="Buscar">

				<br>
				
		
			
</form>
		</div>
		-->	
        

		
		

		<div class="jaula">
			<div class=""><td class="formularioesp"><a class="btn_a" href="RegistroProveedores.php">Nuevo</a></td></div>
	    </div>

		 <br>
		<br>
<!--

	</div>
	</div>

--><div class="container" style="margin-bottom: 100px; padding: 20px; background-color: #fff; text-shadow: 0 0 30px #fff;
			       box-shadow: 0 0 20px #333">
		<table class="table table-bordered" id="tabla_cliente">
		
			<thead>
			<tr class="head">
				<th class="formularioesp2">ID</th>
				<th class="formularioesp2">Nombre</th>
				
				<th class="formularioesp2">Telefono</th>
				<th class="formularioesp2">Editar</th>
				<th class="formularioesp2">Eliminar</th>
				<th class="formularioesp2">Comprar</th>
                

			</thead>
			</tr>
			<?php foreach($resultado as $fila):?>
				<tr id="" >
					<td class="formularioesp"><?php echo $fila['id_p']; ?></td>
					<td class="formularioesp"><?php echo $fila['nombre_p']; ?></td>
				
					<td class="formularioesp"><?php echo $fila['telefono_p']; ?></td>
					

					<td class="formularioesp"><a href="UpdateProveedores.php?id_p=<?php echo $fila['id_p']; ?>"  class="success" >Editar</a></td>
					<form method="POST" action="DeleteProveedor.php">
					
					<td class="formularioesp" id=""><button class="delete" type="submit" id="borrado" name="borrado" onclick="return borrar()" value="<?php echo $fila['id_p']; ?>">Eliminar</button></td>
					</form>

					<td class="formularioesp"><a href="CompraProveedor.php?id_p=<?php echo $fila['id_p']; ?>"  class="info" >Comprar</a></td>
				


				</tr>
                
				
					



</div>

<!-- cree una funcion que no se meter en un archivo por separado y que se ejecute aqui, arreglar eso. -->
<script type="text/javascript">
	function borrar(){
		var del = confirm('¿Está seguro que desea borrarlo? Los datos no se recuperarán');
		

if (del==true){

 alert('Hecho');       
    }

else {


event.preventDefault();

	alert('Proceso cancelado')

}
}</script>
			<?php endforeach ?>

		</table>

	<script>

	new DataTable('#tabla_cliente',{
               language:Traduccion,
			});

		</script>

</body>
</html>

