<?php
require __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;

// Carga el archivo .env desde la raíz del proyecto
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$db_host = $_ENV['DB_HOST'];
$db_name = $_ENV['DB_NAME'];
$db_user = $_ENV['DB_USER'];
$db_pass = $_ENV['DB_PASSWORD'];

try {
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $nombre = "david";
$apellido1 = "garcia";
$apellido2= "garcia";
$email = "david@david.com";
$contrasenia = "01";
$sql = "INSERT INTO clientes (nombre, apellido1, apellido2, email, contrasenia) VALUES (:nombre, :apellido1, :apellido2, :email, :contrasenia)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    'nombre' => $nombre,
    'apellido1' => $apellido1,
    'apellido2' => $apellido2,
    'email' => $email,
    'contrasenia' => $contrasenia,]);
echo "Cliente insertado correctamente";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    die("Error: " . $e->getMessage());
}




   

