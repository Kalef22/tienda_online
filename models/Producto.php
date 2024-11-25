<?php
// Incluir la conexión a la base de datos
// include_once '../config/config.php';
include_once(__DIR__ . '/../config/config.php');

class Producto{
    
    // Método para obtener todos los productos
    public function mostrarProductos(){
        global $pdo;
        $query = $pdo->prepare("SELECT id_producto, nombre, descripcion, precio, id_categoria, id_material, url_producto, id_talla, stock FROM producto");
        $query->execute();
        return $query->fetchAll();
    }

    // Método para obtener un producto por su ID
    public function mostrarProductoPorId($id){
        global $pdo;
        $query = $pdo->prepare("SELECT id_producto, nombre, descripcion, precio, id_categoria, id_material, url_producto, id_talla, stock FROM producto WHERE id = :id");
        $query->execute(['id' => $id]);
        return $query->fetch();
    }

    // Método para agregar un producto
    public function agregarProducto($nombre, $descripcion, $precio, $id_categoria, $id_material, $url_producto, $id_talla, $stock){
        global $pdo;
        $query = $pdo->prepare("INSERT INTO producto (nombre, descripcion, precio, id_categoria, id_material, url_producto,id_talla, stock) VALUES (:nombre, :descripcion, :precio, :id_categoria, :id_material, :url_producto, :id_talla, :stock)");
        return $query->execute(['nombre' => $nombre, 'descripcion' => $descripcion, 'precio' => $precio, 'id_categoria' => $id_categoria, 'id_material' => $id_material, 'url_producto' => $url_producto, 'id_talla' => $id_talla, 'stock' => $stock]);
    }

    // Método para actualizar un producto
    public function actualizarProducto($id, $nombre, $descripcion, $precio, $stock){
        global $pdo;
        $query = $pdo->prepare("UPDATE producto SET nombre = :nombre, descripcion = :descripcion, precio = :precio, stock = :stock WHERE id = :id");
        return $query->execute(['id' => $id, 'nombre' => $nombre, 'descripcion' => $descripcion, 'precio' => $precio, 'stock' => $stock]);
    }

    // Método para eliminar un producto
    public function borrarProducto($id){
        global $pdo;
        $query = $pdo->prepare("DELETE FROM producto WHERE id = :id");
        return $query->execute(['id' => $id]);
    }
}

?>