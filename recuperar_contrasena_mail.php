<?php
	session_start();
	$host_db = "localhost";
	$user_db = "root";
	$pass_db = "";
	$db_name = "couchinn";
	$tbl_name = "usuarios";
	// Connect to server and select databse.
	$conexion = mysqli_connect("$host_db", "$user_db", "$pass_db","$db_name")or die("Cannot Connect to Data Base.");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php
        if(isset($_POST['enviar'])) { // comprobamos que se han enviado los datos del formulario
            if(empty($_POST['mail'])) {
                echo "No ha ingresado el e-mail del usuario. <a href='javascript:history.back();'>Reintentar</a>";//usar el scrit java de modificacion
            }else {
                $mail = mysqli_real_escape_string($_POST['mail']);
                $mail= trim($mail);
                $sql = mysqli_query("SELECT nombre, contrasenia, email FROM usuarios WHERE email='".$mail."'");
                if(mysqli_num_rows($sql)) {
                    $row = mysqli_fetch_assoc($sql);
                    $num_caracteres = "10"; // asignamos el número de caracteres que va a tener la nueva contraseña
                    $nueva_clave = substr(md5(rand()),0,$num_caracteres); // generamos una nueva contraseña de forma aleatoria
                    $nombre = $row['nombre'];
                    $usuario_clave = $nueva_clave; // la nueva contraseña que se enviará por correo al usuario
                    $mail = $row['email'];
                    // actualizamos los datos (contraseña) del usuario que solicitó su contraseña
                    mysql_query("UPDATE usuarios SET usuario_clave='".$usuario_clave."' WHERE email='".$mail."'");
                    // Enviamos por email la nueva contraseña, modificar a partir de aca.
                    $remite_nombre = ""; // Tu nombre o el de tu página
                    $remite_email = ""; // tu correo
                    $asunto = "Recuperación de contraseña"; // Asunto (se puede cambiar)
                    $mensaje = "Se ha generado una nueva contraseña para el usuario <strong>".$usuario_nombre."</strong>. La nueva contraseña es: <strong>".$usuario_clave."</strong>.";
                    $cabeceras = "From: ".$remite_nombre." <".$remite_email.">\r\n";
                    $cabeceras = $cabeceras."Mime-Version: 1.0\n";
                    $cabeceras = $cabeceras."Content-Type: text/html";
                    $enviar_email = mail($usuario_email,$asunto,$mensaje,$cabeceras);
                    if($enviar_email) {
                        echo "La nueva contraseña ha sido enviada al email asociado al usuario ".$usuario_nombre.".";
                    }else {
                        echo "No se ha podido enviar el email. <a href='javascript:history.back();'>Reintentar</a>";
                    }
                }else {
                    echo "El usuario <strong>".$usuario_nombre."</strong> no está registrado. <a href='javascript:history.back();'>Reintentar</a>";
                }
            }
        }else {
    ?>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <label>Usuario:</label><br />
            <input type="text" name="usuario_nombre" /><br />
            <input type="submit" name="enviar" value="Enviar" />
        </form>
    <?php
        }
    ?> 
</body>
</html>
