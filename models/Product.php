<?php
require_once __DIR__ . '/BaseModel.php';

class Product extends BaseModel {
    protected $table = 'products';
    protected $fillable = [
        'name', 
        'description',
        'price', 
        'stock', 
        'image', 
        'category'];
    
    // Buscar productos por categoría
    public function getByCategory($category) {
        return $this->where('category', $category);
    }
    
    // Buscar productos con stock disponible
    public function getInStock() {
        $sql = "SELECT * FROM {$this->table} WHERE stock > 0 AND {$this->deletedAt} IS NULL";
        return $this->db->fetchAll($sql);
    }
    
    // Actualizar stock
    public function updateStock($id, $quantity) {
        $sql = "UPDATE {$this->table} SET stock = stock + ? WHERE {$this->primaryKey} = ?";
        return $this->db->query($sql, [$quantity, $id]);
    }
    
    // Buscar productos por precio
    public function getByPriceRange($minPrice, $maxPrice) {
        $sql = "SELECT * FROM {$this->table} WHERE price BETWEEN ? AND ? AND {$this->deletedAt} IS NULL";
        return $this->db->fetchAll($sql, [$minPrice, $maxPrice]);
    }
    
    // Obtener categorías únicas
    public function getCategories() {
        $sql = "SELECT DISTINCT category FROM {$this->table} WHERE category IS NOT NULL AND {$this->deletedAt} IS NULL";
        return $this->db->fetchAll($sql);
    }
}