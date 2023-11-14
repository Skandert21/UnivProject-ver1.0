<?php /*do {
    $numero_aleatorio1 = rand(1, 10); // Genera el primer número aleatorio
    $numero_aleatorio2 = rand(1, 10); // Genera el segundo número aleatorio
} while ($numero_aleatorio1 == $numero_aleatorio2); // Repite hasta que los números sean diferentes

echo $numero_aleatorio1; // Imprime el primer número aleatorio
echo $numero_aleatorio2; // Imprime el segundo número aleatorio
*/

include "conectar.php";

$c = new Conectar();
$conectar = $c->ConectarMetodo();
session_start();

$sql = "SELECT * FROM preguntas_seguridad where id_user = '$_SESSION[userunlock]'";
$res = mysqli_query($conectar, $sql);
foreach ($res as $preguntas) {
  $pregunta_uno = $preguntas["pregunta_uno"];
  $pregunta_dos = $preguntas["pregunta_dos"];
  $pregunta_tres = $preguntas["pregunta_tres"];

  $respuesta_uno = $preguntas["respuesta_uno"];
  $respuesta_dos = $preguntas["respuesta_dos"];
  $respuesta_tres = $preguntas["respuesta_tres"];
}

$mapaPreguntaRespuesta = array($pregunta_uno => $respuesta_uno, 
                               $pregunta_dos => $respuesta_dos, 
                               $pregunta_tres => $respuesta_tres);

  
  if (!isset($_SESSION['randompreg1']) && !isset($_SESSION['randompreg2'])) {
    // Si las preguntas aleatorias no están en la sesión, las generamos y las almacenamos en la sesión
    $keys = array_keys($mapaPreguntaRespuesta);
    shuffle($keys);

    $_SESSION['randompreg1'] = $keys[0];
    $_SESSION['randompreg2'] = $keys[1];
}

$randompreg1 = $_SESSION['randompreg1'];
$randompreg2 = $_SESSION['randompreg2'];


    if(isset($_POST['guardar'])){



       $randomres1 =  $_POST["respuestauno"];
       $randomres2 =  $_POST["respuestados"];



if ($mapaPreguntaRespuesta[$randompreg1] == $randomres1 && 
    $mapaPreguntaRespuesta[$randompreg2] == $randomres2) {
    unset($_SESSION['randompreg1']);
    unset($_SESSION['randompreg2']);
    header("location: DesbloquearUsuarioHecho.php");
} else {

    unset($_SESSION['randompreg1']);
    unset($_SESSION['randompreg2']);
    header("location: DesbloquearUsuarioDos.php?status=2");
}

}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Usuarios</title>
    
</head>
<body>
    <link rel="stylesheet"  type="text/css" href="./css/bootstrap.css">
<link rel="stylesheet"  type="text/css" href="./css/body.css">
<link rel="stylesheet"  type="text/css" href="./css/top.css">
    <div class="contenedor">

        <h2 class="centrado">Preguntas de seguridad</h2>
        <p class="centrado">Completa este formulario para desbloquear tu usuario</p>
        <div class="jaula">
            <br>
<?php 
if(isset($_GET["status"])){
                if($_GET["status"] === "2"){
                    ?><br>
                        <div class="alert alert-warning" style="width: 75%">
                            
                            <strong >Las respuestas no coinciden con las preguntas</strong>
                        </div>
                    <?php
                } 
            }?>
            <link rel="stylesheet" href="./css/body.css">
        <form action="" method="POST">
<tr>    
    <div class="form-group" style="width: 75%">
    <label for="id_cliente" ><strong><?php echo $randompreg1; ?>:</strong></label> 

<input class ="form-control" id="respuestauno" maxlength="12" name="respuestauno" required type ="text" value=""  placeholder="Respuesta 1" autocomplete="off">

</tr>
<!-- Recuerda poner un limitador de digitos a las cajas de texto/numero, arreglar el porqué no se guarda el 0 en telefono-->
<tr>    
    <label for="nombre_cliente"><strong><?php echo $randompreg2; ?>:</strong> </label>

<input class ="form-control" id="respuestados"  maxlength="12" name="respuestados" required type ="text" value=""  placeholder="Respuesta 2" autocomplete="off">

</tr>

<br>
<br>
</div>
<input type="submit" name="guardar" value="guardar" class="btn_a">

<tr> <a class="cancel" href="DesbloquearUsuario.php">Regresar</a></tr>
</form>
    </div>
</body>
</html>