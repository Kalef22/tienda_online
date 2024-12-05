<?php
$title = 'Iniciar Sesión';
include_once '../includes/header.php';
include_once '../includes/nav.php';
?>
<!-- Contenido principal -->
<main class="d-flex justify-content-center align-items-center min-vh-100">
    <div class="card p-4 shadow-sm">
        <div class="card-body">
            <h2 class="card-title text-center mb-4">Iniciar Sesión</h2>
            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger">
                    <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
                </div>
            <?php endif; ?>
            <form action="../../controllers/ControladorUsuarioLogin.php" method="POST" onsubmit="return validateForm()">
                <div class="mb-3">
                    <label for="email" class="form-label">Correo</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Correo" >
                    <div class="invalid-feedback">Por favor, introduce un correo válido.</div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" >
                    <div class="invalid-feedback">Por favor, introduce tu contraseña.</div>
                </div>
                <button type="submit" class="btn btn-primary w-100">Iniciar Sesión</button>
            </form>
            <div class="text-center mt-3">
                <a href="#" class="text-decoration-none">¿Olvidaste tu contraseña?</a>
            </div>
            <div class="text-center mt-3">
                <a href="./register.php" class="text-decoration-none">¿No tienes una cuenta? Regístrate</a>
            </div>
        </div>
    </div>
</main>
<script>
function validateForm() {
    var email = document.getElementById('email');
    var password = document.getElementById('password');
    var valid = true;

    if (!email.value) {
        email.classList.add('is-invalid');
        valid = false;
    } else {
        email.classList.remove('is-invalid');
    }

    if (!password.value) {
        password.classList.add('is-invalid');
        valid = false;
    } else {
        password.classList.remove('is-invalid');
    }

    return valid;
}
</script>
<?php 
// Incluir el footer
include_once '../includes/footer.php'; 
?>