<?php
function conectar()
{
	mysql_connect("localhost", "root", "");
	mysql_select_db("couchinn");
}

function desconectar()
{
	mysql_close();
}
?>