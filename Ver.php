<?php include_once "top.php";?>

<!DOCTYPE>
<html>
<head>
	<title></title>
</head>
<body>
<link rel="stylesheet" href="./css/bootstrap.css">
<link rel="stylesheet" href="./css/body.css">


<h3 class="centrado">Consulta</h3>

<div  class="form">
<form action="RegistroConsultaHecho.php" method="POST">

<br>
<tr>	

<?php

session_start();



?>

<?php
include ("conectar.php");


#$conectar = conectar();
$id_cliente1 = "";
$id_perro = "";
$sql = 'SELECT distinct * FROM cliente c INNER JOIN perro p INNER JOIN detalle_perro d WHERE d.id_perro LIKE p.id_perro AND d.id_dueno LIKE c.id_cliente';

$stmt = $conectar->prepare($sql);
$result = $stmt->execute();
$cosos=$stmt->fetchAll(\PDO::FETCH_OBJ);



?>

<select class ="caja"  id="id_dueno" name="id_dueno">



<?php
$indice = false;
for ($i = 0; $i < count($cosos); $i++) {
    if (($cosos)[$i]->id_perro === $id_perro) {
        $indice = $i;
        break;

    }
}


$indice = false;
for ($i = 0; $i < count($cosos); $i++) {
    if (($cosos)[$i]->id_cliente === $id_cliente1) {
        $indice = $i;
        break;

    }
}




foreach ($cosos as $coso) {
	





?>
<option name="id_dueno" value="<?php print($coso->id_cliente);?>"><?php print($coso->id_cliente).","."\n".($coso->nombre_cliente);?></option>


<?php
}

if ($coso->id_cliente === $coso->id_dueno) {
echo $coso->id_perro === $coso->id_dueno;
}
?>

</select>















<select class ="caja"  id="id_perro" name="id_perro">



<?php
$indice = false;
for ($i = 0; $i < count($cosos); $i++) {
    if (($cosos)[$i]->id_perro === $id_perro) {
        $indice = $i;
        break;

    }
}


$indice = false;
for ($i = 0; $i < count($cosos); $i++) {
    if (($cosos)[$i]->id_cliente === $id_cliente1) {
        $indice = $i;
        break;

    }
}




foreach ($cosos as $coso) {
	





?>
<option name="id_perro" value="<?php print($coso->id_perro);?>"><?php print($id_perro = $coso->id_perro).","."\n".($coso->nombre_perro).","."\n".($id_cliente1 = $coso->id_dueno)?></option>


<?php
}


?>

</select>







<br>


<textarea class="caja" id= "observacion" name="observacion" required type="text" placeholder="observaciones y detalles" autocomplete="off"></textarea>
</tr>
<br>
<tr>

<textarea class="caja" id= "medicamentos" name="medicamentos" required type="text" placeholder="Tratamiento aplicado" autocomplete="off"></textarea>
<label for="text"></label></tr>
<br>
<br>
<tr>

<input class="caja3" id= "total" name="total" required type="number" placeholder="Total a pagar" autocomplete="off">
</tr>
<br>
<br>
<tr><button  type="submit" >Finalizar consulta</button></tr>

<tr></tr>

<tr><button class="boton"> <a class="btn btn__nuevo" href="VerConsultas.php" style="text-decoration:none"> Registros de Consultas</a></button></tr>
<br>
<br>

</div>

<tr></tr>

</form>
</div>
</body>
</html>