<?php

//Recuperamos la sesion
require 'iniciar_sesion.php';

//Acabamos la sesion
session_destroy();

header("location: index.php");
?>