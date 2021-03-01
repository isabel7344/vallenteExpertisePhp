<?php
require("../controllers/administratorController.php");


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
                    <form class="col-10 m-auto" action="administrator.php" method="post">
                        <h4 class="text-center pt-5" id="contact">SE CONNECTER</h4>
                        <div class="form-group pt-5">
                        <?= isset($message) ? "<p style=\"color:white; background-color:red;\">" . $message . "</p>" : "" ?>
                            <label for="lastname" class="font-weight-bold">Nom</label>
                            <input type="text" class="form-control contactcolor" id="lastname" name="lastname" value="<?= isset($_POST['lastname']) ? $_POST['lastname'] : '' ?>" placeholder=" Durand ">
                            <p class="displayMessage">
                            <?= isset($messageError["lastName"]) ? "<p style=\"color:white; background-color:red;\">" . $messageError["Lastname"] . "</p>" : "" ?>
                                <!-- <?= isset($messageError['lastName']) ? $messageError['lastName'] : '' ?><?= isset($messageSuccess['lastName']) ? $messageSuccess['lastName'] : '' ?> -->
                            </p>
                        </div>
                        <div class="form-group">
                            <label for="firstname" class="font-weight-bold">Prénom</label>
                            <input type="text" class="form-control contactcolor" id="firstname" name="firstname" value="<?= isset($_POST['firstname']) ? $_POST['firstname'] : '' ?>" placeholder="John">
                            <p class="displayMessage">
                                <?= isset($messageError['firstame']) ? $messageError['firstname'] : '' ?><?= isset($messageSuccess['firstname']) ? $messageSuccess['firstname'] : '' ?>
                            </p>
                        </div>
                        <div class="form-group" >
                            <label for="username"class="font-weight-bold">Nom d'utilisateur : </label>
                            <input type="text" class="form-control contactcolor" name="username" required <?= isset($_POST["username"]) ? "value=\"" . $_POST['username'] . "\"" : "" ?>>
                            <?= isset($arrayErrors["username"]) ? "<p style=\"color:white; background-color:red;\">" . $arrayErrors["username"] . "</p>" : "" ?>
                        </div>
                        <div class="form-group">
                            <label for="mail" class="font-weight-bold">Adresse mail</label>
                            <input type="text" class="form-control contactcolor" id="mail" name="mail" value="<?= (isset($_POST['mail'])) ? $_POST['mail'] : '' ?>" placeholder="johndurand@gmail.com">
                            <p class="displayMessage">
                                <?= isset($messageError['mail']) ? $messageError['mail'] : '' ?><?= isset($messageSuccess['mail']) ? $messageSuccess['mail'] : '' ?>
                            </p>
                        </div>
                        <div class="form-group">
                            <label for="password" class="font-weight-bold">Mot de passe</label>
                            <input type="password" class="form-control contactcolor " id="passeword" name="password" required value="<?= (isset($_POST[''])) ? $_POST['password'] : '' ?>" >
                            <p class="displayMessage">
                                <?= isset($messageError['password']) ? $messageError['password'] : '' ?><?= isset($messageSuccess['password']) ? $messageSuccess['password'] : '' ?>
                            </p>
                        </div>
                        <div class="form-group">
                            <label for="confirmPassword" class="font-weight-bold">Confirmez mot de passe</label>
                            <input type="password" class="form-control contactcolor " id="confirmPassword" name="confirmPassword" required value="<?= (isset($_POST[''])) ? $_POST['password'] : '' ?>" >
                            <p class="displayMessage">
                                <?= isset($messageError['password']) ? $messageError['password'] : '' ?><?= isset($messageSuccess['password']) ? $messageSuccess['password'] : '' ?>
                            </p>
                        </div>
                        <input class="btn btn-dark text-center" name="connectUser" type="submit" value="CONNEXION">
                    </form>
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