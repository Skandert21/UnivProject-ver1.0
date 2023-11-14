		</div>
	</div>


<style type="text/css">
	.pie :link {text-decoration: none }
.pie:visited {color: black; text-decoration: none }

*{outline:none !important;}*:focus {outline: none !important;}textarea:focus, input:focus{outline: none !important;}	a{text-decoration: none !important;outline: none !important;}

.pie{color: black;
	background-color:#999;
	z-index: 2;
  margin-top:35%;
  padding: 30px;
  text-decoration: none;


}


.ser{color: black;
	background-color:#999;
	opacity: 0.8;
  margin-top: 400px;
  padding: 30px;
  text-decoration: none;

}

.ser:hover { color: black; opacity: 0.5; text-decoration: none }
</style>
<div class="pie"><strong>Servicios de usuario:</strong>
	<br>
	<br>
<thead>
				<tr>
					<th><a style="text-decoration: none;" class="ser" href="Auditorias.php">Auditorias</a></th>
					<th><a style="text-decoration: none;" class="ser" href="FueraDeServicio.php">Fuera de servicio</a></th>
					<th><a style="text-decoration: none;" class="ser" href="VentasReembolsadas.php" >Ventas Reembolsadas</a></th>
					<th><a style="text-decoration: none;" class="ser" href="VerMascotasAdoptadas.php" >Mascotas adoptadas</a></th>
					<th><a style="text-decoration: none;" class="ser" onclick="return borrar()" href="logout.php" >Salir</a></th>
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
				
				</tr>
			</thead>
</div>
