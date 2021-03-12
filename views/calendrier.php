<?php
require_once("../controllers/calendrierDispoController.php");
require("../modeles/training_sessions.php");
require("modalCalendrier.php");
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="icon" href="../assets/img/logoFondBlanc.png">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>calendrier</title>
</head>

<body style="overflow: hidden;">
    <div class=" row justify-content-center" id="reservation">
        <div class="col-xl-8 col-sm-11">
            <div class="d-flex justify-content-center mb-1 mt-2">
            <!-- creation des input permettant de passer du mois precedent et mois suivant -->
                <form action="../controllers/calendrierDispoController.php" method="POST">
                    <input name="month" type="hidden" value=<?php $_SESSION["calendrier"]->getMonthName(); ?>>
                    <input name="year" type="hidden" value=<?php $_SESSION["calendrier"]->getYear(); ?>>
                    <input name="direction" type="hidden" value="prev">
                    <button style="background-color: none; border: 0px; box-shadow: none" type="submit"> ◀ </button>
                </form>
                <span><?= $_SESSION["calendrier"]->getMonthName()  . " " .  $_SESSION["calendrier"]->getYear() ?></span>
                <form action="../controllers/calendrierDispoController.php" method="POST">
                    <input name="month" type="hidden" value=<?php $_SESSION["calendrier"]->getMonthName(); ?>>
                    <input name="year" type="hidden" value=<?php $_SESSION["calendrier"]->getYear(); ?>>
                    <input name="direction" type="hidden" value="next">
                    <button style="background-color: none; border: 0px; box-shadow: none" type="submitt"> ▶ </button>
                </form>
            </div>
              <!-- creation des cases du calendrier et affchage des sessions de formations -->  
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center text-white bg-dark">
                        <th>lu</th>
                        <th>ma</th>
                        <th>me</th>
                        <th>je</th>
                        <th>ve</th>
                        <th>sa</th>
                        <th>di</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $case = 1;
                    $day = 1;
                    $trainingSession = new TrainingSessions();
                    while ($day <=  $_SESSION["calendrier"]->getNbDayInMonth()) { ?>
                        <tr class="text-center">
                            <?php for ($i = 1; $i <= 7; $i++) { ?>
                                <?php $TrainingSessionInformations =  $trainingSession->getEventInDay($day,  $_SESSION["calendrier"]->getMonthIndex(), $_SESSION["calendrier"]->getYear()) ?>
                                <td class="<?= getCssForDayNotInCalendar($case, $day) . " " . getCssIfEventInDay($TrainingSessionInformations) ?>">
                                    <?php showButton($case, $day, $TrainingSessionInformations); ?>
                                </td>
                            <?php
                                $case++;
                            } ?>
                        </tr>
                    <?php } 
                    ?> 
                </tbody>
            </table>
            <?php 
               // SI L'UTILISATEUR EST EN ADMIN ALORS AFFICHER LA MODAL D'AJOUT SESSION 
                    if ((isset( $_SESSION["user"])) && $_SESSION["user"]["USER_ROLE_ID"] == 1) { ?>
                        <button class="btn btn-secondary mt-2 mb-2" data-toggle="modal" data-target="#addTrainingSession" name="submitAddTrainingSessions"class="btn btn-secondary" value="<?= isset($verifiedId) ? $verifiedId : "" ?>">Ajouter une session</button>              
                        <?php 
                        addTrainingSessionAdminModal();
                        ?>
                    <?php   
                    }?>
        </div>
    </div>
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
            </script>
            <script src="https://kit.fontawesome.com/e2a465b2f1.js" crossorigin="anonymous"></script>
            <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
            </body>
</html>