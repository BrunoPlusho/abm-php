<html>

<head>
	<title>Agregar Data</title>
</head>

<body>
	<?php
	//including the database connection file
	include_once("config.php");

	if (isset($_POST['Submit'])) {
		$nombre = $_POST['nombre'];
		$edad = $_POST['edad'];
		$email = $_POST['email'];

		// checking empty fields
		if (empty($nombre) || empty($edad) || empty($email)) {

			if (empty($nombre)) {
				echo "<font color='red'>nombre field is empty.</font><br/>";
			}

			if (empty($edad)) {
				echo "<font color='red'>edad field is empty.</font><br/>";
			}

			if (empty($email)) {
				echo "<font color='red'>Email field is empty.</font><br/>";
			}

			//link to the previous page
			echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
		} else {
			// if all the fields are filled (not empty) 

			//insert data to database
			$sql = "INSERT INTO usuarios(nombre, edad, email) VALUES('" . $nombre . "', " . $edad . ", '" . $email . "')";
			$query = $dbConn->exec($sql);
			echo "<font color='green'>Se agregó con éxito.";
			echo "<br/><a href='index.php'>Ir a home</a>";
		}
	}
	?>
</body>

</html>