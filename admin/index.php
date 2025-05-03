<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Gestión de Solicitudes</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #e0e0e0;
    }
    .navbar {
      background-color: #f8f9fa;
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
        <li><a class="dropdown-item text-danger" href="#">Salir</a></li>
      </ul>
    </div>
  </nav>

  <!-- Contenido principal -->
  <div class="container my-4">

    <div class="bg-white p-4 rounded shadow-sm">
      <h5 class="mb-3">Lista de Solicitudes</h5>

      <!-- Solicitud 1 -->
      <div class="card card-solicitud mb-3 p-3 d-flex flex-md-row justify-content-between align-items-center">
        <div><strong>SOLICITUD #1</strong></div>
        <select class="form-select w-auto">
          <option value="pendiente">Pendiente</option>
          <option value="aprobado">Aprobado</option>
          <option value="rechazado">Rechazado</option>
        </select>
      </div>

      <!-- Solicitud 2 -->
      <div class="card card-solicitud mb-3 p-3 d-flex flex-md-row justify-content-between align-items-center">
        <div><strong>SOLICITUD #2</strong></div>
        <select class="form-select w-auto">
          <option value="pendiente">Pendiente</option>
          <option value="aprobado">Aprobado</option>
          <option value="rechazado">Rechazado</option>
        </select>
      </div>

      <!-- Solicitud 3 -->
      <div class="card card-solicitud mb-3 p-3 d-flex flex-md-row justify-content-between align-items-center">
        <div><strong>SOLICITUD #3</strong></div>
        <select class="form-select w-auto">
          <option value="pendiente">Pendiente</option>
          <option value="aprobado">Aprobado</option>
          <option value="rechazado">Rechazado</option>
        </select>
      </div>

      <!-- Botón guardar -->
      <div class="text-end mt-4">
        <button class="btn btn-success">Guardar</button>
      </div>
    </div>

  </div>

  <!-- Scripts de Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="./js/admin_js.js"></script>
</body>
</html>
