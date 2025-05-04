<?php
require '../conexionBD/conexion.php';
session_start();
try {
    // Validar datos de entrada
    if (empty($_POST['correo_electronico']) || empty($_POST['pasword'])) {
        throw new Exception("Todos los campos son obligatorios.");
    }

    $correo = $_POST['correo_electronico'];
    $pasword = $_POST['pasword'];

    // Crear conexión
    $conn = new ConexionBD();
    $pdo = $conn->conexionBD();

    // Verificar credenciales
    $query = "SELECT * FROM usuarios WHERE correo = :correo AND pasword = :pasword";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':correo', $correo);
    $stmt->bindParam(':pasword', $pasword);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $_SESSION['correo'] = $correo;
        $_SESSION['usuario'] = $stmt->fetch(PDO::FETCH_ASSOC)['usuario']; // Asignar el nombre de usuario a la sesión    
        header("Location: http://localhost/login/frame/principal.php");
        exit();
    } else {
        throw new Exception("Usuario o contraseña incorrectos.");
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>