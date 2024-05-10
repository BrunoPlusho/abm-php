<?php
// Incluyendo el archivo de conexión a la base de datos
include_once("config.php");

if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$nombre = $_POST['nombre'];
	$edad = $_POST['edad'];
	$email = $_POST['email'];

	// Verificando campos vacíos
	if (empty($nombre) || empty($edad) || empty($email)) {

		if (empty($nombre)) {
			echo "<font color='red'>El campo Nombre está vacío.</font><br/>";
		}

		if (empty($edad)) {
			echo "<font color='red'>El campo Edad está vacío.</font><br/>";
		}

		if (empty($email)) {
			echo "<font color='red'>El campo Email está vacío.</font><br/>";
		}
	} else {
		// Actualizando la tabla
		$sql = "UPDATE usuarios SET nombre=:nombre, edad=:edad, email=:email WHERE id=:id";
		$query = $dbConn->prepare($sql);

		$query->bindparam(':id', $id);
		$query->bindparam(':nombre', $nombre);
		$query->bindparam(':edad', $edad);
		$query->bindparam(':email', $email);
		$query->execute();

		// Alternativa para bindparam y execute
		// $query->execute(array(':id' => $id, ':nombre' => $nombre, ':email' => $email, ':edad' => $edad));

		// Redireccionando a la página de visualización. En este caso, es index.php
		header("Location: index.php");
	}
}
?>
<?php
// Obteniendo id desde la URL
$id = $_GET['id'];

// Seleccionando datos asociados con este id particular
$result = $dbConn->query("SELECT * FROM usuarios WHERE id=" . $id . " ");
$row = $result->fetch();
$nombre = $row['nombre'];
$edad = $row['edad'];
$email = $row['email'];
?>
<html>

<head>
	<title>Editar Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br /><br />

	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr>
				<td>Nombre</td>
				<td><input type="text" name="nombre" value="<?php echo $nombre; ?>"></td>
			</tr>
			<tr>
				<td>Edad</td>
				<td><input type="text" name="edad" value="<?php echo $edad; ?>"></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="text" name="email" value="<?php echo $email; ?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>

</html>