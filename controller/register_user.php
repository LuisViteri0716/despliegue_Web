<?php
require '../conexionBD/conexion.php';

try {
    // Validar datos de entrada
    if (empty($_POST['nombre_usuario']) || empty($_POST['correo']) || empty($_POST['pasword']) || empty($_POST['usuario'])) {
        throw new Exception("Todos los campos son obligatorios.");
    }

    $nombre_usuario = $_POST['nombre_usuario'];
    $correo = $_POST['correo'];
    $pasword = $_POST['pasword'];
    $usuario = $_POST['usuario'];

    // Crear conexión
    $conn = new ConexionBD();
    $pdo = $conn->conexionBD(); // Usar el método conexionBD() para obtener la conexión

    // Ejecutar consulta
    $query = "INSERT INTO usuarios (nombre, correo, pasword, usuario) 
              VALUES ('$nombre_usuario', '$correo', '$pasword', '$usuario')";
    $pdo->exec($query); // Ejecuta la consulta

    echo "Usuario registrado correctamente.";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>