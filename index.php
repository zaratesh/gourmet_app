<?php
/**
 * PÁGINA PRINCIPAL - TIENDA GOURMET
 * 
 * Esta es la página de inicio de la tienda en línea de alimentos gourmet.
 * Muestra información de bienvenida, productos destacados y opciones de acceso.
 * Utiliza sesiones para mantener el estado del usuario (autenticación).
 * 
 * @author Proyecto Gourmet
 * @version 1.0
 */

// Iniciar sesión para verificar si el usuario está autenticado
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tienda Gourmet - Proyecto Final</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<!-- ENCABEZADO: Logo y opciones de usuario -->
<header class="bg-dark text-white py-3">
  <div class="container d-flex justify-content-between align-items-center">
    <h1 class="h3 mb-0">Tienda de Alimentos y Productos Gourmet</h1>
    <div>
      <!-- Si el usuario está autenticado, mostrar nombre y botón de cerrar sesión -->
      <?php if (isset($_SESSION['usuario_nombre'])): ?>
        <span class="me-3">Bienvenido, <?php echo htmlspecialchars($_SESSION['usuario_nombre']); ?></span>
        <a href="logout.php" class="btn btn-outline-light btn-sm">Cerrar sesión</a>
      <!-- Si no está autenticado, mostrar botones de login y registro -->
      <?php else: ?>
        <a href="login.php" class="btn btn-outline-light btn-sm me-2">Iniciar sesión</a>
        <a href="registro_usuario.php" class="btn btn-success btn-sm">Registrarse</a>
      <?php endif; ?>
    </div>
  </div>
</header>

<!-- NAVEGACIÓN: Menú principal -->
<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
  <div class="container">
    <a class="navbar-brand" href="index.php">Gourmet SPA</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarGourmet">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarGourmet">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" href="index.php">Inicio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="registro_producto.php">Productos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="carrito.php">Carrito</a>
        </li>
      </ul>
      <!-- Búsqueda de productos -->
      <form class="d-flex" role="search">
        <input class="form-control form-control-sm me-2" type="search" placeholder="Buscar productos">
        <button class="btn btn-outline-primary btn-sm" type="submit">Buscar</button>
      </form>
    </div>
  </div>
</nav>

<!-- CONTENIDO PRINCIPAL -->
<main class="container my-4">
  <div class="row">
    <section class="col-md-8">
      <h2 class="mb-3">Bienvenido a nuestra tienda gourmet</h2>
      <p>
        Descubre una selección exclusiva de vinos, quesos y chocolates finos, cuidadosamente elegidos para
        entregar una experiencia gastronómica única. Nuestra tienda en línea te permite realizar compras de
        manera rápida, segura y desde la comodidad de tu hogar.
      </p>
      <p>
        Regístrate, inicia sesión y comienza a armar tu carrito de compras con nuestros productos gourmet.
      </p>

      <h3 class="mt-4 mb-3">Nuevos productos disponibles</h3>

      <!-- PRODUCTOS DESTACADOS: Tarjetas de ejemplo -->
      <div class="row g-3">
        <!-- Tarjeta 1: Vino Tinto -->
        <div class="col-md-4">
          <div class="card h-100">
            <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Vino tinto">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">Vino Tinto Reserva</h5>
              <p class="card-text">Aromas intensos y notas frutales. Ideal para carnes rojas.</p>
              <button class="btn btn-primary btn-sm mt-auto">Agregar al carrito</button>
            </div>
          </div>
        </div>
        <!-- Tarjeta 2: Queso Gourmet -->
        <div class="col-md-4">
          <div class="card h-100">
            <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Queso gourmet">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">Queso Gourmet Madurado</h5>
              <p class="card-text">Textura cremosa y sabor intenso, perfecto para degustaciones.</p>
              <button class="btn btn-primary btn-sm mt-auto">Agregar al carrito</button>
            </div>
          </div>
        </div>
        <!-- Tarjeta 3: Chocolate Amargo -->
        <div class="col-md-4">
          <div class="card h-100">
            <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Chocolate">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">Chocolate Amargo 70%</h5>
              <p class="card-text">Cacao seleccionado con notas a frutos secos y toques cítricos.</p>
              <button class="btn btn-primary btn-sm mt-auto">Agregar al carrito</button>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- BARRA LATERAL: Acceso rápido -->
    <aside class="col-md-4">
      <div class="p-3 bg-light border rounded">
        <h4>Acceso rápido</h4>
        <p>Gestiona tus compras y pedidos en línea.</p>
        <a href="login.php" class="btn btn-primary w-100 mb-2">Iniciar sesión</a>
        <a href="registro_usuario.php" class="btn btn-outline-secondary w-100">Crear cuenta</a>
      </div>
    </aside>
  </div>
</main>

<!-- PIE DE PÁGINA -->
<footer class="bg-dark text-white text-center py-3 mt-auto">
  <small>&copy; <?php echo date('Y'); ?> Tienda Gourmet en Línea. Proyecto Final Programación Web II.</small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Script con validaciones de formulario -->
<script src="js/validaciones.js"></script>
</body>
</html>
