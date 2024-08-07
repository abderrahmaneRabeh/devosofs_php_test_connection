<?php

include_once "../DB/connection.php";

try {



    $request = $DB->prepare('SELECT * FROM `test_connections` WHERE `id` = :id');
    $request->execute([
        'id' => $_GET['id']
    ]);
    $result = $request->fetch(PDO::FETCH_ASSOC);


    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

        <title>Document</title>
    </head>

    <body>
        <div class="container my-5 d-flex justify-content-center">
            <form action="./editName.php" method="post" class="form-inline">
                <div class="form-group">
                    <label for="nom" class="sr-only">nom</label>
                    <input type="text" name="nom" id="nom" value="<?php echo $result['nom']; ?>"
                        class="form-control mb-2 mr-sm-2" placeholder="nom" required>
                </div>
                <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
                <button type="submit" class="btn btn-primary mb-2">Modifier</button>
            </form>

        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>

    </html>

    <?php
} catch (PDOException $e) {
    echo "<h1 style='color:red;'>Connection failed: " . $e->getMessage() . "</h1>";
}