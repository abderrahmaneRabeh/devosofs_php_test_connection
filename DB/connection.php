<?php
try {
    $host = 'localhost';
    $dbname = 'devsoft';
    $user = 'root';
    $pass = '';
    $DB = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
} catch (PDOException $e) {
    echo "<h1 style='color:red;'>Connection failed: " . $e->getMessage() . "</h1>";
}
