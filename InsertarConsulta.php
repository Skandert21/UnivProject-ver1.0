<?php include_once "top.php";
$id_cliente1 = "";
$id_perro = "";

?>

<!DOCTYPE>
<html>
<head>
	<title></title>
    <script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
    
</head>
<body style="background-color: #e9e9e9">
<link rel="stylesheet" href="./css/bootstrap.css">
<link rel="stylesheet" href="./css/body.css">


<h1 class="centrado">Servicio</h1>
<br>

<div class="container" style=" width: 50%; margin-right: 300px; margin-left: 320px; margin-bottom: 100px; padding: 20px; background-color: #fff; text-shadow: 0 0 30px #fff;
             box-shadow: 0 0 20px #333">
<div  class="" style="padding-left: 80px">
<form action="RegistroConsultaUno.php" method="POST">
<?php   if(isset($_GET["status"])){
               if($_GET["status"] === "2"){
                    ?>
                    <div class="alert alert-info">
                            <strong>No has seleccionado ninguna mascota :(</strong>
                        </div>
                         <?php } }
                         ?>
<br>
	
<?php
#$conectar = conectar();

$sql = 'SELECT distinct * FROM cliente';
$c = new SelectDatos();
$conectar= $c->Buscador();
$i=0;
$stmt = $conectar->prepare($sql);
$result = $stmt->execute();
$cosos=$stmt->fetchAll(\PDO::FETCH_OBJ);
?>
<!--Cliente-->
<label> Ingrese el nombre de la mascota</label>

<?php 
if (isset($_GET['id_perro']) && isset($_GET['id_dueno'])) {
   $c = new SelectDatos();
$conectar= $c->Buscador();

    $idp = $_GET["id_perro"];
    $idc = $_GET["id_dueno"];
   $sql = "SELECT * FROM perro inner join detalle_perro on detalle_perro.id_perro = perro.id_perro where perro.id_perro = '$idp' and detalle_perro.id_dueno = '$idc'";
   $r = $conectar->prepare($sql);
$result = $r->execute();
$cosos=$r->fetchAll(\PDO::FETCH_OBJ);
   foreach ($cosos as $nom) {
     $nombre = $nom->nombre_perro;
   }
}
?>


<?php  
$rd = "";
?>
</select>
<?php if (isset($_GET['id_dueno'])) {
  $rd = "readonly";
} ?>
<input <?php echo $rd; ?> class="form-control" style="width: 70%" type="text" id="id_dueno" value="<?php if(isset($nombre)){

    echo $nombre;
}
 ?>" name="id_dueno" autocomplete="on" placeholder="buscar por nombre de la mascota">


<br>
<!--mascota-->
<div required id="selectperro"></div>

<textarea type="text" class="form-control" style="width: 70%" name="obs" placeholder="Observaciones"></textarea>

<br>




<tr><button  type="submit" class="btn_a">Siguiente</button></tr>
<a class="cancel" href="VerConsultas.php">Cancelar</a>
</div>

<script type="text/javascript" src="./js/validar.js">
    
</script>
<!--
<tr><a class="btn_a" href="VerConsultas.php" style="text-decoration:none"> Registros de Consultas</a></tr>
<br>
<br>
-->

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
 <?php if (isset($_GET['id_perro']) && isset($_GET['id_dueno'])) {?>
<script type="text/javascript">
    function recargarLista(){
        $.ajax({
            type:"POST",
           
            url:"InsertarConsultaSelect.php?idp=<?php echo $idp ?>",

            data:"idd=" + $('#id_dueno').val(),
            
            success:function(r){
                $('#selectperro').html(r);
            }
        });
    }
</script>
<?php } else { ?>

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
<?php }

?>
