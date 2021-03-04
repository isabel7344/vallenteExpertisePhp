<?php
require "../Modeles/Database.php";
require "../modeles/user.php";


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


    $dbUser = new User();

    $user = $dbUser->verifyUserPresence($_POST["username"],$_POST["password"]);

    if(isset($user)) {
        $_SESSION["user"] = $user;
        header("Location: administratorModif.php");
    } else {
        echo "Vérifiez vos informations de connexion.";
}

}
