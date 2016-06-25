<?php
//*****************************************************************************************************
function busqueda($consulta){
		require_once('abrir_conexion.php');
		$con = conectar1();
		$res = mysql_query($consulta,$con);
		mysql_close($con);
		if(mysql_num_rows($res) > 0){
			while ($fila = mysql_fetch_assoc($res)) {
				$row[] = $fila;
			}
			return $row;
		}
		else{
			$row=[];
			return $row;
		}
	}
//*****************************************************************************************************
function validar_tipoAlojamiento ($tHospedaje){
	
	$consulta= "SELECT * FROM tipo_alojamiento WHERE nombre = '$tHospedaje'";
	$resul= mysql_query($consulta);
	
	$fila= mysql_fetch_array($resul);
	
	if ($fila){
		
		return false;
		
		
	} else return true;
}

//*****************************************************************************************************
function validar_usoAlojamiento ($id){
	
	$consulta= "SELECT * FROM publicaciones WHERE id_talojamiento = '$id'";
	$resul= mysql_query($consulta);
	
	$fila= mysql_fetch_array($resul);
	
	if ($fila){
		
		return false;
		
		
	} else return true;
}
//*****************************************************************************************************
function validar_eliminarPub ($id){
	
	$consulta= "SELECT * FROM reservas WHERE id_publicacion = '$id' and estado = 'aceptado'";
	$resul= mysql_query($consulta);
	
	$fila= mysql_fetch_array($resul);
	
	if ($fila){
		
		return false;
		
		
	} else return true;
}
//**********************************************************************************************************
	function mostrar_notas($result)
	{
		while ($fila= mysql_fetch_array($result)) // se muestra en pantalla las notas obtenidas de la busqueda 
			{
				
				$nota = $fila['idnota'];
				echo "<div class='busq-resul'>";
				echo "<p>";				
				echo "<h3>"."<a href='notas.php?nota=$nota' >".htmlentities($fila['titulo'])."</a>"."</h3>";				
				echo htmlentities($fila['resena']);
				echo "</p>";
				echo "</div>";
			}
	}
//***********************************************************************************************************
	function validar_fecha($fecha, $formato = 'AAAA-MM-DD'){
	    if(strlen($fecha) >= 8 && strlen($fecha) <= 10){
	        $separador_solo = str_replace(array('M','D','A'),'', $formato);
	        $separador = $separador_solo[0];
	        if($separador){
	            $regexp = str_replace($separador, "\\" . $separador, $formato);
	            $regexp = str_replace('MM', '(0[1-9]|1[0-2])', $regexp);
	            $regexp = str_replace('M', '(0?[1-9]|1[0-2])', $regexp);
	            $regexp = str_replace('DD', '(0[1-9]|[1-2][0-9]|3[0-1])', $regexp);
	            $regexp = str_replace('D', '(0?[1-9]|[1-2][0-9]|3[0-1])', $regexp);
	            $regexp = str_replace('AAAA', '\d{4}', $regexp);
	            $regexp = str_replace('AA', '\d{2}', $regexp);
	            if($regexp != $fecha && preg_match('/'.$regexp.'$/', $fecha)){
	                foreach (array_combine(explode($separador,$formato), explode($separador,$fecha)) as $key=>$value) {
	                    if ($key == 'AA') $anio = '20'.$value;
	                    if ($key == 'AAAA') $anio = $value;
	                    if ($key[0] == 'M') $mes = $value;
	                    if ($key[0] == 'D') $dia = $value;
	                }
	                if (checkdate($mes,$dia,$anio)) return true;
	            }
	        }
	    }
    	return false;
	}
//****************************************************************************************************
	function convertir($fecha)
	{
		$resul = explode('-',$fecha);
		$new_fecha = $resul[0].$resul[1].$resul[2];
		return $new_fecha;
	}
//*****************************************************************************************************
function validar_usuarioalta ($usuario){
	
	$consulta= "SELECT * FROM usuarios WHERE nombreusuario = '$usuario'";
	$resul= mysql_query($consulta);
	
	$fila= mysql_fetch_array($resul);
	
	if ($fila){
		
		return false;
		
		
	} else return true;
}
function validar_usuariomod ($usuario, $id){
	
	$consulta= "SELECT * FROM usuarios WHERE nombreusuario = '$usuario'";
	$resul= mysql_query($consulta);
	
	$fila= mysql_fetch_array($resul);
	if ($fila)
	{
		if ($fila['id'] != $id){
		
			return false;
		} else {
			return true; 
			}
		
	} else {return true;}
}




?>

