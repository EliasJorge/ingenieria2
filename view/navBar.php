<nav class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"><img src="images/logo-couchinn1.png" class="logoNav" alt="logo"></a>
                </div>
				
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li ><a href="index.php">Inicio</a></li>
                        <li><a href="about.php">Sobre nosotros</a></li>
                        <li><a href="listado_publicaciones.php">Couchs disponibles</a></li>
                        <?php
							if(isset($_SESSION['loggedin'])) 
							{
							?>
						<li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Opciones <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="crear_publicacion.php">Publicar</a></li>
                                <li><a href="misHospedajes.php">Mis Hospedajes</a></li>
                                <li><a href="dondeMeQuede.php">Lugares donde me quede</a></li>
                                <li><a href="donar.php">Donar</a></li>
								<?php
									if ($_SESSION['tipoUsuario'] == 'admin'){
								?>		
									<li><a href="listado_tHospedaje.php">Ver tipos de hospedajes</a></li>
									<li><a href="iDonaciones.php">Donaciones</a></li>
									<li><a href="iAceptadas.php">Couchs aceptados</a></li>
									<li><a href="agregar_hospedaje.php?msj=hospedaje.php">Agregar tipo de hospedaje</a></li>
									<li><a href="modificar.php">Modificar tipo de hospedaje</a></li>
									<li><a href="eliminar_talojamiento.php">Eliminar tipo de hospedaje</a></li>	
								<?php		
										
									}
								?>
                            </ul>
                        </li>
						<?php
							}
						?>
                        <li><a href="asiFunciona.php">Como funciona</a></li> 
                        <li><a href="contacto.php">Contacto</a></li>                        
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->