<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Partie 7 - Exercice 2</title>
</head>

<body>
    <div class="container-fluid text-center bg-light">
        <h1>Exercice 2 // Affichage</h1>

        <p text-center> Affichage session</p>

    </div>
    <div class="container text-center mt-4">
        <p>
        <ul style="list-style:none;">
            <li> Le prénom de l'utilisateur est : <?= $_SESSION['lastname'] ?></li>
            <li>Le nom de l'utilisateur est : <?= $_SESSION['firstname'] ?></li>
            <li>L'âge de l'utilisateur est : <?= $_SESSION['age'] ?></li>
        </ul>
        </p>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>