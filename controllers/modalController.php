<?php
session_start();
require "../modeles/training_sessions.php";

$training_sessions = new TrainingSessions();

$regexName = "/^[a-zA-Zéèàëïä -]+$/";
$regexDate = "/^[1-2][0-9]{3}[-][0-1][0-9][-]([0-2][0-9]|[3][0-1])$/";


$NAME_TRAINING = $_POST["NAME_TRAINING"];
$START_DATE_TRAINING = $_POST["START_DATE_TRAINING"];
$END_DATE_TRAINING = $_POST["END_DATE_TRAINING"];
$NUMBER_OF_PLACES_TRAINING = $_POST["NUMBER_OF_PLACES_TRAINING"];
$NUMBER_PLACES_TAKEN = $_POST["NUMBER_PLACES_TAKEN"];
$id = $_POST["id"];



if(preg_match($regexName, $NAME_TRAINING)){
    $verifiedNAME_TRAINING = $NAME_TRAINING;
} else {
    // $arrayErrors['NAME_TRAINING'] = "Veuillez renseigner une valeur correcte";
}

if(preg_match($regexDate, $START_DATE_TRAINING)){
    $verifiedSTART_DATE_TRAINING = $START_DATE_TRAINING;
} else {
    // $arrayErrors['START_DATE_TRAINING'] = "Veuillez renseigner une valeur correcte";
}
if(preg_match($regexDate, $END_DATE_TRAINING)){
    $verifiedEND_DATE_TRAINING = $END_DATE_TRAINING;
} else {
    // $arrayErrors['END_DATE_TRAINING'] = "Veuillez renseigner une valeur correcte";
}

    // On fera bien attention ici à rajouter l'id de la session de formation concerné par la modification dans le tableau de paramètres à envoyer à la méthode de modification
$TrainingSessions = [
	"id" => $id,
	"NAME_TRAINING" => $NAME_TRAINING,
    "START_DATE_TRAINING" => $START_DATE_TRAINING,
    "END_DATE_TRAINING" => $END_DATE_TRAINING,
    "NUMBER_OF_PLACES_TRAINING" => $NUMBER_OF_PLACES_TRAINING,
    "NUMBER_PLACES_TAKEN" => $NUMBER_PLACES_TAKEN,
];
// méthode de modification de sessions de formation
if($training_sessions->updateTrainingSessions($TrainingSessions)) {
    header("Location: /views/calendrier.php");
} else {
    $message = "Il y a eu une erreur lors de la modification de la session de formation";
}