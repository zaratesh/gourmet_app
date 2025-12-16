# Tienda Gourmet en Línea - Sistema de Carrito de Compras

![HTML5](https://img.shields.io/badge/HTML5-E34C26?style=flat-square&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=flat-square&logo=css3&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=flat-square&logo=javascript&logoColor=black)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=flat-square&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=flat-square&logo=mysql&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-7952B3?style=flat-square&logo=bootstrap&logoColor=white)

## Descripción del Proyecto

**Tienda Gourmet en Línea** es una aplicación web full-stack que implementa un sistema completo de carrito de compras para una tienda especializada en alimentos y productos gourmet (vinos, quesos y chocolates). 

### Contexto y Problemática

Una tienda de alimentos y productos gourmet enfrentaba diversos inconvenientes en la gestión de las compras de sus clientes, generados por la falta de un sistema eficiente para manejar este proceso. Los principales problemas eran:

- **Gestión Manual de Pedidos**: Cada pedido se registraba transcribiendo manualmente la información, lo que aumentaba considerablemente el nivel de inconsistencia de datos.
- **Errores Recurrentes**: Los encargados cometían errores frecuentes como equivocarse en cantidad de productos, tipo de alimento o direcciones de envío.
- **Falta de Seguimiento**: No existía una forma sencilla de conocer el estado de cada compra, generando incertidumbre y frustración.
- **Sin Validación en Tiempo Real**: No se podían verificar los datos ingresados por los usuarios cuando realizaban una compra.
- **Riesgos de Seguridad**: Falta de control de sesiones para garantizar la seguridad de la información de los clientes, representando graves riesgos para la privacidad.

### Objetivo General

Desarrollar una aplicación web que implemente un carrito de compra integral para la tienda, mejorando la experiencia del usuario y garantizando la integridad de los datos mediante:
- Validación en tiempo real
- Control seguro de sesiones
- Base de datos MySQL centralizada
- Interfaz adaptable y amigable

---

## Requerimientos Implementados

✅ Registro de usuarios con almacenamiento seguro de contraseñas  
✅ Inicio de sesión con control de sesiones  
✅ Visualización de productos gourmet disponibles  
✅ Agregar productos al carrito  
✅ Modificar la cantidad de productos  
✅ Eliminar productos del carrito  
✅ Realización de pedidos en línea  

---

## Tecnologías Utilizadas

### Frontend
- **HTML5**: Estructura semántica de contenido
- **CSS3**: Estilos personalizados y responsive design
- **Bootstrap 5.3.3**: Componentes UI profesionales (botones, formularios, navegación)
- **JavaScript**: Validaciones e interacciones de cliente

### Backend
- **PHP 8.x**: Lógica de servidor y manejo de formularios
- **Sesiones PHP**: Control de usuarios y seguridad
- **PDO (PHP Data Objects)**: Acceso a base de datos seguro

### Base de Datos
- **MySQL**: Almacenamiento de usuarios, productos y carritos
- **Charset UTF-8**: Soporte de caracteres especiales

### Herramientas
- **GitHub**: Control de versiones y repositorio del proyecto
- **Bootstrap Local**: Framework CSS responsive

---

## Estructura del Proyecto

```
gourmet/
├── index.php                 # Página principal de la tienda
├── login.php                 # Formulario de inicio de sesión
├── logout.php                # Cierre de sesión
├── registro_usuario.php      # Formulario de registro
├── carrito.php               # Vista del carrito de compras
├── registro_producto.php     # Formulario para registrar productos
│
├── conexion.php              # Conexión a BD con PDO
├── procesar_login.php        # Validación y autenticación de usuarios
├── procesar_carrito.php      # Procesamiento de acciones del carrito
├── guardar_usuario.php       # Guardado seguro de nuevos usuarios
├── guardar_producto.php      # Guardado de productos en BD
│
├── css/
│   └── estilos.css          # Estilos personalizados
├── js/
│   └── validaciones.js      # Funciones de validación JavaScript
├── sql/
│   └── gourmet.sql          # Script de creación de BD y tablas
│
└── README.md                # Este archivo
```

---

## Características Principales

### 🔐 Seguridad
- Hasheo de contraseñas con `PASSWORD_DEFAULT` (bcrypt)
- Validación con prepared statements (prevención de SQL Injection)
- Control de sesiones para usuarios autenticados
- Sanitización de datos con `htmlspecialchars()`
- Protección en endpoints sensibles

### 🛒 Carrito de Compras
- Agregar productos con cantidad seleccionable
- Actualización automática de montos totales
- Cálculo en tiempo real (precio × cantidad)
- Eliminación de productos individuales
- Vista clara de resumen de compra

### 📊 Gestión de Datos
- Base de datos MySQL con 3 tablas principales:
  - **USUARIOS**: Almacena información y autenticación de clientes
  - **PRODUCTOS**: Catálogo de artículos gourmet
  - **CARRITO**: Registros de compras por usuario

### 🎨 Interfaz Adaptable
- Diseño responsive con Bootstrap
- Navegación intuitiva
- Formularios validados en cliente
- Mensajes de confirmación clara
- Componentes accesibles

### ✅ Validaciones
- Validación de email en formularios
- Verificación de fortaleza de contraseña
- Cantidad mínima de caracteres (8 caracteres)
- Campos obligatorios marcados
- Validación en cliente y servidor

---

## Instalación y Configuración

### Requisitos Previos
- PHP 7.4 o superior
- MySQL 5.7 o superior
- Apache (XAMPP/WAMP/LAMP)
- Navegador moderno (Chrome, Firefox, Safari, Edge)

### Pasos de Instalación

1. **Clonar el repositorio**
   ```bash
   git clone https://github.com/usuario/gourmet.git
   cd gourmet
   ```

2. **Crear la base de datos**
   - Abrir phpMyAdmin
   - Importar el archivo `sql/gourmet.sql`
   - O ejecutar manualmente el script SQL

3. **Configurar conexión a BD**
   - Editar `conexion.php` si es necesario
   - Verificar credenciales (usuario: root, contraseña: vacía por defecto)
   - Cambiar según tu configuración de MySQL

4. **Colocar archivos en servidor**
   - Copiar carpeta `gourmet/` a `htdocs/` (XAMPP) o `www/` (WAMP)
   - O configurar virtual host si es necesario

5. **Acceder a la aplicación**
   ```
   http://localhost/gourmet/
   ```

---

## Uso de la Aplicación

### Flujo Típico del Usuario

1. **Registro**: El usuario nuevo accede a "Registrarse" y completa el formulario
2. **Login**: El usuario inicia sesión con email y contraseña
3. **Navegación**: Explora productos disponibles en "Productos"
4. **Carrito**: Agrega productos especificando cantidad
5. **Gestión**: Modifica cantidades o elimina productos según necesite
6. **Compra**: Realiza el pedido en línea

### Rutas Principales

| Ruta | Descripción |
|------|-------------|
| `/index.php` | Página inicial |
| `/login.php` | Autenticación de usuarios |
| `/registro_usuario.php` | Registro de nuevos usuarios |
| `/carrito.php` | Visualización del carrito |
| `/registro_producto.php` | Administración de productos |

---

## Base de Datos

### Tabla USUARIOS
```sql
CREATE TABLE USUARIOS (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    contraseña VARCHAR(255) NOT NULL,
    direccion VARCHAR(255),
    telefono VARCHAR(20),
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### Tabla PRODUCTOS
```sql
CREATE TABLE PRODUCTOS (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT,
    categoria VARCHAR(50),
    precio DECIMAL(10, 2) NOT NULL,
    cantidad_inventario INT DEFAULT 0
);
```

### Tabla CARRITO
```sql
CREATE TABLE CARRITO (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_usuario INT NOT NULL,
    id_producto INT NOT NULL,
    cantidad INT DEFAULT 1,
    monto_total DECIMAL(10, 2),
    FOREIGN KEY (id_usuario) REFERENCES USUARIOS(id),
    FOREIGN KEY (id_producto) REFERENCES PRODUCTOS(id)
);
```

---

## Funcionalidades por Archivo

### Páginas Públicas
- **index.php**: Página inicial con información y acceso rápido
- **login.php**: Formulario de inicio de sesión
- **registro_usuario.php**: Formulario de registro

### Páginas Protegidas (Requieren Autenticación)
- **carrito.php**: Gestión del carrito de compras
- **registro_producto.php**: Administración de productos

### Procesadores Backend
- **procesar_login.php**: Valida credenciales y crea sesión
- **guardar_usuario.php**: Registra nuevo usuario con contraseña hashada
- **procesar_carrito.php**: Agrega/elimina productos del carrito
- **guardar_producto.php**: Inserta nuevos productos en BD

### Utilidades
- **conexion.php**: Conexión PDO a MySQL
- **logout.php**: Destruye sesión y limpia datos

---

## Validaciones Implementadas

### JavaScript (Cliente)
- Validación de formato de email
- Verificación de fortaleza de contraseña
- Cálculo automático de montos
- Validación de campos obligatorios
- Confirmación de acciones destructivas

### PHP (Servidor)
- Validación de parámetros POST
- Sanitización de entrada de datos
- Verificación de sesión activa
- Prepared statements para seguridad
- Manejo de excepciones PDO

---

## Seguridad

### Medidas Implementadas
✅ Hasheo bcrypt de contraseñas  
✅ Prepared statements para prevenir SQL Injection  
✅ Validación de sesiones  
✅ Sanitización de HTML (htmlspecialchars)  
✅ Verificación de autorización en páginas protegidas  
✅ HTTPS recomendado en producción  

---

## Próximas Mejoras

- [ ] Implementar recuperación de contraseña
- [ ] Agregar historial de compras
- [ ] Sistema de notificaciones por email
- [ ] Panel de administración
- [ ] Métodos de pago integrados
- [ ] Búsqueda y filtrado de productos
- [ ] Calificaciones y comentarios de usuarios
- [ ] Carrito persistente en BD

---

## Contribuciones

Las contribuciones son bienvenidas. Por favor:

1. Fork el repositorio
2. Crea una rama para tu feature (`git checkout -b feature/AmazingFeature`)
3. Commit tus cambios (`git commit -m 'Add some AmazingFeature'`)
4. Push a la rama (`git push origin feature/AmazingFeature`)
5. Abre un Pull Request

---

## Autores

- **Desarrollador**: Estudiante de Programación Web II
- **Institución**: IACC - Instituto Profesional IACC
- **Asignatura**: PROHT2305-21 - Programación Web II
- **Semana**: Semana 9 - Proyecto Final

---

## Licencia

Este proyecto está bajo la Licencia MIT. Ver el archivo `LICENSE` para más detalles.

---

## Contacto

Para preguntas o sugerencias sobre este proyecto, por favor contacta al desarrollador.

---

## Recursos Adicionales

- [Documentación de Bootstrap](https://getbootstrap.com/)
- [Manual de PHP](https://www.php.net/manual/es/)
- [Documentación de MySQL](https://dev.mysql.com/doc/)
- [MDN - JavaScript](https://developer.mozilla.org/es/docs/Web/JavaScript)
- [OWASP - Web Security](https://owasp.org/)

---

**Última actualización**: 15 de diciembre de 2025
