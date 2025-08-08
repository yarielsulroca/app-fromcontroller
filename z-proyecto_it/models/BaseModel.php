<?php
require_once __DIR__ . '/../core/Database.php';

// Modelo base con métodos CRUD comunes
abstract class BaseModel {
    protected $db;
    protected $table;
    protected $primaryKey = 'id';
    protected $fillable = [];
    protected $timestamps = true;
    protected $createdAt = 'created_at';
    protected $updatedAt = 'updated_at';
    protected $deletedAt = 'deleted_at';
    
    public function __construct() {
        $this->db = Database::getInstance();
    }
    
    // Obtener todos los registros (excluyendo soft deleted)
    public function all() {
        if ($this->timestamps && $this->deletedAt) {
            $sql = "SELECT * FROM {$this->table} WHERE {$this->deletedAt} IS NULL";
        } else {
            $sql = "SELECT * FROM {$this->table}";
        }
        return $this->db->fetchAll($sql);
    }
    
    // Obtener un registro por ID (excluyendo soft deleted)
    public function find($id) {
        if ($this->timestamps && $this->deletedAt) {
            $sql = "SELECT * FROM {$this->table} WHERE {$this->primaryKey} = ? AND {$this->deletedAt} IS NULL";
        } else {
            $sql = "SELECT * FROM {$this->table} WHERE {$this->primaryKey} = ?";
        }
        return $this->db->fetch($sql, [$id]);
    }
    
    // Crear un nuevo registro
    public function create($data) {
        $data = $this->filterFillable($data);
        
        // Añadir timestamps si están habilitados
        if ($this->timestamps) {
            $data[$this->createdAt] = date('Y-m-d H:i:s');
            $data[$this->updatedAt] = date('Y-m-d H:i:s');
        }
        
        $columns = implode(', ', array_keys($data));
        $placeholders = ':' . implode(', :', array_keys($data));
        
        $sql = "INSERT INTO {$this->table} ({$columns}) VALUES ({$placeholders})";
        $this->db->query($sql, $data);
        
        return $this->db->lastInsertId();
    }
    
    // Actualizar un registro
    public function update($id, $data) {
        $data = $this->filterFillable($data);
        
        // Añadir timestamp de actualización si están habilitados
        if ($this->timestamps) {
            $data[$this->updatedAt] = date('Y-m-d H:i:s');
        }
        
        $setClause = [];
        foreach ($data as $column => $value) {
            $setClause[] = "{$column} = :{$column}";
        }
        
        $sql = "UPDATE {$this->table} SET " . implode(', ', $setClause) . " WHERE {$this->primaryKey} = :id";
        $data['id'] = $id;
        
        return $this->db->query($sql, $data);
    }
    
    // Eliminar un registro (soft delete si hay deleted_at)
    public function delete($id) {
        if ($this->timestamps && $this->deletedAt) {
            // Soft delete
            $sql = "UPDATE {$this->table} SET {$this->deletedAt} = ? WHERE {$this->primaryKey} = ?";
            return $this->db->query($sql, [date('Y-m-d H:i:s'), $id]);
        } else {
            // Hard delete
            $sql = "DELETE FROM {$this->table} WHERE {$this->primaryKey} = ?";
            return $this->db->query($sql, [$id]);
        }
    }
    
    // Buscar por condición
    public function where($column, $value) {
        $sql = "SELECT * FROM {$this->table} WHERE {$column} = ?";
        return $this->db->fetchAll($sql, [$value]);
    }
    
    // Buscar uno por condición
    public function whereFirst($column, $value) {
        $sql = "SELECT * FROM {$this->table} WHERE {$column} = ? LIMIT 1";
        return $this->db->fetch($sql, [$value]);
    }
    

    
    // Paginación
    public function paginate($page = 1, $perPage = 10) {
        $offset = ($page - 1) * $perPage;
        $sql = "SELECT * FROM {$this->table} LIMIT {$perPage} OFFSET {$offset}";
        $data = $this->db->fetchAll($sql);
        
        $total = $this->count();
        $totalPages = ceil($total / $perPage);
        
        return [
            'data' => $data,
            'current_page' => $page,
            'per_page' => $perPage,
            'total' => $total,
            'total_pages' => $totalPages,
            'has_next' => $page < $totalPages,
            'has_prev' => $page > 1
        ];
    }
    
    // Filtrar solo campos permitidos
    protected function filterFillable($data) {
        if (empty($this->fillable)) {
            return $data;
        }
        
        return array_intersect_key($data, array_flip($this->fillable));
    }
    
    // Restaurar un registro soft deleted
    public function restore($id) {
        if ($this->timestamps && $this->deletedAt) {
            $sql = "UPDATE {$this->table} SET {$this->deletedAt} = NULL WHERE {$this->primaryKey} = ?";
            return $this->db->query($sql, [$id]);
        }
        return false;
    }
    
    // Obtener registros eliminados (soft deleted)
    public function getDeleted() {
        if ($this->timestamps && $this->deletedAt) {
            $sql = "SELECT * FROM {$this->table} WHERE {$this->deletedAt} IS NOT NULL";
            return $this->db->fetchAll($sql);
        }
        return [];
    }
    
    // Eliminación permanente (hard delete)
    public function forceDelete($id) {
        $sql = "DELETE FROM {$this->table} WHERE {$this->primaryKey} = ?";
        return $this->db->query($sql, [$id]);
    }
    
    // Contar registros (excluyendo soft deleted)
    public function count() {
        if ($this->timestamps && $this->deletedAt) {
            $sql = "SELECT COUNT(*) as total FROM {$this->table} WHERE {$this->deletedAt} IS NULL";
        } else {
            $sql = "SELECT COUNT(*) as total FROM {$this->table}";
        }
        $result = $this->db->fetch($sql);
        return $result['total'];
    }
}