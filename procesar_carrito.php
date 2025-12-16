<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}
require_once "conexion.php";

$accion = $_POST['accion'] ?? '';

if ($accion === 'agregar') {
    $id_usuario = $_SESSION['usuario_id'];
    $id_producto = (int)($_POST['id_producto'] ?? 0);
    $cantidad = (int)($_POST['cantidad'] ?? 0);
    $monto_total = (float)($_POST['monto_total'] ?? 0);

    if ($id_producto <= 0 || $cantidad <= 0 || $monto_total <= 0) {
        die("Datos inválidos para el carrito.");
    }

    $sql = "INSERT INTO CARRITO (id_usuario, id_producto, cantidad, monto_total)
            VALUES (:id_usuario, :id_producto, :cantidad, :monto_total)";
    $stmt = $conexion->prepare($sql);
    $stmt->execute([
        ':id_usuario' => $id_usuario,
        ':id_producto' => $id_producto,
        ':cantidad' => $cantidad,
        ':monto_total' => $monto_total
    ]);

    header("Location: carrito.php");
    exit;

} elseif ($accion === 'eliminar') {
    $id_carrito = (int)($_POST['id_carrito'] ?? 0);
    if ($id_carrito <= 0) {
        die("ID de carrito inválido.");
    }

    $sql = "DELETE FROM CARRITO WHERE id = :id AND id_usuario = :id_usuario";
    $stmt = $conexion->prepare($sql);
    $stmt->execute([
        ':id' => $id_carrito,
        ':id_usuario' => $_SESSION['usuario_id']
    ]);

    header("Location: carrito.php");
    exit;

} else {
    header("Location: carrito.php");
    exit;
}
