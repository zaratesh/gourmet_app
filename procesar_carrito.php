<?php
/**
 * PROCESADOR DE ACCIONES DEL CARRITO
 * 
 * Este archivo procesa las acciones del carrito: agregar y eliminar productos.
 * Valida los datos, inserta o elimina registros en la base de datos.
 * Requiere autenticación para acceder.
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

// Obtener la acción que se debe realizar (agregar o eliminar)
$accion = $_POST['accion'] ?? '';

if ($accion === 'agregar') {
    // AGREGAR PRODUCTO AL CARRITO
    
    // Obtener datos del formulario
    $id_usuario = $_SESSION['usuario_id'];
    $id_producto = (int)($_POST['id_producto'] ?? 0);
    $cantidad = (int)($_POST['cantidad'] ?? 0);
    $monto_total = (float)($_POST['monto_total'] ?? 0);

    // Validar que los datos sean válidos
    if ($id_producto <= 0 || $cantidad <= 0 || $monto_total <= 0) {
        die("Datos inválidos para el carrito.");
    }

    // Insertar el producto en el carrito del usuario
    $sql = "INSERT INTO CARRITO (id_usuario, id_producto, cantidad, monto_total)
            VALUES (:id_usuario, :id_producto, :cantidad, :monto_total)";
    $stmt = $conexion->prepare($sql);
    $stmt->execute([
        ':id_usuario' => $id_usuario,
        ':id_producto' => $id_producto,
        ':cantidad' => $cantidad,
        ':monto_total' => $monto_total
    ]);

    // Redirigir al carrito para mostrar actualización
    header("Location: carrito.php");
    exit;

} elseif ($accion === 'eliminar') {
    // ELIMINAR PRODUCTO DEL CARRITO
    
    // Obtener ID del item del carrito a eliminar
    $id_carrito = (int)($_POST['id_carrito'] ?? 0);
    
    // Validar que el ID sea válido
    if ($id_carrito <= 0) {
        die("ID de carrito inválido.");
    }

    // Eliminar el item del carrito (solo si pertenece al usuario actual)
    $sql = "DELETE FROM CARRITO WHERE id = :id AND id_usuario = :id_usuario";
    $stmt = $conexion->prepare($sql);
    $stmt->execute([
        ':id' => $id_carrito,
        ':id_usuario' => $_SESSION['usuario_id']
    ]);

    // Redirigir al carrito para mostrar actualización
    header("Location: carrito.php");
    exit;

} else {
    // Si la acción no es reconocida, redirigir al carrito
    header("Location: carrito.php");
    exit;
}
