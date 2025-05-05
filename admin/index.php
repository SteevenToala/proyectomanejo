<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: /proyectomanejo/pages/login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Gestión de Solicitudes</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="styles/admin_styes.css">
</head>
<body class="background">

<div class="fixed-n">AviFest</div>
  <!-- Barra de navegación fija -->
  <nav class="navbar fixed-top px-4">
    <div class="dropdown ms-auto">
      <div class="profile-img dropdown-toggle" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false"></div>
      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
        <li><a class="dropdown-item text-danger" href="./logout.php">Cerrar sesión</a></li>
      </ul>
    </div>
  </nav>

  <!-- Encabezado de sección -->
  <div class="lista mt-5">
    <h5 class="mb-3">Lista de Solicitudes</h5>
  </div>

  <!-- Contenido principal -->
  <div class="container my-4">
    <div class="bg-white p-4 rounded shadow-sm">
      <div id="solicitudes-container"></div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="./js/admin_js.js"></script>
</body>
</html>
