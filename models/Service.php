<?php
require_once __DIR__ . '/BaseModel.php';

class Service extends BaseModel {
    protected $table = 'services';
    
    protected $timestamps = true;
    protected $createdAt = 'created_at';
    protected $updatedAt = 'updated_at';
    protected $deletedAt = 'deleted_at';

    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'description',
        'price',
        'duration',
        "category"
    ];
    
    // Buscar usuario por email
    public function findById($id) {
        return $this->whereFirst('id', $id);
    }
    
    
    // Crear usuario con contraseña encriptada
    public function createService($data) {

        return $this->create($data);
    }
    
    // Actualizar usuario con contraseña encriptada
    public function updateService($id, $data) {

        return $this->update($id, $data);
    }
    
    
    // Obtener usuarios normales
    public function getServices() {
        return $this->all();
    }
    
    // Buscar servicios por categoría
    public function getByCategory($category) {
        return $this->where('category', $category);
    }
    
    // Buscar servicios por duración
    public function getByDuration($maxDuration) {
        $sql = "SELECT * FROM {$this->table} WHERE duration <= ? AND {$this->deletedAt} IS NULL";
        return $this->db->fetchAll($sql, [$maxDuration]);
    }
    
    // Obtener servicios ordenados por precio
    public function getOrderedByPrice($order = 'ASC') {
        $order = strtoupper($order) === 'DESC' ? 'DESC' : 'ASC';
        $sql = "SELECT * FROM {$this->table} WHERE {$this->deletedAt} IS NULL ORDER BY price {$order}";
        return $this->db->fetchAll($sql);
    }
    
    // Obtener categorías únicas
    public function getCategories() {
        $sql = "SELECT DISTINCT category FROM {$this->table} WHERE category IS NOT NULL AND {$this->deletedAt} IS NULL";
        return $this->db->fetchAll($sql);
    }
}