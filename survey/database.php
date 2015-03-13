<?php
    $dsn = 'mysql:host=localhost;dbname=survey';
    $username = 'root';
    $password = '';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        include('index.php');
        exit();
    }
?>