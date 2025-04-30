<?php
session_start();
include 'functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Crear usuario
    if (isset($_POST['crear_usuario'])) {
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $contrasena = $_POST['contrasena'];
        $rol = $_POST['rol'];
        $resultado = crearUsuario($nombre, $correo, $contrasena, $rol);

        if ($resultado['success']) {
            $_SESSION['mensaje'] = "Usuario registrado con éxito.";
            $_SESSION['tipo'] = "success";
        } else {
            $_SESSION['mensaje'] = $resultado['error'];
            $_SESSION['tipo'] = "error";
        }
        header("Location: index.php");
        exit;
    }

    // Actualizar usuario
    if (isset($_POST['actualizar_usuario'])) {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $rol = $_POST['rol'];
        $resultado = actualizarUsuario($id, $nombre, $correo, $rol);

        if ($resultado['success']) {
            $_SESSION['mensaje'] = "Usuario actualizado correctamente.";
            $_SESSION['tipo'] = "success";
        } else {
            $_SESSION['mensaje'] = $resultado['error'];
            $_SESSION['tipo'] = "error";
        }
        header("Location: index.php");
        exit;
    }

    // Eliminar usuario
    if (isset($_POST['eliminar_usuario'])) {
        $id = $_POST['id'];
        $resultado = eliminarUsuario($id);

        if ($resultado['success']) {
            $_SESSION['mensaje'] = "Usuario eliminado correctamente.";
            $_SESSION['tipo'] = "success";
        } else {
            $_SESSION['mensaje'] = $resultado['error'];
            $_SESSION['tipo'] = "error";
        }
        header("Location: index.php");
        exit;
    }

    // Enviar solicitud
    if (isset($_POST['enviar_solicitud'])) {
        $id_usuario = $_POST['id_usuario'];
        $resultado = crearSolicitud($id_usuario);

        if ($resultado['success']) {
            $_SESSION['mensaje'] = "Solicitud enviada correctamente.";
            $_SESSION['tipo'] = "success";
        } else {
            $_SESSION['mensaje'] = $resultado['error'];
            $_SESSION['tipo'] = "error";
        }
        header("Location: index.php");
        exit;
    }

    // Aprobar solicitud
    if (isset($_POST['aprobar_solicitud'])) {
        $id = $_POST['id'];
        $resultado = actualizarEstadoSolicitud($id, 'aprobado'); 

        if ($resultado['success']) {
            $_SESSION['mensaje'] = "Solicitud aprobada.";
            $_SESSION['tipo'] = "success";
        } else {
            $_SESSION['mensaje'] = $resultado['error'];
            $_SESSION['tipo'] = "error";
        }
        header("Location: index.php");
        exit;
    }

    // Rechazar solicitud
    if (isset($_POST['rechazar_solicitud'])) {
        $id = $_POST['id'];
        $resultado = actualizarEstadoSolicitud($id, 'rechazado'); 

        if ($resultado['success']) {
            $_SESSION['mensaje'] = "Solicitud rechazada.";
            $_SESSION['tipo'] = "success";
        } else {
            $_SESSION['mensaje'] = $resultado['error'];
            $_SESSION['tipo'] = "error";
        }
        header("Location: index.php");
        exit;
    }
    // Verifica si se ha enviado el formulario de actualización de estado
    if (isset($_POST['actualizar_estado'])) {
        $id = $_POST['id'];
        $estado = $_POST['estado']; 

        // Actualizar el estado de la solicitud
        $resultado = actualizarEstadoSolicitud($id, $estado);

        if ($resultado['success']) {
            $_SESSION['mensaje'] = 'Estado de la solicitud actualizado con éxito.';
            $_SESSION['tipo'] = 'success';
        } else {
            $_SESSION['mensaje'] = 'Error al actualizar estado: ' . $resultado['error'];
            $_SESSION['tipo'] = 'error';
        }

        // Redirigir para que se actualice la página y se vea el mensaje

        exit();
    }
}
