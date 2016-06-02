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
        if(isset($_SESSION['loggedin'])) 
        { // comprobamos que la sesión esté iniciada
            if(isset($_POST['enviar'])) 
            {
				$mail= $_SESSION['mail'];
				$sql = mysqli_query("UPDATE usuarios SET contrasenia='".$contrasenia."' WHERE email='".$mail."'");
				if($sql) 
				{
					echo "Datos cambiados correctamente.";
				}else 
				{
					echo "Error: No se pudieron cambiar los datos. <a href='javascript:history.back();'>Reintentar</a>";
				}
            }
			else 
			{
    ?>
				<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
					<label for="nombre"> Nombre:</label>
					<br>
					<input type="text" name="nombre" value="" required size="20" onsubmit="return validateForm()"/>
					<br>
					<label for="apellidos">Apellidos</label> 
					<br>
					<input type="text" name="apellidos" value="" required size="20" />
					<br>
					<label for="sexo">Sexo</label> 
					<br>
					<input type="radio" name="sexo" value="hombre" checked="checked" /> Hombre 
					<input type="radio" name="sexo" value="mujer" /> Mujer
					<br><br>
					Incluir foto <input type="file" name="foto" />
					<br><br>
					<input type="submit" name="enviar" value="Guardar cambios" />
					<input type="reset" name="limpiar" value="Borrar los datos introducidos" />  
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
