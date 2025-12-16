<?php
/**
 * CARRITO DE COMPRAS
 * 
 * Esta página muestra el carrito de compras del usuario autenticado.
 * Permite agregar y eliminar productos, y calcula el total automáticamente.
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

// Obtener la lista de todos los productos disponibles para agregar al carrito
$sql = "SELECT id, nombre, precio FROM PRODUCTOS ORDER BY nombre";
$stmt = $conexion->query($sql);
$productos = $stmt->fetchAll();

// Obtener los items actualmente en el carrito del usuario
// Se usa JOIN para obtener el nombre del producto desde la tabla PRODUCTOS
$sqlCarrito = "SELECT C.id, P.nombre, C.cantidad, C.monto_total
               FROM CARRITO C
               JOIN PRODUCTOS P ON C.id_producto = P.id
               WHERE C.id_usuario = :id_usuario";
$stmtCarrito = $conexion->prepare($sqlCarrito);
$stmtCarrito->execute([':id_usuario' => $_SESSION['usuario_id']]);
$itemsCarrito = $stmtCarrito->fetchAll();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Carrito de compras - Tienda Gourmet</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
<div class="container my-5">
  <h2 class="mb-4">Carrito de compras</h2>

  <form id="formCarrito" action="procesar_carrito.php" method="post">
    <input type="hidden" name="accion" value="agregar">
    <div class="row g-3 align-items-end">
      <div class="col-md-4">
        <label class="form-label" for="producto">Producto</label>
        <select class="form-select" id="producto" name="id_producto" required>
          <option value="">Seleccione un producto</option>
          <?php foreach ($productos as $p): ?>
            <option value="<?php echo $p['id']; ?>"
                    data-precio="<?php echo $p['precio']; ?>">
              <?php echo htmlspecialchars($p['nombre']); ?> ($<?php echo $p['precio']; ?>)
            </option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="col-md-2">
        <label class="form-label" for="cantidad">Cantidad</label>
        <input type="number" class="form-control" id="cantidad" name="cantidad" min="1" value="1" required>
      </div>
      <div class="col-md-3">
        <label class="form-label" for="monto_total">Monto total</label>
        <input type="text" class="form-control" id="monto_total" name="monto_total" readonly>
      </div>
      <div class="col-md-3">
        <button type="submit" class="btn btn-primary w-100">Agregar al carrito</button>
      </div>
    </div>
  </form>

  <hr class="my-4">

  <h3 class="h5 mb-3">Productos en tu carrito</h3>

  <?php if (count($itemsCarrito) > 0): ?>
    <table class="table table-striped">
      <thead>
      <tr>
        <th>Producto</th>
        <th>Cantidad</th>
        <th>Monto total</th>
        <th>Acciones</th>
      </tr>
      </thead>
      <tbody>
      <?php foreach ($itemsCarrito as $item): ?>
        <tr>
          <td><?php echo htmlspecialchars($item['nombre']); ?></td>
          <td><?php echo (int)$item['cantidad']; ?></td>
          <td>$<?php echo $item['monto_total']; ?></td>
          <td>
            <form action="procesar_carrito.php" method="post" class="d-inline">
              <input type="hidden" name="accion" value="eliminar">
              <input type="hidden" name="id_carrito" value="<?php echo $item['id']; ?>">
              <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
            </form>
          </td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  <?php else: ?>
    <p>No tienes productos en el carrito.</p>
  <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
/**
 * LÓGICA DE VALIDACIÓN Y CÁLCULO DEL CARRITO
 * 
 * Este script valida la selección de productos y calcula automáticamente
 * el monto total basado en el precio unitario y la cantidad seleccionada.
 */

// Esperar a que el DOM esté completamente cargado
document.addEventListener("DOMContentLoaded", function () {
  // Obtener referencias a los elementos del formulario
  const selectProducto = document.getElementById("producto");
  const inputCantidad = document.getElementById("cantidad");
  const inputMontoTotal = document.getElementById("monto_total");

  /**
   * Función para actualizar el monto total
   * Calcula: precio_unitario × cantidad
   */
  function actualizarMonto() {
    // Obtener la opción seleccionada del producto
    const opcionSeleccionada = selectProducto.options[selectProducto.selectedIndex];
    // Extraer el precio del atributo data-precio
    const precio = parseFloat(opcionSeleccionada.getAttribute("data-precio") || 0);
    // Convertir la cantidad ingresada a número entero
    const cantidad = parseInt(inputCantidad.value || 0);
    
    // Si hay precio y cantidad válidos, calcular total
    if (precio > 0 && cantidad > 0) {
      const total = precio * cantidad;
      inputMontoTotal.value = total.toFixed(2); // Mostrar con 2 decimales
    } else {
      inputMontoTotal.value = ""; // Limpiar si datos no son válidos
    }
  }

  // Agregar eventos para actualizar monto cuando cambien producto o cantidad
  if (selectProducto && inputCantidad) {
    selectProducto.addEventListener("change", actualizarMonto);
    inputCantidad.addEventListener("input", actualizarMonto);
  }

  // Validar el formulario antes de enviarlo
  const formCarrito = document.getElementById("formCarrito");
  if (formCarrito) {
    formCarrito.addEventListener("submit", function (e) {
      // Verificar que haya producto seleccionado y cantidad válida
      if (!selectProducto.value || parseInt(inputCantidad.value) <= 0) {
        e.preventDefault(); // Prevenir envío del formulario
        alert("Selecciona un producto y una cantidad válida.");
      }
    });
  }
});
</script>
</body>
</html>
