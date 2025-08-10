<?php
require_once __DIR__ . '/BaseModel.php';

class BlogPost extends BaseModel {
    protected $table = 'blog_posts';
    protected $timestamps = true;
    protected $createdAt = 'created_at';
    protected $updatedAt = 'updated_at';
    protected $deletedAt = 'deleted_at';

    protected $primaryKey = 'id';
    
    protected $fillable = [
        'title', 
        'content', 
        'excerpt', 
        'author_id', 
        'status'
    ];
 
    
    // Obtener posts publicados
    public function getPublished() {
        return $this->where('status', 'published');
    }
    
    // Obtener posts por autor
    public function getByAuthor($authorId) {
        return $this->where('author_id', $authorId);
    }
    
    // Buscar posts por título
    public function searchByTitle($search) {
        $sql = "SELECT * FROM {$this->table} WHERE title LIKE ? AND status = 'published' AND {$this->deletedAt} IS NULL";
        return $this->db->fetchAll($sql, ["%{$search}%"]);
    }
    
    // Obtener posts recientes
    public function getRecent($limit = 5) {
        $sql = "SELECT * FROM {$this->table} WHERE status = 'published' AND {$this->deletedAt} IS NULL ORDER BY created_at DESC LIMIT ?";
        return $this->db->fetchAll($sql, [$limit]);
    }
    
    // Publicar un post
    public function publish($id) {
        return $this->update($id, ['status' => 'published']);
    }
    
    // Despublicar un post
    public function unpublish($id) {
        return $this->update($id, ['status' => 'draft']);
    }
}