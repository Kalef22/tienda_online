<?php

class Usuario{
    private $pdo;
    private $error = [];
    const DB_HOST = "localhost";
    const DB_NAME = "tienda_online";
    const DB_USER = "admin";
    const DB_PASS = "NstF2@O@U6yBqaF6";
  
    
    public function __construct() {
        try {
            
            $dsn = "mysql:host=" . self::DB_HOST . ";dbname=" . self::DB_NAME;
            $this->pdo = new PDO($dsn, self::DB_USER, self::DB_PASS);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            $this->error['error_conexion'] = "Error de conexion: " . $e->getMessage();
        }
    }

    public function getErrors() {
        return $this->error;
    }

    public function iniciarSesion($email, $password) {
        try{
            $query = 'SELECT id_cliente,nombre, apellido1, apellido2, email, direccion, telefono FROM cliente WHERE email = :email AND contrasenia = :contrasenia';
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':contrasenia', $password, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $this->error['error_login'] = "Error al iniciar sesión: " . $e->getMessage();
            return false;
        }
    }

    public function cerrarSesion() {
        session_start();
        session_destroy();
        header('Location: ../index.php');
    }

    public function crearUsuario($nombre, $apellido1, $apellido2, $email, $direccion, $telefono, $contrasenia){
        try{
        $query_crear = "INSERT INTO cliente (nombre, apellido1, apellido2, email, direccion, telefono, contrasenia) VALUES (:nombre, :apellido1, :apellido2, :email, :direccion, :telefono, :contrasenia)";
        $stmt_crear = $this->pdo->prepare($query_crear);
        $stmt_crear->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt_crear->bindParam(':nombre', $apellido1, PDO::PARAM_STR);
        $stmt_crear->bindParam(':nombre', $apellido2, PDO::PARAM_STR);
        $stmt_crear->bindParam(':nombre', $email, PDO::PARAM_STR);
        $stmt_crear->bindParam(':nombre', $direccion, PDO::PARAM_STR);
        $stmt_crear->bindParam(':nombre', $telefono, PDO::PARAM_STR);
        $stmt_crear->bindParam(':nombre', $contrasenia, PDO::PARAM_STR);
        $stmt_crear->execute();
        return true;
        }catch(PDOException $e){
            $error['error_crear']= "Error al crear usuario: ".$e->getMessage();
            return false;
        }
        
    }

    public function listarUsuarios(){
        try{
        $query_listar ="SELECT id_usuario, nombre, apellido1, apellido2, email FROM usuarios";
        $stmt_listar = $this->pdo->prepare($query_listar);
        $stmt_listar->execute();
        $usuarios = $stmt_listar->fetchAll(PDO::FETCH_ASSOC);
            if(count($usuarios)>0){
                echo "<table>
                        <thead>
                            <tr>
                                <th>id_usuario</th>
                                <th>Nombre</th>
                                <th>Primer apellido</th>
                                <th>Segundo apellido</th>
                                <th>Email</th>
                                <th>Rol</th>
                            </tr>
                        </thead>
                        <tbody>";
                foreach($usuarios as $usuario){
                    echo "<tr>
                            <td>".$usuario['id_usuario']."</td>
                            <td>".$usuario['nombre']."</td>
                            <td>".$usuario['apellido1']."</td>
                            <td>".$usuario['apellido2']."</td>
                            <td>".$usuario['email']."</td>
                            </tr>";
                }
                echo "</tbody>
                    </table>";
            }else{
                $error['error_listar'] = "No hay usuarios registrados";
            }
        }catch(PDOException $e){
            $error['error_listar'] = "Error al listar usuarios: ".$e->getMessage();
            return false;
        }
    }

    public function actualizarRol($id_usuario, $rol){
        try{
        $query_rol= "UPDATE usuario SET rol = :rol WHERE id_usuario = :id_usuario";
        $stmt_rol = $this->pdo->prepare($query_rol);
        $stmt_rol->bindParam(':rol', $rol, PDO::PARAM_STR);
        $stmt_rol->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $stmt_rol->execute();
        return true;
        }catch(PDOException $e){
            $error['error_rol'] = "Error al actualizar rol: ". $e->getMessage();
            return false;
        }
        
    }

    public function eliminarUsuario($id_usuario){
        try{
            $query_eliminar = "DELETE FROM usuario WHERE id_usuario = :id_usuario";
            $stmt_eliminar = $this->pdo->prepare($query_eliminar);
            $stmt_eliminar->bindParam(':id_usuario', $id_usuario, PDO::PARAM_INT);
            $stmt_eliminar->execute();
            return true;
        }catch(PDOException $e){
            $error['error_eliminar'] = "Error al eliminar usuario: ".$e->getMessage();
            return false;
        }
        
    }

    public function obtenerUsuario($id){
        try{
            $query_obtener = "SELECT id_usuario, nombre, apellido1, apellido2, email, rol FROM usuario WHERE id_usuario = :id_usuario";
            $stmt_obtener = $this->pdo->prepare($query_obtener);
            $stmt_obtener->bindParam(':id_usuario', $id, PDO::PARAM_INT);
            $stmt_obtener->execute();
            return $stmt_obtener->fetch(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            $error['error_obtener'] = "Error al obtener usuario: ".$e->getMessage();
            return false;
        }
    }
}