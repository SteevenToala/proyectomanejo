<?php
// Simular usuario logueado
$usuario_id = 1;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver Estado de Solicitud</title>
</head>
<body>
    <h2>Estado de tu solicitud</h2>
    <div id="estadoSolicitud">Cargando estado...</div>

    <a href="../index.php">Volver</a>

    <script>
        // Pasar variable PHP a JS
        const usuarioId = <?php echo json_encode($usuario_id); ?>;
    </script>
    <script src="../js/solicitudes.js"></script>
</body>
</html>
