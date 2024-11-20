Esquema que seguire.

/tienda_online
│
├── /assets        # Archivos estáticos (CSS, JS, Imágenes)
│   ├── /css       # Estilos
│   ├── /js        # Scripts JavaScript
│   └── /images    # Imágenes
│
├── /controllers   # Controladores PHP (lógica de negocio)
│   └── productController.php  # Controlador para los productos
│
├── /models        # Modelos PHP (interacción con la base de datos)
│   └── Product.php  # Modelo para productos
│
├── /views         # Vistas (HTML + Bootstrap)
│   ├── index.php  # Página principal de la tienda
│   ├── products.php  # Página de listado de productos
│   └── product-detail.php  # Página de detalle de producto
│
├── /config        # Configuración de la base de datos y otras configuraciones
│   └── config.php  # Archivo para configurar la conexión a MySQL
│
└── index.php      # Archivo principal que gestiona las rutas
