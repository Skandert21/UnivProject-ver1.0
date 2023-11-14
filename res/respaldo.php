<?php 
session_start();
if ($_SESSION['level']==0) {
	

$host = "localhost" ;
$usuario = "root" ;
$nombre = "inv" ;
$password = "1234" ;
 
 $fecha = date("Ymd-His");
 $ruta = "C:/xampp32/htdocs/inversiones/res/respaldobd/";
 $nombre_sql = $ruta.$nombre.'_'.$fecha.'.sql';
 $dump = "mysqldump -h$host -u$usuario -p$password --opt $nombre > $nombre_sql";
 
  #system("cmd /c C:\\xampp32\\htdocs\\inversiones\\res\\ps.bat");
  #shell_exec("C:\\users\\judeyma\\desktop\\ps.bat");
 system($dump);
#$nombre > $nombre_sql"
}else
{}

?>