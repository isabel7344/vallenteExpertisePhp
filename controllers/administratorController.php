<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/e2a465b2f1.js" crossorigin="anonymous"></script>
    <link rel="icon" href="../assets/img/logoFondBlanc.png">
    <link rel="stylesheet" href="../assets/style.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <title>Vallente EXpertise</title>
</head>

<body>

<?php
session_start();

if (isset($_POST['connectUser'])) {
$messageError = [];
$messageSuccess = [];

$regexName = '/^\D{2,19}$/';
$regexPassword = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{8,15})$/";


if (isset($_POST['lastName'])) {
    if (empty($_POST['lastName'])) {
        $messageError['lastName'] = 'Le champs est vide';
    } elseif (!preg_match($regexName, $_POST['lastName'])) {
        $messageError['lastName'] = 'Le nom n\'est pas valide';
    } elseif (strlen($_POST['lastName']) < 2 || strlen($_POST['lastName']) > 50) {
        $messageError['lastName'] = 'Le nom doit contenir 2 à 50 caractères';
    } else {
        $messageSuccess['lastName'] = '<i class="fas fa-check formValid"></i>';
    }
}

if (isset($_POST['firstName'])) {
    if (empty($_POST['firstName'])) {
        $messageError['firstName'] = 'Le champs est vide';
    } elseif (!preg_match($regexName, $_POST['firstName'])) {
        $messageError['firstName'] = 'Le nom n\'est pas valide';
    } elseif (strlen($_POST['firstName']) < 2 || strlen($_POST['firstName']) > 50) {
        $messageError['firstName'] = 'Le nom doit contenir de 2 à 50 caractères';
    } else {
        $messageSuccess['firstName'] = '<i class="fas fa-check formValid"></i>';
    }
}
if(preg_match($regexPassword, $_POST["password"])) {
    $securedPassword = $_POST["password"];
} else{
    $messageErrors["password"] = "Veuillez renseigner une valeur valide pour ce champ.";
// } else{
//     $messageSuccess['firstName'] = '<i class="fas fa-check formValid"></i>';
// }

if (isset($_POST['mail'])) {
    if (empty($_POST['mail'])) {
        $messageError['mail'] = 'Le champs est vide';
    } elseif (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
        $messageError['mail'] = 'L\'adresse mail n\'est pas valide';
    } else {
        $messageSuccess['mail'] = '<i class="fas fa-check formValid"></i>';
    }
}
}
}
?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
        </script>
        <script type=" text/javascript" src="../assets/script.js"></script>
        <script>
            AOS.init();
        </script>
</body>

</html>