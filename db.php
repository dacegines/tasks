<?php
// db.php - Archivo de conexión a la base de datos

try {
    // Conexión a la base de datos MySQL usando PDO
    $db = new PDO('mysql:host=localhost;dbname=task_manager;charset=utf8', 'root', ''); // Cambia 'tu_contraseña' por la contraseña de tu base de datos
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Configura el manejo de errores
} catch (PDOException $e) {
    // Manejo de errores
    echo "Error al conectar a la base de datos: " . $e->getMessage();
    exit;
}
?>
