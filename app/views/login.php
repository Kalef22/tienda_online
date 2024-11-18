<?php
include_once './includes/header.php';
include_once './includes/nav.php';   
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
    <?php include_once './includes/footer.php'; ?>