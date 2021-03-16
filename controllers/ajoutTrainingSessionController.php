<?php

require "../modeles/training_sessions.php";

if(!empty($_POST)) {
    $regexName = "/^[a-zA-Zéèàëïä -]+$/";
    $regexDate = "/^[1-2][0-9]{3}[-][0-1][0-9][-]([0-2][0-9]|[3][0-1])$/";
    
    $arrayErrors = [];

    $NAME_TRAINING = $_POST["NAME_TRAINING"];
    $START_DATE_TRAINING = $_POST["START_DATE_TRAINING"];
    $END_DATE_TRAINING = $_POST["END_DATE_TRAINING"];
    $NUMBER_OF_PLACES_TRAINING = $_POST["NUMBER_OF_PLACES_TRAINING"];
    $NUMBER_PLACES_TAKEN = $_POST["NUMBER_PLACES_TAKEN"];

    if(!isset($NAME_TRAINING) || !preg_match($regexName, $NAME_TRAINING)){
        $arrayErrors['NAME_TRAINING'] = "Veuillez renseigner une valeur correcte";
    } 
    
    if(!isset($START_DATE_TRAINING) || !preg_match($regexDate, $START_DATE_TRAINING)){
        $arrayErrors['START_DATE_TRAINING'] = "Veuillez renseigner une valeur correcte";
    } 

    if(!isset($END_DATE_TRAINING) || !preg_match($regexDate, $END_DATE_TRAINING)){
        $arrayErrors['END_DATE_TRAINING'] = "Veuillez renseigner une valeur correcte";
    } 
    
        $AddTrainingSessions = [
            
            "NAME_TRAINING" => $NAME_TRAINING,
            "START_DATE_TRAINING" => $START_DATE_TRAINING,
            "END_DATE_TRAINING" => $END_DATE_TRAINING,
            "NUMBER_OF_PLACES_TRAINING" => $NUMBER_OF_PLACES_TRAINING,
            "NUMBER_PLACES_TAKEN" => $NUMBER_PLACES_TAKEN,
        ];

        if((new TrainingSessions())->addTrainingSessionAdminModal($AddTrainingSessions)) {
            $message = "La session de formation  a bien été ajoutée";
            header("Location:  /views/calendrier.php");
        } else {
            $message = "Il y a eu une erreur lors de l'ajout de la session de formation";
        }
    
}