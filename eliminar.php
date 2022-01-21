<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
   
   <meta charset="utf-8">
	<title>Usuarios</title>
</head>

<?php 
	include_once 'conectar_utd.php';

	$tabla =  $_GET ['tabla'];

	if ($tabla == 'alumnos') {
		$matricula = $_GET ['matricula'];

		$consulta = "DELETE from alumnos WHERE matricula = '$matricula'";

	}

	else if ($tabla == 'contactos') 
	{
		$id = $_GET['id'];
		
		$consulta = "DELETE from contactos WHERE id='$id'";

	}
	else if ($tabla == 'usuarios') {
		$username = $_GET ['username'];

		$consulta = "DELETE from usuarios WHERE username='$username'";
	}

	$resultado=mysqli_query($conexion, $consulta) or die( "Algo ha ido mal en la consulta a la base de datos");

	if ($resultado) 
	{
		//echo "<h4 align=center>Se ha eliminado el registro correctamente</h4>";
		echo "<script> alert('Registro eliminado correctamente'); </script> ";
	}
	else 
	{
		//echo "Error";
		echo "<script> alert('Error fallo la eliminación, verifique ...'); </script> ";
	}
	//echo "<a href='comprueba.php'><h4 align=center >Volver</h4></a>";
	echo "<script> location.href='menu.php'; </script> ";
?>