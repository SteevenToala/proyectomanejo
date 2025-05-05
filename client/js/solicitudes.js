// Función para crear solicitud vía AJAX
function crearSolicitud(usuarioId) {
    fetch('../pages/crear_solicitud_api.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({usuario_id: usuarioId})
    })
    .then(response => response.json())
    .then(data => {
        const mensaje = document.getElementById('mensaje');
        if (data.success) {
            mensaje.style.color = 'green';
            mensaje.textContent = '¡Solicitud enviada correctamente!';
        } else {
            mensaje.style.color = 'red';
            mensaje.textContent = data.message || 'Error al enviar la solicitud.';
        }
    })
    .catch(() => {
        const mensaje = document.getElementById('mensaje');
        mensaje.style.color = 'red';
        mensaje.textContent = 'Error de comunicación con el servidor.';
    });
}

// Función para consultar estado vía AJAX
function consultarEstado(usuarioId) {
    fetch(`estado_solicitud.php?usuario_id=${usuarioId}`)
    .then(response => response.json())
    .then(data => {
        const divEstado = document.getElementById('estadoSolicitud');
        if (data.error) {
            divEstado.textContent = 'Error: ' + data.error;
            divEstado.style.color = 'red';
            return;
        }
        switch(data.estado) {
            case 'aprobado':
                divEstado.textContent = '¡Tu solicitud fue aprobada!';
                divEstado.style.color = 'green';
                break;
            case 'rechazado':
                divEstado.textContent = 'Tu solicitud fue rechazada.';
                divEstado.style.color = 'red';
                break;
            case 'pendiente':
                divEstado.textContent = 'Tu solicitud está pendiente.';
                divEstado.style.color = 'orange';
                break;
            default:
                divEstado.textContent = 'No has realizado ninguna solicitud.';
                divEstado.style.color = 'black';
        }
    })
    .catch(() => {
        const divEstado = document.getElementById('estadoSolicitud');
        divEstado.textContent = 'Error de comunicación con el servidor.';
        divEstado.style.color = 'red';
    });
}

// Código para página crear_solicitud.php
if (document.getElementById('btnSolicitar')) {
    document.getElementById('btnSolicitar').addEventListener('click', () => {
        crearSolicitud(usuarioId);
    });
}

// Código para página ver_estado.php
if (document.getElementById('estadoSolicitud')) {
    consultarEstado(usuarioId);
}
