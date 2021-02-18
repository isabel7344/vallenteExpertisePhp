<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/e2a465b2f1.js" crossorigin="anonymous"></script>
    <link rel="icon" href="../assets/img/logoFondBlanc.png">
    <link rel="stylesheet" href="../assets/style.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <title>Vallente EXpertise</title>
</head>

<body>
    <?php include '../commons/nav.php' ?>
    <div id="services" class="col-xl-8 col-sm-11 bg-white text-center mt-3 py-2 mx-auto rounded ">
        <img class="imageFond" src="../assets/img/abidjan-ivory-coast.jpg" alt="Abidjan">
        <h1 class="title">Vallente Expertise 181</h1>
        <h2 class="slogan">LA PREVENTION, C’EST NOTRE METIER!</h2>
        <div class="container px-lg-5">
            <div class="row mx-lg-n5">
                <div class="col py-3 px-lg-5 border bg-light">
                    <form class="col-10 m-auto">
                        <h4 class="text-center pt-5" id="contact">Demandez un devis</h4>
                        <div class="form-group pt-5">
                            <label for="makingcontact" class="font-weight-bold">Nom</label>
                            <input type="name" class="form-control contactcolor" id="makingcontact" placeholder=" Doe">
                        </div>
                        <div class="form-group">
                            <label for="makingcontact" class="font-weight-bold">Prénom</label>
                            <input type="name" class="form-control contactcolor" id="makingcontact" placeholder="John">
                        </div>
                        <div class="form-group">
                            <label for="mail" class="font-weight-bold">Adresse mail</label>
                            <input type="name" class="form-control contactcolor" id="mail" placeholder="johndoe@gmail.com">
                        </div>
                        <div class="form-group">
                            <label for="phone" class="font-weight-bold">Téléphone</label>
                            <input type="name" class="form-control contactcolor " id="phone" placeholder="06 01 02 03 04">
                        </div>
                        <div class="form-group">
                            <label for="message" class="font-weight-bold">Message</label>
                            <input type="name" class="form-control contactcolor" id="message" placeholder="Message">
                        </div>
                        <!-- Button trigger modal -->
                        <div class="text-center mt-5 mb-4"><button type="button" class="btn btn-dark text-center" data-toggle="modal" data-target="#exampleModal">
                                Envoyer
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content opinion">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-center opinion" id="exampleModalLabel">Votre message a bien
                                                été envoyé. <br>Je vous recontacterai prochainement!</h5>
                                            <button type="button" class="close opinion" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="container-fluid pt-3 bg-dark">
            <h5 class="text-center text-white border border-danger rounded-pill mt-1 ">SESSIONS DE FORMATIONS DISPONIBLES</h5>
                <iframe title="calendrier" width="100%" height="450px" style="border: 0px; box-shadow: none" src="calendrier.php"></iframe>
            </div>
        </div>
    </div>
        <?php include '../commons/footer.php' ?>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
        </script>
        <script type=" text/javascript" src="../assets/script.js"></script>
        <script>
            AOS.init();
        </script>
</body>

</html>