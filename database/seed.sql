-- Insertar datos de prueba
USE educacion_it_clase;

-- Usuario administrador
INSERT IGNORE INTO users (name, email, password, role) VALUES 
('Administrador', 'admin@app2.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin');

-- Productos de ejemplo
INSERT IGNORE INTO products (name, description, price, stock, category) VALUES 
('Laptop HP', 'Laptop HP Pavilion con procesador Intel i5', 899.99, 10, 'Electrónicos'),
('Mouse Inalámbrico', 'Mouse inalámbrico ergonómico', 29.99, 50, 'Accesorios'),
('Teclado Mecánico', 'Teclado mecánico RGB con switches blue', 89.99, 25, 'Accesorios');

-- Servicios de ejemplo
INSERT IGNORE INTO services (name, description, price, duration, category) VALUES 
('Desarrollo Web', 'Desarrollo de sitios web personalizados', 1500.00, 480, 'Desarrollo'),
('Mantenimiento', 'Mantenimiento mensual de sitios web', 200.00, 120, 'Soporte'),
('Consultoría', 'Consultoría en tecnología', 100.00, 60, 'Consultoría');

-- Posts del blog
INSERT IGNORE INTO blog_posts (title, content, excerpt, author_id, status) VALUES 
('Bienvenidos a nuestro blog', 'Este es nuestro primer post del blog...', 'Bienvenidos a nuestro nuevo blog', 1, 'published'),
('Tendencias en desarrollo web', 'Las nuevas tendencias en desarrollo web incluyen...', 'Descubre las últimas tendencias', 1, 'published');