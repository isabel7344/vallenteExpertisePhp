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
require "../Modeles/Database.php";
require "../Modeles/administrator_user.php";
require "../modeles/users_role.php";


session_start();

if (isset($_POST['connectUser'])) {
$messageError = [];
$arrayParameters = [];

$regexName = "/^[a-zA-Zéèàëïä -]+$/";
$regexPassword = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{8,15})$/";
$regexUsername = "/^[a-zA-Zéèàëïä -]{3,20}$/";



if(preg_match($regexName, $_POST["firstname"])) {
    $securedFirstname = htmlspecialchars($_POST["firstname"]);
    $arrayParameters["firstname"] = $securedFirstname;
} else {
    $messageError["firstname"] = "Veuillez renseigner une valeur valide pour ce champ.";
}
if(preg_match($regexName, $_POST["lastname"])) {
    $securedLastname = htmlspecialchars($_POST["lastname"]);
    $arrayParameters["lastname"] = $securedLastname;
} else {
    $messageError["lastname"] = "Veuillez renseigner une valeur valide pour ce champ.";
}
if(preg_match($regexUsername, $_POST["username"])) {
    $securedUsername = htmlspecialchars($_POST["username"]);
    $arrayParameters["username"] = $securedUsername;
} else {
    $messageError["username"] = "Veuillez renseigner une valeur valide pour ce champ.";
}
if(filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {
    $securedMail = htmlspecialchars($_POST["mail"]);
    $arrayParameters["mail"] = $securedMail;
} else {
    $messageError["mail"] = "Veuillez renseigner une valeur valide pour ce champ.";
}

if($_POST["password"] === $_POST["confirmPassword"]) {
    if(preg_match($regexPassword, $_POST["password"])) {
        $securedPassword = password_hash($_POST["password"], PASSWORD_BCRYPT);
        $arrayParameters["password"] = $securedPassword;
    } else {
        $messageError["password"] = "Veuillez renseigner un mot de passe contenant au moins : \n
        - une lettre majuscule \n
        - une lettre minuscule \n
        - un chiffre \n
        - un caractère spécial.";
    }
} else {
    $messageError["password"] = "Les 2 mots de passes ne sont pas identiques.";
} 

$UserRole = new Users_role();
$resultQuery = $UserRole->verifyUserPresence($securedUsername);

if(!empty($resultQuery)) {
    if(password_verify($securedPassword, $resultQuery["Administrator_User_password"])) {
        $Administrator_User = [];
        $Administrator_User["id"] = $resultQuery["Administrator_User_id"];
        $Administrator_User["firstname"] = $resultQuery["Administrator_User_firstname"];
        $Administrator_User["lastname"] = $resultQuery["Administrator_User_lastname"];
        $Administrator_User["username"] = $resultQuery["Administrator_User_Username"];
        $Administrator_User["mail"] = $resultQuery["Administrator_User_mail"];
        $Administrator_User["password"] = $resultQuery["Administrator_User_password"];
        $Administrator_User["role"] = $resultQuery["users_role_role"];
        $_SESSION["Administrator_User"] = $Administrator_User;
    
    }
} else {
    $message = "Vérifiez vos informations de connexion.";
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