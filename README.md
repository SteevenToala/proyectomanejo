# proyectomanejo
# 📅 Proyecto de Gestión de Evento

## 📝 Descripción del Proyecto

Este proyecto consiste en el desarrollo de una página web para la **gestión de un evento único**. Incluye funcionalidades de autenticación (login, registro, recuperación de contraseña por correo), así como roles de **cliente** y **administrador**. 

Los usuarios pueden registrarse y enviar una solicitud para participar en el evento. Un administrador debe aprobar la solicitud, y el sistema notificará al cliente el estado de la misma.

---

## 🚀 Funcionalidades Principales

- Registro y login de usuarios
- Recuperación de contraseña vía correo electrónico
- Roles de **administrador** y **cliente**
- Envío de solicitudes de participación al evento
- Aprobación o rechazo de solicitudes por parte del admin
- Interfaz de usuario responsive y coherente

---

## 👥 Distribución del Trabajo

### 🔐 Persona 1 – Autenticación
- **Frontend**:
  - `client/pages/login.php`
  - `client/pages/register.php`
  - `client/pages/forgot_password.php`
- **Backend**:
  - Validación de usuarios
  - Manejo de sesiones
  - Envío de correos para recuperación de contraseña
  - Carpeta: `utils/`

---

### 👤 Persona 2 – Cliente
- **Frontend**:
  - `client/index.php`
  - `client/pages/` (crear solicitud, ver estado)
  - `client/includes/`
- **Funcionalidad**:
  - Crear y enviar solicitud
  - Ver estado (aprobado/rechazado)

---

### 🛠️ Persona 3 – Admin
- **Archivos**:
  - `admin/index.php`
  - `admin/pages/` (gestión de solicitudes y usuarios)
  - `admin/includes/`
- **Funcionalidad**:
  - Aprobar o rechazar solicitudes
  - Gestionar usuarios (opcional)

---

### 🎨 Persona 4 – Estilos y Diseño
- **Archivos**:
  - `styles/`, `cover.css`, `assets/`, `client/styles/`, `admin/styles/`
- **Responsabilidades**:
  - Crear un diseño coherente y responsive
  - Agregar imágenes, íconos, fuentes

---

### 🧠 Persona 5 – Backend General y Base de Datos
- **Archivos**:
  - `includes/`, `utils/`, `config.php`
- **Responsabilidades**:
  - Conexión a base de datos
  - Validaciones y funciones globales
  - Modelo de datos: usuarios, roles, solicitudes, eventos
  - Apoyo técnico al equipo

---

## 🗄️ Base de Datos

La base de datos debe incluir como mínimo las siguientes tablas:
- **usuarios** (con roles: admin, cliente)
- **solicitudes** (estado, fecha, id_usuario)
- **eventos** (único evento del sistema)

---

## 🧩 Requisitos Técnicos

- PHP (con conexión a base de datos, sesiones, manejo de formularios)
- MySQL (modelo relacional)
- HTML, CSS, JS para el frontend
- Librerías opcionales: Bootstrap, FontAwesome, etc.
