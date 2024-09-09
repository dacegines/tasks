<?php
// Conectar a la base de datos SQLite
$db = new PDO('mysql:host=localhost;dbname=task_manager;charset=utf8', 'root', ''); // Cambia 'root' y '' por tu usuario y contraseña de MySQL

// Marcar la tarea como completada
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $db->prepare("UPDATE tasks SET completed = 1 WHERE id = ?")->execute([$id]);
}

// Redirigir de vuelta a la página principal
header('Location: index.php');
exit;
?>
