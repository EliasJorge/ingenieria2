<?php
    session_start();
    include('acceso_bd.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php
        if(isset($_SESSION['loggedin'])) { // comprobamos que la sesión esté iniciada
            if(isset($_POST['enviar'])) {
                if($_POST['contrasenia'] != $_POST['rcontraenia']) {
                    echo "Las contraseñas ingresadas no coinciden. <a href='javascript:history.back();'>Reintentar</a>";
                }else {
                    $nameu = $_SESSION['nombre'];
                    $contrasenia = mysqli_real_escape_string($_POST["contrasenia"]);
                    $contrasenia = md5($contrasenia); // encriptamos la nueva contraseña con md5
                    $sql = mysqli_query("UPDATE usuarios SET contrasenia='".$contrasenia."' WHERE nombre='".$nombre."'");
                    if($sql) {
                        echo "Contraseña cambiada correctamente.";
                    }else {
                        echo "Error: No se pudo cambiar la contraseña. <a href='javascript:history.back();'>Reintentar</a>";
                    }
                }
            }
            else 
            {
    ?>
				<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
					<label>Nueva contraseña:</label>
					<br>
					<input type="password" name="contrasenia"/>
					<br>
					<label>Confirmar:</label>
					<br>
					<input type="password" name="usuario_clave_conf" />
					<br>
					<input type="submit" name="enviar" value="Enviar" />    
				</form>
    <?php
            }
        }
        else 
        {
            echo "Acceso denegado.";
        }
    ?> 
</body>
</html>
