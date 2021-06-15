<?php 
session_start();


if(!empty($_POST['validForm'])){
setcookie('email', $_POST['email'], time() + 24*3600); 
setcookie('password', $_POST['password'], time() + 24*3600);

}





//}

// comment sécuriser un PW pour éviter les inhections de JS par exemple?

// Création d'une regex pour l'adresse email

//if(isset($_POST['validForm'])){
//    $email = $_POST['email'];
//    $password = $_POST['password'];
//    //Vérification de l'adresse email
//    $formError = [];
//    
//    if (!empty($_POST['email'])) { 
//        $regexEmail = '/^[a-zA-Z]+[._-]?[a-zA-Z]+@[a-zA-Z]+.[a-zA-Z]+/gm+$/';
//            if(preg_match($regexEmail, $email)) {
//                $emailAdress = htmlspecialchars($email);
//                setcookie('email', $emailAdress, time()+24*3600);
//                setcookie('password', $password, time()+24*3600);
//            }else{
//                $formError = 'Merci d\'indiquer une adresse email valide';
//            }
//    }else {
//        $formError = 'Merci de saisir votre adresse email';
//    }
//}    
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
    <h1>Exercice 4</h1>

    <p text-center> Faire une page qui va récupérer les informations du cookie créé à l'exercice 3 et qui les affiche.</p>

</div>
<div class="container text-center mt-4">
<?php
if(empty($_POST)){ ?>
<form method="POST" action="pagecookie.php">
  <div class="mb-3">
    <label for="email" class="form-label">Adresse email</label>
    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">

  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Mot de passe</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>

  <button type="submit" class="btn btn-primary" id="validForm" name="validForm">Envoyer</button>
</form>
<?php } else{
header('Location:pagecookie.php?email='.$_GET['email']); 

}?>


</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>