<?php
require_once '../includes/functions.php';

// Simular usuario logueado
$usuario_id = 1;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Solicitud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles/crear_solicitud.css"> 
</head>
<body class="background">
  <div class="container">
    <h2>Solicitar participación en el evento</h2>
    <button id="btnSolicitar">Solicitar participación</button>
    <p id="mensaje"></p>
    <a href="../index.php">Volver</a>
</div>
    <script>
        // Pasar variable PHP a JS
        const usuarioId = <?php echo json_encode($usuario_id); ?>;
    </script>
    <script src="../js/solicitudes.js"></script>
</body>
</html>
