<?php
    require_once("../controllers/calendrierDispoController.php");
    require("../modeles/training_sessions.php");
    /*
    ** fonction qui change les sessions dont il n'y a pas plus de place en rouge et vert libre 
    */
    function getCssIfEventInDay($eventInDay) {
        if (empty($eventInDay)) {
            return "";
        } else if ($eventInDay['NUMBER_PLACES_TAKEN'] >= $eventInDay['NUMBER_OF_PLACES_TRAINING']) {
            return 'bg-danger';
        } else {
            return 'bg-success';
        }
    }
    /*
    ** fonction qui change les sessions dont il n'y a pas plus de place en rouge et vert libre pour le boutton 
    */
    function getCssIfEventInDayButton($eventInDay) {
        if (empty($eventInDay)) {
            return "";
        } else if ($eventInDay['NUMBER_PLACES_TAKEN'] >= $eventInDay['NUMBER_OF_PLACES_TRAINING']) {
            return 'btn btn-danger';
        } else {
            return 'btn btn-success';
        }
    }
    /*
    ** fonction qui met les cases en gris  qui ne contiennent pas de  jours dans le mois 
    */
    function getCssForDayNotInCalendar($case, $day) {
        return $case >=  $_SESSION["calendrier"]->getFirstDayInMonth() && $day <=  $_SESSION["calendrier"]->getNbDayInMonth() ? '' : 'bg-secondary';
    }
    /*
    ** fonction qui met les cases en gris quand appui sur le bouton
    */
    function getCssForDayNotInCalendarbutton($case, $day) {
        return $case >=  $_SESSION["calendrier"]->getFirstDayInMonth() && $day <=  $_SESSION["calendrier"]->getNbDayInMonth() ? '' : 'btn btn-secondary';
    }
    /*
    ** fonction qui affiche le calendrier ....
    */
    function printDayIfInCalendar ($case, &$day){
        return $case >=  $_SESSION["calendrier"]->getFirstDayInMonth() && $day <=  $_SESSION["calendrier"]->getNbDayInMonth() ? $day++ : '';
    }
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/e2a465b2f1.js" crossorigin="anonymous"></script>
    <link rel="icon" href="../assets/img/logoFondBlanc.png">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <title>calendrier</title>
</head>

<body style="overflow: hidden;">
    <div class=" row justify-content-center" id="reservation">
        <div class="col-xl-8 col-sm-11">   
            <div class="d-flex justify-content-center mb-1 mt-2">
                <form action="../controllers/calendrierDispoController.php" method="POST">
                    <input name="month" type="hidden" value=<?php  $_SESSION["calendrier"]->getMonthName(); ?>>
                    <input name="year" type="hidden" value=<?php  $_SESSION["calendrier"]->getYear(); ?>>
                    <input name="direction" type="hidden" value="prev">
                    <button style="background-color: none; border: 0px; box-shadow: none" type="submit"> ◀ </button>
                </form>
                <span><?=  $_SESSION["calendrier"]->getMonthName()  . " " .  $_SESSION["calendrier"]->getYear() ?></span>
                <form action="../controllers/calendrierDispoController.php" method="POST">
                    <input name="month" type="hidden" value=<?php  $_SESSION["calendrier"]->getMonthName(); ?>>
                    <input name="year" type="hidden" value=<?php  $_SESSION["calendrier"]->getYear(); ?>>
                    <input name="direction" type="hidden" value="next">
                    <button style="background-color: none; border: 0px; box-shadow: none" type="submitt"> ▶ </button>
                </form>
            </div>
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
                                <?php $eventInDay =  $trainingSession->getEventInDay($day,  $_SESSION["calendrier"]->getMonthIndex(), $_SESSION["calendrier"]->getYear()) ?> 
                                <td  class="<?= getCssForDayNotInCalendar($case, $day) . " " . getCssIfEventInDay($eventInDay)?>">
                                    <?= printDayIfInCalendar($case,$day) ?>
                                    <button type="button" data-toggle="myModal"
                                                    data-target="myModal" class="<?= getCssForDayNotInCalendarbutton($case, $day) . " " . getCssIfEventInDayButton($eventInDay)?>">                                                                                                            
                                                </button>
                                </td>
                            <?php
                                $case++;
                            } ?>
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                                </div>
                                <div class="modal-body">
                                    detaille
                                </div>
                                </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>