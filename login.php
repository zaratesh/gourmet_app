<?php
session_start();
if (isset($_SESSION['usuario_id'])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar sesión - Tienda Gourmet</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
<div class="container my-5">
  <div class="row justify-content-center">
    <div class="col-md-5">
      <div class="card shadow-sm">
        <div class="card-body">
          <h2 class="h4 mb-3 text-center">Iniciar sesión</h2>
          <!-- Formulario de login que envía datos a procesar_login.php -->
          <form id="formLogin" action="procesar_login.php" method="post" novalidate>
            <!-- Campo de email -->
            <div class="mb-3">
              <label for="email" class="form-label">Correo electrónico</label>
              <input type="email" class="form-control" id="email" name="email" required>
              <div class="form-text text-danger d-none" id="emailError">Ingresa un correo válido.</div>
            </div>
            <!-- Campo de contraseña -->
            <div class="mb-3">
              <label for="password" class="form-label">Contraseña</label>
              <input type="password" class="form-control" id="password" name="password" required minlength="8">
              <div class="form-text text-danger d-none" id="passwordError">
                La contraseña debe tener al menos 8 caracteres, incluir mayúscula, minúscula y un número.
              </div>
              <!-- Indicador de fortaleza de contraseña -->
              <div class="form-text" id="passwordStrength"></div>
            </div>
            <!-- Botón de envío -->
            <button type="submit" class="btn btn-primary w-100">Ingresar</button>
          </form>
          <hr>
          <!-- Enlace para registrarse si no tiene cuenta -->
          <p class="mb-0 text-center">
            ¿No tienes cuenta?
            <a href="registro_usuario.php">Regístrate aquí</a>.
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Script con validaciones de formulario -->
<script src="js/validaciones.js"></script>
</body>
</html>
