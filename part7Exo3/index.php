<?php
session_start();

if(isset($_POST['validForm'])){
setcookie('login', $_POST['login'], time() + 365*24*3600, null, null, false, true); 
setcookie('password', $_POST['password'], time() + 365*24*3600, null, null, false, true);

}

var_dump($_COOKIE);

?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Partie 7 - Exercice 3</title>
</head>

<body>
    <div class="container">
        <h1>Exercice 3</h1>

        <p text-center> Faire un formulaire qui permet de récupérer le login et le mot de passe de l'utilisateur. A la validation du formulaire, stocker les informations dans un cookie.</p>

    </div>
    <div class="container text-center mt-4">

        <form action="index.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="inputEmail" class="form-label">Adresse email</label>
                <input type="email" class="form-control" id="inputEmail" name="login"  aria-describedby="emailHelp" >
            </div>
            <div class="mb-3">
                <label for="inputPassword" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" name="password" id="inputPassword1">
            </div>
            <button type="submit" class="btn btn-primary" name="validForm">Envoyer</button>
        </form>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>