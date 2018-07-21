<?php
$server ="localhost";
$user = "root";
$pass = "";	
$db = "newkb";

$kon = mysql_connect ($server,$user,$pass)
	or die
	(mysql_error("Gak bisa masuk ya"));
	mysql_select_db($db)
	or die
	(mysql_error("database tidak di temukan"));
?>