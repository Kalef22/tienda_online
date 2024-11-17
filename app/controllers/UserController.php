<?php
require_once '../models/Usuario.php';

class UserController {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = new Usuario();
            $result = $user->login($email, $password);

            if ($result) {
                // Iniciar sesión y redirigir a la página de inicio
                session_start();
                $_SESSION['user'] = $result;
                header('Location: public/index.php');
            } else {
                // Mostrar mensaje de error
                echo "Correo electrónico o contraseña incorrectos.";
            }
        }
    }
}

if (isset($_GET['action']) && $_GET['action'] == 'login') {
    $controller = new UserController();
    $controller->login();
}
?>