<?php
$host = "localhost";
$usuario = "root";
$clave = "";
$base_datos = "GOURMET";

$dsn = "mysql:host=$host;dbname=$base_datos;charset=utf8mb4";

try {
    $conexion = new PDO($dsn, $usuario, $clave, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>
