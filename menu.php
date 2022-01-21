<?php
  session_start();
  if (!isset($_SESSION['user'])) 
  {
		header("location: login.php");
	}
  else 
  {
    $us = $_SESSION['user'];
    $ps = $_SESSION['pass'];
    $priv = $_SESSION['priv'];
    
	}
       
?> 
    <!DOCTYPE html>
    <html>  
      <head>
        <meta charset="utf-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/menu.css">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
        <title>MENÚ</title>
      </head>
      <body>
      <header>
      <input type="checkbox" id="btn-menu">
      <label class="boton" for="btn-menu" ><span class="	fas fa-server"></span></label>

      <?php

      if ($priv == "admin")
      {
      	?>
      	<nav class="menu">
        
	    
	    <ul>
      		<li class="submenu"><a href="#">Alumnos<span class="	fas fa-arrow-circle-down"></span></a>
      			<ul>
      				<li>
      					<form action="acciones.php" method="post">
      						<center><input type="hidden" name="tabla" value="alumnos"><center>
      						<input type="hidden" name="operacion" value="altas">
      							<input type="submit" name="btnEnviar" value="Alta"></li>
      					</form>
      				<li>
      					<form action="acciones.php" method="post">
      						<center><input type="hidden" name="tabla" value="alumnos"><center>
      						<input type="hidden" name="operacion" value="bajas">
      							<input type="submit" name="btnEnviar" value="Baja"></li>
      					</form>
      				<li>
      					<form action="acciones.php" method="post">
      						<center><input type="hidden" name="tabla" value="alumnos"><center>
      						<input type="hidden" name="operacion" value="consulta">
      							<input type="submit" name="btnEnviar" value="Consulta"></li>
      					</form>
      				<li>
      					<form action="acciones.php" method="post">
      						<center><input type="hidden" name="tabla" value="alumnos"><center>
      						<input type="hidden" name="operacion" value="modificacion">
      							<input type="submit" name="btnEnviar" value="Modificación"></li>
      					</form>
      			</ul>
      		</li>

      		<li class="submenu"><a href="#">Contactos<span class="	fas fa-arrow-circle-down"></span></a>
      			<ul>
      				<li>
      					<form action="acciones.php" method="post">
      						<input type="hidden" name="tabla" value="contactos">
      						<input type="hidden" name="operacion" value="altas">
      							<input type="submit" name="btnEnviar" value="Alta"></li>
      					</form>
      				<li>
      					<form action="acciones.php" method="post">
      						<input type="hidden" name="tabla" value="contactos">
      						<input type="hidden" name="operacion" value="bajas">
      							<input type="submit" name="btnEnviar" value="Baja"></li>
      					</form>
      				<li>
      					<form action="acciones.php" method="post">
      						<input type="hidden" name="tabla" value="contactos">
      						<input type="hidden" name="operacion" value="consulta">
      							<input type="submit" name="btnEnviar" value="Consulta"></li>
      					</form>
      				<li>
      					<form action="acciones.php" method="post">
      						<input type="hidden" name="tabla" value="contactos">
      						<input type="hidden" name="operacion" value="modificacion">
      							<input type="submit" name="btnEnviar" value="Modificación"></li>
      					</form>
      			</ul>
	    	</li>

      		<li class="submenu"><a href="#">Usuarios<span class="	fas fa-arrow-circle-down"></span></a>
      			<ul>
      				<li>
      					<form action="acciones.php" method="post">
      						<input type="hidden" name="tabla" value="usuarios">
      						<input type="hidden" name="operacion" value="altas">
      							<input type="submit" name="btnEnviar" value="Alta"></li>
      					</form>
      				<li>
      					<form action="acciones.php" method="post">
      						<input type="hidden" name="tabla" value="usuarios">
      						<input type="hidden" name="operacion" value="bajas">
      							<input type="submit" name="btnEnviar" value="Baja"></li>
      					</form>
      				<li>
      					<form action="acciones.php" method="post">
      						<input type="hidden" name="tabla" value="usuarios">
      						<input type="hidden" name="operacion" value="consulta">
      							<input type="submit" name="btnEnviar" value="Consulta"></li>
      					</form>
      				<li>
      					<form action="acciones.php" method="post">
      						<input type="hidden" name="tabla" value="usuarios">
      						<input type="hidden" name="operacion" value="modificacion">
      							<input type="submit" name="btnEnviar" value="Modificación"></li>
      					</form>
      			</ul>
      		</li>

      		<li class="submenu"><a href="login.php">Cerrar Sesión	<span class="fas fa-window-close"></span></a></li>
      	</ul>

		</form>
      	</nav>
      <?php
      }

      else if ($priv == "estandar")
      {
        ?>
        <nav class="menu">
        
      
      <ul>
          <li class="submenu"><a href="#">Alumnos<span class="  fas fa-arrow-circle-down"></span></a>
            <ul>
              
              <li>
                <form action="acciones.php" method="post">
                  <input type="hidden" name="tabla" value="alumnos">
                  <input type="hidden" name="operacion" value="consulta">
                    <input type="submit" name="btnEnviar" value="Consulta"></li>
                </form>
              
            </ul>
          </li>

          <li class="submenu"><a href="#">Contactos<span class="  fas fa-arrow-circle-down"></span></a>
            <ul>
               
              <li>
                <form action="acciones.php" method="post">
                  <input type="hidden" name="tabla" value="contactos">
                  <input type="hidden" name="operacion" value="consulta">
                    <input type="submit" name="btnEnviar" value="Consulta"></li>
                </form>
              
            </ul>
        </li>

          <li class="submenu"><a href="#">Usuarios<span class=" fas fa-arrow-circle-down"></span></a>
            <ul>
              
              <li>
                <form action="acciones.php" method="post">
                  <input type="hidden" name="tabla" value="usuarios">
                  <input type="hidden" name="operacion" value="consulta">
                    <input type="submit" name="btnEnviar" value="Consulta"></li>
                </form>
              
            </ul>
          </li>

          <li class="submenu"><a href="login.php">Cerrar Sesión <span class="fas fa-window-close"></span></a></li>
        </ul>

    </form>
        </nav>
      <?php
      }
      ?>
      <!--
      <nav class="menu">
      <ul>
      <li class="submenu"><a href="#">Alumnos<span class="	fas fa-arrow-circle-down"></span></a>
      <ul>
      <li><a href="#">Alta</a></li>
      <li><a href="#">Baja</a></li>
      <li><a href="#">Consulta</a></li>
      <li><a href="#">Modificaciòn</a></li>
      </ul>
      </li>


      <li class="submenu"><a href="#">Contactos<span class="	fas fa-arrow-circle-down"></span></a>
      <ul>
      <li><a href="#">Alta</a></li>
      <li><a href="#">Baja</a></li>
      <li><a href="#">Consulta</a></li>
      <li><a href="#">Modificaciòn</a></li>
      </ul>
      </li>

      <li class="submenu"><a href="#">Usuarios<span class="	fas fa-arrow-circle-down"></span></a>
      <ul>
      <li><a href="#">Alta</a></li>
      <li><a href="#">Baja</a></li>
      <li><a href="#">Consulta</a></li>
      <li><a href="#">Modificaciòn</a></li>
      </ul>
      </li>

      <li class="submenu"><a href="login.php">Cerrar Sesion	<span class="fas fa-window-close"></span></a></li>
      </ul>

      </nav>
      -->
      </header>

      <center><h1 class="tex">BIENVENIDO<br><?php echo "" . $us; ?></h1></center>
      <script src="./js/menu.js"></script>
      </body>
   </html> 


   
  
       
