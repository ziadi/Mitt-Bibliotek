<?php
	// Databas kopplingen
	$dbconnection = mysql_connect("localhost", "root", "") or die("Could not connect.");
	mysql_select_db("bibliotek",$dbconnection);
?>