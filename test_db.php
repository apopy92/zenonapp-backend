<?php

$host = 'granja-db.clkoa2oauv8j.sa-east-1.rds.amazonaws.com';
$db   = 'granja';
$user = 'postgresaws';
$pass = 'Granja2024dev';
$port = '5432';

$dsn = "pgsql:host=$host;port=$port;dbname=$db;";

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);
    echo "✅ Conexión exitosa a la base de datos PostgreSQL.\n";
} catch (PDOException $e) {
    echo "❌ Error al conectar: " . $e->getMessage() . "\n";
}
