<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	   <meta charset="utf-8">
	   <link rel="stylesheet" href="./css/modificar.css">
	<title>Modificar</title>
</head>

<?php
	include_once 'conectar_utd.php';

	$tabla = $_GET['tabla'];

	if ($tabla == 'alumnos') 
	{
		$matricula = $_GET ['matricula'];

		$query="SELECT matricula, nombre, especialidad FROM alumnos WHERE matricula ='$matricula'";
		$resultado = mysqli_query($conexion, $query);

		    
			echo"<div class='conta-form'>";
			echo "<h1  align=center>Modificar registros de la tabla alumnos</h1><br>";
			echo "<h3 class='tex' align='center'>Ingresa los nuevos valores</h4><br>";
            echo "<form method='POST' action='actualizar_2.php'>";
            echo "<table align='center' border='0'>";
		while ($fila =mysqli_fetch_array($resultado))
		{
			echo "<tr>";
			echo "<center><h4 class='tex1'>Nombre:</h4><center>";
			echo"<input class='form-control' type='text' name='txtNombre' value='".$fila['nombre']."' autocomplete='off' required>";
			echo "</tr>";
			echo "<tr>";
			echo "<center><h4 class='tex1'>Especialidad:</h4><center>";
			echo "<input class='form-control' type = 'text' name = 'txtEspecialidad' value = '".$fila['especialidad']."' autocomplete='off' required>";
			echo "</tr>";
			echo "<tr>";
			echo "<center><input class='btn' type='hidden' name='txtTabla' value='".$tabla."''><center>";
			echo "<input class='btn' type='hidden' name='txtMatricula' value='".$matricula."''>";
			echo "<center><input class=' btn-primary' id='boton' type='submit' name='ENVIAR' value='CAMBIAR'><center>";
			echo "</tr>";
			echo "</form>";
			echo "</table>";
			echo "<a class='btn3' href='menu.php'><h3 align='center' >Volver</h3></a>";
			echo "</div>";
		
		
		}
	}

	else if($tabla == 'contactos') 
	{
		$id=$_GET['id'];

		$query="SELECT id, nombre, apellidos, direccion, telefono, email FROM contactos WHERE id='$id'";
		$resultado=mysqli_query($conexion,$query);
		
        echo "<div class='contac-formm'>";
        echo "<h1 align=center>Modificar registros de la tabla Contactos</h1><br>";
        echo "<h3 class='tex' align='center'>Ingresa los nuevos valores</h3><br>";
        echo "<form method='POST' action='actualizar_2.php'>";
        echo "<table align=center border='0'>";

        while ($fila =mysqli_fetch_array($resultado)) 
        {
        	echo "	<tr>
						<center><h4 class='tex1'>Nombre:</h4><center>
						<input class='form-control' type = 'text' name = 'txtNombre' value = '".$fila['nombre']."' autocomplete='off' required>
					</tr>";
			echo "	<tr>
						<center><h4 class='tex1' align='center'>Apellidos:</h4><center>
						<input class='form-control' type = 'text' name = 'txtApellidos' value = '".$fila['apellidos']."' autocomplete='off'  required>
					</tr>";
			echo "	<tr>
					<center><h4 class='tex1' align='center'>Dirección:</h4><center>
				     <input class='form-control' type = 'text' name = 'txtDireccion' value = '".$fila['direccion']."' autocomplete='off' required>
					</tr>";
			echo "	<tr>
						<center><h4 class='tex1' align='center'>Telefono:</h4><center>
						<input class='form-control' type = 'text' name = 'txtTelefono' value = '".$fila['telefono']."' autocomplete='off' required>
					</tr>";
			echo "	<tr>
						<center><h4 class='tex1'  align='center'>Email:</h4><center>
						<input class='form-control' type = 'text' name = 'txtEmail' value = '".$fila['email']."' autocomplete='off' required>
					</tr>";
			echo "	<tr>
			            <input type='hidden' name='txtTabla' value='".$tabla."''>
						<center><input  type='hidden' name='txtId' value='".$id."''><center>
						<center><input class='btn-primary' id='boton' type='submit' name='ENVIAR' value='CAMBIAR'><center>
					</tr>";
			echo "</form>";
			echo "</table>";
			echo "<a class='btn3' href='menu.php'><h3 align=center >Volver</h3></a>";
			echo "</div>";
			
			
        }	
	}

	else if($tabla == 'usuarios') 
	{
		$username = $_GET ['username'];

		$query="select username, password, privilegio from usuarios WHERE username='$username'";
        $resultado=mysqli_query($conexion,$query);

		echo "<div class='contacc-form'>";
        echo "<h1 align=center>Modificar registros de la tabla Usuarios</h1><br>";
        echo "<h3 class='tex' align='center'>Ingresa los nuevos valores</h3><br>";
        echo "<form method='POST' action='actualizar_2.php'>";
        echo "<table align=center>";

        while ($fila =mysqli_fetch_array($resultado)) 
        {
        	echo "<tr>";
			echo "<center><h4 class='tex1'>Usuario:</h4><center>";
			echo"<input class='form-control' type = 'text' name = 'txtUsuarioNuevo' value = '".$fila['username']."' autocomplete='off' required>";
			echo "</tr>";
			echo "<tr>";
			echo "<center><h4 class='tex1'>Contraseña:</h4><center> ";
			echo"<input class='form-control' type = 'text' name = 'txtPass' value = '".$fila['password']."' autocomplete='off' required>";
			echo "</tr>";
			echo "<tr>";
			echo "<center><h4 class='tex1'>Privilegio:</h4><center>";
			?>
					<center><select id="op" name='txtPriv' class="custom-select custom-select-lg mb-auto" required><center>
	                  <option <?php if ($fila['privilegio']=="admin") echo "selected";?> value="admin">Admin</option> 
	                  <option <?php if ($fila['privilegio']=="estandar") echo "selected";?> value="estandar">Estandar</option>
                 	</select>
              
            <?php
			echo "</tr>";
			echo "<tr>";
			echo "<input type='hidden' name='txtUsuarioViejo' value='".$username."'>";
			echo "<input type='hidden' name='txtTabla' value='".$tabla."''>";
			echo "<center><input class='btn-primary' id='boton' type='submit' name='ENVIAR' value='CAMBIAR'><center>";
			echo "</tr>";
			echo "</form>";
			echo "</table>";
			echo "<a class='btn3' href='menu.php'><h3 align=center >Volver</h3></a>";
        }	
	}
?>