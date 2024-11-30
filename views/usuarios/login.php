<?php
    $title = 'Iniciar Sesión';
    include_once '../includes/header.php';
    include_once '../includes/nav.php';
?>
<!-- <link rel="stylesheet" href="assets/css/login.css"> -->
    <!-- Contenido principal -->
     <!-- Alineacion vertical y horizontal del main y altura minima del elemento -->
    <main class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="card p-4">
            <div class="card-body">
                <h2 class="card-title text-center mb-4">Iniciar Sesión</h2>
                <form action="/controllers/controladorUsuario.php" method="POST">
                    <div class="mb-3">
                        <!-- <label for="email" class="form-label">Correo</label> -->
                        <input type="email" class="form-control" id="email" name="email" placeholder="Correo" required>
                    </div>
                    <div class="mb-3">
                        <!-- <label for="password" class="form-label">Contraseña</label> -->
                        <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Iniciar Sesión</button>
                </form>
                <div class="text-center mt-3">
                    <a href="#" class="text-decoration-none">¿Olvidaste tu contraseña?</a>
                </div>
                <div class="text-center mt-3">
                    <a href="registro.php" class="text-decoration-none">¿No tienes una cuenta? Regístrate</a>
                </div>
            </div>
        </div>
    </main>
    <?php 
        // Incluir el footer
        include_once '../includes/footer.php'; 
    ?>
<!-- Incluir jQuery antes de Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Activar el carrusel para que itere automáticamente -->
<script>
$(document).ready(function(){
    $('#promotionsCarousel').carousel({
        interval: 2000 // Cambia el valor para ajustar la velocidad de iteración (en milisegundos)
    });
});
</script>
<!-- Core theme JS-->
<script src="../../assets/js/scripts.js"></script>
</body>
</html>
