<?php
require_once __DIR__ . '/BaseModel.php';

class Service extends BaseModel {
    protected $table = 'services';
    protected $fillable = ['name', 'description', 'price', 'duration', 'category'];
    
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