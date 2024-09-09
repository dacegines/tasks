<?php
// Conectar a la base de datos SQLite
$db = new PDO('mysql:host=localhost;dbname=task_manager;charset=utf8', 'root', ''); // Cambia 'root' y '' por tu usuario y contraseña de MySQL

// Eliminar la tarea
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $db->prepare("DELETE FROM tasks WHERE id = ?")->execute([$id]);
}

// Redirigir de vuelta a la página principal
header('Location: index.php');
exit;
?>
