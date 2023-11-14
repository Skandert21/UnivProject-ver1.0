<?php include_once "top.php";?>

<!DOCTYPE>
<html>
<head>
	<title></title>
    <script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
    
</head>
<body>
<link rel="stylesheet" href="./css/bootstrap.css">
<link rel="stylesheet" href="./css/body.css">


<h3 class="centrado">Consulta</h3>
<br>
<form method="post" action="">
<input type="submit" class="btn" name="sumar" value="1">
</form>

<div  class="form">
<form action="RegistroConsultaHecho.php" method="POST">

<br>
<tr>	
<?php
#$conectar = conectar();
$id_cliente1 = "";
$id_perro = "";
$sql = 'SELECT distinct * FROM cliente';
$c = new SelectDatos();
$conectar= $c->Buscador();
$i=0;
$stmt = $conectar->prepare($sql);
$result = $stmt->execute();
$cosos=$stmt->fetchAll(\PDO::FETCH_OBJ);
?>
<!--Cliente-->
<label>Seleccione un Cliente</label>
<!--
<select class ="caja"  id="id_dueno" name="id_dueno">


<?php  

foreach ($cosos as $coso) {
	

?>
<option name="id_dueno" value="<?php print($coso->id_cliente);?>"><?php print($coso->id_cliente).","."\n".($coso->nombre_cliente);?></option>

<?php
}

?>
</select>
-->

<input type="number" id="id_dueno" name="id_dueno" min="1000000" max="99999999" title="el formato de cédula permitido es de xx.xxx.xxx o x.xxx.xxx" required minlength="7" maxlength="8" autocomplete="on" placeholder="cédula del dueño">
<br>
<!--mascota-->
<div id="selectperro"></div>

<br>



<textarea class="caja" id= "observacion" name="observacion" required type="text" equired pattern="[A-Za-z ]+" placeholder="Servicio aplicado" autocomplete="off"></textarea>

</tr>
<br>
<tr>

<label for="text"></label></tr>
<br>
<br>
<tr>

<input class="caja3" id= "total" name="total" required type="number" placeholder="Total a pagar" autocomplete="off">
</tr>
<br>
<br>
<tr><button  type="submit" class="btn btn__nuevo">Finalizar consulta</button></tr>

<tr></tr>
<script type="text/javascript" src="./js/validar.js">
    
</script>

<tr><a class="btn btn__nuevo" href="VerConsultas.php" style="text-decoration:none"> Registros de Consultas</a></tr>
<br>
<br>

</div>

<tr></tr>

</form>
</div>
</body>
</html>

<script type="text/javascript">
    $(document).ready(function(){
        $('#id_dueno').val();
        recargarLista();

        $('#id_dueno').change(function(){
            recargarLista();
        });
    })
</script>
<script type="text/javascript">
    function recargarLista(){
        $.ajax({
            type:"POST",
            url:"InsertarConsultaSelect.php",
            data:"idd=" + $('#id_dueno').val(),
            success:function(r){
                $('#selectperro').html(r);
            }
        });
    }
</script>

