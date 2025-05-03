function cargarSolicitudes() {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'http://localhost/proyectomanejo/utils/actions.php?obtener_solicitudes=1', true);

    xhr.onload = function () {
        if (xhr.status === 200) {
            try {
                const data = JSON.parse(xhr.responseText);
                console.log('Solicitudes cargadas:', data); 
            } catch (e) {
                console.error('Error al parsear JSON:', e.message);
            }
        } else {
            console.error('Error al cargar solicitudes:', xhr.statusText);
        }
    };

    xhr.onerror = function () {
        console.error('Error de red al intentar cargar solicitudes.');
    };

    xhr.send();
}

cargarSolicitudes()