<?php
    include_once('iniciar_sesion.php');
    include_once("conexion.php");
#Ya estamos conectados
if($conexion)
{
    #Si se ha pulsado el boton
    if(isset($_POST["boton_registro"]))
    {
        #Tras las comprobaciones guardo las variables
        $dni = mysqli_real_escape_string($conexion, $_POST["dni"]);
        $nick = mysqli_real_escape_string($conexion, $_POST["usuario"]);
        $nombre = mysqli_real_escape_string($conexion, $_POST["nombre"]);
        $apellidos = mysqli_real_escape_string($conexion, $_POST["apellidos"]);
        $telefono = mysqli_real_escape_string($conexion, $_POST["telefono"]);
        $email = mysqli_real_escape_string($conexion, $_POST["email"]);
        $nacimiento = $_POST["nacimiento"];
        $usuario = $_SESSION["usuario"];
        $cuenta = mysqli_real_escape_string($conexion, $_POST["cuentaBanco"]);
		//quito espacios de la cuenta
        $cuenta = preg_replace('/\s+/', '', $cuenta);
        //cifro la contrasena
        $contrasena = password_hash($contrasena, PASSWORD_DEFAULT);
        //cifro la cuenta bancaria con nuestra clave kePaReChe2021Joel
		$claveCuentaBanco = "kePaReChe2021Joel";
		$cuenta = @openssl_encrypt($cuenta, "AES-256-CBC", $claveCuentaBanco);
        #Consulta
        $consulta = "UPDATE usuario SET NICK='$nick',EMAIL='$email',DNI='$dni',NOMBRE='$nombre',APELLIDOS='$apellidos',TELEFONO='$telefono',FECHANACIMIENTO='$nacimiento',CUENTABANCO='$cuenta' WHERE NICK='$usuario'";

        $fin = mysqli_query($conexion, $consulta);
        if($fin)
        {
            $_SESSION['usuario'] = $nick;
            header("location: index.php");
        }
        else
        {
            echo "Usuario repetido";
        }
    }
    
}
else{
    echo "Fallo al conectar con la BD";
}


?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>UPV CARDS EXCHANGE-LOGIN</title>
  <link rel="stylesheet" href="registro.css">
</head>
<body>
    <?php
    //Si no esta logueado vuelve al index
    if(!isset($_SESSION['usuario']))
    {
        header("location: index.php");
    }
    //Si no, consigo los datos del usuario
    else
    {
        $usuario = $_SESSION['usuario'];
        $consulta= "SELECT *FROM usuario WHERE NICK = '$usuario'";

        $fin = mysqli_query($conexion, $consulta);
        $lista = mysqli_fetch_array($fin);
        //Ya tengo todos los datos del usuario en $lista
    }
    ?>
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
        <?php
            echo $lista['NICK'];
        ?>
    </header>
    <nav class="menu">

    <ul>
      <?php    
      echo '
      <li>
      <a href="index.php">Índice</a>
      </li>';
      echo '
      <li>
      <a href="album.php">Álbum</a>
      </li>';
      echo '
      <li>
      <a href="anadirCromos.php">Añadir Cromos</a>
      </li>';
      ?>
    </ul>
    </nav>    
  <div class="container">
    <div class="login-box" style= height:820px>
      <h1>MODIFICA TUS DATOS</h1>
      <h4>Modifica solo los que quieras cambiar</h4>
      <!-- Formulario con el metodo POST para enviar datos -->
      <form method = "post" id = "formulario">
        <!-- INPUT DNI -->
        <label for="dni">DNI: 
            <?php
                echo $lista["DNI"];
            ?>
        </label>
        <input type="bien" name = "dni" placeholder="Introduzca su DNI con mayuscula *" maxlength="9" value= <?php echo $lista["DNI"]; ?> required>
        
        <!-- INPUT USUARIO -->
        <label for="username">Usuario: 
            <?php
                echo $lista["NICK"];
            ?>
        </label>
        <input type="bien" name = "usuario" placeholder="Introduzca su nombre de usuario *" maxlength="20" value= <?php echo $lista["NICK"]; ?> required>
        
        <!-- INPUT NOMBRE -->
        <label for="nombre">Nombre Real: 
            <?php
                echo $lista["NOMBRE"];
            ?>
        </label>
        <input type="bien" name = "nombre" placeholder="Introduzca su nombre" maxlength="20" value= <?php echo $lista["NOMBRE"]; ?> >
        
        <!-- INPUT APELLIDOS -->
        <label for="apellidos">Apellidos: 
            <?php
                echo $lista["APELLIDOS"];
            ?>
        </label>
        <input type="bien" name = "apellidos" placeholder="Introduzca sus apellidos" maxlength="20" value= <?php echo $lista["APELLIDOS"]; ?>>
        
        <!-- INPUT TELEFONO -->
        <label for="telefono">Telefono: 
            <?php
                echo $lista["TELEFONO"];
            ?>
        </label>
        <input type="tel" name="telefono" id = "tlf"  placeholder="Introduzca su telefono" maxlength="9" pattern = "([0-9][ -]*){9}" value= <?php echo $lista["TELEFONO"]; ?> required>
        
        <!-- INPUT EMAIL -->
        <label for="email">Email: 
            <?php
                echo $lista["EMAIL"];
            ?>
        </label>
        <input type="email" name = "email" placeholder="Introduzca su e-mail *" maxlength="20" value= <?php echo $lista["EMAIL"]; ?> required>
        
        <!-- INPUT NACIMIENTO sólo admitirá fechas en formato dd-mm-aaaa (15-12-1999). -->
        <label for="nacimiento">FechaNacimiento: 
            <?php
                echo $lista["FECHANACIMIENTO"];
            ?>
        </label>
        <input type="date" name = "nacimiento" placeholder="Introduzca su nacimiento *" value= <?php echo $lista["FECHANACIMIENTO"]; ?> required>
    
        <!-- INPUT CUENTABANCO -->
        <label for="cuentaBanco">Cuenta del Banco: 
        <?php
            //La clave para desencriptar las cuentas bancarias es la siguiente
            $claveCuentaBanco = "kePaReChe2021Joel";

            echo openssl_decrypt($lista["CUENTABANCO"], "AES-256-CBC", $claveCuentaBanco);
        ?>
        </label>
                <!-- INPUT CUENTABANCO -->
        <label for="cuentaBanco">Cuenta Bancaria (sin IBAN)*</label>
        <input type="bien" name = "cuentaBanco" placeholder="Introduzca su cuenta" pattern = "\d{20}" maxlength="20" value =
        <?php 
            $claveCuentaBanco = "kePaReChe2021Joel";

            echo openssl_decrypt($lista["CUENTABANCO"], "AES-256-CBC", $claveCuentaBanco);
        ?> required>
        
        <input type="submit" name="boton_registro" value="Guardar cambios">
      </form> 

      
    </div>
          <!-- BOTON PARA CERRAR SESION -->
          <a href="logout.php" class="btn-flotante">Cerrar Sesion</a>
  </div>

  <script src = "js/modificarDatos.js"></script>
</body>

<script src = "js/inactividad.js"></script>

</html>

