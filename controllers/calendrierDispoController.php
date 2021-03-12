<?php
require ("../modeles/CalendrierSession.php");
setlocale(LC_TIME, 'fr_FR.utf8', 'fra');

session_start();

$month = null;
$year = null;
$direction = null;

if (isset($_POST['month']) && isset($_POST['year'])) {
    $month = $_POST['month'];
    $year = $_POST['year'];
}

if (!isset($_SESSION["calendrier"])) {
    $_SESSION["calendrier"] = new CalendrierSession($month, $year);
}

if (isset($_POST['direction'])) {
    $direction = $_POST['direction'];
    if ($direction == "prev") {
        $_SESSION["calendrier"]->prevMonth();

    }

    if ($direction == "next") {
        $_SESSION["calendrier"]->nextMonth();
    }
    header("Location: ../views/calendrier.php");
}

/*
    ** fonction qui change les sessions dont il n'y a pas plus de place en rouge et vert libre
    */
    function getCssIfEventInDay($TrainingSessionInformations)
    {
        if (empty($TrainingSessionInformations)) {
            return "";
        } else if ($TrainingSessionInformations['NUMBER_PLACES_TAKEN'] >= $TrainingSessionInformations['NUMBER_OF_PLACES_TRAINING']) {
            return 'bg-danger';
        } else {
            return 'bg-success';
        }
    }
    
    
    /*
        ** fonction qui met les cases en gris  qui ne contiennent pas de  jours dans le mois
        */
    function getCssForDayNotInCalendar($case, $day)
    {
        return $case >=  $_SESSION["calendrier"]->getFirstDayInMonth() && $day <=  $_SESSION["calendrier"]->getNbDayInMonth() ? '' : 'bg-secondary';
    }
    /*
        ** fonction qui met les cases en gris quand appui sur le bouton
        */
    function getCssForDayNotInCalendarbutton($case, $day)
    {
        return $case >=  $_SESSION["calendrier"]->getFirstDayInMonth() && $day <=  $_SESSION["calendrier"]->getNbDayInMonth() ? '' : 'btn btn-secondary';
    }
    /*
        ** fonction qui affiche le calendrier ....
        */
    function printDayIfInCalendar($case, &$day)
    {
        return $case >=  $_SESSION["calendrier"]->getFirstDayInMonth() && $day <=  $_SESSION["calendrier"]->getNbDayInMonth() ? $day++ : '';
    }
    /*
    ** fonction qui permet d'afficher la modal au clic de la case sur le calendrier de l'admin si connecté
    */
    function showButton($case, &$day, $TrainingSessionInformations)
    {
        $printingDay = printDayIfInCalendar($case, $day);
        if ($TrainingSessionInformations) {
            $modalID = "modal" . $case; ?>
            <a data-toggle="modal" href="<?php echo "#" . $modalID ?>" class="<?= getCssForDayNotInCalendarbutton($case, $day) ?>" style="color: white">
                <?php echo $printingDay ?>
            </a>
            <div class="modal fade" id="<?php echo $modalID ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo $modalID . "Label" ?>" aria-hidden="true">
            <?php if ((isset( $_SESSION["user"])) && $_SESSION["user"]["USER_ROLE_ID"] == 1) {
                    adminModal($TrainingSessionInformations);
                } else {
                    userModal($TrainingSessionInformations);
                }
        } else{
            echo $printingDay;
        }
    }

?>