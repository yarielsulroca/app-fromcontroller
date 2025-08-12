USE comercioit;

-- Usuario administrador
INSERT IGNORE INTO users (name, email, password, role) VALUES
('Administrador', 'admin@app2.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin');

-- Productos de ejemplo
INSERT IGNORE INTO products (name, description, price, stock, category) VALUES
('Laptop HP', 'Laptop HP Pavilion con procesador Intel i5', 899.99, 10, 'Electrónicos'),
('Mouse Inalámbrico', 'Mouse inalámbrico ergonómico', 29.99, 50, 'Accesorios'),
('Teclado Mecánico', 'Teclado mecánico RGB con switches blue', 89.99, 25, 'Accesorios');