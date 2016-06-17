<?php
	
	session_start();
	include 'abrir_conexion.php'; 	 // busca los datos de conexion en el archivo abrir_conexion.php
	$con1 = conectar1();	
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

		<main>
			<?php
				if(isset($_POST['busqueda'])){
					$titulo=$_POST['busqueda'];
					$tit="titulo LIKE '%$titulo%' OR descripcion LIKE '%$titulo%'";
					$con = "SELECT * FROM publicaciones WHERE "."$tit";
				}
				else{
					$con="SELECT * FROM publicaciones WHERE ";
					$con2="SELECT id_publicacion FROM usuariosolicita WHERE ";
					$sub="";
					if(isset($_POST['provincias'])){
						if(!empty($_POST['provincias'])){
							$prov=$_POST['provincias'];
							$sub=$sub."AND id_provincia = '$prov' ";
						}
					}
					if(isset($_POST['localidades'])){
						if(!empty($_POST['localidades'])){
							$loc=$_POST['localidades'];
							$sub=$sub."AND id_localidad = '$loc' ";
						}
					}
					if(isset($_POST['huespedes'])){
						if(!empty($_POST['huespedes'])){
							$plaza=$_POST['huespedes'];
							$sub=$sub."AND capacidad = '$plaza' ";
						}
					}
					if(isset($_POST['tipos'])){
						if(!empty($_POST['tipos'])){
							$tipo=$_POST['tipos'];
							$sub=$sub."AND id_talojamiento = '$tipo' ";
						}
					}
					if(isset($_POST['fechaDesde']) and isset($_POST['fechaHasta'])){
						if(!empty($_POST['fechaDesde']) and !empty($_POST['fechaHasta'])){
							$desde=$_POST['fechaDesde'];
							$hasta=$_POST['fechaHasta'];
							$con2=$con2."fecha_desde = '$desde' AND fecha_hasta = '$hasta' AND estado = 'aceptada' ";
							$sub=$sub."AND id_publicacion NOT IN (".$con2.")";
						}                    
						else{
							if(!empty($_POST['fechaDesde'])){
								$desde=$_POST['fechaDesde'];
								$con2=$con2."fecha_desde = '$desde' AND estado = 'aceptada' ";
								$sub=$sub."AND id_publicacion NOT IN (".$con2.")";
							}
							if(!empty($_POST['fechaHasta'])){
								$hasta=$_POST['fechaHasta'];
								$con2=$con2."fecha_hasta='$hasta' AND estado = 'aceptada' ";
								$sub=$sub."AND id_publicacion NOT IN (".$con2.")";
							}
						}
					}
					$con=$con.substr($sub, 3, strlen($sub)-3);
				}
				//echo $con;
				$resul=busqueda($con);
					if(!empty($resul)){?>
						<table class="table table hover">
							<tr>
								<th>Fotos</th>
								<th>Titulo</th>
								<th>Provincia</th>
								<th>Localidad</th>
								<th>Capacidad</th>
								<th></th>
							</tr>
							<tr><?php
						foreach($resul as $res){
							
							
								
								$idUser=$res['id_usuario'];
								$idProv=$res['id_provincia'];
								$idLoc=$res['id_localidad'];
								$con2="SELECT * FROM usuarios WHERE id_usuario='$idUser'";;
								$res2=busqueda($con2);
								foreach($res2 as $r){
									if(($r['tipo']== 'premium')or ($r['tipo'] == 'admin')){
										echo "<td><img src=imagen.php?id=$res[id_publicacion] id='imagen_lista'></td>";
									}
									else{
										//echo "<td><img src=img/logo.png id='imagen'></td>";
										?>
											<td><img src="images/sillon.png" id='imagen_lista' class='img-rounded'></td>
											<?php
									}
								}
								echo "<td><a href=mostrar_publicacion.php?id=$res[id_publicacion]>$res[titulo]</a></td>";
								?>
								<td>
									<?php
										$consu="SELECT provincia FROM lista_provincias WHERE id='$idProv'";
										$prov=busqueda($consu);
										if(!empty($prov)){
											foreach($prov as $p){
												echo $p['provincia'];
											}
										}
									?>
								</td>
								<td>
									<?php
										$consu1="SELECT localidad FROM lista_localidades WHERE id='$idLoc'";
										$loc=busqueda($consu1);
										if(!empty($loc)){
											foreach($loc as $l){
												echo $l['localidad'];
											}
										}
									?>
								</td>
								<td><?php echo $res['capacidad'];?></td>
								<td>
									<div>
										<br>
										<input class="btn btn-primary btn-lg" type="button" value="Ver couch" onclick="window.location.href='mostrar_publicacion.php?id=<?php echo $res['id_publicacion'];?>'">
									</div>
								</td>
							</tr>
							
						<?php
						}
						
					}
					else{?>
						<script type="text/javascript">alert("La busqueda no produjo resultados.");</script>
						<div class="center">
						<?php
						
						echo "La busqueda no produjo resultados.";
						
					}?>
						</div>
						
				</table>
				
		</main>
		
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