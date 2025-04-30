<?php
// funciones.php
include 'conexion.php';

// Función para crear un usuario
function crearUsuario($nombre, $correo, $contrasena, $rol) {
    global $conexion;
    $contrasenaHash = password_hash($contrasena, PASSWORD_DEFAULT); // Encriptar la contraseña
    $query = "INSERT INTO usuarios (nombre, correo, contrasena, rol) VALUES ('$nombre', '$correo', '$contrasenaHash', '$rol')";
    return $conexion->query($query);
}

// Función para obtener todos los usuarios
function obtenerUsuarios() {
    global $conexion;
    $query = "SELECT * FROM usuarios";
    $resultado = $conexion->query($query);
    return $resultado->fetch_all(MYSQLI_ASSOC); // Devuelve los resultados en un array asociativo
}

// Función para obtener un usuario por ID
function obtenerUsuarioPorId($id) {
    global $conexion;
    $query = "SELECT * FROM usuarios WHERE id = $id";
    $resultado = $conexion->query($query);
    return $resultado->fetch_assoc(); // Devuelve un solo resultado
}

// Función para actualizar un usuario
function actualizarUsuario($id, $nombre, $correo, $rol) {
    global $conexion;
    $query = "UPDATE usuarios SET nombre = '$nombre', correo = '$correo', rol = '$rol' WHERE id = $id";
    return $conexion->query($query);
}

// Función para eliminar un usuario
function eliminarUsuario($id) {
    global $conexion;
    $query = "DELETE FROM usuarios WHERE id = $id";
    return $conexion->query($query);
}

// Función para crear una solicitud
function crearSolicitud($id_usuario) {
    global $conexion;
    $query = "INSERT INTO solicitudes (id_usuario) VALUES ($id_usuario)";
    return $conexion->query($query);
}

// Función para obtener todas las solicitudes
function obtenerSolicitudes() {
    global $conexion;
    $query = "SELECT * FROM solicitudes";
    $resultado = $conexion->query($query);
    return $resultado->fetch_all(MYSQLI_ASSOC); // Devuelve los resultados en un array asociativo
}

// Función para aprobar o rechazar una solicitud
function actualizarEstadoSolicitud($id, $estado) {
    global $conexion;
    $query = "UPDATE solicitudes SET estado = '$estado' WHERE id = $id";
    return $conexion->query($query);
}
?>
