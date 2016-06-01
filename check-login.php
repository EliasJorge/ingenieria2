<?php
	/* start the session */ 
	session_start();
?> 
	<!DOCTYPE html>
	<html lang="en">
	 
		<head>
			<title>Check Login</title>
			<meta charset = "utf8" />
		</head>
		<body>
	 
			<?php
				$host_db = "localhost";
				$user_db = "root";
				$pass_db = "";
				$db_name = "couchinn";
				$tbl_name = "usuarios";
				// Connect to server and select databse.
				$conexion = mysqli_connect("$host_db", "$user_db", "$pass_db","$db_name")or die("Cannot Connect to Data Base.");
				// data enviada desde el formulario
				$mail = $_POST['mail'];
				$password = $_POST['password'];
				$sql= "SELECT*FROM $tbl_name WHERE email='$mail' and contrasenia='$password'";
				$result= mysqli_query($conexion,$sql) or die(mysqli_error($conexion));
				if (!$result || mysqli_num_rows($result) == 1)
				{
					$_SESSION['loggedin'] = true;
					$_SESSION['mail'] = $mail;
					$_SESSION['start'] = time();
					$_SESSION['expire'] = $_SESSION['start'] + (5 * 60) ;	 
					header("location:index.php?msj=");	 
				}
				else 
				{
					echo "Username o Password estan incorrectos.";	 
					echo "<a href='login.html'>Volver a Intentarlo</a>";
				}
	 
			?>
		</body>
	</html>
