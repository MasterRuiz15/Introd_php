<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    require 'conexion.php';
    session_start();

    if (!isset($_SESSION['username'])) {
        header('location: ../index.php');
        exit();
    }

    $nombre_usuario = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Consulta Empleados</title>
</head>
<body>
    <h1>Consulta de Empleados</h1>
    <?php echo 'Usuario: ' . $nombre_usuario; ?>
    
    <form method="POST" action="">
        <p>Buscar por ID de empleado:</p>
        <input type="number" name="id_empleado">
        <p>Buscar por ID de departamento:</p>
        <input type="number" name="id_departamento">
        <br><br>
        <input type="submit" value="Buscar">
    </form>

    <br><hr><br>

    <?php
    // Solo mostrar si el usuario está logueado
    if (isset($_SESSION['username'])) {
        // Capturar variables del formulario
        $id_empleado = isset($_POST['id_empleado']) ? trim($_POST['id_empleado']) : '';
        $id_departamento = isset($_POST['id_departamento']) ? trim($_POST['id_departamento']) : '';

        // Armar consulta según lo ingresado
        if (!empty($id_empleado)) {
            $query = "SELECT Empleado.id_empleado, Empleado.nombre_empleado, Empleado.apellidos_empleados, Departamento.nombre_departamento 
                      FROM Empleado 
                      JOIN Departamento ON Empleado.id_departamento = Departamento.id_departamento 
                      WHERE Empleado.id_empleado = '$id_empleado'";
        } elseif (!empty($id_departamento)) {
            $query = "SELECT Empleado.id_empleado, Empleado.nombre_empleado, Empleado.apellidos_empleados, Departamento.nombre_departamento 
                      FROM Empleado 
                      JOIN Departamento ON Empleado.id_departamento = Departamento.id_departamento 
                      WHERE Empleado.id_departamento = '$id_departamento'";
        } else {
            // Si no se ingresó nada, mostrar todo
            $query = "SELECT Empleado.id_empleado, Empleado.nombre_empleado, Empleado.apellidos_empleados, Departamento.nombre_departamento 
                      FROM Empleado 
                      JOIN Departamento ON Empleado.id_departamento = Departamento.id_departamento";
        }

        $resultado = mysqli_query($conexion, $query) or die("Error en la consulta: " . mysqli_error($conexion));

        if (mysqli_num_rows($resultado) > 0) {
            echo "<table border='1' align='center'>";
            echo "<tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Departamento</th>
                  </tr>";

            while ($fila = mysqli_fetch_array($resultado)) {
                echo "<tr>";
                echo "<td>" . $fila['id_empleado'] . "</td>";
                echo "<td>" . $fila['nombre_empleado'] . "</td>";
                echo "<td>" . $fila['apellidos_empleados'] . "</td>";
                echo "<td>" . $fila['nombre_departamento'] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "<p style='color:red;' align='center'>No se encontraron empleados con esos datos.</p>";
        }
    }
    ?>
</body>
</html>
