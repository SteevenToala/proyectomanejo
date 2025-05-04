<?php
require_once '../client/includes/functions.php';

header('Content-Type: application/json');

// Obtener usuario desde GET o POST (seguridad: en producción usar sesión)
$usuario_id = isset($_GET['usuario_id']) ? intval($_GET['usuario_id']) : 0;

if ($usuario_id <= 0) {
    echo json_encode(['error' => 'Usuario no válido']);
    exit;
}

$estado = obtenerEstadoSolicitud($usuario_id);

if ($estado) {
    echo json_encode(['estado' => $estado]);
} else {
    echo json_encode(['estado' => null]);
}
?>
