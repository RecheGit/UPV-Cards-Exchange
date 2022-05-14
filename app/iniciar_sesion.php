<?php
session_start();
#Incluimos la base de datos en este archivo php
include_once("conexion.php");
//Comienzo la sesion

#Ya estamos conectados
//Funcion para comprobar si el usuario existe   
function existe_Usuario($usuario, $contrasena){
    global $conexion;
    //Creamos la consulta
    
    //$consulta = "SELECT * FROM usuario WHERE NICK = '$usuario' AND PASSWD = '$contrasena'";
    $consulta = "SELECT PASSWD FROM usuario WHERE NICK = '$usuario'";
    //La ejecutamos
    $fin = mysqli_query($conexion, $consulta);
    $hashAlmacenado = mysqli_fetch_assoc($fin);
    $hashAlmacenado = $hashAlmacenado["PASSWD"];
    
    //Compruebo que la contrasena es correcta
    if(password_verify($contrasena, $hashAlmacenado))
    {
        return true;
    }
    else
    {
        return false;
    }
/*
    //Si encuentra al usuario habrá una fila, si no no habrá filas
    if($fin->num_rows > 0){
        return true;
    }
    else{
        return false;
    }
*/
}
//Funcion para establecer el usuario
#Si se ha pulsado el boton_login y hay usuario y contrasena
if(isset($_POST["boton_login"]) && !empty($_POST["usuario"]) && !empty($_POST["contrasena"]))
{

    //$usuario_introducido = $_POST["usuario"];
    //$contrasena_introducida = $_POST["contrasena"];

    $usuario_introducido = mysqli_real_escape_string($conexion, $_POST["usuario"]);
    $contrasena_introducida = mysqli_real_escape_string($conexion, $_POST["contrasena"]);
    
    
    //Comprobamos que exista el usuario con esa contrasena
    if(!existe_Usuario($usuario_introducido, $contrasena_introducida))
    {
        //Guardo el intento como no exitoso
        $consulta = "INSERT INTO intentos(usuario, fecha, exitoso) VALUES('$usuario_introducido', NOW(), FALSE)";
        $fin = mysqli_query($conexion, $consulta);
        echo "El usuario no existe";
    }
    //Si el usuario existe
    else
    {
        if(isset($usuario_introducido))
        {
            //Guardo el intento como no exitoso
            $consulta = "INSERT INTO intentos(usuario, fecha, exitoso) VALUES('$usuario_introducido', NOW(), TRUE)";
            $fin = mysqli_query($conexion, $consulta);
            $_SESSION['usuario'] = $usuario_introducido;
            header("location: index.php");
        }
        
    }
}

?>
