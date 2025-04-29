<?php
    require 'conexion.php';

    $usuario = $_POST['email'];
    $password = $_POST['password'];

    $query_1 = "SELECT email, COUNT(*) AS contar FROM Usuario WHERE email = '$usuario' AND password = '$password'";

    $consulta = mysqli_query($conexion, $query_1) or trigger_error("Error en la consulta MySQL: " + mysqli_error($conexion));

    $resultado = mysqli_fetch_array($consulta);

    if($resultado['contar']>0)
    {
        echo "El usuario existe en la BD<br>";
        echo $resultado['email'];
    }
    else
    {
        echo "El usuario no existe, o usuario  o contraseña incorrecta";
    }

?> 