<?php
session_start();
require "../modeles/training_sessions.php";

if(!empty($_POST)) {
    $regexName = "/^[a-zA-Zéèàëïä -]+$/";
    $regexDate = "/^[1-2][0-9]{3}[-][0-1][0-9][-]([0-2][0-9]|[3][0-1])$/";
    
    $arrayErrors = [];

    $lastname = isset($_POST["NAME_TRAINING"]) ? htmlspecialchars($_POST["NAME_TRAINING"]) : "";
    $firstname = isset($_POST["START_DATE_TRAINING"]) ? htmlspecialchars($_POST["START_DATE_TRAINING"]) : "";
    $birthdate = isset($_POST["END_DATE_TRAINING"]) ? htmlspecialchars($_POST["END_DATE_TRAINING"]) : "";
    $phone = isset($_POST["NUMBER_OF_PLACES_TRAINING"]) ? htmlspecialchars($_POST["NUMBER_OF_PLACES_TRAINING"]) : "";
    $email = isset($_POST["NUMBER_PLACES_TAKEN"]) ? htmlspecialchars($_POST["NUMBER_PLACES_TAKEN"]) : "";

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

        $TrainingSessions = [
            "id" => $id,
            "NAME_TRAINING" => $NAME_TRAINING,
            "START_DATE_TRAINING" => $START_DATE_TRAINING,
            "END_DATE_TRAINING" => $END_DATE_TRAINING,
            "NUMBER_OF_PLACES_TRAINING" => $NUMBER_OF_PLACES_TRAINING,
            "NUMBER_PLACES_TAKEN" => $NUMBER_PLACES_TAKEN,
        ];
        $TrainingSession = new TrainingSessions();

        if($TrainingSession->addTrainingSessionAdminModal($TrainingSessions)) {
            $message = "La session de formation  a bien été ajoutée";
            header("Location:  /views/modalCalendrier.php");
        } else {
            $message = "Il y a eu une erreur lors de l'ajout de la session de formation";
        }
    }
}