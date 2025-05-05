<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    // No hay sesión activa
    header("Location: /proyectomanejo/pages/login.php");
    exit();
}
$usuario_id = $_SESSION['user_id'];
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver Estado de Solicitud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles/estado_solicitud.css">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/cover/">
    <script src="../../assets/js/color-modes.js"></script>
    <link href="../../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../cover.css" rel="stylesheet">
</head>
<body>
    
    <div class="background">
    <?php include '../includes/menu_pages.php'; ?>  
        <div class="container">
            <h2>Estado de tu solicitud</h2>
            <div id="estadoSolicitud">Cargando estado...</div>
            <a href="./solicitudes.php" class="a">Volver</a>
        </div>
    </div>

    <script>
        const usuarioId = <?php echo json_encode($usuario_id); ?>;
    </script>
    <script src="../js/solicitudes.js"></script>
</body>
</html>
