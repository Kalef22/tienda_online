<?php
session_start();
$title = "Sobre Nosotros";
include_once '../includes/header.php';
include_once '../includes/nav.php';
include_once '../../config/config.php';
?>
<style>
img {
    width: 100%;
    height: auto;
}
</style>
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center mb-4">
            <img src="../../assets/img/logo.png" alt="">
        </div>
        <p >Desde 1995, en Joyería Victoria nos hemos dedicado a capturar momentos inolvidables y a transformar
            emociones en joyas únicas. Con más de 25 años de historia, somos una joyería familiar comprometida con
            la excelencia y la autenticidad en cada pieza que creamos. Nos enorgullece ser una marca que combina la
            elegancia clásica con el diseño contemporáneo, siempre con un toque de exclusividad y sofisticación.</p>

        <p>Nuestra pasión por la joyería se refleja en cada detalle: desde la selección de los materiales más finos
            hasta el cuidado artesanal con el que cada pieza es fabricada. Trabajamos con una variedad de metales
            preciosos y gemas cuidadosamente elegidas para asegurar que nuestras creaciones no solo embellezcan,
            sino que también cuenten una historia personal y única para cada cliente.</p>

        <p>En Joyería Victoria, creemos que cada joya es un símbolo de amor, éxito y momentos especiales. Ya sea
            que estés buscando un anillo de compromiso que capture la esencia de un “para siempre” o un regalo
            especial para celebrar una ocasión única, nuestro equipo de expertos está aquí para guiarte y ayudarte a
            encontrar la pieza perfecta.</p>

        <p>Únete a nuestra familia de clientes satisfechos y descubre por qué, desde 1995, Joyería Victoria sigue
            siendo un referente de confianza, calidad y belleza. Visítanos y deja que juntos creemos recuerdos para
            toda la vida.</p>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-1 justify-content-center mb-4">
            <img src="../assets/img/sobreNosotros2.png" alt="">
        </div>
       
    </div>
    
       
    
</section>

<?php
include_once "../includes/footer.php" ?>