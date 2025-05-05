<?php
require_once '../includes/functions.php';

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
    <title>Crear Solicitud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles/crear_solicitud.css"> 
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/cover/">
    <script src="../../assets/js/color-modes.js"></script>
    <link href="../../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../cover.css" rel="stylesheet">
        

</head>
<body class="background">
    <?php include '../includes/menu_pages.php'; ?>  
  <div class="container">
    <h2>Solicitar participación en el evento</h2>
    <p id="mensaje" style="padding: 0px;background-color: white;"></p>
    <button id="btnSolicitar">Solicitar participación</button>   
    <a href="solicitudes.php" class="a">Volver</a>     
</div>
    <script>
        // Pasar variable PHP a JS
        const usuarioId = <?php echo json_encode($usuario_id); ?>;
    </script>
    <script src="../js/solicitudes.js"></script>
</body>
</html>
