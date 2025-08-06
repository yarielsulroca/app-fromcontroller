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
        'duration',
        'price',
        'category_id'
    ];

    // Obtener servicios por categoría
    public function getByCategory($categoryId) {
        return $this->where('category_id', $categoryId);
    }

    // Buscar servicios por nombre
    public function searchByName($keyword) {
        $sql = "SELECT * FROM {$this->table} WHERE name LIKE ? AND {$this->deletedAt} IS NULL";
        return $this->db->fetchAll($sql, ["%{$keyword}%"]);
    }

    // Filtrar servicios por rango de precios
    public function filterByPriceRange($minPrice, $maxPrice) {
        $sql = "SELECT * FROM {$this->table} WHERE price BETWEEN ? AND ? AND {$this->deletedAt} IS NULL";
        return $this->db->fetchAll($sql, [$minPrice, $maxPrice]);
    }
}
?>
