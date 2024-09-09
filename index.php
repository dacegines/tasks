<?php

$db = new PDO('mysql:host=localhost;dbname=task_manager;charset=utf8', 'root', ''); // Cambia 'root' y '' por tu usuario y contraseña de MySQL




// Obtener todas las tareas de la base de datos
$tasks = $db->query("SELECT * FROM tasks")->fetchAll(PDO::FETCH_ASSOC);
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

                <!-- Botón para eliminar la tarea -->
                <a href="delete.php?id=<?php echo $task['id']; ?>">Eliminar</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
