<?php
	session_start();
	$host_db = "localhost";
	$user_db = "root";
	$pass_db = "";
	$db_name = "couchinn";
	$tbl_name = "usuarios";
	// Connect to server and select databse.
	$conexion = mysqli_connect("$host_db", "$user_db", "$pass_db","$db_name")or die("Cannot Connect to Data Base.");
	$contrasenia=$_POST['contrasenia'];
	$rcontrasenia=$_POST['rcontrasenia'];
	$mail=$_POST['mail'];
	if(isset($_POST['enviar'])) 
	{
		if($contrasenia!= $rcontrasenia) 
                {
                    echo '<script type="text/javascript">
					alert("las contraseñas ingresadas no son correctas");
					window.location="comprobar_mail.html"
					</script>';
                }
                else 
                {
					$consulta="UPDATE usuarios SET contrasenia='".$contrasenia."' WHERE email='".$mail."'";
                    $sql = mysqli_query($conexion,$consulta)or die(mysqli_error($conexion));
                    if($sql) 
                    {
                        echo '<script type="text/javascript">
									alert("contraseña cambiada correctamente");
									window.location="index.php"
					   		   </script>';
                    }
                    else 
                    {
                        echo '<script type="text/javascript">
									alert("error al cargar los datos en la base");
									window.location="comprobar_mail.html"
							</script>';
                    }
                }
	}
?>
