<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'vendor/autoload.php';

// Cambiar según el entorno
if ($_SERVER['HTTP_HOST'] == 'localhost') {
    // Entorno local
    define('BASE_URL', 'http://localhost/tienda_online/');
} else {
    // Entorno de producción
    define('BASE_URL', 'https://joyeriavictoria.kalef.es/'); // Ajusta tu dominio aquí
}

// --------------------- ENRUTADOR CON SOPORTE PARA CONTROLADORES ---------------------

// Obtiene las rutas solicitadas
$request_uri = $_SERVER['REQUEST_URI'];
echo $request_uri;
// Obtiene la ruta base
$base_path = '/'; // Ajusta esto para que coincida con tu subdominio

// Elimina la ruta base y contendrá la parte de la URI que sigue a la ruta base
$ruta = str_replace($base_path, '', $request_uri);

// Obtener la parte de la ruta antes del primer signo de interrogación ?
$ruta = strtok($ruta, '?');

// Función para cargar controladores dinámicamente
function cargarControlador($controller, $action = 'index') {
    $controller_file = __DIR__ . "/controllers/{$controller}.php";

    if (file_exists($controller_file)) {
        include $controller_file;
        if (class_exists($controller)) {
            $controller_instance = new $controller();
            if (method_exists($controller_instance, $action)) {
                $controller_instance->$action();
            } else {
                die("Acción no encontrada: $action");
            }
        } else {
            die("Controlador no encontrado: $controller");
        }
    } else {
        include __DIR__ . '/views/404.php'; // Archivo no encontrado
    }
}

// Tabla de rutas -----------------------------------
// $rutas: Es un array asociativo que mapea las rutas de la URL a los controladores y acciones correspondientes.
// Clave del Array: La clave es la ruta de la URL.
// Valor del Array: El valor es un array que contiene dos elementos:
// El nombre del controlador.
// El nombre de la acción (función) dentro del controlador.
$rutas = [
    '/' => ['ControladorIndex', 'index'],
    'informacion/sobreNosotros' => ['ControladorIndex', 'sobreNosotros'],
    'informacion/contacto' => ['ControladorIndex', 'contacto'],
    'usuarios/login.php' => ['ControladorIndex', 'login'],
    'usuarios/register' => ['ControladorIndex', 'register'],
];

// Procesar la ruta -----------------------------------
// array_key_exists($ruta, $rutas): Verifica si la ruta solicitada ($ruta) existe en el array $rutas.
if (array_key_exists($ruta, $rutas)) {
    $controller = $rutas[$ruta][0];
    $action = $rutas[$ruta][1];
    cargarControlador($controller, $action);
} else {
    echo "Ruta no encontrada: $ruta";
    include __DIR__ . '/views/inicio.php';
}