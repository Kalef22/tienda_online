<?php
session_start();
require_once '../config/Conexion.php';
require_once '../models/Usuario.php';

$conexion = new Conexion();
$db = $conexion->getConexion();
$usuarioModel = new Usuario($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'check_email') {
        $email = $_POST['email'];
        $emailExists = $usuarioModel->emailExists($email);
        echo $emailExists ? 'exists' : 'not_exists';
        exit;
    }

    $nombre = $_POST['nombre'];
    $apellido1 = $_POST['apellido1'];
    $apellido2 = $_POST['apellido2'];
    $email = $_POST['email'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $contrasenia = $_POST['password'];

    $usuarioCreado = $usuarioModel->crearUsuario($nombre, $apellido1, $apellido2, $email, $direccion, $telefono, $fecha_nacimiento, $contrasenia);

    if ($usuarioCreado) {
        $_SESSION['success'] = 'Usuario creado exitosamente';
        header('Location: ../views/usuarios/login.php');
    } else {
        $_SESSION['error'] = 'Error al crear el usuario';
        header('Location: ../views/usuarios/register.php');
    }
}