<?php
$title = 'Registro';
include_once '../includes/header.php';
include_once '../includes/nav.php';
?>
<!-- Contenido principal -->
<main class="d-flex justify-content-center align-items-center min-vh-100 bg-light py-5">
    <div class="card p-4 shadow-lg" style="max-width: 600px; width: 100%; padding-top: 2rem; padding-bottom: 2rem;">
        <div class="card-body">
            <h2 class="card-title text-center mb-4">Registro</h2>
            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger">
                    <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
                </div>
            <?php endif; ?>
            <form action="../../controllers/ControladorUsuarioRegistro.php" method="POST" onsubmit="return validateForm()">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
                    <div class="invalid-feedback">Por favor, introduce tu nombre.</div>
                </div>
                <div class="mb-3">
                    <label for="apellido1" class="form-label">Primer Apellido</label>
                    <input type="text" class="form-control" id="apellido1" name="apellido1" placeholder="Primer Apellido" required>
                    <div class="invalid-feedback">Por favor, introduce tu primer apellido.</div>
                </div>
                <div class="mb-3">
                    <label for="apellido2" class="form-label">Segundo Apellido</label>
                    <input type="text" class="form-control" id="apellido2" name="apellido2" placeholder="Segundo Apellido" required>
                    <div class="invalid-feedback">Por favor, introduce tu segundo apellido.</div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Correo</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Correo" required>
                    <div class="invalid-feedback">Por favor, introduce un correo válido.</div>
                </div>
                <div class="mb-3">
                    <label for="direccion" class="form-label">Dirección</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección" required>
                    <div class="invalid-feedback">Por favor, introduce tu dirección.</div>
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" pattern="[0-9]{9}" required>
                    <div class="invalid-feedback">Por favor, introduce tu teléfono.</div>
                </div>
                <div class="mb-3">
                    <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                    <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
                    <div class="invalid-feedback">Por favor, introduce tu fecha de nacimiento.</div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" required>
                    <div class="invalid-feedback">Por favor, introduce una contraseña.</div>
                </div>
                <button type="submit" class="btn btn-primary w-100">Registrarse</button>
            </form>
            <div class="text-center mt-3">
                <a href="./login.php" class="text-decoration-none">¿Ya tienes una cuenta? Inicia sesión</a>
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
<!-- Validación del formulario -->
<script>
function validateForm() {
    let nombre = document.getElementById('nombre');
    let apellido1 = document.getElementById('apellido1');
    let apellido2 = document.getElementById('apellido2');
    let email = document.getElementById('email');
    let direccion = document.getElementById('direccion');
    let telefono = document.getElementById('telefono');
    let fecha_nacimiento = document.getElementById('fecha_nacimiento');
    let password = document.getElementById('password');
    let valid = true;

    if (!nombre.value) {
        nombre.classList.add('is-invalid');
        valid = false;
    } else {
        nombre.classList.remove('is-invalid');
    }

    if (!apellido1.value) {
        apellido1.classList.add('is-invalid');
        valid = false;
    } else {
        apellido1.classList.remove('is-invalid');
    }

    if (!apellido2.value) {
        apellido2.classList.add('is-invalid');
        valid = false;
    } else {
        apellido2.classList.remove('is-invalid');
    }

    if (!email.value) {
        email.classList.add('is-invalid');
        valid = false;
    } else {
        email.classList.remove('is-invalid');
    }

    if (!direccion.value) {
        direccion.classList.add('is-invalid');
        valid = false;
    } else {
        direccion.classList.remove('is-invalid');
    }

    if (!telefono.value) {
        telefono.classList.add('is-invalid');
        valid = false;
    } else {
        telefono.classList.remove('is-invalid');
    }

    if (!fecha_nacimiento.value) {
        fecha_nacimiento.classList.add('is-invalid');
        valid = false;
    } else {
        fecha_nacimiento.classList.remove('is-invalid');
    }

    if (!password.value) {
        password.classList.add('is-invalid');
        valid = false;
    } else {
        password.classList.remove('is-invalid');
    }

    return valid;
}

// Comprobar si el correo ya está registrado
$(document).ready(function() {
    $('#email').on('blur', function() {
        var email = $(this).val();
        $.ajax({
            url: '../../controllers/ControladorUsuarioRegistro.php',
            type: 'POST',
            data: { email: email, action: 'check_email' },
            success: function(response) {
                if (response === 'exists') {
                    $('#email').addClass('is-invalid');
                    $('#email-feedback').show();
                } else {
                    $('#email').removeClass('is-invalid');
                    $('#email-feedback').hide();
                }
            }
        });
    });
});
</script>