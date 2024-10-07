<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Joyería Online</title>
    <link rel="stylesheet" href="css/estilos.css">

</head>

<body>

    <header>
        <h1>Joyería OnLine</h1>
    </header>

    <nav>
        <ul>
            <li><a href="">Pendientes</a></li>
            <li><a href="">Collares</a></li>
            <li><a href="">Pulseras</a></li>
            <li><a href="">Anillos</a></li>
            <li><a href="">Novedades</a></li>
            <li><a href="">Grabado Online</a></li>
            <li><a href="">¿Quienes somos?</a></li>
            <li><a href="">Iniciar sesi&oacute;n</a></li>
        </ul>
    </nav>

    <section>
        <button onclick="funcion_prueba()">Pulsame</button>
        <p id="demo"></p>
        <script>
        function funcion_prueba() {
            document.getElementById("demo").innerHTML = "¡Has pulsado el botón!";
            window.open("https://www.google.com", "", "width=400, height=400, top=100, left=1000");
            window.status = "Esta es la barra de estado";
            window.close();
        }
        </script>
        <p id="demo2"></p>
        <script>
        document.getElementById("demo2").innerHTML = "El hostname de esta pagina es: " + window.location.hostname;
        </script>
        <article>
            <h2>Titulo del artículo</h2>
            <p>Contenido del artículo</p>
            <div>
                <img src="img/anillo.jpg" alt="anillo">
            </div>
        </article>
    </section>

    <aside>
        <h3>Publicidad</h3>
        <p>Contenido de la publicidad</p>
    </aside>

    <footer>
        <p>Avisos legales - Copyrigth 2024 - Mapa del sitio</p>
    </footer>

    <script type="text/javascript" src="js/script.js"></script>
</body>


</html>