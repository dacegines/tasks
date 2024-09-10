<?php
// Incluir el archivo de conexión a la base de datos
include 'db.php';

// Obtener todas las tareas de la base de datos
$tasks = $db->query("SELECT * FROM tasks")->fetchAll(PDO::FETCH_ASSOC);

// Contar tareas completadas y pendientes
$totalTasks = count($tasks);
$completedTasks = count(array_filter($tasks, fn($task) => $task['completed'] == 1));
$pendingTasks = $totalTasks - $completedTasks;

// Marcar todas las tareas como completadas
if (isset($_POST['complete_all'])) {
    $db->query("UPDATE tasks SET completed = 1");
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Gestión de Tareas</title>
</head>
<body>
    <h1>Lista de Tareas</h1>

    <!-- Mostrar contador de tareas -->
    <p>Total de tareas: <?php echo $totalTasks; ?></p>
    <p>Tareas completadas: <?php echo $completedTasks; ?></p>
    <p>Tareas pendientes: <?php echo $pendingTasks; ?></p>

    <!-- Botón para marcar todas las tareas como completadas -->
    <form method="post" action="index.php">
        <button type="submit" name="complete_all">Marcar Todas Como Completadas</button>
    </form>

    <!-- Formulario para agregar nueva tarea -->
    <form action="add.php" method="post">
        <input type="text" name="task" placeholder="Nueva tarea" required>
        <button type="submit">Agregar Tarea</button>
    </form>

    <!-- Mostrar lista de tareas -->
    <ul>
        <?php foreach ($tasks as $task): ?>
            <li>
                <?php if ($task['completed']): ?>
                    <strike><?php echo htmlspecialchars($task['task']); ?></strike>
                <?php else: ?>
                    <?php echo htmlspecialchars($task['task']); ?>
                <?php endif; ?>
                
                <!-- Botón para marcar como completada -->
                <a href="complete.php?id=<?php echo $task['id']; ?>">Completar</a>

                <!-- Botón para editar la tarea -->
                <a href="edit.php?id=<?php echo $task['id']; ?>">Editar</a>

                <!-- Botón para eliminar la tarea -->
                <a href="delete.php?id=<?php echo $task['id']; ?>">Eliminar</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
