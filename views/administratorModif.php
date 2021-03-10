<?php
session_start();
require ("modalCalendrier.php");
// require("../controllers/ajoutTrainingSessionController.php");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="icon" href="../assets/img/logoFondBlanc.png">
    <link rel="stylesheet" href="../assets/style.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>Connexion</title>
</head>

<body>
    <?php include '../commons/nav.php' ?>
    <div id="services" class="col-xl-8 col-sm-11 bg-white text-center mt-3 py-2 mx-auto rounded ">
        <div class="imageFond">
            <div>
            <h1 class="titleDevis">Vallente Expertise 181</h1>
            <h2 class="slogan">LA PREVENTION, C’EST NOTRE METIER!</h2>
            </div>
        </div>
        <div class="container px-lg-5">
            <div class="row mx-lg-n5">
                <div class="col py-3 px-lg-5 border bg-light">
                <div class="container-fluid pt-2 bg-dark">
                <h5 class="text-center text-white border border-danger rounded-pill mt-1 ">SESSIONS DE FORMATIONS DISPONIBLES</h5>
                <iframe title="calendrier" width="100%" height="450px" style="border: 0px; box-shadow: none" src="calendrier.php"></iframe>
                </div>
                </div>
            </div>
        </div> 
    </div>
        <?php include '../commons/footer.php' ?>    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    <script type=" text/javascript" src="../assets/script.js"></script>
    <script src="https://kit.fontawesome.com/e2a465b2f1.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>