<?php
class ControladorIndex {
    // Método para mostrar la página de inicio
    public function index() {
        include __DIR__ . '/../views/inicio.php'; // Incluir la vista de la página de inicio
    }

    // Método para mostrar la página de información
    public function sobreNosotros() {
        include __DIR__ . '/../views/informacion/sobreNosotros.php'; // Incluir la vista de la página de información
    }

    // Método para mostrar la página de contacto
    public function contacto() {
        include __DIR__ . '/../views/informacion/contacto.php'; // Incluir la vista de la página de contacto
    }

    // Método para mostrar la página de inicio de sesión
    public function login() {
        include __DIR__ . '/../views/usuarios/login.php'; // Incluir la vista de la página de inicio de sesión
    }

    // Método para mostrar la página de registro
    public function register() {
        include __DIR__ . '/../views/usuarios/register.php'; // Incluir la vista de la página de registro
    }
}