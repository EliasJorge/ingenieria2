<?php
session_start();
include 'abrir_conexion.php'; 	 // busca los datos de conexion en el archivo abrir_conexion.php
$con = conectar1();
include 'funciones.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2" />

	<title>insertar</title>

	<link type="text/css" rel="stylesheet" href="css/style-admin.css"/>

</head>

<body id="notas">
<?php

	$opcion = $_REQUEST['opcion'];

//************** insertar publicacion ***************************************************************************
	if ($opcion == "publicacion")
	{
		$idU= $_SESSION['idU'];
		$localidad= $_REQUEST['localidades'];
		$provincia=$_REQUEST['provincias'];
		$titulo=$_REQUEST['titulo'];
		$descripcion=$_REQUEST['descripcion'];
		$tipoHospedaje=$_REQUEST['alojamiento'];
		$cantidadHuespedes= $_REQUEST['huespedes'];
		$fechaDesde= $_REQUEST['fechaDesde'];
		$fechaHasta= $_REQUEST['fechaHasta'];


		if (($localidad) && ($titulo) && ($descripcion) && ($tipoHospedaje) && ($cantidadHuespedes) && ($fechaDesde) && ($fechaHasta))
		{
		$consulta= "INSERT INTO publicaciones(id_usuario,titulo,descripcion,id_provincia,id_localidad,capacidad,disp_desde,disp_hasta,id_talojamiento,estado) VALUES ('{$idU}','{$titulo}','{$descripcion}','{$provincia}','{$localidad}','{$cantidadHuespedes}','{$fechaDesde}','{$fechaHasta}','{$tipoHospedaje}','activo')";



		} else {
			echo '<script type="text/javascript">
					alert("Ha ocurrido un error, intentelo nuevamente");
					window.location="crear_publicacion.php"
				</script>';
		}

	}
//************** insertar tipo de hospedaje ***************************************************************************
	if ($opcion == "tipoHospehaje")
	{
		$tHospedaje= $_REQUEST['alojamiento'];

		if ($tHospedaje){
			if (validar_tipoAlojamiento ($tHospedaje)){
				$consulta = "INSERT INTO tipo_alojamiento(nombre) VALUES ('{$tHospedaje}')";
			} else {
					echo '<script type="text/javascript">
									alert("el tipo de hospedaje ingresado ya existe");
									window.location="agregar_hospedaje.php?msj=hospedaje"
								</script>';

			}

		} else {
				 echo '<script type="text/javascript">
									alert("el campo tipo de hospedaje esta vacio");
									window.location="agregar_hospedaje.php?msj=hospedaje"
								</script>';

			}
	}
//************** insertar usuario ***************************************************************************

	if ($opcion == "usuario")
	{
			$usuario= $_REQUEST['usu'];
			$pass = $_REQUEST['contra1'];
			if (($usuario) && ($pass))
			{
				if (validar_usuarioalta($usuario))
				{
				$consulta = "INSERT INTO usuarios(nombreusuario, clave) VALUES ('{$usuario}','{$pass}')";
				}
					else {$consulta = false;
					echo "El nombre de usuario ingresado ya existe en la base de datos <br/>";

				}
			} else {
				 header("location:usuario.php?opcion=alta");
				}
	}
//************** insertar reserva ***************************************************************************
	if ($opcion == "reserva"){
		$usuario = $_SESSION['idU'];
		$publicacion = $_REQUEST['idPub'];
		$desde=$_REQUEST['fechaDesde'];
		$hasta=$_REQUEST['fechaHasta'];
		
		$consulta = "INSERT INTO reservas(id_publicacion, id_usuario, estado,fecha_desde,fecha_hasta) VALUES ('{$publicacion}','{$usuario}','activo','$desde','$hasta')";
					
				
		
	}
//************** insertar donación ***************************************************************************
	if ($opcion == "donar"){
		$usuario = $_SESSION['idU'];
		$monto = $_REQUEST['monto'];
		$consulta = "INSERT INTO donaciones(id_usuario, monto, fecha_donacion) VALUES ('{$usuario}','{$monto}', CURRENT_DATE)";
		if ($_SESSION['tipoUsuario']=='normal')
		{
			$consul= "UPDATE usuarios SET tipo='premium' WHERE id_usuario='{$usuario}'";
			mysql_query($consul,$con);
		}
	}
//************** insertar un comentario ***************************************************************************
	if ($opcion == "pregunta"){
		$pregunta = $_REQUEST['pregunta'];
		$idUsu = $_REQUEST['usuId'];
		$idPub = $_REQUEST['idPub'];
		$consulta = "insert into comentarios (id_usuario, id_publicacion, fecha, comentario) VALUES ('{$idUsu}','{$idPub}', CURRENT_DATE, '{$pregunta}' )";
	}

//************** insertar Respuesta a un comentario ***************************************************************************
	if ($opcion == "respuesta")
	{
		$com = $_REQUEST['comentario'];
		$resp = $_REQUEST['respuesta'];
		$idPub = $_REQUEST['idPub'];
		$consulta = "update comentarios set respuesta = '$resp' where id_comentario = '$com' ";
	}
//************** Eliminar cuenta ***************************************************************************
	if ($opcion == "eliminarCuenta"){
		$idCuenta = $_GET['cuenta'];
		$consulta = " update usuarios set estado = 'eliminado' where id_usuario = '$idCuenta' ";
	}
//************** Rechazar solicitud ***************************************************************************
	if ($opcion == "rechazar"){
		$idR = $_REQUEST['idR'];
		$idPub = $_REQUEST['idP'];
		$consulta = " update reservas set estado = 'rechazado' where id_reserva = '$idR' ";
	}
//************** recuperar cuenta ***************************************************************************
	if ($opcion == "recuperarCuenta"){
		if($_GET['resp']){
			$idCuenta = $_SESSION['idU'];
			$consulta = " update usuarios set estado = 'activo' where id_usuario = '$idCuenta' ";
		}
		else{
			session_unset();
			session_destroy();
			echo '
				<script type="text/javascript">
					window.location="index.php"
				</script>
			';
		}
	}
//************** cambiar estado de la publicacion ***************************************************************************
	if ($opcion == "pausarPublicacion"){
		$idPublicacion = $_GET['publicacion'];
		$consulta = " update publicaciones set estado = 'pausada' where id_publicacion = '$idPublicacion' ";
	}
	if ($opcion == "activarPublicacion"){
		$idPublicacion = $_GET['publicacion'];
		$consulta = " update publicaciones set estado = 'activo' where id_publicacion = '$idPublicacion' ";
	}
//************** insertar un valoracion en una publicacion ***************************************************************************
	if ($opcion == "valoraPub"){
		$idRes = $_REQUEST['idRes'];
		$idUsu = $_REQUEST['idUsu'];
		$idPub = $_REQUEST['idPub'];
		$val = $_REQUEST['calificacion'];
		if (isset($_REQUEST['comentario']) and !empty($_REQUEST['comentario'])){
			$com = $_REQUEST['comentario'];
		}
		else{
			$com = null;
		}
		$consulta = "INSERT INTO `valoracion_publicacion`(`id_reserva`, `id_publicacion`, `id_usuario`, `valoracion`, `comentario`) VALUES ('{$idRes}','{$idPub}','{$idUsu}','{$val}','{$com}')";
	}	
//************** insertar una valoracion para un usuario ***************************************************************************
	if ($opcion == "valoraUsu"){
		$idRes = $_REQUEST['idRes'];
		$idUsu = $_REQUEST['idUsu'];
		$idHu = $_REQUEST['idHu'];
		$val = $_REQUEST['calificacion'];
		if (isset($_REQUEST['comentario']) and !empty($_REQUEST['comentario'])){
			$com = $_REQUEST['comentario'];
		}else{
			$com = null;
		}
		$consulta = "INSERT INTO `valoracion_usuario`(`id_host`, `id_huesped`, `id_reserva`, `valoracion`, `comentario`) VALUES ('{$idUsu}','{$idHu}','{$idRes}','{$val}','{$com}')";
		
	}
//************** insertar un comentario en tabla contacto ***************************************************************************
	if ($opcion == "contacto"){
		$mail = $_REQUEST['mail'];
		$comentario = $_REQUEST['comentario'];
		$consulta = "INSERT INTO `contacto`(`comentario`, `email`) VALUES ('{$comentario}','{$mail}')";
	}
	
//*************Consulta************************************************************************************************
	
	mysql_query($consulta,$con);
	
//*************************************************************************************************************	
	
	if ($opcion == "publicacion"){
		if ($consulta)
		{
			$publicacion = mysql_insert_id();
			$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
			$limite_kb = 16384;
			if (isset($_FILES["imagen"])){
					$cantidad= count($_FILES["imagen"]["tmp_name"]);
					for ($i=0; $i<$cantidad; $i++){
						if (in_array($_FILES['imagen']['type'][$i], $permitidos) && $_FILES['imagen']['size'][$i] <= $limite_kb * 1024){
							//este es el archivo temporal
							$imagen_temporal  = $_FILES['imagen']['tmp_name'][$i];
							//este es el tipo de archivo
							$tipo = $_FILES['imagen']['type'][$i];
							//leer el archivo temporal en binario
							$fp     = fopen($imagen_temporal, 'r+b');
							$data = fread($fp, filesize($imagen_temporal));
							fclose($fp);

							//escapar los caracteres
							$data = mysql_real_escape_string($data);
							$resultado = @mysql_query("INSERT INTO imagenes (id_publicacion, imagen, tipo_imagen) VALUES ('$publicacion', '$data', '$tipo')") ;

						} else { ?>
							<script type="text/javascript">
									alert("archivo no permitido, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes");
									window.location="mostrar_publicacion.php?id=<?=$publicacion?>"
							</script>;
<?php						}
					} ?>
					<script type="text/javascript">
									alert("la publicacion se subio correctamente");
									window.location="mostrar_publicacion.php?id=<?php echo $publicacion?>"
								</script>';
			<?php } else {
				echo "no hay imagen";
			}
		} else {
			echo "No se pudo ingresar el registro - ";
			echo "Error mysql:".mysql_error();

		}
	}
	elseif ($opcion == "tipoHospehaje"){
			if ($consulta){
				echo '<script type="text/javascript">
						alert("el tipo de hospedaje fue agregado con exito");
						window.location="listado_tHospedaje.php"
					</script>';
			}
			else {
				echo "No se pudo ingresar el registro - ";
				echo "Error mysql:".mysql_error();
			}
	}
	elseif ($opcion == "valoraPub"){
	?>
							<script type="text/javascript">
									alert("Valoracion cargada con exito");
									window.location="dondeMeQuede.php"
							</script>;
<?php
	}
	elseif ($opcion == "valoraUsu"){
	?>
							<script type="text/javascript">
									alert("Valoracion cargada con exito");
									window.location="misHuespedes.php"
							</script>;
<?php
	}
	elseif ($opcion == "respuesta"){
	?>
							<script type="text/javascript">
									alert("Respuesta enviada con exito");
									window.location="mostrar_publicacion.php?id=<?php echo $idPub?>"
							</script>;
<?php
	}
	elseif ($opcion == "rechazar"){
	?>
							<script type="text/javascript">
									alert("La solicitud ha sido rechazada");
									window.location="listado_reservas.php?id=<?php echo $idPub?>"
							</script>;
<?php
	}
	elseif ($opcion == "pregunta"){
	?>
							<script type="text/javascript">
									alert("pregunta enviada con exito");
									window.location="mostrar_publicacion.php?id=<?php echo $idPub?>"
							</script>;
<?php
	}
	elseif ($opcion == "donar"){
			echo '<script type="text/javascript">
				alert ("Su donacion se ha realizado correctamente");
				window.location="index.php"
				</script>';
	}
	elseif ($opcion == "reserva"){
			?>
							<script type="text/javascript">
									alert("Su reserva ha sido realizada con exito");
									window.location="mostrar_publicacion.php?id=<?php echo $publicacion?>"
							</script>;
<?php
	}
	elseif ($opcion == "eliminarCuenta"){
		session_unset();
        session_destroy();
		echo '
			<script type="text/javascript">
				alert("Acabas de borrar tu cuenta, si queres recuperarla inicia sesion con tu mail y tu ultima contraseña. ");
				window.location="index.php"
			</script>
		';
	}
	elseif ($opcion == "recuperarCuenta"){
		if($_GET['resp']){
			echo '
				<script type="text/javascript">
					alert("Ya podes disfrutar de Couchinn");
					window.location="index.php"
				</script>
			';
		}
	}
	elseif ($opcion == "pausarPublicacion"){
		echo '
			<script type="text/javascript">
				alert("La publicacion ya esta pausada, sino la vuelves a activar solo la podras ver en tu perfil");
				window.location="mostrar_publicacion.php?id=', $idPublicacion, '"
			</script>
		';
	}
	elseif ($opcion == "activarPublicacion"){
		echo '
			<script type="text/javascript">
				alert("La publicacion ya esta activa y disponible para futuras busquedas");
				window.location="mostrar_publicacion.php?id=', $idPublicacion, '"
			</script>
		';
	}
	elseif ($opcion == "contacto"){
		echo '
			<script type="text/javascript">
				alert("Tu comentario/pregunta fue guardada correctamente, recibiras una respuesta en los proximos dias");
				window.location="index.php"
			</script>
		';
	}
	else{
		echo "<br/> <a href='usuario.php?opcion=alta'>volver</a>";
	}

	mysql_close($con);
?>


</body>
