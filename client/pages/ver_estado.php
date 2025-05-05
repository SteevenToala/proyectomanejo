<?php
// Simular usuario logueado
$usuario_id = 1;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver Estado de Solicitud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles/estado_solicitud.css">
</head>
<body>
    <div class="background">
        <div class="container">
            <h2>Estado de tu solicitud</h2>
            <div id="estadoSolicitud">Cargando estado...</div>
            <a href="../index.php">Volver</a>
        </div>
    </div>

    <script>
        const usuarioId = <?php echo json_encode($usuario_id); ?>;
    </script>
    <script src="../js/solicitudes.js"></script>
</body>
</html>
