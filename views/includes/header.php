<?php
//Cambiar según el entorno
if ($_SERVER['HTTP_HOST'] == 'localhost') {
    //Entorno local
    define('BASE_URL', 'http://localhost/tienda_online/');
} else {
    //Entorno de producción
    define('BASE_URL', 'https://joyeriavictoria.kalef.es/'); // Ajusta tu dominio aquí
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo BASE_URL; ?>assets/favicon.ico" />
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo BASE_URL; ?>assets/css/styles.css" rel="stylesheet">
</head>