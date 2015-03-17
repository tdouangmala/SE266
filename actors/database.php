<?php
    $dsn = 'mysql:host=localhost;dbname=actors';
    $username = 'root';
    $password = '';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error[] = $e->getMessage();
        include('actor_list.php');
        exit();
    }
?>