<?php

$query = file_get_contents(__DIR__ . '/db.sql');
$pdo = require_once __DIR__ . '/../connection/connection.php';
$pdo->exec($query);

echo "Database created. You can use the app now.";