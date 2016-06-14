<?php
	
	function conectar1()
	{
		$con = mysql_connect("localhost","root","");
		if (!$con)
		{
			die('no se ha podido conectar: '.mysql_error());
		}
		
		$bd_selec = mysql_select_db("couchinn", $con);
			
		if (!$bd_selec) 
		{		
			die('No se pudo utilizar couchinn:'.mysql_error() );
		}
		mysql_set_charset('utf8');	
		return $con;
	
	}
?>
