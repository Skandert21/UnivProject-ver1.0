<?php
#inicia sesión
session_start();

#hace la confirmación
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: inicio.php");
  exit;
}

require_once "conectar.php";
$validar ="";
$estado ="";
$confirmar="";
 

$c = new SelectDatos();
$enlace = $c->Buscador();

$cc = new Conectar();
$conect = $cc->ConectarMetodo();

$username = "";
$username_err = "";
 #te arroja un mensaje

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
  
    if(empty(trim($_POST["username"]))){
        $username_err = "Por favor ingrese su usuario.";
    } else{
        $username = trim($_POST["username"]);
    }
#inicia busqueda de datos

    $Ver = new SelectDatos();

     $sql = "SELECT * FROM user WHERE username LIKE '$username'";
     
      #Confirmando usuario

    $datos = $Ver->SeleccionarDatos($sql);



/*
$sentencia_select=$conectar->prepare("SELECT password FROM user WHERE username LIKE '$username'");
    $sentencia_select->execute();
    $resultado=$sentencia_select->fetchAll();
*/
    foreach ($datos as $dato) {
        #guardas los datos en variables, parte de la descripcion de la auditoria
        $confirmar = $dato['username'];
        $estado = $dato["estado"];
        $id = $dato["id"];
        
        
    }
#creo que es aquí
    if(empty($username_err)){
     $username = $_POST["username"];

                        $sql ="SELECT * FROM validar where username_val = '$username'";
                        $res = mysqli_query($conect, $sql);
                        foreach ($res as $r) {
                          $validar = $r["intentos"];
                        }

                         if ($username != $confirmar) {
                           $username_err = "No existe cuenta registrada con ese nombre de usuario.";
                         
                         }elseif ($estado != 1) {
                            $username_err = "Tu usuario no ha sido bloqueado";
                         } elseif ($validar !=3 && $estado == 1) {
                              $username_err = "Tu usuario ha sido bloqueado por un administrador, no puedes desbloquear tu cuenta";
                         } elseif ($validar == 3 && $estado == 1 && $username == $confirmar) {
                            $_SESSION["userunlock"] = $id;
                        



                        header("Location: DesbloquearUsuarioDos.php");
                        
                         }




                    }
     }
# codigo normal
?>
 







<!DOCTYPE html>
<html lang="es">
    
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">


<link rel="stylesheet" href="./css/body.css">
<link rel="stylesheet" href="./css/top.css">
<link rel="stylesheet" href="./css/bootstrap.css">

    <style type="text/css">
    

        
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body style="background-color: #e9e9e9">
    <div class="wrapper">
        <div style="background-color: #fff;
                    display: inline-block;
                    padding: 7px;
                    border-radius: 5px;

    text-shadow: 0 0 30px #fff;
    box-shadow: 0 0 20px #333
                     

                    ">
                    <div class="" >
        <h2 >Desbloquear usuario</h2>
        
       
    </div>
    </div>
    <br>
    <br>
    <div style="

" >
    <div class="" style="

    background-color: #333;
    border-radius: 10px;
    padding: 40px;
    text-shadow: 0 0 30px #fff;
    box-shadow: 0 0 20px #333


    ">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label  style="color: #eee;">Ingrese usuario a desbloquear: </label>
                <input required type="text" maxlength="10" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>   
           
            <br>
            <div class="centrado">
                <button type="submit" class="success" value="Ingresar" style="text-decoration:none;
                color: white;
                
                font-weight: bold;">Ingresar</button>
              
            </div>

        </form>

       
    </div>  
    <br> 
    <a class="centrado" href="login.php">Volver</a> 
</div>
</div>
</body>
</html>