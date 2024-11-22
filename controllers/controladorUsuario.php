<?php
    // Incluir el modelo de Usuario
    include_once(__DIR__ . '/../models/Usuario.php');

    class ControladorUsuario{
        // Método para iniciar sesión
        public function iniciarSesion($email, $password){
            $usuario = new Usuario();
            $usuario = $usuario->iniciarSesion($email, $password); // Llamar al modelo para iniciar sesión
            include 'views/usuarios/login.php'; // Incluir la vista de inicio de sesión
        }

        // Método para cerrar sesión
        public function cerrarSesion(){
            $usuario = new Usuario();
            $usuario = $usuario->cerrarSesion(); // Llamar al modelo para cerrar sesión
            return $usuario;
        }

        // Método para registrar un usuario
        public function crearUsuario($nombre, $apellido1, $apellido2, $email, $direccion, $telefono, $contrasenia){
            $usuario = new Usuario();
            $usuario = $usuario->crearUsuario($nombre, $apellido1, $apellido2, $email, $direccion, $telefono, $contrasenia); // Llamar al modelo para registrar un usuario
            return $usuario;
        }

        // Método para listar usuarios
        public function listarUsuarios(){
            $usuario = new Usuario();
            $usuarios = $usuario->listarUsuarios(); // Llamar al modelo para listar usuarios
            return $usuarios;
        }

        // Método para obtener un usuario
        public function obtenerUsuario($id){
            $usuario = new Usuario();
            $usuario = $usuario->obtenerUsuario($id); // Llamar al modelo para obtener un usuario
            return $usuario;
        }

        // Método para obtener errores
        public function getErrors(){
            $usuario = new Usuario();
            $errores = $usuario->getErrors(); // Llamar al modelo para obtener errores
            return $errores;
        }
    }
?>