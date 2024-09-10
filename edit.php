<?php
// Incluir el archivo de conexión a la base de datos
include 'db.php';

// Verificar si se ha enviado el formulario de edición
if (isset($_POST['id']) && isset($_POST['task'])) {
    $id = (int)$_POST['id'];
    $task = htmlspecialchars($_POST['task']);
    
    // Actualizar la tarea en la base de datos
    $stmt = $db->prepare("UPDATE tasks SET task = ? WHERE id = ?");
    $stmt->execute([$task, $id]);

    // Redirigir a la página principal
    header('Location: index.php');
    exit;
}

// Obtener la tarea que se va a editar
if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $stmt = $db->prepare("SELECT * FROM tasks WHERE id = ?");
    $stmt->execute([$id]);
    $task = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tarea</title>
</head>
<body>
    <h1>Editar Tarea</h1>

    <?php if ($task): ?>
        <form action="edit.php" method="post">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($task['id']); ?>">
            <input type="text" name="task" value="<?php echo htmlspecialchars($task['task']); ?>" required>
            <button type="submit">Guardar Cambios</button>
        </form>
    <?php else: ?>
        <p>Tarea no encontrada.</p>
    <?php endif; ?>

    <a href="index.php">Volver a la lista de tareas</a>
</body>
</html>
