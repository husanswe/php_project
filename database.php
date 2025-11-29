<?php 
    $servername = getenv('MYSQLHOST') ?: "localhost";
    $username = getenv('MYSQLUSER') ?: "root"; 
    $password = getenv('MYSQLPASSWORD') ?: "";
    $database = getenv('MYSQLDATABASE') ?: 'railway';
    $port = getenv('MYSQLPORT') ?: '3306';
    
    $dsn = "mysql:host=$servername;port=$port;dbname=$database;charset=utf8mb4";
    
    try {
        $pdo = new PDO($dsn, $username, $password, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ]);
        echo "Connected successfully";
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>