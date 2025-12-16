<?php
/**
 * PROCESADOR DE GUARDADO DE PRODUCTOS
 * 
 * Este archivo procesa el formulario de registro de productos, validando los datos
 * e insertando el nuevo producto en la base de datos. Requiere autenticación.
 * 
 * @author Proyecto Gourmet
 * @version 1.0
 */

// Iniciar sesión
session_start();

// Verificar que el usuario esté autenticado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

require_once "conexion.php";

// Verificar que la solicitud sea POST (del formulario)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener y limpiar datos del formulario
    $nombre = trim($_POST['nombre'] ?? '');
    $descripcion = trim($_POST['descripcion'] ?? '');
    $categoria = trim($_POST['categoria'] ?? '');
    $precio = $_POST['precio'] ?? 0;
    $cantidad_inventario = $_POST['cantidad_inventario'] ?? 0;

    // Validar que los datos sean correctos
    if ($nombre === '' || $categoria === '' || $precio <= 0 || $cantidad_inventario < 0) {
        die("Datos inválidos para el producto.");
    }

    // Preparar sentencia SQL para insertar nuevo producto
    $sql = "INSERT INTO PRODUCTOS (nombre, descripcion, categoria, precio, cantidad_inventario)
            VALUES (:nombre, :descripcion, :categoria, :precio, :cantidad_inventario)";
    $stmt = $conexion->prepare($sql);

    // Intentar guardar el nuevo producto
    try {
        $stmt->execute([
            ':nombre' => $nombre,
            ':descripcion' => $descripcion,
            ':categoria' => $categoria,
            ':precio' => $precio,
            ':cantidad_inventario' => $cantidad_inventario
        ]);
        // Si es exitoso, redirigir al formulario de registro
        header("Location: registro_producto.php");
        exit;
    } catch (PDOException $e) {
        // Mostrar error si hay problemas al guardar el producto
        die("Error al guardar el producto: " . $e->getMessage());
    }
} else {
    // Si la solicitud no es POST, redirigir al formulario
    header("Location: registro_producto.php");
    exit;
}
