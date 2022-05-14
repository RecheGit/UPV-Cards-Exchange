<?php
  include_once 'iniciar_sesion.php';
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
      </li>';
      echo '
      <li>
      <a href="modificarDatos.php">Modificar Datos</a>
      </li>';
      echo '
      <li>
      <a href="album.php">Album</a>
      </li>';
      ?>
  </ul>
  </nav>
  <div class="container">
    <div class="login-box" style=height:620px>
      <h1>Añade un nuevo cromo</h1>
      <!-- Formulario con el metodo POST para enviar datos -->
      <form method = "post" id = "formulario">

        <!-- INPUT NOMBRE -->
        <label for="nombre">Nombre</label>
        <input type="bien" name = "nombre" placeholder="Introduzca el nombre del jugador *" maxlength="20" required>
        
        <!-- INPUT EQUIPO -->
        <label for="equipo">Equipo</label>
        <input type="bien" name = "equipo" placeholder="Introduzca su equipo *" maxlength="20" required>
        
        <!-- INPUT ANNO -->
        <label for="anno">Temporada</label>
        <input type="bien" name = "anno" placeholder="Introduzca la temporada del cromo *" maxlength="4" pattern = "^[0-9]*$" required>
        
        <!-- INPUT NACIONALIDAD -->
        <label for="nacionalidad">Nacionalidad</label>
        <input type="bien" name="nacionalidad" placeholder="Introduzca su nacionalidad *" maxlength="20" required>
        
        <!-- INPUT GOLES -->
        <label for="goles">Nº de goles</label>
        <input type="bien" name = "goles" placeholder="Introduzca numero de goles del cromo *" maxlength="11" pattern = "^[0-9]*$" required>

        <input type="submit" name="boton_anadir" value="Añadir Cromo">

      </form>
    
    </div>
  </div>

  <script src = "js/anadirCromos.js"></script>
</body>
<?php
#Incluimos la base de datos en este archivo php
include("conexion.php");
#Ya estamos conectados
if($conexion)
{
    #Si se ha pulsado el boton
    if(isset($_POST["boton_anadir"]))
    {
        //Comprueba que la sesión es válida y el usuario no ha entrado por el enlace sin iniciar sesión
        if(isset($_SESSION['usuario']))
        {
            #Tras las comprobaciones guardo las variables
            $nombre = $_POST["nombre"];
            $equipo = $_POST["equipo"];
            $anno = $_POST["anno"];
            $nacionalidad = $_POST["nacionalidad"];
            $goles = $_POST["goles"];
            
            $nick_usuario = $_SESSION['usuario'];

            #Consulta
            $consulta = "INSERT INTO cromo(NOMBRE, EQUIPO, ANNO, NACIONALIDAD, GOLES, NICK_USUARIO) VALUES ('$nombre','$equipo','$anno','$nacionalidad','$goles','$nick_usuario')";
            $fin = mysqli_query($conexion, $consulta);

            if($fin)
            {
                echo 'alert("Se ha creado un nuevo cromo)';  
            }
            else
            {
                echo "Cromo repetido";
            }
        }
    }
}
else{
    echo "Fallo al conectar con la BD";
}


?>
    </div>
          <!-- BOTON PARA CERRAR SESION -->
          <a href="logout.php" class="btn-flotante">Cerrar Sesion</a>
  </div>
</body>
<script src = "js/inactividad.js"></script>
</html>

