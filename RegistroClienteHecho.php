<?php

#Si alguno de los campos esta vacio te marca error, pum que te pego
if( !isset($_POST["id_cliente"]) || !isset($_POST["nombre_cliente"]) ||  !isset($_POST["apellido_cliente"])||  !isset($_POST["telefono_cliente"]) ) echo "Algo salió mal. Por favor verifica que la info exista";


#Si estan todos los datos, coronaste

#el include para incluir el codigo de conex con bd
include_once "conectar.php";
include "confirm.php";

#saco las variables y las enlazo con los datos enviados del formulario, el id es incrementativo asi que no lo pedira.
$id = $_POST["id_cliente"];
$nombre = $_POST["nombre_cliente"];
$apellido = $_POST["apellido_cliente"];
$telefono = $_POST["telefono_cliente"];

$descripcion = "El usuario ".$_SESSION["username"]." añadió al cliente ".$_POST["nombre_cliente"]." ".$_POST["apellido_cliente"]." en el área de clientes sección *perruquería* satisfactoriamente";
$id_e = "insertar";
$datetime = date('Y-m-d H:i:s');
$user_res = $_SESSION['username'];


#$datos= array( $id, $nombre, $apellido, $telefono);


/*
$Persona = new Persona($_POST['id_cliente'],$_POST['nombre_cliente'],$_POST['apellido_cliente'], $_POST['telefono_cliente']);
*/
 $ver= new SelectDatos();
$buscar = $ver->Buscador();


$sentencia_select = $buscar->prepare("SELECT id_cliente FROM cliente WHERE id_cliente = ?");
$sentencia_select->execute([$id]);
$id_existente = $sentencia_select->fetchAll(PDO::FETCH_OBJ);

if ($id_existente) {

    header("Location: ./IdCliente.php");
   
    exit();
} else {
$aud_datos = array($descripcion, $id_e, $datetime, $user_res);
$auditoria = new Auditoria();

 $auditoria->AuditoriaMetodo($aud_datos)==3;


$proceso = new Persona($id);
$proceso->registrar($nombre, $apellido, $telefono);
$proceso->Reg_C();
}



if($proceso->RegCli()==4){

	header("Location: Inicio.php?status=1");
} else {

    header("Location Inicio.php?status=2");
}




/*
$sentencia_select = $conectar->prepare("SELECT id_cliente FROM cliente WHERE id_cliente = ?");
$sentencia_select->execute([$id]);
$id_existente = $sentencia_select->fetch(PDO::FETCH_OBJ);

if ($id == $id_existente) {
    header("Location: ./IdCliente.php");
    exit();
}*/

#se prepara para enviar los datos
/*
$sentencia = $conectar->prepare("INSERT INTO cliente ( id_cliente, nombre_cliente, apellido_cliente, telefono_cliente) VALUES ( ?, ?, ?, ?);");
#se envia
$resultado = $sentencia->execute([ $id, $nombre, $apellido, $telefono]);
#Si se hace correctamente, se envia al inicio de la pagina, si no...

*/


/*
$sentencia = $conectar->prepare("INSERT INTO auditoria (descripcion, id_evento, datetime, user_res) VALUES (?, ?, ?, ?);");

$resultado = $sentencia->execute([$descripcion, $id_e, $datetime, $user_res]);

*/

?>