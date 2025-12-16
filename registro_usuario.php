<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro de usuarios - Tienda Gourmet</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow-sm">
        <div class="card-body">
          <h2 class="h4 mb-3 text-center">Registro de usuario</h2>
          <form action="guardar_usuario.php" method="post">
            <div class="mb-3">
              <label class="form-label" for="nombre">Nombre completo</label>
              <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="mb-3">
              <label class="form-label" for="email">Correo electrónico</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
              <label class="form-label" for="direccion">Dirección</label>
              <input type="text" class="form-control" id="direccion" name="direccion">
            </div>
            <div class="mb-3">
              <label class="form-label" for="telefono">Teléfono</label>
              <input type="text" class="form-control" id="telefono" name="telefono">
            </div>
            <div class="mb-3">
              <label class="form-label" for="contraseña">Contraseña</label>
              <input type="password" class="form-control" id="contraseña" name="contraseña" required minlength="8">
            </div>
            <button type="submit" class="btn btn-success w-100">Registrar usuario</button>
          </form>
          <hr>
          <p class="mb-0 text-center">
            ¿Ya tienes cuenta?
            <a href="login.php">Inicia sesión aquí</a>.
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
