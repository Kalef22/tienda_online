<?php
require_once __DIR__ . '/../vendor/autoload.php';
// __DIR__ se refiere al directorio actual donde está el archivo config.php.
// ../ sube un nivel al directorio raíz del proyecto.

use Dotenv\Dotenv;

// Carga el archivo .env desde la raíz del proyecto
$dotenv = Dotenv::createImmutable(__DIR__.'/../');
$dotenv->load();

class Conexion {
    private $pdo;

    public function __construct() {
        try {
            $this->pdo = new PDO('mysql:host='.$_ENV['DB_HOST'].';dbname='.$_ENV['DB_NAME'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    // Método para obtener la conexión PDO
    public function getConexion() {
        return $this->pdo;
    }

    // Método para cerrar la conexión PDO
    public function closeConexion() {
        $this->pdo = null;
    }
}