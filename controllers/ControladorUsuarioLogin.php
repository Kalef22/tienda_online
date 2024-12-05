<?php
    session_start();
    include_once('../models/Usuario.php');
    
    $usuario_login = new Usuario;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = isset($_POST['email'])? htmlspecialchars(stripslashes($_POST['email'])) : '';
    $password = isset($_POST['password'])? htmlspecialchars(stripslashes($_POST['password'])) : '';

    // $usuario = $usuario_login->login($email, $password);
    $usuario = $usuario_login->login($email, $password);
    // echo '<pre>';
    // var_dump($usuario);
    // echo '</pre>';

    if ($usuario) {
        $_SESSION['id_cliente'] = $usuario['id_cliente'];
        $_SESSION['nombre'] = $usuario['nombre'];
        $_SESSION['apellido1'] = $usuario['apellido1'];
        $_SESSION['apellido2'] = $usuario['apellido2'];
        $_SESSION['email'] = $usuario['email'];
        $_SESSION['direccion'] = $usuario['direccion'];
        $_SESSION['telefono'] = $usuario['telefono'];
        $_SESSION['fecha_nacimiento'] = $usuario['fecha_nacimiento'];
        $_SESSION['rol'] = $usuario['rol'];
        $_SESSION['fecha_registro'] = $usuario['fecha_registro'];
        header('Location: ../index.php');
    } else {
        $_SESSION['error'] = 'Credenciales incorrectas';
        header('Location: ../views/usuarios/login.php');
    }
}