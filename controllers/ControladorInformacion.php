<?php 
    class ControladorInformacion{
        // Método para mostrar la página de información
        public function sobreNosotros(){
            include 'views/informacion/sobreNosotros.php'; // Incluir la vista de la página de información
        }

        // Método para mostrar la página de contacto
        public function contacto(){
            include 'views/informacion/contacto.php'; // Incluir la vista de la página de contacto
        }
    }