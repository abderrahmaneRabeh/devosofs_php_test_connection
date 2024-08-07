<?php

include_once "../DB/connection.php";

try {
    $_POST['nom'] = htmlspecialchars($_POST['nom']);

    $request = $DB->prepare('INSERT INTO `test_connections`(`nom`) VALUES (:nom)');
    $request->execute([
        'nom' => $_POST['nom']
    ]);

    header('Location: ../index.php');

} catch (PDOException $e) {
    echo "<h1 style='color:red;'>Connection failed: " . $e->getMessage() . "</h1>";
}