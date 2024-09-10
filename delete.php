<?php
// Incluir el archivo de conexión a la base de datos
include 'db.php';

// Eliminar la tarea
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $db->prepare("DELETE FROM tasks WHERE id = ?")->execute([$id]);
}

// Redirigir de vuelta a la página principal
header('Location: index.php');
exit;
?>
