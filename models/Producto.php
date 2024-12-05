<?php
// Incluir la conexión a la base de datos
// include_once '../config/config.php';
include_once('../config/Conexion.php');

class Producto{

    private $pdo;

    public function __construct() {
        $this->pdo = (new Conexion())->getConexion();
    }

    public function filtrarProductos($filtros) {
        $query = "SELECT * FROM productos WHERE 1=1";
        $params = [];

        if (!empty($filtros['categoria'])) {
            $query .= " AND categoria = :categoria";
            $params[':categoria'] = $filtros['categoria'];
        }

        if (!empty($filtros['precio'])) {
            $query .= " AND precio <= :precio";
            $params[':precio'] = $filtros['precio'];
        }

        if (!empty($filtros['producto'])) {
            $query .= " AND nombre LIKE :producto";
            $params[':producto'] = '%' . $filtros['producto'] . '%';
        }

        $stmt = $this->pdo->prepare($query);
        foreach ($params as $key => $value) {
            $stmt->bindValue($key, $value);
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function subirProducto($nombre, $descripcion, $precio, $categoria, $material, $talla, $stock, $url_producto)
    {
        try {
            // Preparar la consulta SQL para insertar un nuevo producto
            $sql = "INSERT INTO producto (id_categoria, id_material, id_talla, nombre, descripcion, precio, url_producto, stock)
                VALUES (
                    (SELECT id_categoria FROM categoria WHERE nombre_categoria = :categoria),
                    (SELECT id_material FROM material WHERE tipo_material = :material),
                    (SELECT id_talla FROM talla WHERE tipo = :talla),
                    :nombre, :descripcion, :precio,:url_producto,:stock
                )";

            // Preparar la consulta con PDO
            $stmt = $this->pdo->prepare($sql);

            // Bindear los parámetros
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':descripcion', $descripcion);
            $stmt->bindParam(':precio', $precio);
            $stmt->bindParam(':categoria', $categoria);
            $stmt->bindParam(':material', $material);
            $stmt->bindParam(':talla', $talla);
            $stmt->bindParam(':stock', $stock);
            $stmt->bindParam(':url_producto', $url_producto);

            // Ejecutar la consulta
            if ($stmt->execute()) {
                echo "Producto insertado con éxito.";
            } else {
                echo "Error al insertar el producto.";
            }
        } catch (PDOException $e) {
            // Manejo de errores
            $this->error['subir_producto'] = "Error en la inserción: " . $e->getMessage();
            echo "Error: " . $e->getMessage();
        }
    }
    
    // Método para obtener todos los productos
    public function mostrarProductos()
    {
        try {
            $sql = "SELECT p.id_producto, p.nombre, p.descripcion, p.precio, p.url_producto, 
                        c.nombre_categoria AS categoria, m.tipo_material AS material, t.tipo AS talla
                    FROM producto p
                    JOIN categoria c ON p.id_categoria = c.id_categoria
                    JOIN material m ON p.id_material = m.id_material
                    JOIN talla t ON p.id_talla = t.id_talla;";

            $stmt = $this->pdo->query($sql);
            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($resultados as $resultado) {
                $id_producto = htmlspecialchars($resultado['id_producto']);
                $nombre = htmlspecialchars($resultado['nombre']);
                $precio = htmlspecialchars($resultado['precio']);
                $categoria = htmlspecialchars($resultado['categoria']);
                $material = htmlspecialchars($resultado['material']);
                $talla = htmlspecialchars($resultado['talla']);
                $url_producto = !empty($resultado['url_producto']) ? htmlspecialchars('../../assets/img/' . $resultado['url_producto']) : '../../assets/img/logo.png';
                echo "
                <div class='col mb-5'>
                    <div class='card h-100'>
                        <div class='badge bg-dark text-white position-absolute' style='top: 0.5rem; right: 0.5rem'>Sale</div>
                        <img src='$url_producto' alt='$nombre'>
                        <div class='card-body p-4'>
                            <div class='text-center'>
                                <h5 class='fw-bolder'>$nombre</h5>
                                Precio: $precio <br>
                                Categoría: $categoria <br>
                                Material: $material <br>
                                Talla: $talla
                            </div>
                        </div>
                        <div class='card-footer p-4 pt-0 border-top-0 bg-transparent'>
                            <div class='text-center'>
                                <a class='btn btn-outline-dark mt-auto' href='./detalle_producto.php?id_producto=$id_producto'>Ver detalles</a>
                            </div>
                        </div>
                    </div>
                </div>";
            }
        } catch (PDOException $e) {
            echo "Error en la consulta: " . $e->getMessage();
        }
    }

    public function obtenerCategorias()
    {
        try {
            $query = "SELECT id_categoria, nombre_categoria FROM categoria";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    public function obtenerMaterial()
    {
        try {
            $query = "SELECT id_material, tipo_material FROM material";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

    public function obtenerTalla()
    {
        try {
            $query = "SELECT id_talla, tipo FROM talla";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }


}

?>