
<?php
	session_start();
	$host_db = "localhost";
	$user_db = "root";
	$pass_db = "";
	$db_name = "couchinn";
	$tbl_name = "usuarios";
	// Connect to server and select databse.
	$conexion = mysqli_connect("$host_db", "$user_db", "$pass_db","$db_name")or die("Cannot Connect to Data Base.");
	$mail= $_SESSION['mail'];
	$sql="SELECT * FROM usuarios WHERE email='$mail'";
	$perfil = mysqli_query($conexion,$sql) or die(mysqli_error($conexion));
    if(mysqli_num_rows($perfil)) 
    { // Comprobamos que exista el registro con el mail ingresado
        $row = mysqli_fetch_array($perfil);
        $id=$row["id_usuario"];	
        $nameu = $row["nombre"];
        $apellido= $row["apellido"];
        $telefono=$row["telefono"];
        $foto=$row["foto"];
    }
    else 
    {
		echo '<script type="text/javascript">
					alert("El usuario no esta registrado o elimino su cuenta");
					window.location="cambiar_contraseña.php"
				</script>';
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
	<head>
		<title>CouchInn-Modificar Datos</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
		
		<script type="text/javascript" src="js/index.js"></script>
		<script type="text/javascript" src="js/jquery-1.6.js" ></script>
		<script type="text/javascript" src="js/cufon-yui.js"></script>
		<script type="text/javascript" src="js/cufon-replace.js"></script>  
		<script type="text/javascript" src="js/Adamina_400.font.js"></script>
		<script type="text/javascript" src="js/jquery.jqtransform.js" ></script>
		<script type="text/javascript" src="js/script.js" ></script>
		<script type="text/javascript" src="js/kwicks-1.5.1.pack.js" ></script>
		<script type="text/javascript" src="js/atooltip.jquery.js"></script>
	</head>
	<body id="page1" >
		<div class="bg1">
			<div class="main">
				<img src="images/logo-couchinn1.png" align="center" />
			</div>
			<nav>
				<li id="registrar"><a>Modificar mis datos </a></li>
			</nav>
			<div class="main">
				<div id="fondo">
					<?php
						if(isset($_SESSION['loggedin'])) 
						{ // comprobamos que la sesión esté iniciada
							if(isset($_POST['enviar'])) 
							{
								$nombre = mysqli_real_escape_string($conexion,$_POST['nombre']);
								$apellido= mysqli_real_escape_string($conexion,$_POST['apellido']);
								$telefono= mysqli_real_escape_string($conexion,$_POST['telefono']);
								$consulta= "UPDATE usuarios SET nombre='".$nombre."',telefono='".$telefono."',apellido='".$apellido."',foto='"."' WHERE usuarios.id_usuario='".$id."'";
								$sql = mysqli_query($conexion,$consulta);
								if($sql) 
								{
									echo '<script type="text/javascript">
											alert("datos cambiados correctamente");
											window.location="perfil.php"
										</script>';
								}
								else 
								{
									echo '<script type="text/javascript">
												alert("error, no se pudieron cambiar los datos");
												window.location="perfil.php"
											</script>';
								}
						}
						else 
						{
						?>
							<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
								<label for="nombre"> Nombre:</label>
								<br>
								<input type="text" name="nombre" value="<?=$nameu?>" required  onsubmit="return validateForm()"/>
								<br>
								<label for="apellido">Apellido:</label> 
								<br>
								<input type="text" name="apellido" value="<?=$apellido?>" required  />
								<br>
								<label for="telefono">Telefono:</label> 
								<br>
								<input type="text" name="telefono" value="<?=$telefono?>" required  />
								<br><br>
								Incluir foto <input type="file" name="foto" id="foto" />
								<br><br>
								<input type="submit" name="enviar" value="Guardar cambios" />
								<input type="reset" name="limpiar" value="Borrar los datos introducidos" />
								<input type="button" name="Cancelar" value="Cancelar" OnClick= "self.location.href = 'index.php'">  
							</form>
						<?php
						}
					}
					else 
					{
						echo "Acceso denegado.";
					}
					?> 
				</div>
			</div>
			<div class="main">
			<ul class="foot">
						<li class="active"><a href="login.php">iniciar sesion</a></li>
								<li><a href="index.php">contacto</a></li>
								<li><a href="index.php">acerca de nosotros</a></li>
								<li><a href="index.php">ayuda</a></li>
			</ul>
			</div>
			<div class="main" id="pie"></div>
			
		</div>
			<script type="text/javascript"> Cufon.now(); </script>
		
		<script>
				$(document).ready(function(){
					$('.kwicks').kwicks({
						max : 500,
						spacing : 0,
						event : 'mouseover'
					});
							   
				})
		</script>
		
	</body>
</html 	>

