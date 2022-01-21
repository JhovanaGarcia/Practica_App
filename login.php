<?php
  session_start();
  if (isset($_SESSION)) {
    session_destroy();
  }
 

  if ($_SERVER["REQUEST_METHOD"] == "POST")
  {
    $us=$_POST['nombre'];
    $ps=$_POST['pass'];

    require_once("conectar_utd.php");

    $consulta="select username, password, privilegio from usuarios where username='$us' and password='$ps'";
    //ejecutar la consulta
    $query=mysqli_query($conexion,$consulta) or die("Error al ejecutar la consulta");
    
    if($columna=mysqli_fetch_array($query)) 
     {
       $priv=$columna['privilegio'];
     }

    if (mysqli_num_rows($query)>0)
    {
        session_start();
        $_SESSION['user']=$us;
        $_SESSION['pass']=$ps;
       
        

        if ($priv=="admin")
          $_SESSION['priv']="admin";
        else if($priv=="estandar")
          $_SESSION['priv']="estandar";
       
          echo "<script> alert('BIENVENIDO - Accediendo al Menú Principal...');
                         location.href='menu.php'; 
               </script> ";
        
          //header('Location: menu.php');
    }
    else
     {
       echo "<script>
              window.alert('Usuario y/o Contraseña incorrectas, por favor verifique ... ');
              window.location.href='login.php';
            </script> ";   
     }
     
  }
  
?>
<!DOCTYPE html>
<html>
  <head>
   <meta charset="utf-8"> 
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="./css/login.css">

   <title>LOGIN DE ACCESO</title>

  </head>
  <body>
  <div class="conta-form">
     <h3 align="center"> ACCESO AL SISTEMA </h3>
    <hr>
      <center>
        <img src="usua.png" width="25%" height="25%">
      </center>


        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <h2 align="center">Inserte los siguientes datos:</h2>      
              <input class="input" type="text" name="nombre" autocomplete="off" placeholder="Ingrese el Usuario..." required>
              <input class="input" type="password" name="pass" autocomplete="off" placeholder="Ingrese la Contraseña..." required>
              <center><input class="btn1"type="submit" name="btnBnviar" value="ENTRAR" ></center>
              <center><input class="btn" type="reset" name="btnBorrar" value="BORRAR" ></center><br>
             
        </form>
</div>
    
    
  </body>
</html>