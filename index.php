<?php
$db_host = getenv('DB_HOST');
echo $db_host;
// --------------------- ENRUTADOR CON SOPORTE PARA CONTROLADORES ---------------------

// Obtiene las rutas solicitadas
$request_uri = $_SERVER['REQUEST_URI'];
// Obtiene la ruta base
$base_path = "/tienda_online/";
// Elimina la ruta base y contendrá la parte de la URI que sigue a la ruta base,
$ruta = str_replace($base_path, '', $request_uri);
// Obtener la parte de la ruta antes del primer signo de interrogación ?
$ruta = strtok($route, '?');


// Función para cargar controladores dinámicamente
function cargarControlador($controlador, $accion = 'index')
{
    // Utiliza la sintaxis de interpolación de variables en PHP para construir una cadena de texto
    $archivo_controlador = "controllers/{$controlador}.php";

    // verifica si un archivo o directorio existe en la ruta especificada por $archivo_controlador.
    if (file_exists($archivo_controlador)) {
        include_once $archivo_controlador;
        // Verifica si una función existe
        if (function_exists($accion)) {
            $accion();
        } else {
            die("Acción no encontrada: $accion");
        }
    } else {
        include 'views/404.php';
    }

}

// Tabla de rutas 
$rutas = [
    '/' => ['informacionController', 'inicio'],
    '/usuarios/login' => ['usuariosController', 'login'],
    '/usuarios/register' => ['usuariosController', 'register'],
    '/informacion/sobreNosotros' => ['informacionController', 'sobreNosotros'],
    '/informacion/contacto' => ['informacionController', 'contacto'],
];

// Procesar la ruta
if (array_key_exists($ruta, $rutas)) {
    $controller = $rutas[$ruta][0];
    $action = $rutas[$ruta][1];
    cargarControlador($controller, $action);
} else {
    include 'views/404.php';
}