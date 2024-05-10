<?php
// incluyendo el archivo de conexión a la base de datos
include_once("config.php");

// obteniendo los datos en orden descendente (última entrada primera)
$results = $dbConn->query("SELECT * FROM usuarios ORDER BY id DESC");
?>

<html>

<head>
	<title>Página principal</title>
</head>

<body>
	<a href="add.html">Agregar Usuario</a><br /><br />

	<table width='80%'>
		<tr>
			<td>Nombre</td>
			<td>Edad</td>
			<td>Email</td>
			<td>Acciones</td>
		</tr>
		<?php
		if ($results) {
			$rows = $results->fetchAll();
			foreach ($rows as $row) {
				echo "<tr>";
				echo "<td>" . $row['nombre'] . "</td>"; // Mostrar nombre
				echo "<td>" . $row['edad'] . "</td>"; // Mostrar edad
				echo "<td>" . $row['email'] . "</td>"; // Mostrar email
				echo "<td><a href=\"edit.php?id=$row[id]\">Editar</a> | <a href=\"delete.php?id=$row[id]\" onClick=\"return confirm('¿Estás seguro de que quieres eliminar?')\">Eliminar</a></td>"; // Acciones de edición y eliminación
			}
		}
		?>
	</table>
</body>

</html>