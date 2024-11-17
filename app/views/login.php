<?php
require_once '../config/config.php';
?>
<style>
/* Estilos para el diseño de "sticky footer" */
html,
body {
    height: 100%;
}

body {
    display: flex;
    flex-direction: column;
}

.content {
    flex: 1;
}

footer {
    background: #f8f9fa;
    padding: 1rem 0;
    text-align: center;
}
</style>
</head>
<?php
require_once '../public/header.php';
require_once '../public/nav.php';
?>

<body>
    <!-- Contenido principal -->
    <div class="content">
        <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <h2 class="text-center">Iniciar Sesión</h2>
                        <form action="../app/controllers/UserController.php?action=login" method="POST">
                            <div class="mb-3">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Correo"
                                    required>
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Contraseña" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Iniciar Sesión</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Incluir pie de página -->
    <?php include '../public/footer.php'; ?>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="../public/assets/js/scripts.js"></script>