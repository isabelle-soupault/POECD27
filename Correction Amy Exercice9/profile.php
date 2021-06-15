<?php
if (isset($_GET)){
  
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile</title>
</head>

<body>
  <h1>C'est bon</h1>
  <p> Civilité :<?= $civility ?></p>
  <p>Nom : <?= $lastName ?></p>
  <p>Prenom : <?= $firstName ?></p>
  <p>Date de naissance : <?= date('d/m/Y', mktime(0, 0, 0, $birthArray[1], $birthArray[2], $birthArray[0])); ?></p>
  <img src="<?= IMG_FOLDER . $_FILES['image']['name'] ?>">

</body>

</html>