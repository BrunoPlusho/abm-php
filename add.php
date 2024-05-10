<html>

<head>
	<title>Agregar Data</title>
</head>

<body>
	<?php
	// Incluyendo el archivo de conexión a la base de datos
	include_once("config.php");

	if (isset($_POST['Submit'])) {
		$nombre = $_POST['nombre'];
		$edad = $_POST['edad'];
		$email = $_POST['email'];

		// Verificando campos vacíos
		if (empty($nombre) || empty($edad) || empty($email)) {

			if (empty($nombre)) {
				echo "<font color='red'>Campo nombre está vacío.</font><br/>";
			}

			if (empty($edad)) {
				echo "<font color='red'>Campo edad está vacío.</font><br/>";
			}

			if (empty($email)) {
				echo "<font color='red'>Campo Email está vacío.</font><br/>";
			}

			// Enlace para volver a la página anterior
			echo "<br/><a href='javascript:self.history.back();'>Volver</a>";
		} else {
			// Si todos los campos están llenos (no vacíos)

			// Insertando datos en la base de datos
			$sql = "INSERT INTO usuarios(nombre, edad, email) VALUES('" . $nombre . "', " . $edad . ", '" . $email . "')";
			$query = $dbConn->exec($sql);
			echo "<font color='green'>Se ha agregado con éxito.</font>";
			echo "<br/><a href='index.php'>Ir a inicio</a>";
		}
	}
	?>

</body>

</html>