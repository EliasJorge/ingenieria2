<?php

		session_start();
		include 'funciones.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Couch Inn</title>

	<!-- core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body class="homepage">

    <header id="header">

		<?php

			//---Incluimos la barra superior
			include_once('view/topBar.php');

			//---Incluimos el nav
			include_once('view/navBar.php');

		?>

    </header><!--/header-->
	<!-- Contenido de la pagina -->

	<section>
		<div>
		<?php
			$consulta = "SELECT * from reservas where estado = 'activo'";
			$resultado = busqueda($consulta);
		?>
  			<table class="table table hover">
  							<tr>
  								<th>Titulo</th>
  								<th>Usuario</th>
  								<th></th>
  							</tr>
						<?php
						$num = 27;
						foreach ($resultado as $r)
            {?>
							<tr><?php
								$idUser= $r['id_usuario'];
								$sql = "SELECT * FROM usuarios WHERE id_usuario='$idUser'";
								$result1 = busqueda($sql);
                $idP= $r['id_publicacion'];
                $sql="SELECT  * FROM publicaciones WHERE id_publicacion='$idP'";
                $result2= busqueda($sql);
								foreach($result2 as $array)
                {
	                  echo "<td><br><a>$array[titulo]</a></td>";
								}
                foreach($result1 as $r1)
                {
                    echo "<td><br><a href=ver_perfil_publicion.php?id=$r1[id_usuario]>$r1[email]</a></td>";
                }
								?>
								<!--<td><br><div class="descripcion"><?php ?></div></td>-->
								<td>
									<div>
										<br>
										<input class="btn btn-primary btn-lg" type="button" value="Aceptar" onclick="">
                    <input class="btn btn-primary btn-lg" type="button" value="Cancelar" onclick="window.location.href="">
									</div>
								</td>
							</tr>
							<?php
						}?>
						</table>
			<hr/>

		</div>
    </section><!--/section-->

	<!-- /contenido -->

	<!-- Footer -->
	<?php

			//---Incluimos el footer
			include_once('view/footer.php');

	?>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/wow.min.js"></script>
</body>
</html>
