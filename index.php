<?php
require_once 'config/config.php';
try{
    $pdo = (new conexion())->getConexion();
    $pdo = new PDO('mysql:host=localhost,dbname=tienda_online', 'root', '');

    $query_listar ="SELECT id_cliente, nombre, apellido1, apellido2, email, rol FROM cliente";
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
                    <td>".$usuario['rol']."</td>
                    </tr>";
        }
        echo "</tbody>
            </table>";
    }else{
        echo "No hay usuarios registrados";
    }
} catch(PDOException $e){
    echo "Error al listar usuarios: ".$e->getMessage();
    return false;
}

?>