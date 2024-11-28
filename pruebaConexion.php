<?php
require_once 'config/config.php';
try{
    $pdo = (new conexion())->getConexion();

    $query_listar ="SELECT id_cliente, nombre, apellido1, apellido2, email, rol FROM cliente";
    $stmt_listar = $pdo->prepare($query_listar);
    $stmt_listar->execute();
    $usuarios = $stmt_listar->fetchAll(PDO::FETCH_ASSOC);
    if(count($usuarios)>0){
        echo "<table>
                <thead>
                    <tr>
                        <th>id_cliente</th>
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
                    <td>".$usuario['id_cliente']."</td>
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Probando conexion</h2>
</body>
</html>