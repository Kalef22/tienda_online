<?php
session_start();
$title = "Sobre Nosotros";
include_once '../includes/header.php';
include_once '../includes/nav.php';
require_once '../../models/Producto.php';
echo BASE_URL."esta es mi base de URL";

$producto = new Producto();

?>
<div id="layoutSidenav_content">
    <main>
        <!-- FORMULARIO -->
        <section class="py-8">
            <div class="container px-4 px-lg-5 mt-5">
                <h2 class="text-center mb-4">Subir Producto</h2>
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 py-5">
                        <div class="p-4 bg-light border rounded shadow">
                            <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre del Producto</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                                </div>
                                <div class="mb-3">
                                    <label for="descripcion" class="form-label">Descripción</label>
                                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="precio" class="form-label">Precio</label>
                                    <input type="number" step="0.01" class="form-control" id="precio" name="precio" required>
                                </div>
                                <div class="mb-3">
                                    <label for="categoria" class="form-label">Categorías</label>
                                    <select class="form-control" id="categoria" name="categoria" required>
                                        <option value="">Selecciona una categoría</option>
                                        <?php
                                        $categorias = $producto->obtenerCategorias();
                                        foreach ($categorias as $categoria): ?>
                                            <option value="<?= $categoria['nombre_categoria'] ?>"><?= $categoria['nombre_categoria'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="material" class="form-label">Material</label>
                                    <select class="form-control" id="material" name="material" required>
                                        <option value="">Selecciona material</option>
                                        <?php
                                        $materiales = $producto->obtenerMaterial();
                                        foreach ($materiales as $material): ?>
                                            <option value="<?= $material['tipo_material'] ?>"><?= $material['tipo_material'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="talla" class="form-label">Tallas</label>
                                    <select class="form-control" id="talla" name="talla" required>
                                        <option value="">Selecciona una talla</option>
                                        <?php
                                        $tallas = $producto->obtenerTalla();
                                        foreach ($tallas as $talla): ?>
                                            <option value="<?= $talla['tipo'] ?>"><?= $talla['tipo'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="stock" class="form-label">Stock</label>
                                    <input type="number" step="0.01" class="form-control" id="stock" name="stock" required>
                                </div>
                                <div class="mb-3">
                                    <label for="imagen" class="form-label">Imagen del Producto</label>
                                    <input type="file" class="form-control" id="imagen" name="imagen" required>
                                    <button type="submit" name="enviar" class="btn btn-primary">Subir Producto</button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- FIN FORMULARIO  -->
    </main>
</div>

<?php
include_once "../includes/footer.php" ?>