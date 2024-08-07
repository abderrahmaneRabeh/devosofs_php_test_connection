<?php

include_once "../DB/connection.php";

try {

    $request = $DB->prepare('DELETE FROM `test_connections` WHERE `id` = :id');
    $request->execute([
        'id' => $_GET['id']
    ]);



    header('Location: ../index.php');

} catch (PDOException $e) {
    echo "<h1 style='color:red;'>Connection failed: " . $e->getMessage() . "</h1>";
}