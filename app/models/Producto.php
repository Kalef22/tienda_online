<?php
class Producto{
    private $pdo;

    function __construct(){
        try{
            require_once 'config/config.php';
            $this->pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo "Error de conexion: ". $e->getMessage();
        }
    }
}

?>