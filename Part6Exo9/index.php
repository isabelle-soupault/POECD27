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
            $firstName = htmlspecialchars($_POST['firstName']);?>
            <?php
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
    // Verification civilité choisie
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

    //Vérification de la date de naissance.
    if(isset($_POST['birthDate'])){
        $birthDate = $_POST['birthDate'];
    } else {
        $formErrors['myBirthDate'] = 'Merci d\'indiquer votre date de naissance :) ';
    }

} /*fin du if pour la verif des champs du form */

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 7 Partie 9</title>
</head>
<body>
    <h1> Exercice 9</h1>

    <p>Créer un formulaire de création de profil sur la page index.php avec :
    <ul style="list-style:none;">
    <li>Une des bouton radio pour civilité (Mr ou Mme)</li>
    <li>Un champ texte pour le nom</li>
    <li>Un champ texte pour le prénom</li>
    <li>Un champ date pour la date de naissance</li>
    <li>Un champ d'envoi de fichier pour l'image de profil.</li>
    </ul>
            

A la soumission du formulaire, si tous les champs sont correctement renseignés, uploadez l'image de profil dans un dossier image que vous auriez créer en amont. Afficher le profil de l'utilisateur dans une page profile.php

</p>
    <?php 
    // Récupération de données passées par la méthode POST
    if(empty($_POST['submit']) || isset($formErrors)){
        ?>
      
    <!-- formulaire -->
    <form method="POST" enctype="multipart/form-data" action="profile.php">
        <fieldset>
            <legend>Informations</legend> <!-- Titre du fieldset -->
            <label for="civility"> Civilité</label><br />
                    <input type="radio" id="mr" name="civility" value="mr">
                    <label for="mr">Monsieur</label>

                    <input type="radio" id="mme" name="civility" value="mme">
                    <label for="mme">Madame</label>

            <p><?= (isset($formErrors['civility'])) ? $formErrors['civility'] : ''; ?></p>
            <label for="firstName">Prénom : </label><input type="text" id="firstName" name="firstName" value="<?= isset($firstName) ? $firstName : ''; ?>" />
            <p><?= (isset($formErrors['firstName'])) ? $formErrors['firstName'] : ''; ?></p>

            <label for="lastName">Nom : </label>
            <input type="text" id="lastName" name="lastName" value="<?= isset($lastName) ? $lastName : ''; ?>" />
            <p><?= (isset($formErrors['lastName'])) ? $formErrors['lastName'] : ''; ?></p>
            <label for="file">fichier : </label>
            <input type="file" name="myFile"/>
            <p><?= (isset($formErrors['myFile'])) ? $formErrors['myFile'] : ''; ?></p>

            <label for="birthDate">Votre date de naissance</label>
            <input type="date" value="birthDate" id="birthDate">
            <p><?= (isset($formErrors['myBirthDate'])) ? $formErrors['myBirthDate'] : ''; ?></p>

            <input type="submit" value="Envoyer" name="submit">

          
        </fieldset>
    </form>

<?php } ?>
</body>

</html>

<!------------------------------------------------------->
<!--                  Correction                       -->
<!------------------------------------------------------->

<!--
Pour le code corrigé, voir le code de Amy.


Rappel sur les conditions -  
Si une condition est VRAI ET VRAI, 
l'inverse est FAUX OU FAUX

Pour la date in vérifie :
- que c'est pas vide
- que le format est bon
- si le format est bon qu'il est valide

On doit également vérifier si la date est bien dans le calendrier
En effet, la date 31 / 04 / 2019 passe tous les tests mais est fausse (pas de jour 31 en avril :D)

Il y a une méthode qui existe, c'est la  checkdate()

Quand on fait des if / else, remplir de suite le else, comme ça on est sûr de ne pas l'oublier.

Pour vérifier si la date est au bon format, on fait une regex.
Mais est-ce que la regex est réellement nécessaire car si on a une date valide, elle est forcément au bon format.
Et au final, que la date soit au bon format ou invalide, on aura le même message d'erreur.

Dans les dates, d/m/Y
Y en mascule est sur 4 chiffres
d et m en minuscule est sur 2 chiffres.

Ici dans l'ennoncé, on nous demande d'afficher ça sur une autre page.

Néanmoins, si on fait les vérif ici et l'affichage ailleurs, on doit tout passer par le header, et faire une redirection. Mais ce n'est pas propre.

En effet, faire les vérifications sur une autre page complqiue tout et ne permet pas de voir proprement les erreurs.

Différence entre die et exit :
die arrête tout et envoie un message, alors que exit stop la suite de l'exécution.

Lorsque l'on fait une redirection, c'est dans les bonnes pratiques que de faire un exit car ça ne sert à rien de continuer plus loin le traitement.


Dans une autre page si on utilise des variables, si on ne transfert pas les informations on aura des fonction undefined.

il y a 3 méthodes différentes :
 - paramêtres url
 - sessions
 - cookies

 Dans ce contexte, 
 les cookies ne sont pas adaptés.
 Les sessions c'est un peu usine à gaz et ça va garder en mémoire les informations précédentes.

 Il reste donc les url, cela signifie qu'on veut du GET.
 Le get 
 profile.php?firstname=

Qu'on utilise le post ou le get aucun des deux n'est sécurisé.
Le get affiche directement et le post non. Mais ce n'est pas pour autant que le post est plus sécurisé que le get

le header devient alors :
header('Location:profile.php?firstName=' . $firstName . '&lastName= ' . $lastName . '&date=' . $date . '&image=' . IMG_FOLDER .  . '&civility) // etc ==> CF correction


Comme on est en get, on doit s'assurer d'avoir l'ensemble des données.

Pour cela, on va mettre avant le DOCTYPE et on va voir si chaque champs est 
- présent 
- remplie
- au bon format


if(isset($_GET)){

} else {

}

FInalement le GET n'est pas la bonne méthode, car il faut refaire toutes les vérifications sur la page d'avant et cela fait doublon.

Donc....
le GET avec réflexion est éloigné.

Cela veut dire qu'on est obligé de partir sur les sessions....

Néanmoins, comme cela est en avance sur le programme, on vera ça plus tard


->
