<?php
require_once '../../utils/conexion.php';

function crearSolicitud($usuario_id) {
    global $conexion;

    // Verificar si existe solicitud pendiente o aprobada
    $stmt_check = $conexion->prepare("SELECT id FROM solicitudes WHERE id_usuario = ? AND estado IN ('pendiente', 'aprobado')");
    if (!$stmt_check) return false;
    $stmt_check->bind_param("i", $usuario_id);
    $stmt_check->execute();
    $stmt_check->store_result();
    if ($stmt_check->num_rows > 0) {
        $stmt_check->close();
        return false;
    }
    $stmt_check->close();

    $stmt = $conexion->prepare("INSERT INTO solicitudes (id_usuario, estado) VALUES (?, 'pendiente')");
    if (!$stmt) return false;
    $stmt->bind_param("i", $usuario_id);
    $res = $stmt->execute();
    $stmt->close();
    return $res;
}

function obtenerEstadoSolicitud($usuario_id) {
    global $conexion;
    $stmt = $conexion->prepare("SELECT estado FROM solicitudes WHERE id_usuario = ? ORDER BY fecha_solicitud DESC LIMIT 1");
    if (!$stmt) return null;
    $stmt->bind_param("i", $usuario_id);
    $stmt->execute();
    $stmt->bind_result($estado);
    if ($stmt->fetch()) {
        $stmt->close();
        return $estado;
    }
    $stmt->close();
    return null;
}
?>
