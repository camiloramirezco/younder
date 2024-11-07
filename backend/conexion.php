<?php
    $servidor = "localhost";
    $usuario = "root";
    $clave ="";
    $bd = "younder";

    $conexion = mysqli_connect($servidor, $usuario, $clave) or die('No se encuentra el servidor');
    mysqli_select_db($conexion, $bd) or die('No se encontro base de datos');
    mysqli_set_charset($conexion,"utf8");

