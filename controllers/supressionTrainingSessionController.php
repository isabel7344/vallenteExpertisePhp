<?php
setlocale(LC_ALL, "fr_FR.utf8");
require "../Models/Database.php";

$training_sessions = new TrainingSessions();

if(isset($_POST["submitDeleteTrainingSessions"]) && !empty($_POST["submitDeleteTrainingSessions"])) {

    require "../modeles/training_sessions.php";

    $TrainingSession = new TrainingSessions();

    $regexId = "/^[0-9]+$/";

    $id = htmlspecialchars($_POST["deleteTrainingSessionById"]);
    if(preg_match($regexId, $id)) {
        $verifiedId = (int)$id;
        $resultDeleteTrainingSession = $TrainingSession->deleteTrainingSessionById($verifiedId);
    } else {
        $errorMessage = "Arrête de toucher à mes POST";
    }
}




