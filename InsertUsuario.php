<?php

require_once "conectar.php";
session_start();
 $e = new Conectar();

 $enlace = $e->ConectarMetodo();

$lvl ="";
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    
    if(empty(trim($_POST["username"]))){
        $username_err = "Por favor ingrese un usuario.";
    } else{
      
        $sql = "SELECT id FROM user WHERE username = ?";
        
        if($stmt = mysqli_prepare($enlace, $sql)){
          
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            $param_username = trim($_POST["username"]);
            
            

            if(mysqli_stmt_execute($stmt)){
              
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "Este usuario ya fue tomado.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Al parecer algo salió mal.";
            }
        }
         
    
        mysqli_stmt_close($stmt);
    }
    
   

    if(empty(trim($_POST["password"]))){
        $password_err = "Por favor ingresa una contraseña.";     
    } elseif(strlen(trim($_POST["password"])) < 4){
        $password_err = "La contraseña al menos debe tener 4 caracteres.";
    } else{
        $password = trim($_POST["password"]);
    }
    
 
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Confirma tu contraseña.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "No coincide la contraseña.";
        }
    }
    
   


    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        $level = $_POST['level'];


            $sql = "SELECT * FROM user where username = $username";
            $re = mysqli_query($enlace, $sql);

            foreach ($re as $r) {
            	$check = $r['username'];
                  }
            	if ($check == $username) {
            		header("Location: InsertUsuario.php?status=2");
            	} else {
           


        $sql = "INSERT INTO user ( username, password, level) VALUES (?, ?, ?)";
         
          $pass = password_hash($password, PASSWORD_DEFAULT);

        if($stmt = mysqli_prepare($enlace, $sql)){
            

          


            mysqli_stmt_bind_param($stmt, "sss", $param_username, $pass, $level);
            
         
            $param_username = $username;
            
            
            #param_password = contraseña hasheada
            #password = contraseña sin hashear
            
            
            if(mysqli_stmt_execute($stmt)){
               
                header("location: VerUsuario.php");
            } else{
                echo "Algo salió mal, por favor inténtalo de nuevo.";
            }
        }
         
         $fecha = date("Y-m-d H:i:s");
if($level == 0){

$cargo = "administrador";


} else if ($level == 1){

$cargo = "Usuario";

}
$id_e = "insertar";
$datetime = date('Y-m-d H:i:s');
$user_res = $_SESSION['username'];
$descripcion = "El usuario ".$_SESSION["username"]." añadió al usuario ".$username." con la contraseña *".$password."* y el cargo: ".$cargo.". satisfactoriamente";


$aud_datos = array($descripcion, $id_e, $datetime, $user_res);
$auditoria = new Auditoria();
$a = $auditoria->AuditoriaMetodo($aud_datos);

        mysqli_stmt_close($stmt);
    }
    
  
    mysqli_close($enlace);

    header("location: inicio.php?status=1");
}
}

?>
 
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
   <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ background: #ce0bc4d9; font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
        -->
    </style>
</head>
<body style="background-color: #e9e9e9">
    <?php 
     
    @ include "top.php";

     ?>
     <div class="jaula" style="width: 50%">
         <h2 class="centrado">Registro de usuario</h2>
         <br>
    <div class="container"style=" margin-bottom: 100px; padding: 20px; background-color: #fff; text-shadow: 0 0 30px #fff;
                   box-shadow: 0 0 20px #333">
       
        
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">

            	<?php

                if (isset($_GET['status'])) {
                	if ($_GET['status']== "2") {?>
                		<div class="alert alert-warning">
							
							<strong>¡No puedes ingresar un nombre de usuario ya registrado!</strong>
						</div>
                	<?php 
                }
                }

            	 ?>



                <label><strong>Usuario:</strong></label>
                <input type="text" name="username" minlength="4" maxlength="10" placeholder="Usuario" required pattern="[A-Za-z ]+" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                

                <label><strong>Contraseña:</strong></label>
                <input type="password" minlength="4" maxlength="15" name="password" placeholder="Contraseña" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
               

                <label><strong>Confirmar Contraseña:</strong></label>
                <input type="password" minlength="4" maxlength="15" name="confirm_password" placeholder="Confirme la contraseña" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>

                
                  <br>
                  <br>
                <strong><label for="level">Nivel de usuario:</label></strong>
            <select  name="level">
                
                <option value="0">Administrador</option>
                <option value="1">Secretario</option>

            </select>

            </div>
            <div class="form-group">
                <br>
                <br>
                <input type="submit" class="btn_a" value="Enviar">
               <!-- <input type="reset" class="btn btn-deault" value="Borrar">-->
                <a href="VerUsuario.php" class="cancel">Cancelar</a>
            </div>
          
        </form>
    </div>    
</div>
</body>
</html>