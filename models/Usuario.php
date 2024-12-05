<?php
include_once '../config/Conexion.php';

class Usuario{
    private $pdo;
    private $error = [];
    
    public function __construct() {
        try {
            $this->pdo = (new Conexion())->getConexion();
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          
        } catch (PDOException $e) {
            $this->error['error_conexion'] = "Error de conexion: " . $e->getMessage();
        }
    }

    public function login($email, $password) {
        try {
            $query_iniciar = 'SELECT id_cliente, nombre, apellido1, apellido2, email, direccion, telefono, fecha_nacimiento, contrasenia, rol, fecha_registro FROM cliente WHERE email = :email';
            $stmt_iniciar = $this->pdo->prepare($query_iniciar);
            $stmt_iniciar->bindParam(':email', $email);
            $stmt_iniciar->execute();
            $usuario = $stmt_iniciar->fetch(PDO::FETCH_ASSOC);

            if ($usuario && password_verify($password, $usuario['contrasenia'])) {
                return $usuario;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            $this->error['error_login'] = "Error al iniciar sesión: " . $e->getMessage();
            return false;
        }
    }

// ----------------------------------------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------------------------------------

    public function getConnection() {
        return $this->pdo;
    }

    public function getErrors() {
        return $this->error;
    }

    public function emailExists($email) {
        try {
            $query = 'SELECT COUNT(*) FROM cliente WHERE email = :email';
            $stmt = $this->pdo->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $count = $stmt->fetchColumn();
            return $count > 0;
        } catch (PDOException $e) {
            $this->error['error_email'] = "Error al verificar el correo: " . $e->getMessage();
            return false;
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: ../index.php');
    }

    public function crearUsuario($nombre, $apellido1, $apellido2, $email, $direccion, $telefono, $fecha_nacimiento, $contrasenia) {
        try {
            $rol = "superadmin";
            $contrasenia_cifrada = password_hash($contrasenia, PASSWORD_DEFAULT); // Cifrar la contraseña
            $query_crear = 'INSERT INTO cliente (nombre, apellido1, apellido2, email, direccion, telefono, fecha_nacimiento, contrasenia, rol) VALUES (:nombre, :apellido1, :apellido2, :email, :direccion, :telefono, :fecha_nacimiento, :contrasenia, :rol)';
            $stmt_crear = $this->pdo->prepare($query_crear);
            $stmt_crear->bindParam(':nombre', $nombre);
            $stmt_crear->bindParam(':apellido1', $apellido1);
            $stmt_crear->bindParam(':apellido2', $apellido2);
            $stmt_crear->bindParam(':email', $email);
            $stmt_crear->bindParam(':direccion', $direccion);
            $stmt_crear->bindParam(':telefono', $telefono);
            $stmt_crear->bindParam(':fecha_nacimiento', $fecha_nacimiento);
            $stmt_crear->bindParam(':contrasenia', $contrasenia_cifrada); // Almacenar la contraseña cifrada
            $stmt_crear->bindParam(':rol', $rol);
            $stmt_crear->execute();
            return true;
        } catch (PDOException $e) {
            $this->error['error_crear'] = "Error al crear usuario: " . $e->getMessage();
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