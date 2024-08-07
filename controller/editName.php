<?php

include_once "../DB/connection.php";

try {

    $request = $DB->prepare('UPDATE `test_connections` SET `nom` = :nom WHERE `id` = :id');
    $request->execute([
        'nom' => $_POST['nom'],
        'id' => $_POST['id']
    ]);

    header('Location: ../index.php');

} catch (PDOException $e) {
    echo "<h1 style='color:red;'>Connection failed: " . $e->getMessage() . "</h1>";
}