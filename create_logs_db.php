<?php
$pdo = new PDO('sqlite:logs.sqlite');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$pdo->exec("
    CREATE TABLE IF NOT EXISTS request_logs (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        script_name TEXT,
        parameters TEXT,
        timestamp DATETIME DEFAULT CURRENT_TIMESTAMP
    )
");

echo "Базу даних створено успішно.";
