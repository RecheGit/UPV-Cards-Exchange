<?php
include_once "iniciar_sesion.php";
?>

<!DOCTYPE html>

<html lang="es">

<head>
    <meta charset="UTF-8" />
    <title>UPV CARDS EXCHANGE</title>
    <link rel="stylesheet" href="index.css" />

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
        <?php
            if(isset($_SESSION['usuario']))
            {
            $usuario = $_SESSION['usuario'];
            $consulta= "SELECT *FROM usuario WHERE NICK = '$usuario'";

            $fin = mysqli_query($conexion, $consulta);
            $lista = mysqli_fetch_array($fin);
            echo $lista['NICK'];
            }
        ?>
          
    </header>

    <nav class="menu">

        <ul>
            <?php    
            if(!isset($usuario))
            {
            echo '
            <li>
                <a href="iniSesion.php">Inicia Sesión</a>
            </li>

            <li>
                <a href="registro.php">Registrate</a>
            </li>';
            }
            else
            {
                echo '
                <li>
                <a href="modificarDatos.php">Modificar Datos</a>
                </li>';
                echo '
                <li>
                <a href="album.php">Álbum</a>
                </li>';
                echo '
                <li>
                <a href="anadirCromos.php">Añadir Cromos</a>
                </li>';
                echo '
                <li>
                <a href="logout.php">Cierra Sesión</a>
                </li>';
            }
            ?>
        </ul>

    </nav>
    <article class="medio">
        <p><h1>¡BIENVENIDO AL MAYOR EXCHANGE</h1></p>
        <p><h1> DE CROMOS ONLINE!</h1></p>
    </article>

</body>

<script src = "js/inactividad.js"></script>


</html>
