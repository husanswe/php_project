<?php
    // Railway environment variables
    $database_url = getenv('DATABASE_URL');

    if ($database_url) {
        // Production (Railway PostgreSQL)
        $db = parse_url($database_url);
        
        $host = $db['host'];
        $port = $db['port'];
        $dbname = ltrim($db['path'], '/');
        $user = $db['user'];
        $password = $db['pass'];
        
        try {
            $pdo = new PDO(
                "pgsql:host=$host;port=$port;dbname=$dbname;sslmode=require",
                $user,
                $password,
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    } else {
        // Local development (MySQL)
        try {
            $pdo = new PDO(
                "mysql:host=localhost;dbname=php_blog",
                "root",
                "",
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }
?>