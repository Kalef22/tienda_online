<?php
// --------------------- ENRUTADOR CON SOPORTE PARA CONTROLADORES ---------------------

// Obtiene las rutas solicitadas
$request_uri = $_SERVER['REQUEST_URI'];
// Obtiene la ruta base
$base_path = "/";
// Elimina la ruta base y contendrá la parte de la URI que sigue a la ruta base,
$ruta = str_replace($base_path, '', $request_uri);
// Obtener la parte de la ruta antes del primer signo de interrogación ?
$ruta = strtok($route, '?');


// Función para cargar controladores dinámicamente
function cargarControlador($controller, $action = 'index') {
    $controller_file = "controllers/{$controller}.php";

    if (file_exists($controller_file)) {
        include $controller_file;
        if (function_exists($action)) {
            $action(); // Llama a la acción dentro del controlador
        } else {
            die("Acción no encontrada: $action");
        }
    } else {
        echo "error cargar controlador";
        include 'views/404.php'; // Archivo no encontrado
       
    }
}


// Tabla de rutas 
$rutas = [
    '/' => ['informacionController', 'index'],
    'views/usuarios/login' => ['usuariosController', 'login'],
    'views/usuarios/register' => ['usuariosController', 'register'],
    'views/informacion/sobreNosotros' => ['informacionController', 'sobreNosotros'],
    'views/informacion/contacto' => ['informacionController', 'contacto'],
];

// Procesar la ruta
if (array_key_exists($ruta, $rutas)) {
    $controller = $rutas[$ruta][0];
    $action = $rutas[$ruta][1];
    cargarControlador($controller, $action);
} else {
    echo "error array_key_exists";
    // include 'views/404.php';
    include 'insertar.php';
}