<?php

include_once "../DB/connection.php";

try {

    $request = $DB->prepare('DELETE FROM `test_connections`');
    $request->execute();

    header('Location: ../index.php');

} catch (PDOException $e) {
    echo "<h1 style='color:red;'>Connection failed: " . $e->getMessage() . "</h1>";
}