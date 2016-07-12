
	<div class="row">
		<div class="col-sm-12">
			<div class="single_comments">
				<?php 	
						$bus= "select * from valoracion_publicacion where id_publicacion = '$id' order by id_valoracion desc limit 0,3";
						$bus2= "select AVG(valoracion) as valoracion1 from valoracion_publicacion where id_publicacion = '$id'";
						
						$res= busqueda($bus);
						$res2= busqueda($bus2);
				?>
				
			</div>
			<div class="single_comments">
			
<?php				if (count ($res) > 0){
							echo "<h3>Puntuacion:</h3>";
							echo "<div class='center puntuacion'>";
							echo "<p>".number_format($res2[0]['valoracion1'],2)."</p>";
							echo "</div>";
							echo "<h3>Comentarios:</h3>";
						foreach ($res as $r){ ?>
						<div class="comentario">
							<p><?php echo htmlentities($r['comentario']); ?></p>
						</div>
<?php					} ?>
						<form method="POST" action='listado_puntuaciones.php'>
							<div class="botonPub">
								<input type="hidden" name="idPub" id="idPub" value="<?php echo $id; ?>">
								<input class="btn btn-primary btn-xs" id="valoracion" name="valoracion" type="submit" value="ver todos ..." />
							</div>
						</form>
<?php					}else{
						
						echo "<div class='center noPuntuacion'> <p> Esta publicacion no tiene puntuaciones todavia </p> </div>";
						
					}
	
	
?>
				
			</div>
		</div>
	</div>