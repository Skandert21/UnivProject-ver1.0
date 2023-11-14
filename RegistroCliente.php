<?php include_once "top.php" ?>


<link rel="stylesheet" href="./css/bootstrap.css">
<link rel="stylesheet" href="./css/body.css">


<!DOCTYPE html>
<html>
<head>
	<title>INVERSIONES MERLIZ</title>
</head>

<body style="background-color: #e9e9e9">
  <div class="jaula" style="width: 50%">
<h3 class ="centrado">Registro de cliente</h3>
<br>
<br>
<div class="container" style="margin-bottom: 100px; padding: 20px; background-color: #fff; text-shadow: 0 0 30px #fff;
			       box-shadow: 0 0 20px #333">
<div class="">
<form action="RegistroClienteHecho.php" method="POST" onsubmit="">
<tr>	
	<label for="id_cliente" ><strong>Cédula del cliente:</strong></label> 
<input class ="form-control" id="id_cliente" min="1000000" max="40000000" title="el formato de cédula permitido es de xx.xxx.xxx o x.xxx.xxx" required minlength="7" maxlength="8" name="id_cliente" required type ="number"  placeholder="Cédula del cliente" autocomplete="off">

</tr>
<!-- Recuerda poner un limitador de digitos a las cajas de texto/numero, arreglar el porqué no se guarda el 0 en telefono-->
<tr>	
	<label for="nombre_cliente"><strong>Nombre del cliente:</strong> </label>
<input class ="form-control" id="nombre_cliente" minlength="3" maxlength="10" required pattern="[A-Za-z ]+" name="nombre_cliente" required type ="text"  placeholder="Nombre del cliente" autocomplete="off">
 
</tr>

<tr>	
	<label for="apellido_cliente"><strong>Apellido del cliente:</strong> </label>
<input class ="form-control" id="apellido_cliente" minlength="3" maxlength="10"  pattern="[a-zA-Z]+" name="apellido_cliente"  required type ="text"  placeholder="apellido del cliente" autocomplete="off">

</tr>
<label for="telefono_cliente"><strong>Telefono del cliente:</strong></label>
<input class = "form-control"  id="telefono_cliente" min="04000000000" max="04999999999" required minlength="10" maxlength="10" name="telefono_cliente" required type ="number" placeholder="Teléfono del cliente" autocomplete="off">


<br>
<br>

<tr><button class="btn_a" type="submit" oninput="validarIdCliente(this)" >Enviar</button></tr>

<tr> <a class="cancel" href="VerClientes.php">Regresar</a></tr>
</form>
</div>
</div>
</div>
</body>
</html>