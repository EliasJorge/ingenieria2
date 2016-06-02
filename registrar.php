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
			echo "Las contraseñas ingresadas no coinciden. <a href='javascript:history.back();'>Reintentar</a>";
        }
        else
		{
			$query = "INSERT INTO usuarios (nombre,apellido,email,contrasenia,tipo) 
					VALUES ('$nom','$ape','$mail', '$contrasenia','normal')";
			if($conexion->query($query))
			{
				echo 'Los datos han sido insertados en la base de datos';
			}
			else
			{
				echo 'sucedio un error al ingresar los datos a la base';
			}
		}
	}
	else
	{	 
		echo "<br>". "El E-mail ya se encuentra reistrado." . "<br>";
		echo "<a href='crearUsuario.html'>Por favor escoga otro E-mail</a>";
	}
	
?>
