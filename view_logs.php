<?php
$pdo = new PDO('sqlite:logs.sqlite');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$logs = $pdo->query("SELECT * FROM request_logs ORDER BY timestamp DESC")->fetchAll();
?>

<h2>Логи запитів</h2>
<table border="1">
    <tr><th>ID</th><th>Сторінка</th><th>Параметри</th><th>Час</th></tr>
    <?php foreach ($logs as $log): ?>
        <tr>
            <td><?= $log['id'] ?></td>
            <td><?= htmlspecialchars($log['script_name']) ?></td>
            <td><?= htmlspecialchars($log['parameters']) ?></td>
            <td><?= $log['timestamp'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>
