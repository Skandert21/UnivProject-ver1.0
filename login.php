<?php
#inicia sesión
session_start();

#hace la confirmación
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: inicio.php");
  exit;
}

require_once "conectar.php";
 

$c = new SelectDatos();
$enlace = $c->Buscador();

$cc = new Conectar();
$conect = $cc->ConectarMetodo();

$username = $password = "";
$username_err = $password_err = "";
 #te arroja un mensaje

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
  
    if(empty(trim($_POST["username"]))){
        $username_err = "Por favor ingrese su usuario.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    
    if(empty(trim($_POST["password"]))){
        $password_err = "Por favor ingrese su contraseña.";
    } else{
        $password = trim($_POST["password"]);
    }
    


    $Ver = new SelectDatos();

     $sql = "SELECT password FROM user WHERE username LIKE '$username'";
     
      #Confirmando password

    $datos = $Ver->SeleccionarDatos($sql);



/*
$sentencia_select=$conectar->prepare("SELECT password FROM user WHERE username LIKE '$username'");
	$sentencia_select->execute();
	$resultado=$sentencia_select->fetchAll();
*/
	foreach ($datos as $dato) {
		#guardas los datos en variables, parte de la descripcion de la auditoria
		$confirmar = $dato['password'];
		
	    
	}
#creo que es aquí
    
    if(empty($username_err) && empty($password_err)){
        


        $sql = "SELECT * FROM user WHERE username = ?";
        
           $con = $conectar->conectarMetodo();

        if($stmt = mysqli_prepare($con, $sql)){
            

            mysqli_stmt_bind_param($stmt, "s", $param_username);
            

            
            $param_username = $username;
            

            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                
            
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                   
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password, $level, $estado);
            

                    if(mysqli_stmt_fetch($stmt)){

                        if ($estado == 1) {
                             $password_err = "Tu usuario ha sido bloqueado, no puedes ingresar";
                        } else{
                              
                            
                            if (password_verify($password, $confirmar)) {
                            	

                            
                          
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            $_SESSION["password"] = $password;
                            $_SESSION["level"] = $level;
                            $_SESSION["estado"] = $estado;

$datetime = date('Y-m-d h:i:s');
$user_res = $_SESSION['username'];
$descripcion = "El usuario ".$_SESSION["username"]." inició sesión el ".$datetime;
$id_e = "entrar";
$aud_datos = array($descripcion, $id_e, $datetime, $user_res);
$auditoria = new Auditoria();
$auditoria->AuditoriaMetodo($aud_datos)==3;

$sql ="DELETE from validar where intentos between 0 and 2";
 $r = mysqli_query($conect, $sql);

 if ($_SESSION["estado"]== 2) {
   header("location: RegistroPregunta.php");
 }else{

                            header("location: inicio.php");


                        }
                       }else{
                                   
                                     
                                   $consult = "SELECT * FROM validar where username_val = '$username'";
                                   $r = mysqli_query($conect, $consult);
                                   foreach ($r as $userdat) {
                                    $user_compare = $userdat['username_val'];
                                    $user_intentos = $userdat['intentos'];
                                  
}
                                   if (@$user_compare == $username) {
                                        $consulta_update=$enlace->prepare(' UPDATE validar SET  
                   
                    intentos= :intentos
                    WHERE username_val=:username_val;'
                );
                $consulta_update->execute(array(
                    
                    ':intentos'=>$user_intentos = $user_intentos + 1,
                    ':username_val' =>$user_compare
                    ));
                                   } else {
                                       $sql = "INSERT INTO validar (username_val) values ('$username')";
                                   $r = mysqli_query($conect, $sql);
                                        $user_intentos = "1";
                                   }


                             
                            $password_err = "La contraseña que has ingresado no es válida. Si ingresas mal la contraseña 3 veces se bloqueará tu cuenta, llevas ".$user_intentos." intentos";

 
                             if (@$user_intentos==3) {
                                  
                $consulta_update=$enlace->prepare(' UPDATE user SET  
                   
                    estado= :estado
                    WHERE username=:username;'
                );
                $consulta_update->execute(array(
                    
                    ':estado'=>1,
                    ':username' =>$username
                    ));
            
$id_e = "entrar";
$datetime = date('Y-m-d H:i:s');
$descripcion = "La cuenta del usuario *".$username."* ha sido bloqueada por exceso de intentos, fecha :".$datetime;
$user_res = $username;

$aud_datos = array($descripcion, $id_e, $datetime, $user_res);
$auditoria = new Auditoria();
$a = $auditoria->AuditoriaMetodo($aud_datos);
                     
           #tengo que diferenciar entre cual cuenta entra y cual no, que cada una tenga su 3 intentos
                                
                                $password_err = "Tu cuenta ha sido bloqueada";
                           
                            unset($password);
                        }

                        }
                    }
                }
                } else{
                    
                    $username_err = "No existe cuenta registrada con ese nombre de usuario.";
                }
            } else{
                echo "Algo salió mal, por favor vuelve a intentarlo.";
            }
        }
        
        
        mysqli_stmt_close($stmt);
    }
    # termina
  
    mysqli_close($con);
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

<!--<link rel="stylesheet" href="./css/bootstrap.css">-->

    <style type="text/css">
    

        
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body style="background-color:#e9e9e9 ">
    <div class="wrapper">
    	<div style="background-color: #fff;
    	            display: inline-block;
    	            padding: 5px;
    	            border-radius: 5px;
                    text-shadow: 0 0 30px #fff;
                    box-shadow: 0 0 20px #333

    	            ">
    	            <div class="" style= "" >
        <h2 >Ingrese sus datos</h2>
        <p>Por favor, complete sus credenciales para iniciar sesión.</p>
       
       <?php 
if(isset($_GET["status"])){
                if($_GET["status"] === "1"){
                    ?><br>
                        <div class="alert alert-success" style="width: 75%">
                            
                            <strong >¡El usuario ha sido desbloqueado con exito!</strong>
                        </div>
                    <?php
                } 
            }?>
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
                <label  style="color: #eee;">Usuario</label>
                <input required type="text" maxlength="10" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>   
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label style="color: #eee;">Contraseña</label>
                <input required type="password" minlength="4" maxlength="15" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <br>
            <div class="centrado">
                <button type="submit" class="btn_aa" value="Ingresar" style="text-decoration:none;
                color: white;
                
                font-weight: bold;">Ingresar</button>
              
            </div>

        </form>

       
    </div>  
    <br> 
    <a class="centrado" href="DesbloquearUsuario.php">¿Ha bloqueado su usuario? Ingrese aquí</a> 
</div>
</div>
</body>
</html>