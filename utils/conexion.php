<?php
// Cargar variables de entorno desde .env (sin Composer)
function cargarEnv($ruta) {
    if (!file_exists($ruta)) return;

    $lineas = file($ruta, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lineas as $linea) {
        if (strpos(trim($linea), '#') === 0) continue; // Ignora comentarios
        list($clave, $valor) = explode('=', $linea, 2);
        putenv(trim($clave) . '=' . trim($valor));
        $_ENV[trim($clave)] = trim($valor);
        $_SERVER[trim($clave)] = trim($valor);
    }
}

cargarEnv(__DIR__ . '/../.env'); // Ajusta el path si tu .env está en la raíz

$conexion = new mysqli(
    $_ENV['DB_HOST'],
    $_ENV['DB_USER'],
    $_ENV['DB_PASS'],
    $_ENV['DB_NAME']
);

if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}
?>
