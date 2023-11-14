<?php
session_start();
#Salir si alguno de los datos no está presente
if(!isset($_POST["id_p"]) || !isset($_POST["nombre_p"]) ||  !isset($_POST["telefono_p"])) exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "conectar.php";
$id = $_POST["id_p"];
$nombre = $_POST["nombre_p"];
$telefono = $_POST["telefono_p"];


$c = new SelectDatos();
$conectar = $c->Buscador();

$sentencia_select = $conectar->prepare("SELECT id_p FROM proveedor WHERE id_p = ?");
$sentencia_select->execute([$id]);
$id_ex = $sentencia_select->fetch(PDO::FETCH_OBJ);

if ($id_ex) {
    header("Location: ./IdProveedor.php");
    exit();
}
$apellido ="";
$proceso = new Persona($id);
$proceso->registrar($nombre,$apellido, $telefono);
$proceso->Reg_P();


/*
$sentencia = $conectar->prepare("INSERT INTO proveedor(id_p, nombre_p, apellido_p, telefono_p) VALUES (?, ?, ?, ?);");
$resultado = $sentencia->execute([$id, $nombre, $apellido, $telefono]);
*/
$descripcion_dos = "El usuario ".$_SESSION["username"]." añadió al proveedor ".$nombre." con la id: ".$id.", con el número de telefono ".$telefono." en el área de proveedores sección *Tienda* satisfactoriamente";
$id_eventos_dos = "insertar";
$datetime_dos = date('Y-m-d H:i:s');
$user_res_dos = $_SESSION['username'];



$aud_datos = array($descripcion_dos, $id_eventos_dos, $datetime_dos, $user_res_dos);
$auditoria = new Auditoria();

$a =$auditoria->AuditoriaMetodoDos($aud_datos);

/*
$Borrar = new Borrar();
$Borrar->BorrarProveedor($idc);
*/


header("Location: inicio.php?status=1");
 

/*
$sentencia = $conectar->prepare("INSERT INTO auditoria_dos(descripcion_dos, id_evento_dos, datetime_dos, user_res_dos) VALUES(?, ?, ?, ?);");
$resultado = $sentencia->execute([$descripcion_dos, $id_eventos_dos, $datetime_dos, $user_res_dos]);

if($resultado === TRUE){
	header("Location: ./VerProveedores.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista";
*/

?>
