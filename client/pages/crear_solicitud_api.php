<?php
require_once '../includes/functions.php';

header('Content-Type: application/json');

// Leer JSON recibido
$input = json_decode(file_get_contents('php://input'), true);

if (!isset($input['usuario_id']) || intval($input['usuario_id']) <= 0) {
    echo json_encode(['success' => false, 'message' => 'Usuario no válido']);
    exit;
}

$usuario_id = intval($input['usuario_id']);

if (crearSolicitud($usuario_id)) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Ya existe una solicitud pendiente o aprobada']);
}
?>
