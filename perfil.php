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
		$mail= $_GET['mail'];
		$sql="SELECT * FROM usuarios WHERE email='$mail'";
	    $perfil = mysqli_query($conexion,$sql) or die(mysqli_error($conexion));
	    if(mysqli_num_rows($perfil)) 
	    { // Comprobamos que exista el registro con el mail ingresado
	        $row = mysqli_fetch_array($perfil);
	        $email = $row["email"];
	        $nameu = $row["nombre"];
	?>
	        <strong>Nombre:</strong> <?=$nameu?><br>
	        <strong>Email:</strong> <?=$email?><br>
	        <strong></strong> <a href="modificar_datosU.php?mail=<?=$email?>">modificar mis datos</a><br>
	        <strong><a href="cambiar_contrasena.php">Cambiar contraseña</a></strong>
	<?php
	    }else {
	?>
	        <p>El perfil seleccionado no existe o ha sido eliminado.</p>
	<?php
	    }
	?> 
</body>
</html>
