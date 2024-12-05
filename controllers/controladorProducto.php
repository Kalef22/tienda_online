<?php
 include_once '../config/Conexion.php';
 include_once '../models/Producto.php';

    class ControladorProducto{

        
        // Método para mostrar todos los productos
        public function mostrarProductos_controlador(){
            $productos = new Producto();
            $productos = $productos->mostrarProductos(); // Llamar al modelo para obtener los productos
            include 'views/producto/listado_productos.php'; //Incluir la vista con los productos
            // return $productos;
        }

        // // Método para mostrar un producto por su ID
        // public function mostrarProductoPorId($id){
        //     $producto = new Producto();
        //     $producto = $producto->mostrarProductoPorId($id); // Obtener el producto por su ID
        //     include '../views/detalle_producto.php'; // Incluir la vista con los detalles del producto
        //     // return $producto;
        // }

        // // Método para agregar un producto
        // public function agregarProducto($nombre, $descripcion, $precio, $id_categoria, $id_material, $url_producto, $id_talla, $stock){
        //     $producto = new Producto();
        //     $producto = $producto->agregarProducto($nombre, $descripcion, $precio, $id_categoria, $id_material, $url_producto, $id_talla, $stock);
        //     return $producto;
        // }

        // // Método para actualizar un producto
        // public function actualizarProducto($id, $nombre, $descripcion, $precio, $stock){
        //     $producto = new Producto();
        //     $producto = $producto->actualizarProducto($id, $nombre, $descripcion, $precio, $stock);
        //     return $producto;
        // }

        // // Método para eliminar un producto
        // public function borrarProducto($id){
        //     $producto = new Producto();
        //     $producto = $producto->borrarProducto($id);
        //     return $producto;
        // }

        // Método para filtrar productos
    }
?>