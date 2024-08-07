<?php
// PDO connection
include_once "./DB/connection.php";

// SQL query
try {
    $request = $DB->prepare('SELECT * FROM `test_connections`');
    $request->execute();
    $result = $request->fetchAll(PDO::FETCH_ASSOC);

    // echo "<pre>";
    // var_dump($result);
    // echo "</pre>";


    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <style>
            body {
                background-color: #f5f5f5;
                padding: 20px;
            }

            .container {
                width: 70%;
                margin: 0 auto;
                background-color: #fff;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                border-radius: 5px;
            }

            .card {
                border-radius: 5px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }

            .card-body {
                padding: 20px;
            }

            .form-group {
                margin-bottom: 20px;
            }

            .form-control {
                border-radius: 5px;
                border: none;
                box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
            }

            .btn-primary {
                background-color: #007bff;
                border-color: #007bff;
            }

            .list-group-item {
                border: none;
                border-radius: 5px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }

            .list-group-item-actions {
                display: flex;
                align-items: center;
            }

            .list-group-item-actions .btn {
                margin-left: auto;
            }
        </style>
    </head>

    <body>
        <div class="container my-5">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card mt-3">
                        <div class="card-body p-4">
                            <form action="./controller/addNom.php" method="post" class="form-inline">
                                <div class="form-group">
                                    <label for="nom" class="sr-only">nom</label>
                                    <input type="text" name="nom" id="nom" class="form-control mb-2 mr-sm-2"
                                        placeholder="nom" required>
                                </div>
                                <button type="submit" class="btn btn-primary mb-2">Ajouter</button>
                            </form>
                        </div>
                    </div>
                    <?php if (!empty($result)): ?>
                        <div class="mt-5">
                            <h3 class="text-center mb-4 bg-light p-2 border border-dark">List des noms</h3>
                            <ul class="list-group">
                                <?php foreach ($result as $row): ?>
                                    <div class="mb-2">
                                        <li
                                            class="list-group-item d-flex justify-content-between align-items-center font-weight-bold bg-light">
                                            <?php echo $row['nom']; ?>
                                            <div class="list-group-item-actions">
                                                <a href="./controller/deleleName.php?id=<?php echo $row['id']; ?>"
                                                    class="btn btn-danger btn-sm">supprimer</a>
                                                <a href="./controller/updateName.php?id=<?php echo $row['id']; ?>"
                                                    class="btn btn-primary mx-2 btn-sm">update</a>
                                            </div>
                                        </li>
                                    </div>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                    <?php else: ?>
                        <div class="mt-5">
                            <h3 class="text-center">No results found</h3>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="mt-3 text-center">
                <a href="./controller/deleteAllNoms.php" class="btn btn-danger mb-2">Supprimer tous les noms</a>
            </div>
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
?>