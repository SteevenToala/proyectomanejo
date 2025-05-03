let solicitudesData = []; // Variable global para almacenar las solicitudes

function cargarSolicitudes() {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'http://localhost/proyectomanejo/utils/actions.php?obtener_solicitudes=1', true);

    xhr.onload = function () {
        if (xhr.status === 200) {
            try {
                const data = JSON.parse(xhr.responseText);
                solicitudesData = data.data;
                mostrarSolicitudes();
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


// Función que recorre el array de solicitudes y las agrega al HTML
function mostrarSolicitudes() {
    const solicitudesContainer = document.getElementById('solicitudes-container');
    solicitudesContainer.innerHTML = ''; // Limpiar el contenedor antes de agregar las nuevas solicitudes

    // Recorrer el array de solicitudes y agregar cada una al HTML
    solicitudesData.forEach((solicitud, index) => {
        const solicitudElement = document.createElement('div');
        solicitudElement.classList.add('card', 'card-solicitud', 'mb-3', 'p-3', 'd-flex', 'flex-md-row', 'justify-content-between', 'align-items-center');

        solicitudElement.innerHTML = `
            <div><strong>Solicitud del usuario ${solicitud.nombre}</strong></div>
            <div class="d-flex align-items-center gap-2">
                <select class="form-select w-auto" data-id="${solicitud.id}">
                    <option value="pendiente" ${solicitud.estado === 'pendiente' ? 'selected' : ''}>Pendiente</option>
                    <option value="aprobado" ${solicitud.estado === 'aprobado' ? 'selected' : ''}>Aprobado</option>
                    <option value="rechazado" ${solicitud.estado === 'rechazado' ? 'selected' : ''}>Rechazado</option>
                </select>
                <button class="btn btn-primary btn-modificar" data-id="${solicitud.id}">Modificar</button>
            </div>
            `;
        
        solicitudesContainer.appendChild(solicitudElement);
    });


    // Agregar eventos a los botones "Modificar"
const botonesModificar = document.querySelectorAll('.btn-modificar');
botonesModificar.forEach(boton => {
    boton.addEventListener('click', function () {
        const idSolicitud = this.getAttribute('data-id');
        const select = this.previousElementSibling;
        const nuevoEstado = select.value;
        actualizarEstadoSolicitud(idSolicitud, nuevoEstado);
    });
});



}

// Llamar a la función para cargar las solicitudes al cargar la página
window.onload = function() {
    cargarSolicitudes();
};


function actualizarEstadoSolicitud(id, nuevoEstado) {
    const formData = new FormData();
    formData.append('actualizar_estado', '1');
    formData.append('id', id);
    formData.append('estado', nuevoEstado.toLowerCase());

    fetch('http://localhost/proyectomanejo/utils/actions.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text()) // Si esperas JSON, usa .json()
    .then(result => {
        alert('Estado actualizado con éxito.');
    })
    .catch(error => {
        console.error('Error al actualizar el estado:', error);
        alert('Hubo un error al actualizar el estado.');
    });
}
