<?php
session_start();
$title = "Contacto";
include_once '../../config/config.php';
include_once '../includes/header.php';
include_once '../includes/nav.php';
?>
<style>
img {
    width: 100%;
    height: auto;
}

.logo-tamanio {
    width: 250px; /* Ajusta el tamaño según tus necesidades */
    height: auto;
}
</style>
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <h1 class="text-center mb-4">Contáctanos</h1>
        <div class="row gx-4 gx-lg-5 py-5">
            <div class="col-md-6 mb-5">
                <h2 class="fw-bolder">Información de Contacto</h2>
                <p class="lead mb-0">Estamos aquí para ayudarte. Si tienes alguna pregunta o necesitas más información, no dudes en contactarnos.</p>
                <ul class="list-unstyled mt-4">
                    <li><strong>Dirección:</strong> Calle Villanueva 123, Ciudad, Madrid</li>
                    <li><strong>Teléfono:</strong> +91 000 0000</li>
                    <li><strong>Email:</strong> info@joyeriavictoria.com</li>
                    <li><strong>Horario:</strong> Lunes a Viernes, 9:00 AM - 6:00 PM</li>
                </ul>
                <div class="mt-4 text-center">
                    <img src="<?php echo BASE_URL; ?>assets/img/logo.png" alt="Logo de Joyería Victoria" class="logo-tamanio">
                </div>
            </div>
            <div class="col-md-6">
                <h2 class="fw-bolder">Envíanos un Mensaje</h2>
                <form action="../../controllers/ControladorContacto.php" method="POST">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Tu nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Tu correo electrónico" required>
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Teléfono</label>
                        <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Tu teléfono" required>
                    </div>
                    <div class="mb-3">
                        <label for="mensaje" class="form-label">Mensaje</label>
                        <textarea class="form-control" id="mensaje" name="mensaje" rows="5" placeholder="Tu mensaje" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Enviar Mensaje</button>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
include_once '../includes/footer.php';
?>
<!-- Incluir jQuery antes de Bootstrap JS
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
 Bootstrap JS
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> -->