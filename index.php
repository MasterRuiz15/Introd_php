<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
</head>
<body>
    <h1>Página principal del sitio</h1>
    <h2>Andrés Felipe Ruiz Medina</h2>
    <!--Formulario de inicio de sesion-->
    <form action="modelo/loguear.php" method = "post">
        <h2>Iniciar sesion</h2>
        <label for="">E-mail:</label>
        <input type="text" name="email" id="" required>
        <br><br>
        <label for="">Password:</label>
        <input type="text" name="password" id="" required>
        <br><br>
        <button type="submit">Ingresar</button>
    </form>
</body>
</html>