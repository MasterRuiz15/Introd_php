<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
?>

<?php
    require 'modelo/conexion.php';

    session_start();

    if(isset($_SESSION['username']))
    {
        $nombre_usuario = $_SESSION['username'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar empleado</title>
</head>
<body>
    <h1>Registrar Empleado</h1>
    <?php
        echo 'Usuario: '.$nombre_usuario;
    ?>
    <!--Formulario de registro de un empleado-->
    <form action="modelo/reg_empleado.php" method = "post">
        <h2>Empleado</h2>
        <label for="">Código:</label> 
        <input type="text" name="id_empleado" id="" required>
        <br><br>
        <label for="">Nombre:</label> 
        <input type="text" name="nombre_empleado" id="" required>
        <br><br>
        <label for="">Apellidos:</label> 
        <input type="text" name="apellidos_empleado" id="" required>
        <br><br>
        <label for="">Departamento:</label>
        <!--Mostrar listado de departamos registrados-->
        <?php
            if(isset($_SESSION['username']))
            {
                // consultar departamentos registrados y ponerlos en una lista tipo select
                $query_dptos = "SELECT id_departamento, nombre_departamento FROM Departamento ORDER BY nombre_departamento ASC";

                $consulta_dptos = mysqli_query($conexion, $query_dptos) or trigger_error("Error en la consulta MySQL: ".mysqli_error($conexion));

                echo "<select name = 'departamento' required/>";
                echo "<option value = '0'>Selecione un Departamento</option>";
                while($row = mysqli_fetch_array($consulta_dptos))
                {
                    echo '<option value = "'.$row['id_departamento'].'">'.$row['nombre_departamento'].'</option>';
                }
                echo "</select>";
            }
            else
            {
                header('location: index.php');
            }
        ?>
        <br><br>
        <button type="submit">Registrar</button>
    </form>
</body>
</html>