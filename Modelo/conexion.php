<?php
    // script para crear una conexion con la BD

    // Parametros requeridos para la conexcion con la BD

    // Parametros BD local
    DEFINE('USER', 'root'); // Crea la constante USER con valor `root`
    DEFINE('PW', ''); 
    DEFINE('HOST', 'localhost');
    DEFINE('BD', 'Empresa');

    // Parametros BD remota (infinityfree)
    /*DEFINE('USER', 'if0_38542101'); // Crea la constante USER con valor `if0_38542101`
    DEFINE('PW', 'andres13072008'); 
    DEFINE('HOST', 'sql306.infinityfree.com');
    DEFINE('BD', 'if0_38542101_empresa');*/

    // Conexion con la BD
    $conexion = mysqli_connect(HOST, USER, PW, BD);

    // Establecer conjunto de caracteres para el hosting
    mysqli_set_charset($conexion, "utf8mb4");

    // Verificar la conexion con la BD
    if(!$conexion)
    {
        die("La conexion con la BD fallo: " + mysqli_error($conexion));
        exit();
    }
    /*else
    {
        die("Conexion a la BD exitosa!");
    }*/
?>