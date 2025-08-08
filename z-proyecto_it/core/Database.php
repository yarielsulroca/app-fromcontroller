<?php
// Clase para manejar la conexión a la base de datos
class Database {
    private static $instance = null;
    private $connection;
    
    private function __construct() {
        /* SE INICIALIZA LAS VARIABLES DE CONFIGURACION DE LA DATABASE */
        $config = require __DIR__ . '/../config/database.php';
        
        /* ME CONECTO A LA BASE DE DATOS CON LAS VARIABLES DE CONFIGURACION DEL DATABASE */
        try {
            $dsn = "mysql:host={$config['host']};dbname={$config['database']};charset={$config['charset']}";
            $this->connection = new PDO($dsn, $config['username'], $config['password'], $config['options']);
        } catch (PDOException $e) {
            throw new Exception("Error de conexión: " . $e->getMessage());
        }
    }
    
    /* HAGO UN SINGLETON PARA INSTANCIAR LA BASE DE DATOS */
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    public function getConnection() {
        return $this->connection;
    }
    
    /* DEVUELVE un objeto con los datos */
    public function query($sql, $params = []) {
        try {
            $stmt = $this->connection->prepare($sql);
            $stmt->execute($params);
            return $stmt;
        } catch (PDOException $e) {
            throw new Exception("Error en consulta: " . $e->getMessage());
        }
    }
    
    /* traigo todos los registros */
    public function fetchAll($sql, $params = []) {
        return $this->query($sql, $params)->fetchAll();
    }
    
    /* traigo solo un registro */
    public function fetch($sql, $params = []) {
        return $this->query($sql, $params)->fetch();
    }
    
    public function lastInsertId() {
        return $this->connection->lastInsertId();
    }
}