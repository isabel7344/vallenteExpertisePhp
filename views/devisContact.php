<?php
require("../controllers/devisContactController.php");
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="icon" href="../assets/img/logoFondBlanc.png">
    <link rel="stylesheet" href="../assets/s">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>Vallente Expertise | Devis-Contact</title>
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
                    <form class="col-10 m-auto" action="devisContact.php" method="post">
                        <h4 class="text-center pt-5" id="contact">Demandez un devis</h4>
                        <div class="form-group pt-5">
                            <label for="lastName" class="font-weight-bold">Nom</label>
                            <input type="text" class="form-control contactcolor" id="lastName" name="lastName" value="<?= isset($_POST['lastName']) ? $_POST['lastName'] : '' ?>" placeholder=" Durand ">
                            <p class="displayMessage">
                                <?= isset($messageError['lastName']) ? $messageError['lastName'] : '' ?><?= isset($messageSuccess['lastName']) ? $messageSuccess['lastName'] : '' ?>
                            </p>
                        </div>
                        <div class="form-group">
                            <label for="firstName" class="font-weight-bold">Prénom</label>
                            <input type="text" class="form-control contactcolor" id="firstName" name="firstName" value="<?= isset($_POST['firstName']) ? $_POST['firstName'] : '' ?>" placeholder="John">
                            <p class="displayMessage">
                                <?= isset($messageError['firstName']) ? $messageError['firstName'] : '' ?><?= isset($messageSuccess['firstName']) ? $messageSuccess['firstName'] : '' ?>
                            </p>
                        </div>
                        <div class="form-group">
                            <label for="mail" class="font-weight-bold">Adresse mail</label>
                            <input type="text" class="form-control contactcolor" id="mail" name="mail" value="<?= (isset($_POST['mail'])) ? $_POST['mail'] : '' ?>" placeholder="johndurand@gmail.com">
                            <p class="displayMessage">
                                <?= isset($messageError['mail']) ? $messageError['mail'] : '' ?><?= isset($messageSuccess['mail']) ? $messageSuccess['mail'] : '' ?>
                            </p>
                        </div>
                        <div class="form-group">
                            <label for="phoneNumber" class="font-weight-bold">Téléphone</label>
                            <input type="text" class="form-control contactcolor " id="phoneNumber" name="phoneNumber" value="<?= (isset($_POST[''])) ? $_POST['phoneNumber'] : '' ?>" placeholder="06 01 02 03 04">
                            <p class="displayMessage">
                                <?= isset($messageError['phoneNumber']) ? $messageError['phoneNumber'] : '' ?><?= isset($messageSuccess['phoneNumber']) ? $messageSuccess['phoneNumber'] : '' ?>
                            </p>
                        </div>
                        <div class="form-group">
                            <label for="message" class="font-weight-bold">Message</label>
                            <textarea type="text" class="form-control contactcolor" id="message" placeholder="Message"></textarea>
                        </div>
                        <!-- Button d'envoie message --> 
                        <!-- <a href="mailto:?to=vallenteexpertise181@gmail.com &subject=Devis%20du%20message">  </a> -->
                            <button type="button"  class="btn btn-dark text-center"data-toggle="modal"
                            data-target="#exampleModal"> Envoyer
                            </button>
                        <!-- Modal envoie message-->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content opinion">
                            <div class="modal-header">
                                <h4 class="modal-title text-center- opinion" id="exampleModalLabel">Votre message a bien
                                    été envoyé. <br>Je vous recontacterai prochainement!</h4>
                                    <!-- <form action="devisContact.php" method="POST">
                                <button type="submit" name="Sendmail">envoie Mail</button>  
                                    </form>  -->
                                <button type="button" class="close opinion" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="container-fluid pt-2 bg-dark">
                <h5 class="text-center text-white border border-danger rounded-pill mt-1 ">SESSIONS DE FORMATIONS DISPONIBLES</h5>
                <iframe title="calendrier" width="100%" height="450px" style="border: 0px; box-shadow: none" src="calendrier.php"></iframe>
                <input class="bg-danger text-light text-center m-1 mb-1 mt-1 p-0"  value="Session complète" disabled="disabled" style="width:170px"></input>
                <input class="bg-success text-light text-center m-1 mb-1 mt-1 p-0" value ="Session disponible" disabled="disabled" style="width:170px" ></input>
               
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