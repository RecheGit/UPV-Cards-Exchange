<?php

$usu = $_POST["usuario"];
$pass = $_POST["contrasena"];

if($usu === "" && $pass === "")
{
    //Como utilizamos fetch, el cual trabaja con .json, necesitamos utilizar formato json
    echo json_encode("!usupass");
}
else if($usu === "")
{
    echo json_encode("!usu");
}
else if($pass === "")
{
    echo json_encode("!pass");
}
else
{
    echo json_encode("Usuario:".$usu."<br>Password:".$pass );
}
