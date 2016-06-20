<div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-xs-4">
						<div class="login">
                        <?php
							if(isset($_SESSION['loggedin'])) 
							{
							?>
								
								<font color = "899d36">Bienvenido </font><a href="perfil.php?mail=<?=$_SESSION['mail']?>"> <strong><?=$_SESSION['nombre']?></strong></a><font color = "899d36"> !</font>  
								<a href="cerrar_sesion.php">Cerrar Sesión</a>
							<?php
							}
							else 
							{
							?>
							<a href="registro.php">Registrarse</a> <font color = "899d36"> | </font><a href="login.php">Iniciar Sesion</a>
							<?php
							}
							?>
						</div>	
                    </div>
                    <div class="col-sm-6 col-xs-8">
                       <div class="social">
                            <ul class="social-share">
                                <li><a href="http://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="http://twitter.com/"><i class="fa fa-twitter"></i></a></li>
                            </ul>
                            <div class="search">
                                <form role="search" action="busquedaResult.php" method="POST" onsubmit=" return validarBusqueda(this)">
                                    <input type="text" name="busqueda" id="busqueda" class="search-form" autocomplete="off" placeholder="Ingrese un destino...">
                                    <i class="fa fa-search">
										<input class="btn btn-success btn-xs" id="enviar1" name="buscar" type="submit" value="buscar" />
										<input class="btn btn-success btn-xs" id="enviar2" name="avanzada" type="button" value="avanzada" onClick="location.href = 'avanzado.php'"/>
									</i>
                                </form>
                           </div>
                       </div>
                    </div>
                </div>
            </div><!--/.container-->
</div><!--/.top-bar-->