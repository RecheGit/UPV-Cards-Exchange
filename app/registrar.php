<?php
    include_once 'iniciar_sesion.php';

#Incluimos la base de datos en este archivo php
include("conexion.php");
#Ya estamos conectados
if($conexion)
{
    #Si se ha pulsado el boton_registro
    if(isset($_POST["boton_registro"]))
    {
        #TODOS LOS CAMPOS DE REGISTRO SON OBLIGATORIOS menos nombre y apellidos
        #Tras las comprobaciones guardo las variables
        $dni = mysqli_real_escape_string($conexion, $_POST["dni"]);
        $nick = mysqli_real_escape_string($conexion, $_POST["usuario"]);
        $nombre = mysqli_real_escape_string($conexion, $_POST["nombre"]);
        $apellidos = mysqli_real_escape_string($conexion, $_POST["apellidos"]);
        $telefono = mysqli_real_escape_string($conexion, $_POST["telefono"]);
        $email = mysqli_real_escape_string($conexion, $_POST["email"]);
        $contrasena = mysqli_real_escape_string($conexion, $_POST["contrasena"]);
        $cuenta = mysqli_real_escape_string($conexion, $_POST["cuentaBanco"]);
		//quito espacios de la cuenta
        $cuenta = preg_replace('/\s+/', '', $cuenta);
        //cifro la contrasena
        $contrasena = password_hash($contrasena, PASSWORD_DEFAULT);
        //cifro la cuenta bancaria con nuestra clave kePaReChe2021Joel
		$claveCuentaBanco = "kePaReChe2021Joel";
		$cuenta = @openssl_encrypt($cuenta, "AES-256-CBC", $claveCuentaBanco);
		// para descifrar
		// openssl_decrypt(cuentaDelBancoCifrada, "AES-256-CBC", $claveCuentaBanco);
		
		
		
        $nacimiento = $_POST["nacimiento"];
        #Consulta
        $consulta = "INSERT INTO usuario (NICK, PASSWD, EMAIL, DNI, NOMBRE, APELLIDOS, TELEFONO, FECHANACIMIENTO, CUENTABANCO) VALUES ('$nick', '$contrasena', '$email', '$dni', '$nombre', '$apellidos', '$telefono', '$nacimiento', '$cuenta')";
        $fin = mysqli_query($conexion, $consulta);
        if($fin)
        {
            $_SESSION['usuario'] = $nick;
            if(headers_sent() === false)
            {
            header("location: index.php");
            }
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
