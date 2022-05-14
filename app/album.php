<?php
    include_once "iniciar_sesion.php";
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
        <a href="anadirCromos.php">Añadir Cromos</a>
        </li>';       
        ?>
    </ul>
    </nav>
    <!-- BOTON PARA CERRAR SESION -->
    <a href="logout.php" class="btn-flotante">Cerrar Sesion</a>
<?php
    #Incluimos la base de datos en este archivo php
    include("conexion.php");
    #Ya estamos conectados
    if($conexion)
    {
        //Comprueba que la sesión es válida y el usuario no ha entrado por el enlace sin iniciar sesión
        if(isset($_SESSION['usuario']))
        {
            #Consulta
            $consulta = "SELECT * FROM cromo";
            $fin = mysqli_query($conexion, $consulta);
            
            ?>
            
            <div name=tabla align="center">
                <table class = table border = 4  style=text-align:center;background:black>
                    <tr>
                        <th style=color:white>ID</td>
                        <th style=color:white>Nombre</td>
                        <th style=color:white>Equipo</td>
                    </tr>
                    <tr>
                    <?php
                    //Compruebo que hay cromos
                    if(mysqli_num_rows($fin) > 0)
                    {
                        while ($lista = mysqli_fetch_assoc($fin))
                        {
                            //Creamos la fila
                            echo '<tr>';
                            echo "<td style=color:white>{$lista["ID"]}</td>";
                            echo "<td style=color:white>{$lista["NOMBRE"]}</td>";
                            echo "<td style=color:white>{$lista["EQUIPO"]}</td>";
                            //Boton editar
                            echo "<td style=color:white> <a href=editarCromo.php?id={$lista["ID"]} class='btn btn-info'> <button>Editar</button> </a></td>";
                            //Envio la variable eliminar que contiene el id a eliminar.php
                            //Boton Eliminar
                            echo "<td style=color:white> <button class='btn btn-danger' onclick = 'confirmacionBorrado({$lista["ID"]})'> Eliminar </button></td>";
                            echo '</tr>';
                            //=eliminarCromo.php?id={$lista["ID"]}
                        }
                    }
                    ?>
                    </tr>
                </table>
                <script>
                    //Funcion js para confirmar el borrado
                    function confirmacionBorrado(id)
                    {
                        if(confirm("¿Estás seguro de que quieres borrar el cromo?"))
                        {
                            window.location.href = "eliminarCromo.php?id=" + id + " ";
                            return true;
                        }
                        else
                        {
                            window.location.href = "album.php";
                            return false;
                        }
                    }
                </script>    
            </div>      
            <?php


        }
    }
    else
    {
        echo "Fallo al conectar con la BD";
    }
?>

</body>
<script src = "js/inactividad.js"></script>
</html>