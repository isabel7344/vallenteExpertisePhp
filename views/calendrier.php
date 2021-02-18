<?php
    require_once("../controllers/calendrierDispoController.php");
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
            <div style="display: flex;">
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
                    <tr>
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
                    while ($day <=  $_SESSION["calendrier"]->getNbDayInMonth()) { ?>
                        <tr>
                            <?php for ($i = 1; $i <= 7; $i++) { ?>
                                <td class="<?= $case >=  $_SESSION["calendrier"]->getFirstDayInMonth() && $day <=  $_SESSION["calendrier"]->getNbDayInMonth() ? '' : 'bg-secondary' ?>">
                                    <?= $case >=  $_SESSION["calendrier"]->getFirstDayInMonth() && $day <=  $_SESSION["calendrier"]->getNbDayInMonth() ? $day++ : '' ?>
                                </td>

                            <?php
                                $case++;
                            } ?>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>