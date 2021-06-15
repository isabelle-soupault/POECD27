<?php

$startDate = '16-05-2016'; //date fr le 01 mai 2010
$endDate = date('d-m-Y'); // date fr le 01 octobre 2010
// On transforme les 2 dates en timestamp
$timeStampedStartDate = strtotime($startDate);
$timeStampedEndDate = strtotime($endDate);
 
// On récupère la différence de timestamp entre les 2 précédents
$nbDaysTimestamped = $timeStampedEndDate - $timeStampedStartDate;
 
// ** Pour convertir le timestamp (exprimé en secondes) en jours **
// On sait que 1 heure = 60 secondes * 60 minutes et que 1 jour = 24 heures donc :
$nbDays = $nbDaysTimestamped/86400; // 86 400 = 60*60*24


?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Partie 8 - Exercice 5</title>
</head>
<body>
<div class="container">
    <h1>Exercice 5</h1>

    <p text-center> Afficher le nombre de jour qui sépare la date du jour avec le 16 mai 2016.</p>

</div>
<div class="container text-center mt-4">
<p>
Le nombre de jours séparant le <?= $startDate ?> et le <?= $endDate ?> est de<span class="fw-bold text-success"> <?= $nbDays ?> </span>jours.

</p>


</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
