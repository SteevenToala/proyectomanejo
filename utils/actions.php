<?php
// acciones.php
include 'functions.php';

// Crear usuario
if (isset($_POST['crear_usuario'])) {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $rol = $_POST['rol'];
    if (crearUsuario($nombre, $correo, $contrasena, $rol)) {
        echo "Usuario creado con éxito.";
    } else {
        echo "Error al crear usuario.";
    }
}

// Actualizar usuario
if (isset($_POST['actualizar_usuario'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $rol = $_POST['rol'];
    if (actualizarUsuario($id, $nombre, $correo, $rol)) {
        echo "Usuario actualizado con éxito.";
    } else {
        echo "Error al actualizar usuario.";
    }
}

// Eliminar usuario
if (isset($_POST['eliminar_usuario'])) {
    $id = $_POST['id'];
    if (eliminarUsuario($id)) {
        echo "Usuario eliminado con éxito.";
    } else {
        echo "Error al eliminar usuario.";
    }
}

// Aprobar solicitud
if (isset($_POST['aprobar_solicitud'])) {
    $id = $_POST['id'];
    if (actualizarEstadoSolicitud($id, 'aprobado')) {
        echo "Solicitud aprobada con éxito.";
    } else {
        echo "Error al aprobar solicitud.";
    }
}

// Rechazar solicitud
if (isset($_POST['rechazar_solicitud'])) {
    $id = $_POST['id'];
    if (actualizarEstadoSolicitud($id, 'rechazado')) {
        echo "Solicitud rechazada con éxito.";
    } else {
        echo "Error al rechazar solicitud.";
    }
}
?>
