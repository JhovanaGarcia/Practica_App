<!DOCTYPE html>
<html>
<head>
<title>Consultas</title>
<meta charset="utf-8"> 
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/consultas.css">
</head>
<body>
<?php
  session_start();
  //Si detecta que no hay un usuario manda a login.php
	if (!isset($_SESSION['user'])) {
		header("location: login.php");
	}
	else {
		$us=$_SESSION['user'];
		$priv=$_SESSION['priv'];
  }
  
  require_once("conectar_utd.php");

  
  //Detecta si va a ver una operación o una tabla ya definida y si no manda a menu.php
  $operacion = $_POST['operacion'];
  $tabla = $_POST['tabla'];
/*
  if ($operacion != 'altas' || $operacion != 'bajas' || $operacion != 'consulta' || $operacion != 'modificacion' && $tabla |= 'alumnos' || $tabla |= 'contactos' || $tabla |= 'usuarios')
  {
    header("location: menu.php");
  }
*/
  if (!$conexion)
  	die("Fallo la conexion verifique ".mysqli_connect_error());
  else if ($operacion == 'consulta') 
   {
        if ($tabla == 'alumnos')
        {          
          $consulta = mysqli_query($conexion, "select matricula, nombre, especialidad from alumnos") or die ("Problemas al consultar la tabla alumnos: " .mysqli_error($conexion));
          
          echo "<h3 class='tex' align=center> Registros de la Tabla ALUMNOS</h3>";
          echo "<div class='table-container'>";
          echo "<table class='table'>";
          echo "<thead>
                  <th class='table_head' align='center'><b>Matricula</b></th>
                  <th class='table_head' align='center'><b>Nombre</b></th>
                  <th class='table_head' align='center'><b>Especialidad</b></th>
                </thead>"; 
          while ($registros=mysqli_fetch_array($consulta))
          { 
              echo "<tr>";
               
              echo  "<td>" . $registros['matricula'] . "</td>";
              echo  "<td>" . $registros['nombre'] . "</td>";
              echo  "<td>" . $registros['especialidad'] . "</td";

              echo "</tr>";
          }
			
		  echo "</table>";
      

          $numregistros2 = 0;
          $consultanumreg = mysqli_query($conexion, "select matricula from alumnos") or die ("Problemas al consultar la tabla alumnos: " .mysqli_error($conexion));

          while ($registros2 = mysqli_fetch_array($consultanumreg))
          { 
              $numregistros2 = $numregistros2 + 1;
          }

          echo "<h3 align=center> La cantidad de registros encontrados es: $numregistros2 </h3>";
          echo "<h3 align='center'>
                  <center><button type='button' id='btn11'><a id='btn11' href='reportes_alumnos.php' target='_blank' title='Reportes de Alumnos'> Generar reporte en (.pdf) </a></button><center>
                  <center><button type='button' id='btn1'><a id='btn1' href='./menu.php'>Volver</a></button><center>
                  <center><a class='btn3' href='login.php'>Cerrar Sesion</a></center>
                </h3>";

          //echo "</body>";
        }
        else if ($tabla=='contactos')
        {
          $consulta = mysqli_query($conexion, "select id, nombre, apellidos, direccion, telefono, email from contactos");

          echo "<br><h3 class='tex' align=center> Registros de la Tabla CONTACTOS</h3>";
          echo "<table class='table'>";
          echo "<thead>
                  <th class='table_head'><b>Id</b></th>
                  <th class='table_head'><b>Nombre(s)</b></th>
                  <th class='table_head'><b>Apellidos</b></th>
                  <th class='table_head'><b>Direccion</b></th>
                  <th class='table_head'><b>Telefono</b></th>
                  <th class='table_head'><b>Email</b></th>
                </thead>
                  ";
          while ($registros = mysqli_fetch_array($consulta))
          { 
              echo "<tr>
                  <td align='center'>" . $registros['id'] . "</td>
                  <td align='center'>" . $registros['nombre'] . "</td>
                  <td align='center'>" . $registros['apellidos'] . "</td>
                  <td align='center'>" . $registros['direccion'] . "</td>
                  <td align='center'>" . $registros['telefono'] . "</td>
                  <td align='center'>" . $registros['email'] . "</td>
                </tr>";
          }
          echo "</table>";
         
          $numregistros=mysqli_num_rows($consulta);
          echo "<h3 align=center> La cantidad de registros encontrados es: $numregistros</h3>";
          echo "<h3 align='center'>
          <center><button type='button' id='btn11'><a id='btn11' href='reportes_alumnos.php' target='_blank' title='Reportes de Alumnos'> Generar reporte en (.pdf) </a></button><center>
          <center><button type='button' id='btn1'><a id='btn1' href='./menu.php'>Volver</a></button><center>
          <center><a class='btn3' href='login.php'>Cerrar Sesion</a></center>
                </h3>";
          echo "</body>";
        }

        else if ($tabla=='usuarios')
        {
          $consulta = mysqli_query($conexion, "select username, privilegio from usuarios");

          echo "<br><h3 class='tex'align=center> Registros de la Tabla USUARIOS</h3>";
          echo "<table class='table'>";
          echo "<thead>
                  <th class='table_head' align='center'><b>Usuario</b></th>
                  <th class='table_head' align='center'><b>Privilegio</b></th>
                </thead>";
          while ($registros=mysqli_fetch_array($consulta))
          { 
              echo "<tr>
                  <td align='center'>".$registros['username']."</td>
                  <td align='center'>".$registros['privilegio']."</td>
                </tr>";
          }

          echo "</table>";
          
          $numregistros = mysqli_num_rows($consulta);
          echo "<h3 align=center> La cantidad de registros encontrados es: $numregistros</h3>";
          echo "<h3 align='center'>
          <center><button type='button' id='btn11'><a id='btn11' href='reportes_alumnos.php' target='_blank' title='Reportes de Alumnos'> Generar reporte en (.pdf) </a></button><center>
          <center><button type='button' id='btn1'><a id='btn1' href='./menu.php'>Volver</a></button><center>
          <center><a class='btn3' href='login.php'>Cerrar Sesion</a></center>
                </h3>";
          echo "</body>";
        }

   }

  else if ($operacion=='altas') 
    {
      if ($tabla=='alumnos')
      {?>
      <!DOCTYPE html>
      <html>
        <head>
        <meta charset='utf-8'>
        <link rel="stylesheet" href="./css/acciones.css">
          <title>Registro alumno</title>
        </head>
        <body>
        <div class="conta-form">

          <h1 align="center">Registro nuevo alumno</h1>
          
          <form method="post" action="insertar.php">
            <table align="center">
              <tr>
               <center> <h4 class="tex">Matricula:</h4><center>
              <input class="input" type="text" placeholder="Ingrese la Matricula..." name="txtMatricula" autocomplete="off" required>
              </tr>
              <tr>
               <center> <h4 class="tex">Nombre:</h4><center>
                <input class="input" type="text" placeholder="Ingrese el Nombre..." name="txtNombre" autocomplete="off" required>
              </tr>
              <tr>
               <center> <h4 class="tex">Especialidad:</h4><center>
                <input class="input" type="text" placeholder="Ingrese la Especialidad..." name="txtEspecialidad" autocomplete="off" required>
              </tr>
             
                <center ><input class="btn" type="submit" name="txtEnviar" value="Enviar">
                <input class="btn" type="reset" name="txtBorrar" value="Borrar"></center>
               
           <center><button type="button" class="btn"><a class="btn" href="./menu.php">Volver</a></button><center>
                
           <center><a class="btn3" href="login.php">Cerrar Sesion</a></center>

            </table>
            <input type="hidden" name="txtTabla" value="<?php echo $tabla; ?>">
          </form>
      </div>
          
        </body>
        </html>
        <?php
      }

      else if ($tabla=='contactos') 
      {?>
      <!DOCTYPE html>
      <html>
        <head>
          <meta charset="utf-8">
          <link rel="stylesheet" href="./css/acciones1.css">
          <title>Registro Contacto</title>
        </head>
        <body>
          <div class="conta-form">
          <h1 align="center">Registro contacto</h1>
          
          <form method="post" action="insertar.php">
            <table align="center" border="0" width="20%">
              <tr>
                <center><h4 class="tex">Nombre:</h4><center>
                <input class="input"type="text" placeholder="Ingrese el Nombre..." name="txtNombre" autocomplete="off" required>
              </tr>
              <tr>
                <center><h4 class="tex">Apellidos:</h4><center>
                <input class="input" type="text" placeholder="Ingrese los Apellidos..." name="txtApellidos" autocomplete="off" required>
              </tr>
              <tr>
                <center><h4 class="tex"> Email:</h4><center>
              <input class="input" type="email" placeholder="Ingrese un Email..." name="txtEmail" autocomplete="off" required>
              </tr>
              <tr>
                <center><h4 class="tex"> Direccion:</h4><center>
                <input class="input" type="text" placeholder="Ingrese la Dirección..." name="txtDireccion" autocomplete="off" required>
              </tr>
              <tr>
                <center><h4 class="tex">Telefono:</h4><center>
                <input class="input" type="tel" placeholder="Ingrese un Teléfono..." name="txtTelefono" autocomplete="off" minlength="10" maxlength="10" required>
              </tr>
              <tr>
                <center><input class="btn" type="submit" value="Enviar">
                <input class="btn" type="reset" value="Borrar"></center>
              </tr>
              <center><button type="button" class="btn"><a class="btn" href="./menu.php">Volver</a></button><center>
              <center><a class="btn3" href="login.php">Cerrar Sesion</a></center>
            </table>
            <input type="hidden" name="txtTabla" value="<?php echo $tabla; ?>">
          </form>
      </div>
        </body>
      <?php
      }
      else if ($tabla=='usuarios') 
      {?>
       <!DOCTYPE html>
      <html>
        <head>
          <meta charset="utf-8">
          <link rel="stylesheet" href="./css/acciones2.css">
        
        <title>Registro Usuario</title>
      </head>
      <body>
      <div class="conta-form">
      <h1 align="center">Registro usuario</h1>
        <
        <form method="post" action="insertar.php">
          <table align="center" border="0">
            <tr>
              <center><h4 class="tex">Usuario:</h4><center>
              <input class="input" type="text" placeholder="Ingrese el usuario..." name="txtUsuario" autocomplete="off" required>
            </tr>
            <tr>
              <center><h4 class="tex">Contraseña:<h4><center>
              <input class="input" type="password" placeholder="Ingrese la contraseña..." name="txtPass" autocomplete="off" required>
            </tr>
            <tr>
              <center><h4 class="tex">Privilegio:</h4><center>
              
               <center> <select class="op" name="txtPriv" required></center>
                  <option value="admin">Admin</option> 
                  <option value="estandar">Estandar</option> 
                </select>
              
            </tr>
            <tr>
             <center><input class="btn" type="submit" value="Enviar">
             <input class="btn" type="reset" value="Borrar"></center>
             
              <center><button type="button" class="btn"><a class="btn" href="./menu.php">Volver</a></button><center>
              <center><a class="btn3" href="login.php">Cerrar Sesion</a></center>
            </tr>


            
          </table>
          <input type="hidden" name="txtTabla" value="<?php echo $tabla; ?>">
        </form>
      </div>
      </body>
      <?php
      }
    }
   


  else if ($operacion=='bajas') 
        {
          if ($tabla=='alumnos') 
          {
           
            $consulta="select matricula,nombre, especialidad from alumnos";
            $query=mysqli_query($conexion,$consulta);  


            echo "<h3 class='tex' align=center>Eliminar registros de la tabla alumnos</h3>";
            echo "<p align='center'>Selecciona el registro que deseas eliminar</p>";
            echo "<table class='table'>";
            echo "<thead>";
            echo "<th class='table_head'>Matricula</th>";
            echo "<th class='table_head'>Nombre</th>";
            echo "<th class='table_head'>Especialidad</th>";
            echo "<th class='table_head'>Accion</th>";
            echo "</thead>";
            while ($columna=mysqli_fetch_array($query)) 
            {
              echo "<tr>";
              echo "<td>".$columna['matricula'] . "</td><td>" . $columna['nombre'] . "</td><td>" . $columna['especialidad'] . "</td>";
              echo "<td><a class='btn' href = eliminar.php?matricula=".$columna['matricula']."&tabla=".$tabla.">Eliminar</a></td>";
              echo "</tr>";
            }
            echo "</table>";
            $numregistros=mysqli_num_rows($query);
            echo "<h3 align=center> La cantidad de registros encontrados es: $numregistros</h3>
            <center><button type='button' id='btn1'><a id='btn1' href='./menu.php'>Volver</a></button><center>
            <center><a class='btn3' href='login.php'>Cerrar Sesion</a></center>"
            ;
          }

          else if ($tabla=='contactos') 
          {
            $consulta="select id, nombre, apellidos, direccion, telefono, email from contactos";
            $query=mysqli_query($conexion,$consulta); 

            echo "<br><h3 class='tex' align=center>Eliminar registros de la tabla contactos</h3>";
            echo "<p align='center'>Selecciona al contacto que deseas eliminar</p>";
            echo "<table class='table'>";
            echo "<thead>";
            echo "<th class='table_head'>Nombre</th>";
            echo "<th class='table_head'>Apellidos</th>";
            echo "<th class='table_head'>Dirección</th>";
            echo "<th class='table_head'>Teléfono</th>";
            echo "<th class='table_head'>Email</th>";
            echo "<th class='table_head'>Accion</th>";
            echo "</thead>";

            while ($columna=mysqli_fetch_array($query))
            {
              echo "<thead>";
              echo "<td>".$columna['nombre']."</td><td>" . $columna['apellidos'] . "</td><td>" . $columna['direccion'] . "</td><td>".$columna['telefono']."</td><td>".$columna['email']."</td>";
              echo "<td><a class='btn' href = eliminar.php?id=".$columna['id']."&tabla=".$tabla.">Eliminar</a></td>";
              echo "</tr>";
            }
            echo "</table>";
            $numregistros=mysqli_num_rows($query);
            echo "<h3 class='tex5' align=center> La cantidad de registros encontrados es: $numregistros</h3>
            <center><button type='button' id='btn1'><a id='btn1' href='./menu.php'>Volver</a></button><center>
            <center><a class='btn3' href='login.php'>Cerrar Sesion</a></center>
            ";
          }

          else if ($tabla=='usuarios') 
          {
            $consulta = mysqli_query($conexion, "select username, password, privilegio from usuarios");

            echo "<h3 class='tex' align=center>Eliminar registros de la tabla usuarios</h3>";
            echo "<p align='center'>Selecciona el registro que deseas eliminar</p>";
            echo "<table class='table'>";
            echo "<thead>
                    <th class='table_head'>Nombre</th>
                    <th class='table_head'>Contraseña</th>
                    <th class='table_head'>Privilegio</th>
                    <th class='table_head'>Accion</th>
                  </thead>";
            while ($columna=mysqli_fetch_array($consulta)) 
            {
              echo "<tr>
                    <td>".$columna['username'] ."</td>
                    <td readonly>". $columna['password'] . "</td>
                    <td>" . $columna['privilegio'] . "</td>
                    <td><a class='btn' href = eliminar.php?username=".$columna['username']."&tabla=".$tabla.">Eliminar</a></td>
                    </tr>";
            }
            echo "</table>";
            $numregistros=mysqli_num_rows($consulta);
            echo "<h3 align=center> La cantidad de registros encontrados es: $numregistros</h3>
            <center><button type='button' id='btn1'><a id='btn1' href='./menu.php'>Volver</a></button><center>
            <center><a class='btn3' href='login.php'>Cerrar Sesion</a></center>
            ";
          }
        }

  else if ($operacion=='modificacion') 
        {
        	if ($tabla=='alumnos') 
          {
            $consulta="select matricula,nombre, especialidad from alumnos";
            $query=mysqli_query($conexion,$consulta);  

            echo "<h3 class='tex' align=center>Modificar registros de la tabla alumnos</h3>";
            echo "<p align='center'>Selecciona el registro que deseas modificar</p>";
            echo "<table class='table'>";
            echo "<thead>";
            echo "<th class='table_head'>Matricula</th>";
            echo "<th class='table_head'>Nombre</th>";
            echo "<th class='table_head'>Especialidad</th>";
            echo "<th class='table_head'>Acción</th>";
            echo "</thead>";
            while ($columna=mysqli_fetch_array($query)) 
            {
              echo "<tr>";
              echo "<td>".$columna['matricula'] ."</td><td>".$columna['nombre']."</td><td>".$columna['especialidad']."</td>";
              echo "<td><a class='btn' href = actualizar.php?matricula=".$columna['matricula']."&tabla=".$tabla.">Modificar</a></td>";
              echo "</tr>";
            }
            echo "</table>";
            $numregistros=mysqli_num_rows($query);
            echo "<h3 align=center> La cantidad de registros encontrados es: $numregistros</h3>
            <center><button type='button' id='btn1'><a id='btn1' href='./menu.php'>Volver</a></button><center>
            <center><a class='btn3' href='login.php'>Cerrar Sesion</a></center>
            ";
          }

          else if ($tabla == 'contactos') 
          {
            $consulta = mysqli_query($conexion, "select id, nombre, apellidos, direccion, telefono, email from contactos");

            echo "<h3 class='tex' align=center>Modificar registros de la tabla contactos</h3>";
            echo "<p align='center'>Selecciona el contacto que deseas modificar</p>";
            echo "<table class='table'>";
            echo "<thead>
            
            <th class='table_head'>Nombre</th>
            <th class='table_head'>Apellidos</th>
            <th class='table_head'>Dirección</th>
            <th class='table_head'>Telefono</th>
            <th class='table_head'>Email</th>
            <th class='table_head'>Acción</th>
                  </tr>";

            while ($columna=mysqli_fetch_array($consulta))
            {
              echo "<tr>";
              echo "<td>".$columna['nombre']."</td><td>" . $columna['apellidos'] . "</td><td>" . $columna['direccion'] . "</td><td>".$columna['telefono']."</td><td>".$columna['email']."</td>";
              echo "<td><a class='btn' href = actualizar.php?id=".$columna['id']."&tabla=".$tabla.">Modificar</a></td>";
              echo "</tr>";
            }
            echo "</table>";
            $numregistros=mysqli_num_rows($consulta);
            echo "<h3 align=center> La cantidad de registros encontrados es: $numregistros</h3>
            <center><button type='button' id='btn1'><a id='btn1' href='./menu.php'>Volver</a></button><center>
            <center><a class='btn3' href='login.php'>Cerrar Sesion</a></center>
            ";
        }
    

          else if ($tabla=='usuarios') 
          {
            $consulta = mysqli_query($conexion, "select username, password, privilegio from usuarios");

            echo "<h3 class='tex' align=center>Modificar registros de la tabla usuarios</h3>";
            echo "<p align='center'>Selecciona el usuario que deseas modificar</p>";
            echo "<table class='table'>";
            echo "<thead>";
            echo "<th class='table_head'>Nombre</th>";
            echo "<th class='table_head'>Contraseña</th>";
            echo "<th class='table_head'>Privilegio</th>";
            echo "<th class='table_head'>Acción</th>";
            echo "</thead>";
            while ($columna = mysqli_fetch_array($consulta)) 
            {
              echo "<tr>";
              echo "<td>".$columna['username'] ."</td><td readonly>". $columna['password'] . "</td><td>" . $columna['privilegio'] . "</td>";
              echo "<td><a class='btn' href = actualizar.php?username=".$columna['username']."&tabla=".$tabla.">Modificar</a></td>";
              echo "</tr>";
            }
            echo "</table>";
            $numregistros=mysqli_num_rows($consulta);
            echo "<h3 align=center> La cantidad de registros encontrados es: $numregistros</h3>
            <center><button type='button' id='btn1'><a id='btn1' href='./menu.php'>Volver</a></button><center>
            <center><a class='btn3' href='login.php'>Cerrar Sesion</a></center>
            ";
          }
        }
        
        

        
   
?>

</body>
</html>