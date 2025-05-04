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
</head>
<body>
    <h2>Solicitar participación en el evento</h2>
    <button id="btnSolicitar">Solicitar participación</button>
    <p id="mensaje"></p>

    <a href="../index.php">Volver</a>

    <script>
        // Pasar variable PHP a JS
        const usuarioId = <?php echo json_encode($usuario_id); ?>;
    </script>
    <script src="../js/solicitudes.js"></script>
</body>
</html>
