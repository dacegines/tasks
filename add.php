<?php
// Incluir el archivo de conexión a la base de datos
include 'db.php';

// Agregar nueva tarea
if (isset($_POST['task'])) {
    $task = htmlspecialchars($_POST['task']);
    $db->prepare("INSERT INTO tasks (task, completed) VALUES (?, 0)")->execute([$task]);
}

// Redirigir de vuelta a la página principal
header('Location: index.php');
exit;
?>
