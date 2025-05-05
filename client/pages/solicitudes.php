<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    // No hay sesión activa
    header("Location: /proyectomanejo/pages/login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Solicitudes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles/client_menu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="../styles/login.css" >
    <link href="../../cover.css" rel="stylesheet">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/cover/">
    <script src="../../assets/js/color-modes.js"></script>
    <style>
    nav {
  position: relative;
  z-index: 2;
}
    .mb-auto2 {
        width: 60%;
        height: 30px;
        display: flex;
        margin: 0 auto;     
        margin-bottom: 30px;   
        z-index: 3;      
    }
    .mb-auto2 .log{
        text-decoration: none;
        color: white;
    }
    .mb-auto2 div{
        width: 100%;
        height: 100%;        
        display: flex;
        justify-content: space-around;
        align-items: center;

    }
    .fw-bold{
        font-weight: 700;
    }
    body{
        display: flex;
        flex-direction: column;
        margin: 0;
        color:#ffffff;    
        justify-content: start;    
    }
    .float-md-start{
        color: white !important;   
        font-size: calc(1.3rem + .6vw) !important; 
    }    
</style>
</head>
<body class="background">
<?php include '../includes/menu_pages.php'; ?>  
<div class="main-container">
  <div class="card">
    <h1 class="card-title">Sistema de Solicitudes</h1>
    <a href="../pages/crear_solicitud.php" class="btn btn-primary btn-custom">Crear nueva solicitud</a>
    <a href="../pages/ver_estado.php" class="btn btn-outline-secondary btn-custom">Ver estado de mi solicitud</a>
  </div>
</div>
</body>
</html>