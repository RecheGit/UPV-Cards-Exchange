<?php
include_once 'iniciar_sesion.php';
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>UPV CARDS EXCHANGE-LOGIN</title>
    <link rel="stylesheet" href="iniSesion.css">
  </head>
  <body>
    <header class="cabecera">
      <ul>
          <li>
              <div class="imagen_logo">
                  <img src="Proyecto_images/laliga.png">
                  
              </div>
          </li>
          <li>
              <div class= "TituloPrincipal">
                  <em><h1>UPV CARDS EXCHANGE</h1></em>
              </div>  
          </li>
      </ul>
        
  </header>
  <nav class="menu">

        <ul>
            <?php  
            
            echo '
            <li>
            <a href="index.php">Índice</a>
            </li>
            <li>
                <a href="registro.php">Registrate</a>
            </li>';
            ?>
        </ul>

  </nav>

    
    <div class="container">
        <div class="login-box">
          <h1>Inicia Sesión</h1>
          <form method= "post" id="formulario">
            <!-- INPUT USUARIO -->
            <label for="username">Usuario</label>
            <input type="text" name = "usuario" placeholder="Introduzca su nombre de usuario" required>
            <!-- INPUT CONTRASEÑA -->
            <label for="password">Contraseña</label>
            <input type="password" name = "contrasena" placeholder="Introduzca su contraseña" required>
            <!-- BOTON PARA ACEPTAR -->
            <input type="submit" name = "boton_login" value="Log In">
            <a href="registro.php">¿No has creado una cuenta?</a>
          </form>
                 
        </div>

    </div>
    <script src="js/iniSesion.js"></script>
  </body>
</html>

