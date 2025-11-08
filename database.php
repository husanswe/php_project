<?php 
    $servername = "localhost";
    $username = "if0_40257292"; 
    $password = "VMM8YMzOuM30CH0";
    $database = "if0_40257292_php_blog";
    

    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        // set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
?>