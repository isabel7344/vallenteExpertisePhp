<?php function adminModal($TrainingSessionInformations) { ?>
<div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Session de Formation</h4>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    </div>
                    <div class="modal-body">
                    <form class="col-10 m-auto" action="../controllers/modalController.php" method="post">
                    <input type="hidden" name="id" value="<?= $TrainingSessionInformations["id"] ?>"/>
                    <label for="NAME_TRAINING" class="font-weight-bold">Nom de la formation</label>
                    <input type="text" class="form-control contactcolor" id="NAME_TRAINING" name="NAME_TRAINING" value="<?= isset($TrainingSessionInformations["NAME_TRAINING"]) ? $TrainingSessionInformations["NAME_TRAINING"] : "" ?>" >
                    <label for="START_DATE_TRAINING" class="font-weight-bold">Date début de formation</label>
                    <input type="date" class="form-control contactcolor" id="START_DATE_TRAINING" name="START_DATE_TRAINING" value="<?= isset($TrainingSessionInformations["START_DATE_TRAINING"]) ? $TrainingSessionInformations["START_DATE_TRAINING"] : "" ?>">
                    <label for="END_DATE_TRAINING" class="font-weight-bold">Date fin de  formation</label>
                    <input type="date" class="form-control contactcolor" id="END_DATE_TRAINING" name="END_DATE_TRAINING" value="<?= isset($TrainingSessionInformations["END_DATE_TRAINING"]) ? $TrainingSessionInformations["END_DATE_TRAINING"] : "" ?>">
                    <label for="NUMBER_OF_PLACES_TRAINING" class="font-weight-bold">Nombre de places total</label>
                    <input type="text" class="form-control contactcolor" id="NUMBER_OF_PLACES_TRAINING" name="NUMBER_OF_PLACES_TRAINING" value="<?= isset($TrainingSessionInformations["NUMBER_OF_PLACES_TRAINING"]) ? $TrainingSessionInformations["NUMBER_OF_PLACES_TRAINING"] : "" ?>">
                    <label for="NUMBER_PLACES_TAKEN" class="font-weight-bold">Nombre de places prises</label>
                    <input type="text" class="form-control contactcolor" id="NUMBER_PLACES_TAKEN" name="NUMBER_PLACES_TAKEN" value="<?= isset($TrainingSessionInformations["NUMBER_PLACES_TAKEN"]) ? $TrainingSessionInformations["NUMBER_PLACES_TAKEN"] : "" ?>">
            <button type="submit"class="btn btn-secondary m-4" name="submitModifTrainingSessions" value="<?= isset($verifiedId) ? $verifiedId : "" ?>">Valider la modification</button>
        </form>
		<!-- <form action="supressionTrainingSessionController.php">
			<input type="hidden" name="id" value="<?= $TrainingSessionInformations["id"] ?>"/>
			<button type="submit" name="submitDeleteTrainingSessions" class="btn btn-secondary" data-dismiss="modal"value="<?= isset($verifiedId) ? $verifiedId : ""  ?>">Supprimer</button>
		<form> -->
        <form action="ajoutTrainingSessionController.php">
			<input type="hidden" name="id" value="<?= $TrainingSessionInformations["id"] ?>"/>
            <button type="submit" name="submitAddTrainingSessions"class="btn btn-secondary" value="<?= isset($verifiedId) ? $verifiedId : "" ?>">Ajouter une session</button>
            <?php function addTrainingSessionAdminModal() { ?>
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Session de Formation</h4>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    </div>
                    <div class="modal-body">
                    <form class="col-10 m-auto" action="../controllers/modalController.php" method="post">
                    <label for="NAME_TRAINING" class="font-weight-bold">Nom de la formation</label>
                    <input type="text" class="form-control contactcolor" id="NAME_TRAINING" name="NAME_TRAINING">
                    <label for="START_DATE_TRAINING" class="font-weight-bold">Date début de formation</label>
                    <input type="date" class="form-control contactcolor" id="START_DATE_TRAINING" name="START_DATE_TRAINING">
                    <label for="END_DATE_TRAINING" class="font-weight-bold">Date fin de  formation</label>
                    <input type="date" class="form-control contactcolor" id="END_DATE_TRAINING" name="END_DATE_TRAINING">
                    <label for="NUMBER_OF_PLACES_TRAINING" class="font-weight-bold">Nombre de places total</label>
                    <input type="text" class="form-control contactcolor" id="NUMBER_OF_PLACES_TRAINING" name="NUMBER_OF_PLACES_TRAINING">
                    <label for="NUMBER_PLACES_TAKEN" class="font-weight-bold">Nombre de places prises</label>
                    <input type="text" class="form-control contactcolor" id="NUMBER_PLACES_TAKEN" name="NUMBER_PLACES_TAKEN">
                    <button type="submit" name="submitAddTrainingSessions" value="<?= isset($verifiedId) ? $verifiedId : "" ?>">Ajouter une session</button>
        </form>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
<?php } ?>
		<form>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
<?php } ?>


<?php function userModal($TrainingSessionInformations){ ?>
    <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Session de Formation</h4>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="text-modal">Nom de la Formation: <?= strtoupper($TrainingSessionInformations["NAME_TRAINING"]) ?></P>
                        <p class="text-modal">Date de début de  formation: <?= $TrainingSessionInformations["START_DATE_TRAINING"] ?></p>
                        <p class="text-modal"> Date de fin de   formation: <?= $TrainingSessionInformations["END_DATE_TRAINING"] ?></p>
                        <p class="text-modal"> Nombre de places total: <?= $TrainingSessionInformations["NUMBER_OF_PLACES_TRAINING"] ?></p>
                        <p class="text-modal"> Nombre de places prises:<?= $TrainingSessionInformations["NUMBER_PLACES_TAKEN"] ?></p>
                        <p class="text-modal"> Nombre de places restantes: <?= $TrainingSessionInformations["NUMBER_OF_PLACES_TRAINING"] - $TrainingSessionInformations["NUMBER_PLACES_TAKEN"] ?></p>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
<?php } ?>