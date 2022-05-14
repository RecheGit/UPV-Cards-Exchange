<?php
#Incluimos la base de datos en este archivo php
include("conexion.php");

//Si enviamos la variable eliminar se ejecuta lo siguiente
if(isset($_GET["id"]))
{
    $nombre = "";
    $equipo ="";
    $temporada = "";
    $nacionalidad = "";
    $goles = "";

    $id = $_GET["id"];
    #Consulta para conseguir los datos del cromo
    $consulta = "SELECT * FROM cromo WHERE ID = '$id'";
    $fin = mysqli_query($conexion, $consulta);
    if($fin)
    {
        $lista = mysqli_fetch_array($fin);
        $nombre = $lista["NOMBRE"];
        $equipo = $lista["EQUIPO"];
        $temporada = $lista["ANNO"];
        $nacionalidad = $lista["NACIONALIDAD"];
        $goles = $lista["GOLES"];
    }
    else
    {
        echo "No se ha podido editar";
    }
}

//PHP que se ejecuta cuando se le da al boton de editar
if(isset($_POST["boton_editar"]))
    {
        //Conservo el id Original por si se lo quiero cambiar
        $id_original = $id;
        $id = $_POST["id"];
        $nombre = $_POST["nombre"];
        $equipo = $_POST["equipo"];
        $temporada = $_POST["temporada"];
        $nacionalidad = $_POST["nacionalidad"];
        $goles = $_POST["goles"];

        #Consulta
        $consulta = "UPDATE cromo SET ID='$id', NOMBRE='$nombre', EQUIPO='$equipo', ANNO='$temporada', NACIONALIDAD='$nacionalidad', GOLES='$goles' WHERE ID='$id_original'";
        $fin = mysqli_query($conexion, $consulta);
        if($fin)
        {
            header("location: album.php");
        }
        else
        {
            //Si ya existe un ID igual sale una alerta
            echo "<script>alert('ID Repetido')</script>";
        }
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
      <h1>MODIFICA EL CROMO</h1>
      <h4>Modifica solo los que quieras cambiar</h4>
      <!-- Formulario con el metodo POST para enviar datos -->
      <form method = "post" id = "formulario">
        <!-- INPUT ID -->
        <label for="id">ID: 
            <?php
                echo $id;
            ?>
        </label>
        <input type="bien" placeholder="Introduzca ID" name = "id" maxlength="9" value= <?php echo $id; ?> required>
        
        <!-- INPUT NOMBRE -->
        <label for="nombre">Nombre: 
            <?php
                echo $nombre;
            ?>
        </label>
        <input type="bien" name = "nombre" placeholder="Introduzca el nombre del jugador *" maxlength="20" value= <?php echo $nombre; ?>>
        
        <!-- INPUT EQUIPO -->
        <label for="equipo">Equipo: 
            <?php
                echo $equipo;
            ?>
        </label>
        <input type="bien" name = "equipo" placeholder="Introduzca su equipo *" maxlength="20" value= <?php echo $equipo; ?> required>
        
        <!-- INPUT Temporada -->
        <label for="temporada">Temporada: 
            <?php
                echo $temporada;
            ?>
        </label>
        <input type="bien" name = "temporada" placeholder="Introduzca la temporada del cromo *" value= <?php echo $temporada; ?> maxlength="4" pattern = "([0-9][ -]*){4}" required >

        <!-- INPUT NACIONALIDAD -->
        <label for="nacionalidad">Nacionalidad: 
            <?php
                echo $nacionalidad;
            ?>
        </label>
        <input type="bien" name="nacionalidad" placeholder="Introduzca su nacionalidad *" maxlength="20" value= <?php echo $nacionalidad; ?> required>
        
        <!-- INPUT GOLES -->
        <label for="goles">Nº de goles: 
            <?php
                echo $goles;
            ?>
        </label>
        <input type="bien" name = "goles" placeholder="Introduzca numero de goles del cromo *" maxlength="11" value= <?php echo $goles; ?> pattern = "([0-9][ -]*){1}{2}{3}{4}" required>
        

        <input type="submit" name="boton_editar" value="Guardar Cambios">
      </form> 
    </div>
          <!-- BOTON PARA CERRAR SESION -->
          <a href="logout.php" class="btn-flotante">Cerrar Sesion</a>
  </div>

  <script src = "js/modificarCromo.js"></script>
</body>

<script src = "js/inactividad.js"></script>

</html>


