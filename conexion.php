<?php
function conectar()
{
	mysql_connect("localhost", "root", "");
	mysql_select_db("couchinn");
	mysql_set_charset('utf8');
}

function desconectar()
{
	mysql_close();
}
?>