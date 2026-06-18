<?php
$host = '127.0.0.1';
$port = 3306;
$user = 'root';
$pass = '';
try {
    $pdo = new PDO("mysql:host=$host;port=$port", $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    $stmt = $pdo->query('SHOW DATABASES');
    $dbs = $stmt->fetchAll(PDO::FETCH_COLUMN);
    echo "Databases on $host:$port\n";
    foreach ($dbs as $db) {
        echo "- $db\n";
    }
    echo "\nExists siak_db? ";
    echo in_array('siak_db', $dbs) ? "YES\n" : "NO\n";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage() . "\n";
    exit(1);
}
