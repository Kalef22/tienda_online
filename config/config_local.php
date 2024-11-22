<?php
const DB_HOST = "localhost";
const DB_NAME = "tienda_online";
const DB_USER = "admin";
const DB_PASS = "NstF2@O@U6yBqaF6";

try{
    // Crear una nueva conexión PDO
    $pdo = new PDO ("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
    // Establecer el modo de error de PDO a excepción
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    echo "Error de conexion: ". $e->getMessage();
    die();
}