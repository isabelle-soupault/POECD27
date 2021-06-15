<?php

// on vérifie que le form est submit(envoyer)
if (isset($_POST['submit'])) {
    // tableau vide pour l'affichage des erreurs
    $formErrors = [];
    //regex pour la verification des données a entrer pas de chiffre sur les noms et prenoms
    $regexName = '/^[a-zA-Z \-]+$/';
    /* Verification du prenom entré par l'utilisateur pas de chiffres ni de caracteres speciaux
     avec un message d'erreur à afficher si pas rempli ou erreur
     */
        if (!empty($_POST['firstName'])) { // le champ n'est pas vide
            if (preg_match($regexName, $_POST['firstName'])) {
                $firstName = htmlspecialchars($_POST['firstName']);
            } else {
                $formErrors['firstName'] = 'Merci de ne renseigner que des lettres';
            }
        } else {
            $formErrors['firstName'] = 'Veuillez entrer votre prénom';
        }
    /* Verification du nom entré par l'utilisateur pas de chiffres ni de caracteres speciaux
     avec un message d'erreur à afficher si pas rempli ou erreur
     */
            if (!empty($_POST['lastName'])) { // le champ n'est pas vide
                if (preg_match($regexName, $_POST['lastName'])) {
                    $lastName = htmlspecialchars($_POST['lastName']);
                } else {
                    $formErrors['lastName'] = 'Merci de ne renseigner que des lettres';
                }
            } else {
                $formErrors['lastName'] = 'Veuillez entrer votre nom';
            }
            // Verification civilité choisie et cherche si existe dans le tableau civilityList
            if (isset($_POST['civility'])) {  
                $civility = htmlspecialchars($_POST['civility']);
            } else {
                $formErrors['civility'] = 'Veuillez sélectionner votre civilité';
            }
            // Verification image choisie 
            if (isset($_FILES['myFile']) && $_FILES['myFile']['error'] == 0) {  
                $myFile = $_FILES['myFile'];
            } else {
                $formErrors['myFile'] = 'Veuillez sélectionner votre fichier';
            }
          

} /*fin du if pour la verif des champs du form */

?>


<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <title>Profil utilisateur</title>
</head>

<body>
  <div class="container">
    <h1>Profil de l'utilisateur </h1>

    <p text-center> </p>
    <div class="card" style="width: 18rem;">
      <img src="..." alt="Photo" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title"><?= isset($firstName) ? $firstName : '' ?> <?= isset($lastName) ? $lastName : '' ?></h5>
        <p class="card-text">Date de naissance : <?= isset($birthDate) ? $birthDate : '' ?> <br>
          Civilité : <?= isset($civility) ? $civility : '' ?> </p>

      </div>
    </div>

  </div>
  <div class="container text-center mt-4">


  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>