<?php 

#Para entender un poco mejor las clases y metodos, puedes revisar los nombres, normalmente los de clases serán algo tipo: NameAcción
#Los metodos serán algo tipo: NombreAcción. entiendes? Name(ingles) y nombre(español), con su respectiva acción al lado.


#Clase para conectarse a la base de datos
class Conectar
{   


	private $sv = 'localhost';
	private $user = 'root';
	private $database = 'inv';
	private $password = "1234";
	
	

      public function ConectarMetodo(){
      
        #el orden Sí afecta el resultado final

       $conectar = mysqli_connect( $this->sv,
       	                           $this->user,
       	                           $this->password,
       	                           $this->database
       	                           );


            return $conectar;
  
}

public function respaldo(){
  $fecha = date("Y-m-d-His");
  $archivo = $this->database."_".$fecha.".sql";
  $dump = "mysqldump -h$this->sv -u=$this->user -p=$this->password $this->database > $archivo";
     
     exec($dump);
     
}
     }


#esta clase es para el proceso de login pero se puede usar en el futuro
class SelectDatos {


public function SeleccionarDatos($sql){
$c = new conectar();

$conectar = $c->ConectarMetodo();



$result = mysqli_query($conectar, $sql);

return mysqli_fetch_all($result,MYSQLI_ASSOC);


}

#busca mascotas con clientes
public function BuscarMascotas() {

$sql='SELECT *FROM perro p INNER JOIN detalle_perro d INNER JOIN cliente c WHERE d.id_perro LIKE p.id_perro AND d.id_dueno LIKE c.id_cliente and p.m_check = 0 order by p.indice asc';

return $sql;
}

#busca mascotas con clientes
public function BuscarMascotasFuera() {

$sql='SELECT *FROM perro p INNER JOIN detalle_perro d INNER JOIN cliente c 
inner join perro_fuera f on f.id_perro_fuera = p.id_perro  WHERE d.id_perro LIKE p.id_perro AND d.id_dueno LIKE c.id_cliente and p.m_check = 1 order by p.indice asc';

return $sql;
}


#hace la función de buscador, usa pdo
public function Buscador(){

	 $sv = 'localhost';
	 $user = 'root';
	 $database = 'inv';
	 $password = "1234";
	
$buscar=new PDO('mysql:host=localhost;dbname='.$database,$user,$password);

return  $buscar;

}
}



#esta clase aplica para CCVP (Clientes, clientes_ventas, proveedores)

 class Persona{

public $id;
public $nombre;
public $apellido;
public $telefono;
   function __construct($id) {


    $this ->id = $id;
/*    $this ->nombre = $nombre_cliente;
    $this ->apellido = $apellido_cliente;
    $this->telefono = $telefono_cliente;*/
   }
   public function registrar($nombre, $apellido, $telefono){
    
    $this ->nombre = $nombre;
    $this ->apellido = $apellido;
    $this->telefono = $telefono;

}
#area cliente
public function Reg_C(){
  $c = new conectar();
$conectar = $c->ConectarMetodo();
$sql="INSERT INTO cliente(id_cliente, nombre_cliente, apellido_cliente, telefono_cliente) VALUES ('$this->id', '$this->nombre', '$this->apellido', '$this->telefono')";

if ( $result = mysqli_query($conectar,$sql) ==TRUE){
 
  header("Location: Inicio.php?status=1");

}else{
  header("Location: Inicio.php?status=2");

}
   }

#esto es para borrar a un cliente
public function Borrar_C(){
$c = new Conectar();
$conectar = $c->ConectarMetodo();

$sql="DELETE FROM cliente WHERE id_cliente='$this->id'";

if(isset($this->id)){

     return $resultado = mysqli_query($conectar, $sql);
  
  }else{
    
Header("Location: Inicio.php?status=2");
  }
}

#area cliente_venta
public function Reg_CV(){
$c = new Conectar();
$conectar = $c->ConectarMetodo();
  $sql ="INSERT INTO cliente_venta(id_c, nombre_c, apellido_c, telefono_c) VALUES ('$this->id','$this->nombre','$this->apellido', '$this->telefono')";


return $result = mysqli_query($conectar,$sql);

   

 
}

public function Borrar_CV(){

  $c = new Conectar();
$conectar = $c->ConectarMetodo();

if(isset($this->id)){
     
    $sql="DELETE FROM cliente_venta WHERE id_c='$this->id'";

     return $resultado = mysqli_query($conectar, $sql);
  
  }else{
    
Header("Location: Tienda.php?status=2");
  }


}

#area proveedor
public function Reg_P(){
$c = new Conectar();
$conectar = $c->ConectarMetodo();

$sql="INSERT INTO proveedor(id_p, nombre_p, telefono_p) VALUES ('$this->id', '$this->nombre', '$this->telefono')";


     
return $result = mysqli_query($conectar,$sql);
unset($id_existente);
    unset($datos);


 }

 public function Borrar_P(){
$c = new Conectar();
$conectar = $c->ConectarMetodo();

$sql="DELETE FROM proveedor WHERE id_p='$this->id'";

if(isset($this->id)){

     return $resultado = mysqli_query($conectar, $sql);
  
  }else{
    
Header("Location: Inicio.php?status=2");
  }
}
}


/*
$ver= new SelectDatos();
$buscar = $ver->Buscador();

$sentencia_select = $buscar->prepare("SELECT id_cliente FROM cliente WHERE id_cliente = ?");
$sentencia_select->execute([$datos[0]]);
$id_existente = $sentencia_select->fetchAll(PDO::FETCH_OBJ);

if ($id_existente) {

    header("Location: ./IdCliente.php");
   
    exit();
} else {
$sql ="INSERT into cliente ( id_cliente, nombre_cliente, apellido_cliente, telefono_cliente) VALUES ( '$datos[0]','$datos[1]','$datos[2]','$datos[3]')";
return $result = mysqli_query($conectar,$sql);
unset($id_existente);
    unset($datos);
    }
    */




   







class Auditoria {

public function AuditoriaMetodo($aud_datos){


$c= new Conectar();
$conectar = $c->ConectarMetodo();
$sql ="INSERT into auditoria ( descripcion, evento, datetime, user_res) VALUES ( '$aud_datos[0]','$aud_datos[1]','$aud_datos[2]','$aud_datos[3]')";
return $result = mysqli_query($conectar,$sql);
  /*
$sql ="INSERT INTO auditoria (descripcion, id_evento, datetime, user_res) VALUES ('$aud_datos[0]', '$aud_datos[1]', '$aud_datos[2]', '$aud_datos[3]')";*/
}
public function AuditoriaMetodoDos($aud_datos){


$c= new Conectar();
$conectar = $c->ConectarMetodo();
$sql ="INSERT into auditoria_dos ( descripcion_dos, evento_dos, datetime_dos, user_res_dos) VALUES ( '$aud_datos[0]','$aud_datos[1]','$aud_datos[2]','$aud_datos[3]')";
return $result = mysqli_query($conectar,$sql);
}

}








 class Proveedor extends Persona{

public function RegProv(){

$c = new conectar();
$conectar = $c->ConectarMetodo();
$this->id;
$this->nombre;
$this->apellido;
$this->telefono;
$sql="INSERT INTO proveedor(id_p, nombre_p, apellido_p, telefono_p) VALUES ('$this->id', '$this->nombre', '$this->apellido', '$this->telefono')";


     
return $result = mysqli_query($conectar,$sql);
unset($id_existente);
    unset($datos);
}
}



 class Cliente extends Persona{

public function RegCli(){

$c = new conectar();
$conectar = $c->ConectarMetodo();
$this->id;
$this->nombre;
$this->apellido;
$this->telefono;
$sql="INSERT INTO cliente(id_cliente, nombre_cliente, apellido_cliente, telefono_cliente) VALUES ('$this->id', '$this->nombre', '$this->apellido', '$this->telefono')";

if ( $result = mysqli_query($conectar,$sql) ==TRUE){
 
  header("Location: Inicio.php?status=1");

}else{
  header("Location: Inicio.php?status=2");

}
}

}

class Borrar {


#esto es para borrar a un cliente
public function BorrarCliente($idc){
$c = new Conectar();
$conectar = $c->ConectarMetodo();

$sql="DELETE FROM cliente WHERE id_cliente='$idc'";

if(isset($idc)){

     return $resultado = mysqli_query($conectar, $sql);
  
  }else{
    
Header("Location: Tienda.php?status=2");
  }
}

public function BorrarProveedor($idc){

$sql = "DELETE FROM proveedor WHERE id_p ='$idc";

if(isset($idc)){

     return $resultado = mysqli_query($conectar, $sql);
  
  }else{
    
    
Header("Location: Tienda.php?status=2");
  }

}


}

class Consulta{

public function ConsultaPerro($c1,$c2){
$c = new conectar();
$conectar = $c->ConectarMetodo();
     

  $sql="INSERT INTO consulta ( id_dueno, id_perro, observacion, precio, fecha) VALUES ( '$c1[0]', '$c1[1]', '$c1[2]', '$c1[3]', '$c1[4]')";

 $resultado = mysqli_query($conectar, $sql);

$sql ="INSERT INTO consulta_respaldo ( id_cliente_cr, nombre_cliente_cr, nombre_perro_cr, observaciones_cr, precio_cr, date_cr, user_res_cr) VALUES ( '$c2[0]', '$c2[1]','$c2[2]', '$c2[3]', '$c2[4]','$c2[5]', '$c2[6]')";

return $resultado = mysqli_query($conectar, $sql);
}
public function BorrarConsulta($idc){
$c= new Conectar();

$conectar = $c->ConectarMetodo();

$sql="DELETE FROM consulta WHERE id_consulta='$idc'";

return $resultado = mysqli_query($conectar, $sql);

}
}


class Mascota{
  #esto es para insertar a una persona
  public function InsertarMascota($datos, $sql) {
$c = new conectar();
$conectar = $c->ConectarMetodo();
     
return $result = mysqli_query($conectar,$sql);
unset($id_existente);
    unset($datos);
}

public function BorrarMascota($idc){
$c = new conectar();
$conectar = $c->ConectarMetodo();
$sql = "DELETE FROM perro WHERE id_perro='$idc'";
return $resultado = mysqli_query($conectar, $sql);



}


}


class Negocio{

/*
public function CompraProveedor($id_pro, $ahora, $total,$carrito){
$c = new SelectDatos();
$conectar = $c->Buscador();


$sentencia = $conectar->prepare("INSERT INTO compra_alproveedor(proveedor, hecho, total) VALUES (?, ?, ?);");
$sentencia->execute([ $_SESSION['id_p'], $ahora, $total,]);

$sentencia = $conectar->prepare("SELECT id FROM compra_alproveedor ORDER BY id DESC LIMIT 1;");
$sentencia->execute();
$resultado = $sentencia->fetch(PDO::FETCH_OBJ);

$idVenta = $resultado === false ? 1 : $resultado->id;


$conectar->beginTransaction();
$sentencia = $conectar->prepare("INSERT INTO productos_comprados(producto,  id_compra, cantidad) VALUES (?, ?, ?)");



$sentenciaExistencia = $conectar->prepare("UPDATE productos SET existencia = existencia + ? WHERE id = ?;");
foreach ($_SESSION["carrito"] as $producto) {
  $total += $producto->total;
  $sentencia->execute([$producto->id, $idVenta, $producto->cantidad]);
  $sentenciaExistencia->execute([$producto->cantidad, $producto->id]);

   return $Aud_prod[] = [
        "id" => $producto->id,
        "cantidad" => $producto->cantidad,
    ];

  }

}
*/

}

class Producto{


  public function InsertarProducto($datos){

    $c = new Conectar();
    $conectar = $c->ConectarMetodo();
    $sql="INSERT INTO productos(codigo, descripcion, precioVenta, id_cat, unidad) VALUES ('$datos[0]','$datos[1]','$datos[2]','$datos[3]', '$datos[4]')";

    return $resultado = mysqli_query($conectar, $sql);
  }
}



#pdfs

 ?>

