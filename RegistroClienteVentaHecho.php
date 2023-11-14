<?php
#Salir si alguno de los datos no está presente
if(!isset($_POST["id_c"]) || !isset($_POST["nombre_c"]) || !isset($_POST["apellido_c"]) ||  !isset($_POST["telefono_c"])) exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "conectar.php";
include "confirm.php";
$id = $_POST["id_c"];
$nombre = $_POST["nombre_c"];
$apellido = $_POST["apellido_c"];
$telefono = $_POST["telefono_c"];


$c = new SelectDatos();
$conectar = $c->Buscador();
$sentencia_select = $conectar->prepare("SELECT id_c FROM cliente_venta WHERE id_c = ?");
$sentencia_select->execute([$id]);
$perro_existente = $sentencia_select->fetch(PDO::FETCH_OBJ);

if ($perro_existente) {
    header("Location: ./IdClienteVenta.php");
    exit();
}



$proceso = new Persona($id);
$proceso->registrar($nombre, $apellido, $telefono);
$proceso->Reg_CV();



$descripcion_dos = "El usuario ".$_SESSION["username"]." añadió al cliente ".$nombre. " ".$apellido." con la cédula ".$id.", con el número de telefono ".$telefono." en el área de clientes sección 'Tienda' satisfactoriamente";
$id_e = "insertar";
$datetime = date('Y-m-d H:i:s');
$user_res = $_SESSION['username'];
$sentencia = $conectar->prepare("INSERT INTO auditoria_dos (descripcion_dos, evento_dos, datetime_dos, user_res_dos) VALUES (?, ?, ?, ?);");

$resultado = $sentencia->execute([$descripcion_dos, $id_e, $datetime, $user_res]);

if($resultado === TRUE){
	header("Location: ./inicio.php?status=1");
	exit;
}
else{
    header("Location: ./inicio.php?status=2");
}

?>
