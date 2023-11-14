<?php include_once "top.php";

$mascota = $_GET["id_perro"];
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


<h2 class="centrado">Dar mascota en adopción</h2>
<br>

<div  class="" style="margin-right:300px ; margin-left:300px ; margin-bottom: 100px; padding: 20px; background-color: #fff; text-shadow: 0 0 30px #fff;
                   box-shadow: 0 0 20px #333">
<form action="DarMascotaEnAdopcionHecho.php" method="POST">
<?php   if(isset($_GET["status"])){
               if($_GET["status"] === "2"){
                    ?>
                    <div class="alert alert-info">
                            <strong>No has seleccionado ninguna mascota :(</strong>
                        </div>
                         <?php }elseif ($_GET["status"]=== "7") {?>
                            <div class="alert alert-info">
                            <strong>Estás seleccionando al mismo dueño de la mascota que estas tratando de dar en adopción</strong>
                        </div>
                        <?php
                         } elseif($_GET["status"]=== "8"){ ?>
<div class="alert alert-info">
                            <strong>Te faltan datos por ingresar</strong>
                        </div>

                         <?php }
                     }
                         ?>
<br>
<tr>	
<?php
#$conectar = conectar();
$id_cliente1 = "";
$id_perro = "";
$sql = "SELECT distinct * FROM perro 
inner join detalle_perro on detalle_perro.id_perro = perro.id_perro
inner join cliente on cliente.id_cliente = detalle_perro.id_dueno
where perro.id_perro = '$mascota'";
$c = new SelectDatos();
$conectar= $c->Buscador();
$i=0;
$stmt = $conectar->prepare($sql);
$result = $stmt->execute();
$cosos=$stmt->fetchAll(\PDO::FETCH_OBJ);
?>
<!--Cliente-->
<label><strong>Mascota a adoptar:</strong></label>



<?php  

foreach ($cosos as $m) {
    $dueno=$m->id_dueno;
    $id_p = $m->id_perro;
    $nom_d =  $m->nombre_perro;
}
?>
</select>

<input readonly="" type="hidden" class="form-control" value="<?php echo $id_p; ?>" style="width: 50%" id="id_dueno" name="idp" autocomplete="off" placeholder="nombre de la mascota">

<input style=" margin-left: 160px; width: 50% " readonly="" type="text" class="form-control" value="<?php echo $nom_d; ?>"  id="id_dueno" name="nomp" autocomplete="off" placeholder="nombre de la mascota"><br>
<!--mascota-->

<label style="background-color: #fff" for="cliente"><strong>Cliente a adoptar:</strong></label>


<input style=" margin-left: 160px; width: 50% "  type="text" class="form-control" value=""  id="cliente" name="cliente" autocomplete="off" placeholder="nombre del cliente"><br>

<div style="background-color: #333;
            width: 50%;
            padding-bottom: 12px; 
            text-align: center;
             border-radius: 5px;
             margin-left: 160px;
 ">
<div style="padding: 10px" id="SelectCliente"></div>

</div>
<br>



<br>
<br>
<tr><button  type="submit" class="btn_a">Siguiente</button></tr>
<a class="cancel" href="VerDetalleMascota.php?id_cliente=<?php echo $dueno; ?>">Cancelar</a>

<tr></tr>
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
        $('#cliente').val();
        recargarLista();

        $('#cliente').change(function(){
            recargarLista();
        });
    })
</script>
<script type="text/javascript">
    function recargarLista(){
        $.ajax({
            type:"POST",
            url:"ClienteSelect.php?id_dueno=<?php echo $dueno ?>",
            data:"idc=" + $('#cliente').val(),
            success:function(r){
                $('#SelectCliente').html(r);
            }
        });
    }
</script>

