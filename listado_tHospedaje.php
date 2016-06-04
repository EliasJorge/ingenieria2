<?php
	include 'abrir_conexion.php'; 	 // busca los datos de conexion en el archivo abrir_conexion.php
	$con = conectar1();
	session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2" />
 	<title>Couchinn - Administracion</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
	<meta http-equiv="imagetoolbar" content="no" />
	
</head>
<body id='fondoVerde'>
	<div id="log">
    	<nav>					
					<ul >
							<?php
							if(!isset($_SESSION['loggedin'])) 
							{
									echo '<script type="text/javascript">
									alert("no esta autorizado para ver esta seccion");
									window.location="index.php"
								</script>';							
							}
							?>						
					</ul>
				</nav> 
    </div>
	<div class="main">
		<?php
		
			$consulta = "select * from tipo_alojamiento order by nombre asc";
			$result = mysql_query($consulta, $con);
			
			
			echo "<fieldset>";
			echo "<legend><h3>Lista de tipos de Hospedajes </h3></legend>";
			echo "<hr/>";
			while ($fila= mysql_fetch_array($result)){
				
						
				echo "<a>"."<h3>".htmlentities($fila['nombre'])."</a>"."</h3>";				
				
				echo "<hr/>";
				
			}
	
			mysql_close($con);
			echo "</fieldset>";
		?> 
	
	</div>


</body>

</html>