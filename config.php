<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
	$dbConn = new SQLite3('test.db');
	$dbConn->query("CREATE TABLE IF NOT EXISTS usuarios (id INTEGER PRIMARY KEY, nombre TEXT, edad INTEGER, email TEXT)");
} catch(PDOException $e) {
	echo $e->getMessage();
}

?>
