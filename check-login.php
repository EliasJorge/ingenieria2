<?php
	/* start the session */ 
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
			<title>Check Login</title>
			<meta charset = "utf8" />
		</head>
		<body>
	 
			<?php
				$mail = $_POST['mail'];
				$contrasenia= $_POST['password'];
				$sql= "SELECT*FROM $tbl_name WHERE email='$mail' and contrasenia='$contrasenia'";
				$result= mysqli_query($conexion,$sql) or die(mysqli_error($conexion));
				$row = mysqli_fetch_array($result);
				$nameu=$row["nombre"];
				if (!$result || mysqli_num_rows($result) == 1)
				{
					$_SESSION['loggedin'] = true;
					$_SESSION['mail'] = $mail;
					$_SESSION['nombre']= $nameu; 
					header("location:admin.php");	 
				}
				else 
				{
					echo "Username o Password estan incorrectos.";	 
					echo "<a href='login.php'>Volver a Intentarlo</a>";
				}
	 
			?>
		</body>
	</html>
