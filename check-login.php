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
				if (!$result || mysqli_num_rows($result) == 1){
					$_SESSION['loggedin'] = true;
					$_SESSION['mail'] = $mail;
					$_SESSION['nombre']= $row["nombre"];
					$_SESSION['tipoUsuario']= $row["tipo"];
					$_SESSION['idU'] = $row["id_usuario"];
					$_SESSION['foto'] = $row["foto"];
					$_SESSION['tipo_foto'] = $row["tipo_foto"];
					if($row["estado"] != 'eliminado'){						
						header("location:index.php");
					}
					else {
						echo '<script type="text/javascript">
								if(confirm("Su cuenta fue eliminada, desea recuperarla?")){
									window.location.href = "insertar.php?opcion=recuperarCuenta&resp=true";
								}else window.location.href = "insertar.php?opcion=recuperarCuenta&resp=false";
							</script>';
					}
				}
				else 
				{
					echo '<script type="text/javascript">
					alert("E-Mail o Contraseña incorrectos, intente nuevamente");
					window.location="login.php"
				</script>';
				}
	 
			?>
		</body>
	</html>
