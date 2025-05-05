<?php
require_once 'conexion.php';

// Crear usuario
function crearUsuario($nombre, $correo, $contrasena, $rol)
{
    global $conexion;
    $contrasenaHash = password_hash($contrasena, PASSWORD_DEFAULT);
    $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, correo, contrasena, rol) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nombre, $correo, $contrasenaHash, $rol);

    try {
        $stmt->execute();
        return ["success" => true];
    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() == 1062) {
            return ["success" => false, "error" => "El correo ya está registrado."];
        } else {
            return ["success" => false, "error" => "Error al crear usuario: " . $e->getMessage()];
        }
    }
}

// Obtener todos los usuarios
function obtenerUsuarios()
{
    global $conexion;
    $resultado = $conexion->query("SELECT * FROM usuarios");
    return $resultado->fetch_all(MYSQLI_ASSOC);
}

// Obtener usuario por ID
function obtenerUsuarioPorId($id)
{
    global $conexion;
    $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $resultado = $stmt->get_result();
    return $resultado->fetch_assoc();
}

// Actualizar usuario
function actualizarUsuario($id, $nombre, $correo, $rol)
{
    global $conexion;
    $stmt = $conexion->prepare("UPDATE usuarios SET nombre = ?, correo = ?, rol = ? WHERE id = ?");
    $stmt->bind_param("sssi", $nombre, $correo, $rol, $id);

    try {
        $stmt->execute();
        return ["success" => true];
    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() == 1062) {
            return ["success" => false, "error" => "El correo ya está registrado."];
        } else {
            return ["success" => false, "error" => "Error al actualizar usuario: " . $e->getMessage()];
        }
    }
}

// Eliminar usuario
function eliminarUsuario($id)
{
    global $conexion;

    // Eliminar primero las solicitudes asociadas a este usuario
    $stmt = $conexion->prepare("DELETE FROM solicitudes WHERE id_usuario = ?");
    $stmt->bind_param("i", $id);
    try {
        $stmt->execute();

        // Luego, eliminar el usuario
        $stmt = $conexion->prepare("DELETE FROM usuarios WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        return ["success" => true];
    } catch (mysqli_sql_exception $e) {
        return ["success" => false, "error" => "Error al eliminar usuario: " . $e->getMessage()];
    }
}



// Crear solicitud
function crearSolicitud($id_usuario)
{
    global $conexion;

    // Verificar si ya existe una solicitud para este usuario
    $stmt = $conexion->prepare("SELECT COUNT(*) FROM solicitudes WHERE id_usuario = ? AND estado = 'pendiente'");
    $stmt->bind_param("i", $id_usuario);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->free_result(); 

    if ($count > 0) {
        // Si ya existe una solicitud pendiente, no permitir crear otra
        return ["success" => false, "error" => "Ya has enviado una solicitud pendiente."];
    }

    // Si no existe, crear la solicitud
    $stmt = $conexion->prepare("INSERT INTO solicitudes (id_usuario, estado) VALUES (?, 'pendiente')");
    $stmt->bind_param("i", $id_usuario);

    try {
        $stmt->execute();
        return ["success" => true];
    } catch (mysqli_sql_exception $e) {
        return ["success" => false, "error" => "Error al crear solicitud: " . $e->getMessage()];
    }
}




// Obtener solicitudes
function obtenerSolicitudes()
{
    global $conexion;
    $resultado = $conexion->query("SELECT s.id,s.estado,s.fecha_solicitud,s.id_usuario,u.nombre FROM solicitudes s INNER JOIN usuarios u ON s.id_usuario=u.id;");
    return $resultado->fetch_all(MYSQLI_ASSOC);
}

// Actualizar estado de solicitud
function actualizarEstadoSolicitud($id, $estado)
{
    global $conexion;
    $stmt = $conexion->prepare("UPDATE solicitudes SET estado = ? WHERE id = ?");
    $stmt->bind_param("si", $estado, $id);

    try {
        $stmt->execute();
        return ["success" => true];
    } catch (mysqli_sql_exception $e) {
        return ["success" => false, "error" => "Error al actualizar estado: " . $e->getMessage()];
    }
}
