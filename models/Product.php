<?php
require_once __DIR__ . '/BaseModel.php';

class Product extends BaseModel {
    protected $table = 'products';
    
    protected $timestamps = true;
    protected $createdAt = 'created_at';
    protected $updatedAt = 'updated_at';
    protected $deletedAt = 'deleted_at';

    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'category_id'
    ];

    // Obtener productos por categoría
    public function getByCategory($categoryId) {
        return $this->where('category_id', $categoryId);
    }

    // Buscar productos por nombre (LIKE)
    public function searchByName($keyword) {
        $sql = "SELECT * FROM {$this->table} WHERE name LIKE ? AND {$this->deletedAt} IS NULL";
        return $this->db->fetchAll($sql, ["%{$keyword}%"]);
    }

    // Reducir stock
    public function reduceStock($id, $quantity) {
        $product = $this->find($id);
        if ($product && $product['stock'] >= $quantity) {
            $newStock = $product['stock'] - $quantity;
            return $this->update($id, ['stock' => $newStock]);
        }
        return false;
    }

    // Aumentar stock
    public function increaseStock($id, $quantity) {
        $product = $this->find($id);
        if ($product) {
            $newStock = $product['stock'] + $quantity;
            return $this->update($id, ['stock' => $newStock]);
        }
        return false;
    }
}
?>
