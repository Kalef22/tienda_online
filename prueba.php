<?php
require __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;

// Carga el archivo .env desde la raíz del proyecto
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

echo "Variable de entorno: " . $_ENV['DB_HOST'];
echo "Variable de entorno: " . $_ENV['DB_NAME'];
echo "Variable de entorno: " . $_ENV['DB_USER'];

