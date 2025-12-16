<?php
/**
 * PROCESADOR DE REGISTRO DE USUARIO
 * 
 * Este archivo procesa el formulario de registro, validando los datos,
 * hashando la contraseña de forma segura e insertando el nuevo usuario en la base de datos.
 * 
 * @author Proyecto Gourmet
 * @version 1.0
 */

require_once "conexion.php";

// Verificar que la solicitud sea POST (del formulario)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener y limpiar datos del formulario
    $nombre = trim($_POST['nombre'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $direccion = trim($_POST['direccion'] ?? '');
    $telefono = trim($_POST['telefono'] ?? '');
    $contraseña_plana = $_POST['contraseña'] ?? '';

    // Validar que los campos obligatorios no estén vacíos
    if ($nombre === '' || $email === '' || $contraseña_plana === '') {
        die("Faltan datos obligatorios.");
    }

    // Encriptar la contraseña usando PASSWORD_DEFAULT (bcrypt)
    $contraseña_hash = password_hash($contraseña_plana, PASSWORD_DEFAULT);

    // Preparar sentencia SQL para insertar nuevo usuario
    $sql = "INSERT INTO USUARIOS (nombre, email, contraseña, direccion, telefono)
            VALUES (:nombre, :email, :contraseña, :direccion, :telefono)";
    $stmt = $conexion->prepare($sql);

    // Intentar guardar el nuevo usuario
    try {
        $stmt->execute([
            ':nombre' => $nombre,
            ':email' => $email,
            ':contraseña' => $contraseña_hash,
            ':direccion' => $direccion,
            ':telefono' => $telefono
        ]);
        // Si es exitoso, redirigir a login
        header("Location: login.php");
        exit;
    } catch (PDOException $e) {
        // Mostrar error si hay problemas al registrar (ej: email duplicado)
        die("Error al registrar usuario: " . $e->getMessage());
    }
} else {
    // Si la solicitud no es POST, redirigir a registro
    header("Location: registro_usuario.php");
    exit;
}
