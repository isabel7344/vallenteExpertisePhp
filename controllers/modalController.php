<?php
session_start();
require "../modeles/database.php";
require "../modeles/training_sessions.php";

$training_sessions = new TrainingSessions();


if(isset($_POST["updateTrainingSessions"]) && !empty($_POST["updateTrainingSessions"])){
    $regexName = "/^[a-zA-Zéèàëïä -]+$/";
    $regexDate = "/^[1-2][0-9]{3}[-][0-1][0-9][-]([0-2][0-9]|[3][0-1])$/";
    $arrayErrors = [];

    $NAME_TRAINING = isset($_POST["NAME_TRAINING"]) ? htmlspecialchars($_POST["NAME_TRAINING"]) : "";
    $START_DATE_TRAINING = isset($_POST["START_DATE_TRAINING"]) ? htmlspecialchars($_POST["START_DATE_TRAINING"]) : "";
    $END_DATE_TRAINING = isset($_POST["END_DATE_TRAINING"]) ? htmlspecialchars($_POST["END_DATE_TRAINING"]) : "";
    $NUMBER_OF_PLACES_TRAINING = isset($_POST["NUMBER_OF_PLACES_TRAINING"]) ? htmlspecialchars($_POST["NUMBER_OF_PLACES_TRAINING"]) : "";
    $NUMBER_PLACES_TAKEN = isset($_POST["NUMBER_PLACES_TAKEN"]) ? htmlspecialchars($_POST["NUMBER_PLACES_TAKEN"]) : "";
    // $NUMBER_PLACES_REMAINING = isset($_POST["NUMBER_OF_PLACES_TRAINING"-"NUMBER_PLACES_TAKEN"]) ? htmlspecialchars($_POST["NUMBER_OF_PLACES_TRAINING"-"NUMBER_PLACES_TAKEN"]) : "";
    
    if(preg_match($regexName, $NAME_TRAINING)){
        $verifiedNAME_TRAINING = $NAME_TRAINING;
    } else {
        $arrayErrors['NAME_TRAINING'] = "Veuillez renseigner une valeur correcte";
    }
    
    if(preg_match($regexDate, $START_DATE_TRAINING)){
        $verifiedSTART_DATE_TRAINING = $START_DATE_TRAINING;
    } else {
        $arrayErrors['START_DATE_TRAINING'] = "Veuillez renseigner une valeur correcte";
    }

    if(preg_match($regexDate, $END_DATE_TRAINING)){
        $verifiedEND_DATE_TRAINING = $END_DATE_TRAINING;
    } else {
        $arrayErrors['END_DATE_TRAINING'] = "Veuillez renseigner une valeur correcte";
    }
    if(empty($arrayErrors)){

        // On fera bien attention ici à rajouter l'id du patient concerné par la modification dans le tableau de paramètres à envoyer à la méthode de modification
        $arrayParameters = [
            "NAME_TRAINING" => $verifiedNAME_TRAINING,
            "START_DATE_TRAINING" => $START_DATE_TRAINING,
            "END_DATE_TRAINING" => $verifiedEND_DATE_TRAINING,
            "NUMBER_OF_PLACES_TRAINING" => $verifiedNUMBER_OF_PLACES_TRAINING,
            "NUMBER_PLACES_TAKEN" => $verifiedNUMBER_PLACES_TAKEN,
        ];

        // Si la méthode de modification renvoie true, alors on stockera un message de succès en session et on redirigera sur la page profil patient avec l'id du patient en paramètre d'URL
        if($training_sessions->updateTrainingSessions($arrayParameters)) {
            $_SESSION["successMessage"] = "La session a été modififié";
            // header("Location: profil-patient.php?idPatient=" . $verifiedId);
        } else {
            $message = "Il y a eu une erreur lors de la modification du patient";
        }
    }

}