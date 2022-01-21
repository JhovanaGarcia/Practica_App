	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
	   
	</head>
<?php
	session_start();
	include_once 'conectar_utd.php';
	$Tabla = $_POST['txtTabla'];

	if ($Tabla == 'alumnos') 
	{
		$Matricula = $_POST['txtMatricula'];
		$Nombre = $_POST['txtNombre'];
		$Especialidad = $_POST['txtEspecialidad'];

		$consulta = mysqli_query($conexion, "select * FROM alumnos WHERE matricula = '$Matricula'") or die ("Problemas al enseñar los productos:".mysqli_error($conexion));
		
		if ($resultado = mysqli_fetch_array($consulta))
  		{
  			echo "<script>
					alert('La matrícula ya se ha registrado. Intente nuevamente.');
		            location.href='menu.php'; 
                  </script> ";
  		}
  		else
  		{
  			mysqli_query($conexion, "insert into alumnos (matricula, nombre, especialidad) values ('$Matricula', '$Nombre', '$Especialidad')") or die("Problemas en la inserción de datos ". mysqli_error($conexion));

			echo "<script>
					alert('Alumno $Nombre agregado correctamente');
		            location.href='menu.php'; 
                  </script> ";
  		}
	}

	elseif ($Tabla == 'contactos') 	
	{
		$nombre = $_POST['txtNombre'];
		$apellidos = $_POST['txtApellidos'];
		$email = $_POST['txtEmail'];
		$direccion = $_POST['txtDireccion'];
		$telefono = $_POST['txtTelefono'];

		mysqli_query($conexion, "insert into contactos (nombre, apellidos, email, direccion, telefono) values ('$nombre', '$apellidos', '$email', '$direccion', '$telefono')") or die("Problemas en la inserción de datos ". mysqli_error($conexion));

			echo "<script>
					alert('Contacto $nombre agregado correctamente');
		            location.href='menu.php'; 
                  </script> ";
	}
	
	elseif ($Tabla == 'usuarios') 
	{
		$usuario = $_POST['txtUsuario'];
		$contraseña = $_POST['txtPass'];
		$privilegio = $_POST['txtPriv'];

		$consulta = mysqli_query($conexion, "select * FROM usuarios WHERE username = '$usuario'") or die ("Problemas al enseñar los productos:".mysqli_error($conexion));
		
		if ($resultado = mysqli_fetch_array($consulta))
  		{
  			echo "<script>
					alert('El usuario ya se ha registrado. Intente nuevamente.');
		            location.href='menu.php'; 

                  </script> ";
  		}
  		else
  		{
  			mysqli_query($conexion, "insert into usuarios (username, password, privilegio) values ('$usuario', '$contraseña', '$privilegio')") or die("Problemas en la inserción de datos ". mysqli_error($conexion));

			echo "<script>
					alert('Usuario $usuario agregado correctamente');
		            location.href='menu.php'; 
                  </script> ";
  		}

	}

	/*
	$resultado=mysqli_query($conexion, $consulta);

	if($resultado) 
		{
			//echo "<br><h4 align=center>Usuario agregado correctamente</h4>";
			echo "<script> alert('Registro agregado correctamente');
		                  location.href='menu.php'; 
                  </script> ";
		} 
		else 
		{
			//echo "<br><h4 align=center><font color='red'>"."Error al agregar usuario"."</font></h4>";
			echo "<script> alert('Error al agregar el registro, verifique por favor ...');
		                  location.href='menu.php'; 
                  </script> ";
		}
		*/

?>