<?php
// tableau associatif des civilités avec la value et le text affiché
$civilityList = ['Monsieur' => 'Monsieur', 'Madame' => 'Madame', 'Mademoiselle' => 'Mademoiselle'];
define('IMG_FOLDER','images/');
define('YEAR',date('Y')-1);
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
  if (isset($_POST['civility']) && in_array($_POST['civility'], $civilityList)) {
    $civility = htmlspecialchars($_POST['civility']);
  } else {
    $formErrors['civility'] = 'Veuillez sélectionner votre civilité';
  }
  // Verification image choisie 
  if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    if ($_FILES['image']['size'] <= 1500000) {
      $file = $_FILES['image']['name'];
      $tmpFile=$_FILES['image']['tmp_name'];
     $typeMime = mime_content_type($tmpFile);
      $allowedTypes = [
        'jpeg'=>'image/jpeg' ,
        'png'=>'image/png' ,
        'gif'=>'image/gif' ,
        'jpg'=>'image/jpeg'
      ];
      $extension = strtolower(pathinfo($file,PATHINFO_EXTENSION)) ;
      var_dump($extension);
      if (!in_array($typeMime, $allowedTypes) || !array_key_exists($extension, $allowedTypes)) {
        $formErrors['image'] = 'Ce fichier n\'est pas une image';
      }
    } else {
      $formErrors['image'] = 'l\'image est trop lourd ou est mal téléchargé';
    }
  } else {
    $formErrors['image'] = 'Veuillez sélectionner votre fichier';
  }
  //verification de la date de naissance 
  if(!empty($_POST['birth'])){
    $birthArray = explode('-', $_POST['birth']);
    if(checkdate($birthArray[1], $birthArray[2], $birthArray[0])){
      if($birthArray[0] <= YEAR  && $birthArray[0] >= 1900){
        $date = htmlspecialchars($_POST['birth']);
      }
      else{
        $formErrors['birth'] = 'l\'annee n\'est pas valide';
      }
    }
    else{
      $formErrors['birth'] = 'Veuillez entrer une date valide';
    }
  }
  else{
    $formErrors['birth'] = 'Veuillez rentrer la date';
  }
  //voir s'il n'y a aucune erreur pour televerser l'image
  if(empty($formErrors))
  { 
    move_uploaded_file($tmpFile, IMG_FOLDER . $_FILES['image']['name']);
    header('Location:profile.php?firstname=' . $firstName . '&lastName=' . $lastName . '&date=' . $date . '&image=' . IMG_FOLDER . $_FILES['image']['name'] .'&civility='.$civility);
    exit;
  }
} /*fin du if pour la verif des champs du form */
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Exercice 7 Partie 6</title>
</head>

<body>
  <h1> Exercices sur les Formulaires</h1>
  <?php
  if (empty($formErrors) && isset($_POST['submit'])) {
  ?>
     
   <?php

    } else {

      ?>
    <form method="POST" action="" enctype="multipart/form-data">
      <fieldset>
        <legend>Informations</legend> <!-- Titre du fieldset -->

        <?php
        foreach ($civilityList as $value => $text) { ?>
          <label for="<?= $value ?>"><?= $text ?></label>
          <input type="radio" id="<?= (isset($civility) && $civility == $value) ? 'selected' : ''; ?>" value="<?= $value ?>" name="civility" />
        <?php } ?>
        <p><?= (isset($formErrors['civility'])) ? $formErrors['civility'] : ''; ?></p>
        <label for="firstName">Prénom : </label><input type="text" id="firstName" name="firstName" value="<?= isset($firstName) ? $firstName : ''; ?>" />
        <p><?= (isset($formErrors['firstName'])) ? $formErrors['firstName'] : ''; ?></p>

        <label for="lastName">Nom : </label><input type="text" id="lastName" name="lastName" value="<?= isset($lastName) ? $lastName : ''; ?>" />
        <p><?= (isset($formErrors['lastName'])) ? $formErrors['lastName'] : ''; ?></p>
        <label for="birth">Date de naissance:</label>
        <input type="date" id="birth" name="birth" value="<?= isset($date)? $date : ''; ?>"  min="1900-01-01" max="<?= YEAR ?>-12-31">
        <label for="file">fichier : </label>
        <input type="file" name="image" />
        <p><?= (isset($formErrors['image'])) ? $formErrors['image'] : ''; ?></p>
        <input type="submit" value="Envoyer" name="submit">
      </fieldset>
    </form>
  <?php } ?>
</body>

</html>