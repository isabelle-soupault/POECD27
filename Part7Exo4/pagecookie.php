<?php

session_start();

if (isset($_GET['email'])){
    echo $_GET['email'];
    }
    else {
    header('Location:index.php');
    }
    

//echo $_COOKIE['password'] . ' ' . $_COOKIE['email'];

?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Partie 7 - Exercice 4</title>
</head>
<body>
<div class="container">
    <h1>Exercice Y</h1>

    <p text-center> Faire une page qui va récupérer les informations du cookie créé à l'exercice 3 et qui les affiche.</p>

</div>
<div class="container text-center mt-4">

<p> Email de l'utilisateur <?=  $_COOKIE['email'] ?></p>
<p>Password de l'utilisateur :<?=  $_COOKIE['password'] ?> </p>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>