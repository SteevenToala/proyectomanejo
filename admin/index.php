<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php"); // Ajusta según tu estructura
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
  <style>
    body {
      background: linear-gradient(to bottom, rgba(0,0,0,0.5), rgba(0,0,0,0.5)),
                  url('https://images.unsplash.com/photo-1506748686214-e9df14d4d9d0?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&q=80&w=1080');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      background-attachment: fixed;
      color: #fff;     
    }
    .navbar {
      background-color: hsla(210, 16.70%, 97.60%, 0.60); 
    }
    .profile-img {
      width: 40px;
      height: 40px;
      background-color: #999;
      border-radius: 50%;
      cursor: pointer;
    }
    .card-solicitud {
      background-color: #f0f0f0;
    }
  </style>
</head>
<body>

  <!-- Barra de navegación con menú desplegable -->
  <nav class="navbar px-4">
    <div class="dropdown ms-auto">
      <div class="profile-img dropdown-toggle" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false"></div>
      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
      <li><a class="dropdown-item text-danger" href="./logout.php">Cerrar sesión</a></li>      
      </ul>
    </div>
  </nav>

  <!-- Contenido principal -->
  <div class="container my-4">

    <div class="bg-white p-4 rounded shadow-sm">
      <h5 class="mb-3">Lista de Solicitudes</h5>

      <div id="solicitudes-container"></div>

    </div>

  </div>

  <!-- Scripts de Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="./js/admin_js.js"></script>
</body>
</html>
