<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)
$results = $dbConn->query("SELECT * FROM usuarios ORDER BY id DESC");
?>

<html>
<head>
	<title>Homepage</title>
</head>

<body>
<a href="add.html">Agregar Usuario</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Nombre</td>
		<td>Edad</td>
		<td>Email</td>
		<td>Acciones</td>
	</tr>
	<?php 
	if($results){
		$rows = $results->fetchAll();
		foreach($rows as $row){
			echo "<tr>";
			echo "<td>".$row['nombre']."</td>";
			echo "<td>".$row['edad']."</td>";
			echo "<td>".$row['email']."</td>";
			echo "<td><a href=\"edit.php?id=$row[id]\">Edit</a> | <a href=\"delete.php?id=$row[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
		}
	}
	?>
	</table>
</body>
</html>
