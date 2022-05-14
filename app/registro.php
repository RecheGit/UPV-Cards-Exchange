<?php
  include("registrar.php");
?>  
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>UPV CARDS EXCHANGE-LOGIN</title>
  <link rel="stylesheet" href="registro.css">
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
                <a href="iniSesion.php">Inicia Sesión</a>
            </li>';
            ?>
        </ul>

    </nav>
  <div class="container">
    <div class="login-box">
      <h1>REGISTRATE</h1>
      <!-- Formulario con el metodo POST para enviar datos -->
      <form method = "post" id = "formulario">
        <!-- INPUT DNI -->
        <label for="dni">DNI *</label>
        <input type="bien" name = "dni" placeholder="Introduzca su DNI con mayuscula *" maxlength="9" required>
        
        <!-- INPUT USUARIO -->
        <label for="username">Usuario *</label>
        <input type="bien" name = "usuario" placeholder="Introduzca su nombre de usuario *" maxlength="20" required>
        
        <!-- INPUT NOMBRE -->
        <label for="nombre">Nombre Real (Opcional)</label>
        <input type="bien" name = "nombre" placeholder="Introduzca su nombre" maxlength="20">
        
        <!-- INPUT APELLIDOS -->
        <label for="apellidos">Apellidos (Opcional)</label>
        <input type="bien" name = "apellidos" placeholder="Introduzca sus apellidos" maxlength="20">
        
        <!-- INPUT TELEFONO -->
        <label for="telefono">Telefono *</label>
        <input type="tel" name="telefono" id = "tlf"  placeholder="Introduzca su telefono" maxlength="9" pattern = "([0-9][ -]*){9}" required>
        
        <!-- INPUT EMAIL -->
        <label for="email">Email *</label>
        <input type="email" name = "email" placeholder="Introduzca su e-mail *" maxlength="20" required>
        
        <!-- INPUT NACIMIENTO sólo admitirá fechas en formato dd-mm-aaaa (15-12-1999). -->
        <label for="nacimiento">FechaNacimiento *</label>
        <input type="date" name = "nacimiento" placeholder="Introduzca su nacimiento *" required>
        
        <!-- INPUT CONTRASEÑA -->
        <label for="password">Contraseña *</label>
        <input type="password" name = "contrasena" id = "contrasena" placeholder="Introduzca su contraseña *" maxlength="20" pattern = "^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{8,}$" required>
        
        <!-- INPUT COMPROBAR CONTRASENA -->
        <label for="password">Escribe otra vez la contraseña *</label>
        <input type="password" name = "contrasena2" id = "contrasena2" placeholder="Introduzca su contraseña *" maxlength="20" pattern = "^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{8,}$" required>
      
        <!-- INPUT CUENTABANCO -->
        <label for="cuentaBanco">Cuenta Bancaria (sin IBAN)*</label>
        <input type="bien" name = "cuentaBanco" placeholder="Introduzca su cuenta" pattern = "\d{20}" maxlength="20" required>
      
        <input type="submit" name="boton_registro">
        <a href="iniSesion.php">¿Ya tienes una cuenta?</a>
      </form>
    
    </div>
  </div>

  <script src = "js/registro.js"></script>
</body>
</html>
