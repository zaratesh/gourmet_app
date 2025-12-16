<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

require_once "conexion.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre'] ?? '');
    $descripcion = trim($_POST['descripcion'] ?? '');
    $categoria = trim($_POST['categoria'] ?? '');
    $precio = $_POST['precio'] ?? 0;
    $cantidad_inventario = $_POST['cantidad_inventario'] ?? 0;

    if ($nombre === '' || $categoria === '' || $precio <= 0 || $cantidad_inventario < 0) {
        die("Datos inválidos para el producto.");
    }

    $sql = "INSERT INTO PRODUCTOS (nombre, descripcion, categoria, precio, cantidad_inventario)
            VALUES (:nombre, :descripcion, :categoria, :precio, :cantidad_inventario)";
    $stmt = $conexion->prepare($sql);

    try {
        $stmt->execute([
            ':nombre' => $nombre,
            ':descripcion' => $descripcion,
            ':categoria' => $categoria,
            ':precio' => $precio,
            ':cantidad_inventario' => $cantidad_inventario
        ]);
        header("Location: registro_producto.php");
        exit;
    } catch (PDOException $e) {
        die("Error al guardar el producto: " . $e->getMessage());
    }
} else {
    header("Location: registro_producto.php");
    exit;
}
