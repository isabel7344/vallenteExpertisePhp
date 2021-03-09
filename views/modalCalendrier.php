<?php function userModal($TrainingSessionInformations){ ?>
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Session de Formation</h4>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        </div>
        <div class="modal-body">
            <p class="text-modal">Nom de la Formation: <?= strtoupper($TrainingSessionInformations["NAME_TRAINING"]) ?></P>
            <p class="text-modal">Date de début de  formation: <?= $TrainingSessionInformations["START_DATE_TRAINING"] ?></p>
            <p class="text-modal"> Date de fin de   formation: <?= $TrainingSessionInformations["END_DATE_TRAINING"] ?></p>
            <p class="text-modal"> Nombre de places total: <?= $TrainingSessionInformations["NUMBER_OF_PLACES_TRAINING"] ?></p>
            <p class="text-modal"> Nombre de places prises:<?= $TrainingSessionInformations["NUMBER_PLACES_TAKEN"] ?></p>
            <p class="text-modal"> Nombre de places restantes: <?= $TrainingSessionInformations["NUMBER_OF_PLACES_TRAINING"] - $TrainingSessionInformations["NUMBER_PLACES_TAKEN"] ?></p>
        </div>
    </div>
</div>
<?php } ?>

<?php function adminModal($TrainingSessionInformations) { ?>
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Session de Formation</h4>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        </div>
        <div class="modal-body">
        <form class="col-10 m-auto" action="../controllers/modalController.php" method="post">
            <label for="NAME_TRAINING" class="font-weight-bold">Nom de la formation</label>
            <input type="text" class="form-control contactcolor" name="NAME_TRAINING" value="<?= isset($TrainingSessionInformations["NAME_TRAINING"]) ? $TrainingSessionInformations["NAME_TRAINING"] : "" ?>" >
            <label for="START_DATE_TRAINING" class="font-weight-bold">Date début de formation</label>
            <input type="date" class="form-control contactcolor"  name="START_DATE_TRAINING" value="<?= isset($TrainingSessionInformations["START_DATE_TRAINING"]) ? $TrainingSessionInformations["START_DATE_TRAINING"] : "" ?>">
            <label for="END_DATE_TRAINING" class="font-weight-bold">Date fin de  formation</label>
            <input type="date" class="form-control contactcolor"  name="END_DATE_TRAINING" value="<?= isset($TrainingSessionInformations["END_DATE_TRAINING"]) ? $TrainingSessionInformations["END_DATE_TRAINING"] : "" ?>">
            <label for="NUMBER_OF_PLACES_TRAINING" class="font-weight-bold">Nombre de places total</label>
            <input type="text" class="form-control contactcolor"  name="NUMBER_OF_PLACES_TRAINING" value="<?= isset($TrainingSessionInformations["NUMBER_OF_PLACES_TRAINING"]) ? $TrainingSessionInformations["NUMBER_OF_PLACES_TRAINING"] : "" ?>">
            <label for="NUMBER_PLACES_TAKEN" class="font-weight-bold">Nombre de places prises</label>
            <input type="text" class="form-control contactcolor"  name="NUMBER_PLACES_TAKEN" value="<?= isset($TrainingSessionInformations["NUMBER_PLACES_TAKEN"]) ? $TrainingSessionInformations["NUMBER_PLACES_TAKEN"] : "" ?>">
            <input type="hidden" name="id" value="<?= $TrainingSessionInformations["id"] ?>"/>
            <button type="submit"class="btn btn-secondary m-4" name="submitModifTrainingSessions">Valider la modification</button>
        </form>  
        <form  action="../controllers/supressionTrainingSessionController.php" method="post">
            <input type="hidden" name="id" value="<?= $TrainingSessionInformations["id"] ?>"/>
            <button type="submit" name="submitDeleteTrainingSessions" class="btn btn-secondary">Supprimer</button>
        </form>           
    </div>
</div>
<?php } ?>

 <!-- Modal d'ajout de session de formation sur calendrier admin et rajout en base de donnée -->

 <?php function addTrainingSessionAdminModal() { ?>
<div class="modal fade" id="addTrainingSession" tabindex="-1" role="dialog" aria-labelledby="addTrainingSessionLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Session de Formation</h4>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            </div>
            <div class="modal-body">
                <form class="col-10 m-auto" action="../controllers/ajoutTrainingSessionController.php" method="post">
                    <label for="NAME_TRAINING" class="font-weight-bold">Nom de la formation</label>
                    <input type="text" class="form-control contactcolor"  name="NAME_TRAINING">
                    <label for="START_DATE_TRAINING" class="font-weight-bold">Date début de formation</label>
                    <input type="date" class="form-control contactcolor"  name="START_DATE_TRAINING">
                    <label for="END_DATE_TRAINING" class="font-weight-bold">Date fin de  formation</label>
                    <input type="date" class="form-control contactcolor"  name="END_DATE_TRAINING">
                    <label for="NUMBER_OF_PLACES_TRAINING" class="font-weight-bold">Nombre de places total</label>
                    <input type="text" class="form-control contactcolor"  name="NUMBER_OF_PLACES_TRAINING">
                    <label for="NUMBER_PLACES_TAKEN" class="font-weight-bold">Nombre de places prises</label>
                    <input type="text" class="form-control contactcolor"  name="NUMBER_PLACES_TAKEN">
                    <button class="btn btn-secondary m-4" data-toggle="modal" data-target="#addTrainingSession" name="submitAddTrainingSessions">Ajouter session en base de donnée</button>              
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<?php } ?> 
