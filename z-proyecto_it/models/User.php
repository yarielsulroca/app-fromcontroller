<?php
require_once __DIR__ . '/BaseModel.php';

class User extends BaseModel {
    protected $table = 'users';
    
    protected $timestamps = true;
    protected $createdAt = 'created_at';
    protected $updatedAt = 'updated_at';
    protected $deletedAt = 'deleted_at';

    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'];
    
    // Buscar usuario por email
    public function findByEmail($email) {
        return $this->whereFirst('email', $email);
    }
    
    // Verificar contraseña
    public function verifyPassword($password, $hash) {
        return password_verify($password, $hash);
    }
    
    // Crear usuario con contraseña encriptada
    public function createUser($data) {
        if (isset($data['pass'])) {
            $data['password'] = password_hash($data['pass'], PASSWORD_DEFAULT);
        }

        if (!isset($data['role'])) {
            $data['role'] = "user";
        }

        $data["name"] = $data["apellido"].", ".$data["nombre"];
        return $this->create($data);
    }
    
    // Actualizar usuario con contraseña encriptada
    public function updateUser($id, $data) {
        if (isset($data['password']) && !empty($data['password'])) {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        } else {
            unset($data['password']);
        }
        return $this->update($id, $data);
    }
    
    // Obtener usuarios por rol
    public function getByRole($role) {
        return $this->where('role', $role);
    }
    
    // Obtener administradores
    public function getAdmins() {
        return $this->getByRole('admin');
    }
    
    // Obtener usuarios normales
    public function getUsers() {
        return $this->getByRole('user');
    }
}