<?php
// Incluir el archivo de conexión a la base de datos
include 'db.php';

// Marcar la tarea como completada
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $db->prepare("UPDATE tasks SET completed = 1 WHERE id = ?")->execute([$id]);
}

// Redirigir de vuelta a la página principal
header('Location: index.php');
exit;
?>
