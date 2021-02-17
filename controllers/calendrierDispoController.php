<?php
setlocale(LC_TIME, 'fr_FR.utf8', 'fra');

$weeks = [
    'Lundi',
    'Mardi',
    'Mercredi',
    'Jeudi',
    'Vendredi',
    'Samedi',
    'Dimanche',
];

$months = [
    'Janvier',
    'Février',
    'Mars',
    'Avril',
    'Mai',
    'Juin',
    'Juillet',
    'Août',
    'Septembre',
    'Octobre',
    'Novembre',
    'Décembre',
];
$end = end($weeks);

if (isset($_GET['months']) && isset($_GET['years'])) {
    $month = array_search($_GET['months'], $months) + 1;
    $years = $_GET['years'];

    $nbDays = cal_days_in_month(CAL_GREGORIAN, $month, $years);
    $firstDayInMonth = strftime('%u', strtotime($month . '/01/' . $years));
    var_dump($nbDays);
    var_dump($firstDayInMonth);

    if ((($nbDays + $firstDayInMonth - 1) % 7) != 0) {
        $extraCases = 7 - (($nbDays + $firstDayInMonth - 1) % 7);
    } else {
        $extraCases = 0;
    }
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/img/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="styles.css" />
    <title>Calendrier PHP</title>
</head>


<body>

    <?php
    if (isset($_GET['months']) && isset($_GET['years'])) {
    ?>
        <h1 class="text-center text-primary "><?= $_GET['months'] . ' ' . $_GET['years'] ?>
        </h1>
    <?php
    }
    ?>

    <div class="d-flex justify-content-center">
        <table class="table table-bordered border-border-primary rounded col-lg-5 col-lg-offset-1 ">
            <thead class="text-center border-border-primary">

                <tr class="table-dark">
                    <?php foreach ($weeks as $week) { ?>
                        <th>
                            <?= $week ?>
                        </th>
                    <?php } ?>
                </tr>

            </thead>
            <tbody>
                <tr>
                    <?php for ($case = 1; $case <= ($nbDays + ($firstDayInMonth - 1) + $extraCases); $case++) { ?>
                        <td class="align-middle <?= $case >= $firstDayInMonth && $case - $firstDayInMonth + 1 <= $nbDays ? '' : 'bg-secondary' ?>" style="width: 100px; height: 80px">

                            <!-- on n'affiche rien tant qu'on est pas au premier jour du mois puis des qu'on y est on affiche
                    le numero de case - firstDayInMonth ce qui permet de commencer les jours a 1 !
                    firstDayInMonth =  index du premier jour du mois Ex : Janvier premier jour = vendredi = 5
                    case = la case actuelle on  affiche Ex case = 5 - firstDayInMonth + 1 = 5 - 5 + 1 = 1 (premier jour du mois etc ect)
                    -->
                            <?= $case >= $firstDayInMonth && $case - $firstDayInMonth + 1 <= $nbDays ? $case - $firstDayInMonth + 1 : '' ?>
                        </td>
                        </td>
                        <?php if ($case % 7 == 0) { ?>
                            <!-- chaque semaine on change de ligne !-->
                </tr>
                <tr>
                <?php } ?>
            <?php } ?>

                </tr>
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center">
        <a href=" index.php" class="btn btn-primary style=" width: 100px; height: 80px"">Retour</a>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>

</body>

</html>