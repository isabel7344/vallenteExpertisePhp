<?php

require "../modeles/training_sessions.php";

$TrainingSession = new TrainingSessions();
$regexId = "/^[0-9]+$/";

if(isset($_POST["id"]) && preg_match($regexId, $_POST["id"]) ) { 
        $verifiedId = $_POST["id"];
        $resultDeleteTrainingSession = $TrainingSession->deleteTrainingSessionById($verifiedId);
} else {
    $errorMessage = "";
}




