<?php
session_start();

// Cambiar según el entorno
// if ($_SERVER['HTTP_HOST'] == 'localhost') {
//     // Entorno local
//     define('BASE_URL', 'http://localhost/tienda_online/');
// } else {
//     // Entorno de producción
//     define('BASE_URL', 'https://joyeriavictoria.kalef.es/'); // Ajusta tu dominio aquí
// }
?>

<body>
    <!-- Link a Google Fonts en la sección <head> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
        rel="stylesheet">

    <!-- Aplicar las fuentes en CSS -->
    <style>
    .navbar-brand {
        font-family: 'Georgia', serif;
    }

    .nav-link,
    .btn,
    .dropdown-item {
        font-family: 'Roboto', sans-serif;
    }

    .navbar-brand {
        font-family: "Playfair Display", serif;
        font-optical-sizing: auto;
        font-weight: 400;
        font-style: normal;
    }
    </style>

    <!-- Navigation Inicio -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="<?php echo BASE_URL; ?>">Joyería Victoria</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?php echo BASE_URL; ?>">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASE_URL; ?>views/informacion/sobreNosotros.php">Sobre
                            nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASE_URL; ?>views/informacion/contacto.php">Contacto</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">Tienda</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item"
                                    href="<?php echo BASE_URL; ?>views/producto/listadoProducto.php">Todos los
                                    productos</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <a class="dropdown-item" href="#!">Productos recomendados</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#!">Nuevos productos</a>
                            </li>
                        </ul>
                    </li>
                    <?php if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'superadmin'): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="adminDropdown" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">Admin</a>
                        <ul class="dropdown-menu" aria-labelledby="adminDropdown">
                            <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>views/admin/dashboard">Dashboard</a></li>
                            <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>views/admin/subir_producto.php">Subir producto</a></li>
                            <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>views/admin/eliminar_producto.php">Eliminar producto</a></li>
                        </ul>
                    </li>
                    <?php endif; ?>
                </ul>
                <ul class="navbar-nav" style="list-style: none;">
                    <?php if (isset($_SESSION['nombre'])): ?>
                    <li>
                        <?php if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'superadmin'): ?>
                        <img src="<?php echo BASE_URL; ?>assets/img/admin_logo.jpg" alt="Admin Logo" style="width: 30px; height: auto;">
                        <?php endif; ?>
                    </li>
                    <li class="nav-item">
                        <span class="nav-link">Bienvenido, <?php echo htmlspecialchars($_SESSION['nombre']); ?>!</span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASE_URL; ?>views/usuarios/logout.php"><i class="bi bi-box-arrow-right"> Cerrar sesión</i></a>
                    </li>
                    <?php else: ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo BASE_URL; ?>views/usuarios/login.php"><i class="bi bi-person"> Iniciar sesión</i></a>
                    </li>
                    <?php endif; ?>
                </ul>
                <form class="d-flex">
                    <button class="btn btn-outline-dark" type="submit">
                        <i class="bi-cart-fill me-1"></i>
                        Carrito
                        <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                    </button>
                </form>
            </div>
        </div>
    </nav>
    <!-- Navigation Fin -->