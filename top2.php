<?php include_once "conectar.php"  ?>
<?php require "confirm.php"; 


class anuncio 
{

public function emitirAnuncio(){
  return "¡Bienvenido, <strong>".$_SESSION['username']."</strong>!";
  }
}

?>



<!DOCTYPE html>
<html>
<link rel="stylesheet"  type="text/css" href="./css/bootstrap.css">
<link rel="stylesheet"  type="text/css" href="./css/body.css">
<link rel="stylesheet"  type="text/css" href="./css/top.css">

<head>
	<title>INVERSIONES MERLIZ</title>
</head>
<body>

<ul class="menu-h">
<!-- Debería usar Li en lugar de P pero me da error, no sé porqué. Así que lo dejo así porque funciona.-->
<div class ="na">

	<li class="mp" style="text-decoration:none; font-family: Segoe UI; color: #eee; margin-top: 26px;">
    <?php $anuncio = new anuncio();
         echo $a = $anuncio->emitirAnuncio(); ?></a>
  </li>

<li class="mp">
</li>


<li class="mp"><ul class="menu-vertical">
<li></li>
<li></li>
<li></li>
<li></li>

</ul>
</li>
                                                          
<li class="mp"><ul class="menu-vertical">
<li></li>
<li></li>
<li></li>

</ul>

</li>
<li class="mp"><ul class="menu-vertical">
<li></li>
<li></li>
<li></li>
<li></li>
</ul>

</li>


<li class="mp">
<ul class="menu-vertical">
<li></li>
<li></li>
<li><a href="logout.php" onclick="return borrar()">Salir</a></li>
                                                            
                 <script type="text/javascript">
	function borrar(){
		var del = confirm('¿Está seguro que desea Salir?');
		

if (del==true){
     
    }

else {

event.preventDefault()


	alert('Proceso cancelado')

}
}</script>                                           

</ul>


</li>


<br>
<br>
<br>
</div>
</ul>

</body>
</html>