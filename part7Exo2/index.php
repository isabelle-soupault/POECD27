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
    <div class="container">
        <h1>Exercice 2</h1>

        <p text-center> Sur la page index, faire un lien vers une autre page. Passer d'une page à l'autre le contenu des variables lastname, firstname et age grâce aux sessions.
            Ces variables auront été définies directement dans le code.
            Il faudra afficher le contenu de ces variables sur la deuxième page.</p>

    </div>
    <div class="container text-center mt-4">

        <?php

        $_SESSION['lastname'] = 'DS';
        $_SESSION['firstname'] = 'Iza';
        $_SESSION['age'] = '43';
        ?>

        <a href="affichage.php" target="_blank">
            <button type="button">Affichage des informations : </button>
        </a>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>