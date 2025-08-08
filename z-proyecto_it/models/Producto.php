<?php
require_once __DIR__ . '/BaseModel.php';

class Producto extends BaseModel {
    protected $table = 'productos';
    
    protected $timestamps = true;
    protected $createdAt = 'created_at';
    protected $updatedAt = 'updated_at';
    protected $deletedAt = 'deleted_at';

    protected $primaryKey = 'id';
    protected $fillable = [
        'nombre',
        'descrip',
        'precio',
        'imagen',
        "stock",
        "categoria_id"
    ];
    
    // Buscar usuario por email
    public function findById($id) {
        return $this->whereFirst('id', $id);
    }
    
    
    // Crear usuario con contraseña encriptada
    public function createProducto($data) {

        return $this->create($data);
    }
    
    // Actualizar usuario con contraseña encriptada
    public function updateProducto($id, $data) {

        return $this->update($id, $data);
    }
    
    
    // Obtener usuarios normales
    public function getProductos() {
        return $this->all();
    }

    public function getByCategoria($categoria) {
        return $this->where('categoria', $categoria);
    }
}