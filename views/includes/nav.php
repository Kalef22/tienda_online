<?php
    $informacion_path = "views/informacion/";
    $sobreNosotros_path = $informacion_path . "sobreNosotros.php";
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

    /* <uniquifier>: Use a unique and descriptive class name
      <weight>: Use a value from 400 to 900 */

     .navbar-brand {
        font-family: "Playfair Display", serif;
        font-optical-sizing: auto;
        font-weight: 400;
        font-style: normal;
    }
    </style>

    <!-- Navigation Inicio-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="index.php">Joyería Victoria</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="views/informacion/sobreNosotros.php">Sobre nosotros</a></li>
                    <li class="nav-item"><a class="nav-link" href="contacto.php">Contacto</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">Tienda</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#!">Todos los productos</a></li>
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li><a class="dropdown-item" href="#!">Productos recomendados</a></li>
                            <li><a class="dropdown-item" href="#!">Nuevos productos</a></li>
                        </ul>
                    </li>

                </ul>
                <ul class="navbar-nav" style="list-style: none;">
                    <li class=" nav-item">
                        <a class="nav-link" href="views/usuarios/login.php"><i class="bi bi-person"> Iniciar sesión</i></a>
                    </li>
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
    <!-- Navigation Fin-->