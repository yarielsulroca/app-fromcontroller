-- Insertar datos de prueba
USE proyecto_educacion_it;

-- Usuario administrador
INSERT IGNORE INTO users (name, email, password, role) VALUES 
('Administrador', 'admin@app2.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin');

-- Productos de ejemplo
INSERT IGNORE INTO productos (nombre, descrip, precio, imagen, stock, categoria) VALUES
('Producto 1', 'Descripción del producto 1', 19.99, "productos/P001.jpg",10, 'Android'),
('Producto 2', 'Descripción del producto 2', 29.99, "productos/P002.jpg",20, 'Android'),
('Producto 3', 'Descripción del producto 3', 39.99, "productos/P003.jpg",30, 'Android'),
('Producto 4', 'Descripción del producto 4', 49.99, "productos/P004.jpg",40, 'Mac'),
('Producto 5', 'Descripción del producto 5', 59.99, "productos/P005.jpg",50, 'Mac'),
('Producto 6', 'Descripción del producto 6', 69.99, "productos/P006.jpg",60, 'Mac');

