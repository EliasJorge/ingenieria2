 <?php 
	$host_db = "localhost";
	$user_db = "root";
	$pass_db = "";
	$db_name = "couchinn";
	$tbl_name = "usuarios";
	// Connect to server and select databse.
	$conexion = mysqli_connect("$host_db", "$user_db", "$pass_db","$db_name")or die("Cannot Connect to Data Base.");
	$contrasenia= $_POST['contrasenia'];
	$rcontrasenia= $_POST['rcontrasenia'];
	$nom=$_POST['nombre'];
	$ape=$_POST['apellidos'];
	$mail=$_POST['mail'];
	$buscarUsuario = "SELECT * FROM usuarios WHERE email= '$mail' ";
	$result = $conexion->query($buscarUsuario);
	$count = mysqli_num_rows($result);
	if ($count == 0) 
	{
		if($contrasenia != $rcontrasenia) 
	    {
			echo '<script type="text/javascript">
						alert("las contraseñas ingresadas no coinciden");
						window.location="registro.php"
					</script>';
		}
        else
		{
			$consulta= "INSERT INTO usuarios (nombre,apellido,email,contrasenia,tipo,foto) 
					VALUES ('$nom','$ape','$mail', '$contrasenia','normal','./images/senor_x.jpg')";
			$sql= mysqli_query($conexion,$consulta);
			if($sql)
			{
				echo '<script type="text/javascript">
						alert("los datos han sido ingresados correctamente");
						window.location="index.php"
					</script>';
			}
			else
			{
				echo '<script type="text/javascript">
							alert("error, no se pudo almacenar los datos");
							window.location="registro.php"
						</script>';
			}
		}
	}
	else
	{	
		echo '<script type="text/javascript">
					alert("el e-mail ya se encuentra registrado, or favor ingrese otro e-mail");
					window.location="registro.php"
				</script>'; 
	}	
?>
