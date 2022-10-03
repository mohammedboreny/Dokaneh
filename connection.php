<?php

$host = 'localhost';
$dbName = 'dokkaneh';
$user     = 'root';
$pass     = 'root';


try {
    $conn = new PDO('mysql:host=' . $host . '; dbname=' . $dbName, $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Database Error: ' . $e->getMessage();
}
