<section>
		<div class="center">
		<?php		
			$idU= $_SESSION['idU'];
			$consulta = "select * from publicaciones where id_usuario = '$idU' order by titulo asc";
			$resultado = busqueda($consulta);
			if ($resultado){
		?>
			<table class="table table hover" id="listados">
							<tr>
								<th>Fotos</th>
								<th>Titulo</th>
								<th>Descripcion</th>
								<th></th>
							</tr>
						<?php
						if(!empty($resultado)){
							
							foreach ($resultado as $r){?>
								<tr><?php
								
									echo "<td><img src=imagen.php?id=$r[id_publicacion] id='imagen_lista' class='img-rounded'></td>";
									echo "<td><br><a href=mostrar_publicacion.php?id=$r[id_publicacion]>$r[titulo]</a></td>";
								?>
								<td><br><div class="descripcion"><?php echo $r['descripcion']; ?></div></td>
								<td>
									<div>
										<br>
										<input class="btn btn-primary btn-lg" type="button" value="Ver couch" onclick="window.location.href='mostrar_publicacion.php?id=<?php echo $r['id_publicacion'];?>'">
									</div>	
								</td>
							</tr>
							<?php
								
							}
						}?>
			</table>
			
			<?php } else {
				
				echo "<h3> Todavia no tienes publicaciones para mostrar</h3>";
			} ?>
		</div>       
    </section>