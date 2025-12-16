<?php
/**
 * PROCESADOR DE AUTENTICACIÓN DE USUARIO
 * 
 * Este archivo procesa el formulario de login. Verifica las credenciales del usuario,
 * valida la contraseña con hash, y establece las variables de sesión si la autenticación es exitosa.
 * 
 * @author Proyecto Gourmet
 * @version 1.0
 */

// Iniciar sesión para almacenar datos del usuario
session_start();
require_once "conexion.php";

// Verificar que la solicitud sea POST (del formulario)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener y limpiar datos del formulario
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    // Validar que los campos requeridos no estén vacíos
    if ($email === '' || $password === '') {
        header("Location: login.php");
        exit;
    }

    // Buscar el usuario por email en la base de datos
    $sql = "SELECT id, nombre, email, contraseña FROM USUARIOS WHERE email = :email LIMIT 1";
    $stmt = $conexion->prepare($sql);
    $stmt->execute([':email' => $email]);
    $usuario = $stmt->fetch();

    // Verificar si el usuario existe y la contraseña es correcta
    if ($usuario && password_verify($password, $usuario['contraseña'])) {
        // Guardar información del usuario en la sesión
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['usuario_nombre'] = $usuario['nombre'];
        // Redirigir a la página principal
        header("Location: index.php");
        exit;
    } else {
        // Si las credenciales son inválidas, volver al formulario de login
        header("Location: login.php");
        exit;
    }
} else {
    // Si la solicitud no es POST, redirigir a login
    header("Location: login.php");
    exit;
}
