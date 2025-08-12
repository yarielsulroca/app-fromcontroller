
<?php
require_once 'core/Database.php';

try {
    $db = Database::getInstance();
    $result = $db->fetchAll("SELECT * FROM users");
    echo "✅✅ Conexión exitosa! Usuarios encontrados: " . count($result);
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage();echo "\n"; 
}

// La contraseña original es "password"
//$password = "password";
//$hash = password_hash($password, PASSWORD_BCRYPT);
//echo $hash;
// Resultado: $2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi


//$password = 'password';
//$hash = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';

//if (password_verify($password, $hash)) {
//    echo "✅ Contraseña correcta";
//} else {
//    echo "❌ Contraseña incorrecta";
//}