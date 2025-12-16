<?php
/**
 * CONEXIÓN A LA BASE DE DATOS
 * 
 * Este archivo establece la conexión con la base de datos MySQL usando PDO.
 * Se configura con manejo de excepciones y modo de obtención de datos asociativo.
 * 
 * @author Proyecto Gourmet
 * @version 1.0
 */

// Credenciales de la base de datos
$host = "localhost";          // Servidor MySQL
$usuario = "root";            // Usuario de MySQL
$clave = "";                  // Contraseña de MySQL (vacía por defecto en XAMPP)
$base_datos = "GOURMET";      // Nombre de la base de datos

// Crear Data Source Name (DSN) para PDO
$dsn = "mysql:host=$host;dbname=$base_datos;charset=utf8mb4";

// Intentar establecer conexión con PDO
try {
    $conexion = new PDO($dsn, $usuario, $clave, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,       // Lanzar excepciones en caso de error
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC   // Devolver resultados como arrays asociativos
    ]);
} catch (PDOException $e) {
    // Si hay error en la conexión, mostrar mensaje y detener ejecución
    die("Error de conexión: " . $e->getMessage());
}
?>
