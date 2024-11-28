<?php
    class ControladorIndex{
        // Método para mostrar la página de inicio
        public function index(){
            include 'views/index.php'; // Incluir la vista de la página de inicio
        }

        // Método para mostrar la página de error 404
        public function error404(){
            include 'views/404.php'; // Incluir la vista de la página de error 404
        }
    }