<?php include_once "conectar.php"  ?>
<?php require "confirm.php"; 

if ($_SESSION["estado"]== 2) {
            header("location: logout.php");
          } 
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

<script src="js/jquery-3.6.4.min.js"></script>
<script src="js/traduccion_data.js"></script>

<script src="js/charts.js"></script>
<link rel="stylesheet" href="DataTables/DataTables-1.13.6/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="DataTables/datatables.css" rel="stylesheet">
  <script src="DataTables/datatables.min.js"></script>


<script type="text/javascript" src="DataTables/datatables.min.js"></script>

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

<li class="mp"><a class="a" href="inicio.php" style="text-decoration:none;
                                                    font-family: Segoe UI;">Inicio</a>
</li>


<li class="mp"><a class="a" href="VerMascotas.php" style="text-decoration:none;
font-family: Segoe UI;">Mascotas</a><ul class="menu-vertical">
<li><a href="VerClientes.php">Ver Clientes</a></li>
<li><a href="VerMascotas.php">Ver Mascotas</a></li>
<li><a href="FueraDeServicio.php">Fuera de servicio</a></li>
<li><a href="VerMascotasAdoptadas.php">Archivos de adopción</a></li>

</ul>
</li>
                                                          
<li class="mp"><a class="a" href="VerClientes.php" style="text-decoration:none; font-family: Segoe UI;">Gestión de negocios</a><ul class="menu-vertical">
<li><a href="VerClientesVentas.php">Clientes</a></li>
<li><a href="VerProveedores.php">Proveedores</a></li>
<li><a href="VerProductos.php">Productos</a></li>

</ul>

</li>
<li class="mp"><a class="a" href="VerConsultas.php" style="text-decoration:none; font-family: Segoe UI;">Servicios</a><ul class="menu-vertical">
<li><a href="VerConsultas.php">Perruquería</a></li>
<li><a href="Compras.php">Ver Compras</a></li>
<li><a href="Ventas.php">Ver ventas</a></li>
<li><a href="VentasReembolsadas.php">Ver reembolsos</a></li>
<li><a href="VerMovimientos.php">Ver movimientos</a></li>
</ul>

</li>


<li class="mp"><a class="a" href="Auditorias.php" style="text-decoration:none; font-family: Segoe UI;">Opciones</a>
<ul class="menu-vertical">
<li><a href="Auditorias.php">Auditoria</a></li>
<li><a href="VerUsuario.php">Gestión de usuario</a></li>
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