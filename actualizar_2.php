	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	  	<link rel="stylesheet" type="text/css" href="css/menus.css">
	</head>
<?php
	include_once 'conectar_utd.php';

	$tabla = $_POST['txtTabla'];

	if ($tabla == 'alumnos') 
	{
		$Matricula = $_POST['txtMatricula'];
		$Nombre = $_POST['txtNombre'];
		$Especialidad = $_POST['txtEspecialidad'];

		$modificacion = mysqli_query($conexion, "update alumnos SET nombre = '$Nombre', especialidad = '$Especialidad' WHERE matricula = '$Matricula'");

		if($modificacion) {
			echo "<script> alert('Alumno modificado correctamente'); </script> ";
			echo "<script> location.href='menu.php'; </script> ";
		} else {
			echo "<script> alert('Error fallo la modificación, verifique ...'); </script> ";
			echo "<script> location.href='actualizar.php'; </script> ";
		}
	}
	
	else if ($tabla == 'contactos') 	
	{
		$id = $_POST['txtId'];
		$nombre = $_POST['txtNombre'];
		$apellidos = $_POST['txtApellidos'];
		$email = $_POST['txtEmail'];
		$direccion = $_POST['txtDireccion'];
		$telefono = $_POST['txtTelefono'];

		$modificacion = mysqli_query($conexion, "update contactos SET nombre = '$nombre', apellidos = '$apellidos', email = '$email', direccion = '$direccion', telefono='$telefono' WHERE id= '$id'");

		if($modificacion) {
			echo "<script> alert('Contacto modificado correctamente'); </script> ";
			echo "<script> location.href='menu.php'; </script> ";
		} else {
			echo "<script> alert('Error fallo la modificación, verifique...'); </script> ";
			echo "<script> location.href='actualizar.php'; </script> ";
		}
	}
	else if ($tabla == 'usuarios') 
	{
		$user = $_POST['txtUsuarioViejo'];
		$nuevousuario = $_POST['txtUsuarioNuevo'];
		$contraseña = $_POST['txtPass'];
		$privilegio = $_POST['txtPriv'];

		$modificacion = mysqli_query($conexion, "update usuarios SET username='$nuevousuario', password='$contraseña', privilegio='$privilegio' WHERE username='$user'");

		if($modificacion) {
			echo "<script> alert('Usuario modificado correctamente'); </script> ";
			echo "<script> location.href='menu.php'; </script> ";
		} else {
			echo "<script> alert('Error fallo la modificación, verifique...'); </script> ";
			echo "<script> location.href='actualizar.php'; </script> ";
		}
	}


	   

		

?>