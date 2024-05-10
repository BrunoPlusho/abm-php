<?php
// Incluyendo el archivo de conexión a la base de datos
include("config.php");

// Obteniendo el id de los datos desde la URL
$id = $_GET['id'];

// Eliminando la fila de la tabla
$query = $dbConn->exec("DELETE FROM usuarios WHERE id=".$id." ");

// Redireccionando a la página de visualización (index.php en este caso)
header("Location: index.php");
?>
