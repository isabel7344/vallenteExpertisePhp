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

?>