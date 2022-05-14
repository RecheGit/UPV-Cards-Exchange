<?php
#Incluimos la base de datos en este archivo php
include("conexion.php");

//Si enviamos la variable eliminar se ejecuta lo siguiente
if(isset($_GET["id"]))
{
    $id = $_GET["id"];
    #Consulta
    $consulta = "DELETE FROM cromo WHERE ID = '$id'";
    $fin = mysqli_query($conexion, $consulta);
    if($fin)
    {
        header("location: album.php");
    }
    else
    {
        echo "No se ha podido borrar";
    }
}