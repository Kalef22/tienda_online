<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// --------------------- ENRUTADOR CON SOPORTE PARA CONTROLADORES ---------------------

// Obtiene las rutas solicitadas
//$_SERVER['REQUEST_URI']: Obtiene la URI completa de la solicitud actual. Por ejemplo, si la URL es
// http://example.com/tienda_online/productos, entonces $_SERVER['REQUEST_URI'] sería /tienda_online/productos.
$request_uri = $_SERVER['REQUEST_URI'];
// Obtiene la ruta base
$base_path = "/";
// Elimina la ruta base y contendrá la parte de la URI que sigue a la ruta base,
$ruta = str_replace($base_path, '', $request_uri);
// Obtener la parte de la ruta antes del primer signo de interrogación ?
$ruta = strtok($ruta, '?');


// Función para cargar controladores dinámicamente

function cargarControlador($controller, $action = 'index') {
    $controller_file = "controllers/{$controller}.php";

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
        include 'views/404.php'; // Archivo no encontrado
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
    'views/usuarios/login' => ['usuariosController', 'login'],
    'views/usuarios/register' => ['usuariosController', 'register'],
    'views/informacion/sobreNosotros' => ['ControladorInformacion', 'sobreNosotros'],
    'views/informacion/contacto' => ['ControladorInformacion', 'contacto'],
];

// Procesar la ruta -----------------------------------
// array_key_exists($ruta, $rutas): Verifica si la ruta solicitada ($ruta) existe en el array $rutas.
if (array_key_exists($ruta, $rutas)) {
    $controller = $rutas[$ruta][0];
    $action = $rutas[$ruta][1];
    cargarControlador($controller, $action);
} else {
    // echo "error array_key_exists";
    echo 'Ruta esperada: ' . __DIR__ . '/views/404.php';
    include __DIR__ . '/views/404.php'; // Ruta no encontrada
}