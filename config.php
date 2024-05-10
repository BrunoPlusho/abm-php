<?php

// Configuración para mostrar errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
	// Crear conexión a la base de datos SQLite
	$dbConn = new PDO("sqlite:" . __DIR__ . "/test.db");

	// Establecer que la conexión reporte errores como excepciones
	$dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	// Crear tabla si no existe
	$dbConn->exec("CREATE TABLE IF NOT EXISTS usuarios (id INTEGER PRIMARY KEY, nombre TEXT, edad INTEGER, email TEXT)");
} catch(PDOException $e) {

	// Manejar excepciones
	echo $e->getMessage();
}

?>