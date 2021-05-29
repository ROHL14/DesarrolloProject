<?php
session_start();


$dbhost = 'localhost';		// Nombre del host
$dbuser = 'root';	// Nombre de usuario en la base de datos
$dbpass = '';	// Contrasena en la base de datos
$dbname = 'sistemadesarrollo';		// Nombre de la base de datos

if (!isset($noredir) && $dbhost == 'localhost' && $dbuser == 'MYSQL USERNAME' && $dbpass == 'MYSQL PASSWORD')
	header('Location:install.php');
if (!isset($noredir)) {
	$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
	if ($mysqli->connect_errno)
		die('<h2>Something went wrong while trying to connect to your MySQL Database. Error No. ' . $mysql->connect_errno . '<h2>');

	// Check existance of random table to test installed system
	// Verifica la existencia de una tabla para probar si el sistema esta instalado
	$tables = array('users', 'categories', 'items', 'logs', 'settings');
	$rn = rand(0, 4);
	$res = $mysqli->query("SHOW TABLES LIKE '%invento_{$tables[$rn]}%'");
	if ($res->num_rows == 0)
		header('Location:install.php');
}
