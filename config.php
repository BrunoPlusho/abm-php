<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
	$dbConn = new PDO("sqlite:" . __DIR__ . "/test.db");
	$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$dbConn->exec("CREATE TABLE IF NOT EXISTS usuarios (id INTEGER PRIMARY KEY, nombre TEXT, edad INTEGER, email TEXT)");
} catch(PDOException $e) {
	echo $e->getMessage();
}

?>
