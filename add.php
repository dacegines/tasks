<?php
// Conectar a la base de datos SQLite
$db = new PDO('mysql:host=localhost;dbname=task_manager;charset=utf8', 'root', ''); // Cambia 'root' y '' por tu usuario y contraseña de MySQL

// Agregar nueva tarea
if (isset($_POST['task'])) {
    $task = htmlspecialchars($_POST['task']);
    $db->prepare("INSERT INTO tasks (task, completed) VALUES (?, 0)")->execute([$task]);
}

// Redirigir de vuelta a la página principal
header('Location: index.php');
exit;
?>
