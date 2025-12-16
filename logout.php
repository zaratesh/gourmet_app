<?php
/**
 * CERRAR SESIÓN
 * 
 * Este archivo destruye la sesión del usuario actual y lo redirige a la página principal.
 * Limpia todas las variables de sesión almacenadas.
 * 
 * @author Proyecto Gourmet
 * @version 1.0
 */

// Iniciar sesión
session_start();

// Limpiar todas las variables de sesión
session_unset();

// Destruir la sesión completamente
session_destroy();

// Redirigir a la página principal
header("Location: index.php");
exit;

