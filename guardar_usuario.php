<?php
require_once "conexion.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $direccion = trim($_POST['direccion'] ?? '');
    $telefono = trim($_POST['telefono'] ?? '');
    $contraseña_plana = $_POST['contraseña'] ?? '';

    if ($nombre === '' || $email === '' || $contraseña_plana === '') {
        die("Faltan datos obligatorios.");
    }

    $contraseña_hash = password_hash($contraseña_plana, PASSWORD_DEFAULT);

    $sql = "INSERT INTO USUARIOS (nombre, email, contraseña, direccion, telefono)
            VALUES (:nombre, :email, :contraseña, :direccion, :telefono)";
    $stmt = $conexion->prepare($sql);

    try {
        $stmt->execute([
            ':nombre' => $nombre,
            ':email' => $email,
            ':contraseña' => $contraseña_hash,
            ':direccion' => $direccion,
            ':telefono' => $telefono
        ]);
        header("Location: login.php");
        exit;
    } catch (PDOException $e) {
        die("Error al registrar usuario: " . $e->getMessage());
    }
} else {
    header("Location: registro_usuario.php");
    exit;
}
