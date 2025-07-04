<?php
session_start();
$title = "Listado de Productos";
// include_once '../../config/config.php';
include_once '../includes/header.php';
include_once '../includes/nav.php';
?>
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <h1 class="text-center mb-4">Nuestros Productos</h1>
        <form action="" method="GET" class="mb-4">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label for="categoria" class="form-label">Categoría</label>
                    <select class="form-select" id="categoria" name="categoria">
                        <option value="">Todas</option>
                        <option value="anillos">Anillos</option>
                        <option value="collares">Collares</option>
                        <option value="pulseras">Pulseras</option>
                        <option value="pendientes">Pendientes</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="precio" class="form-label">Precio Máximo</label>
                    <input type="number" class="form-control" id="precio" name="precio" placeholder="Precio máximo">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="producto" class="form-label">Nombre del Producto</label>
                    <input type="text" class="form-control" id="producto" name="producto" placeholder="Nombre del producto">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Filtrar</button>
        </form>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php
            // Incluir el controlador de productos
            include_once '../../controllers/controladorProducto.php';
            $controladorProducto = new ControladorProducto();
            $productos = $controladorProducto->mostrarProductos_controlador();         
            ?>
        </div>
    </div>
</section>
<?php
include_once '../includes/footer.php';
?>
<!-- Incluir jQuery antes de Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
 <!-- Bootstrap JS  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>