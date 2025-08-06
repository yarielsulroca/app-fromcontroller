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
        'author_id',
        'status' // draft, published, archived
    ];

    // Obtener posts por estado
    public function getByStatus($status) {
        $sql = "SELECT * FROM {$this->table} WHERE status = ? AND {$this->deletedAt} IS NULL";
        return $this->db->fetchAll($sql, [$status]);
    }

    // Buscar posts por título o contenido
    public function searchPosts($keyword) {
        $sql = "SELECT * FROM {$this->table} WHERE (title LIKE ? OR content LIKE ?) AND {$this->deletedAt} IS NULL";
        $param = "%{$keyword}%";
        return $this->db->fetchAll($sql, [$param, $param]);
    }

    // Obtener posts por autor
    public function getByAuthor($authorId) {
        return $this->where('author_id', $authorId);
    }

    // Cambiar estado a publicado
    public function publishPost($id) {
        return $this->update($id, ['status' => 'published']);
    }

    // Cambiar estado a archivado
    public function archivePost($id) {
        return $this->update($id, ['status' => 'archived']);
    }
}
?>
