<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro de productos - Tienda Gourmet</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
<div class="container my-5">
  <h2 class="mb-4">Registro de alimentos y productos gourmet</h2>
  <form action="guardar_producto.php" method="post">
    <div class="mb-3">
      <label class="form-label" for="nombre">Nombre del producto</label>
      <input type="text" class="form-control" id="nombre" name="nombre" required>
    </div>
    <div class="mb-3">
      <label class="form-label" for="descripcion">Descripción</label>
      <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
    </div>
    <div class="mb-3">
      <label class="form-label" for="categoria">Categoría</label>
      <select class="form-select" id="categoria" name="categoria" required>
        <option value="">Seleccione...</option>
        <option value="Vino">Vino</option>
        <option value="Queso">Queso</option>
        <option value="Chocolate">Chocolate</option>
        <option value="Otro">Otro</option>
      </select>
    </div>
    <div class="mb-3">
      <label class="form-label" for="precio">Precio</label>
      <input type="number" step="0.01" class="form-control" id="precio" name="precio" required>
    </div>
    <div class="mb-3">
      <label class="form-label" for="cantidad_inventario">Cantidad en inventario</label>
      <input type="number" class="form-control" id="cantidad_inventario" name="cantidad_inventario" required>
    </div>
    <button type="submit" class="btn btn-primary">Guardar producto</button>
  </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
