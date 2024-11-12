<?php
class Usuario{
    private $pdo;
    private $error = [];
    
    public function __contruct(){
        require_once 'config/config.php';
        try{
            $dns = "mysql:host=".DB_HOST.";dbname=".DB_NAME;
            $this->pdo = new PDO($dns, DB_USER, DB_PASS);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            $this->error['error_conexion'] = "Error de conexion: ".$e->getMessage();
        }
    }

    public function crearUsuario(){
        
    }

    public function loginUsuario(){
        
    }

    public function listarUsuarios(){
        
    }

    public function actualizarUsuario(){
        
    }

    public function eliminarUsuario(){
        
    }
}