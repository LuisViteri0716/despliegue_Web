<?php
session_start();
if (!isset($_SESSION['correo'])) {
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
</head>
<body>
    <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION['usuario']); ?>!</h1>
    <p>Has iniciado sesión correctamente.</p>
    <a href="../controller/logout.php">Cerrar Sesión</a>
</body>
</html>