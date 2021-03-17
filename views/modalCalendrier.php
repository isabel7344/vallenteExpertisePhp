
<!-- Modal d'informations sur les session de formation pour le client sans pouvoir agir dessus -->
<?php function userModal($TrainingSessionInformations){ ?>
<div class="modal-dialog" role="document">
    <div class="modal-content pr-3">
        <div class="modal-header">
            <h4 class="modal-title">Session de Formation</h4>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        </div>
        <div class="modal-body text-left">
            <p class="text-modal">Nom de la Formation: <span class="font-weight-bold"><?= strtoupper($TrainingSessionInformations["NAME_TRAINING"]) ?></span></P>
            <p class="text-modal">Date de début de  formation: <span class="font-weight-bold"> <?=  strftime($TrainingSessionInformations["START_DATE_TRAINING"]) ?></span></p>
            <p class="text-modal"> Date de fin de   formation: <span class="font-weight-bold"><?= strftime($TrainingSessionInformations["END_DATE_TRAINING"]) ?></span></p>
            <p class="text-modal"> Nombre de places total: <span class="font-weight-bold"><?= $TrainingSessionInformations["NUMBER_OF_PLACES_TRAINING"] ?></span></p>
            <p class="text-modal"> Nombre de places prises: <span class="font-weight-bold"><?= $TrainingSessionInformations["NUMBER_PLACES_TAKEN"] ?></span></p>
            <p class="text-modal"> Nombre de places restantes: <span class="font-weight-bold"><?= $TrainingSessionInformations["NUMBER_OF_PLACES_TRAINING"] - $TrainingSessionInformations["NUMBER_PLACES_TAKEN"] ?></span></p>
        </div>
    </div>
</div>
<?php } ?>
 <!-- Modal de modification et suppression  de session de formation sur calendrier admin et en base de donnée -->
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
                    <button class="btn btn-secondary m-4 pb-2" data-toggle="modal" data-target="#addTrainingSession" name="submitAddTrainingSessions">Ajouter session en base de donnée</button>              
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<?php } ?> 
