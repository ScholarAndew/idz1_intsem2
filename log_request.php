<?php

$logPdo = new PDO('sqlite:logs.sqlite');
$logPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$logPdo->exec("
    CREATE TABLE IF NOT EXISTS request_logs (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        script_name TEXT,
        parameters TEXT,
        timestamp TEXT
    )
");

$scriptName = basename($_SERVER['SCRIPT_NAME']);
$params = json_encode($_GET);

$now = (new DateTime('now', new DateTimeZone('Europe/Kyiv')))->format('Y-m-d H:i:s');

$stmt = $logPdo->prepare("INSERT INTO request_logs (script_name, parameters, timestamp) VALUES (:script, :params, :ts)");
$stmt->execute([
    'script' => $scriptName,
    'params' => $params,
    'ts' => $now
]);
