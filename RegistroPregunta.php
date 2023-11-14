
<?php include_once "top2.php" ?>

<link rel="stylesheet" href="./css/bootstrap.css">
<link rel="stylesheet" href="./css/body.css">
<body>
  <div class="jaula" style="width: 50%">
<h2 class ="centrado">Antes de empezar</h2>
<br>
<br>
<p>Completa este formulario para poder iniciar normalmente</p>

<div class="">
<form action="RegistroPreguntaHecho.php" method="POST">
<tr>	
	<label for="id_cliente" ><strong>Pregunta de seguridad 1:</strong></label> 
<input class ="form-control" id="preguntauno" maxlength="20" name="preguntauno" required type ="text"  placeholder="Pregunta de seguridad 1" autocomplete="off">

<label for="id_cliente" ><strong>Respuesta 1:</strong></label> 
<input class ="form-control" id="respuestauno" maxlength="12" name="respuestauno" required type ="text"  placeholder="Respuesta 1" autocomplete="off">

</tr>
<!-- Recuerda poner un limitador de digitos a las cajas de texto/numero, arreglar el porqué no se guarda el 0 en telefono-->
<tr>	
	<label for="nombre_cliente"><strong>Pregunta de seguridad 2:</strong> </label>
<input class ="form-control" id="preguntados"  maxlength="20" required pattern="[A-Za-z ]+" name="preguntados" required type ="text"  placeholder="Pregunta de seguridad 2" autocomplete="off">
 
 <label for="id_cliente" ><strong>Respuesta 2:</strong></label> 
<input class ="form-control" id="respuestados"  maxlength="12" name="respuestados" required type ="text"  placeholder="Respuesta 2" autocomplete="off">

</tr>

<tr>	
	<label for="apellido_cliente"><strong>Pregunta de seguridad 3:</strong> </label>
<input class ="form-control" id="preguntatres" maxlength="20"  pattern="[A-Za-z ]+" name="preguntatres"  required type ="text"  placeholder="Pregunta de seguridad 3" autocomplete="off">

<label for="id_cliente" ><strong>Respuesta 3:</strong></label> 
<input class ="form-control" id="respuestatres" maxlength="12" name="respuestatres" required type ="text"  placeholder="Respuesta 3" autocomplete="off">


</tr>

<br>
<br>

<tr><button class="btn_a" type="submit" >Enviar</button></tr>

<tr> <a class="cancel" href="logout.php">Regresar</a></tr>
</form>
</div>
</div>
</body>