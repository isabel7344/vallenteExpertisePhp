<div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Session de Formation</h4>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer
                        </button>
                    </div>
                    <form class="col-10 m-auto" action="modal.php" method="post">
                    <div class="modal-body">
                    <label for="NAME_TRAINING" class="font-weight-bold">Nom de la formation</label>
                    <input type="text" class="form-control contactcolor" id="NAME_TRAINING" name="NAME_TRAINING" value="<?= isset($TrainingSessionInformations["NAME_TRAINING"]) ? $TrainingSessionInformations["NAME_TRAINING"] : "" ?>" >
                    <label for="START_DATE_TRAINING" class="font-weight-bold">Date début de formation</label>
                    <input type="text" class="form-control contactcolor" id="START_DATE_TRAINING" name="START_DATE_TRAINING" value="<?= isset($TrainingSessionInformations["START_DATE_TRAINING"]) ? $TrainingSessionInformations["START_DATE_TRAINING"] : "" ?>">
                    <label for="END_DATE_TRAINING" class="font-weight-bold">Date fin de  formation</label>
                    <input type="text" class="form-control contactcolor" id="END_DATE_TRAINING" name="END_DATE_TRAINING" value="<?= isset($TrainingSessionInformations["END_DATE_TRAINING"]) ? $TrainingSessionInformations["END_DATE_TRAINING"] : "" ?>">  
                    <label for="NUMBER_OF_PLACES_TRAINING" class="font-weight-bold">Nombre de places total</label>
                    <input type="text" class="form-control contactcolor" id="NUMBER_OF_PLACES_TRAINING" name="NUMBER_OF_PLACES_TRAINING" value="<?= isset($TrainingSessionInformations["NUMBER_OF_PLACES_TRAINING"]) ? $TrainingSessionInformations["NUMBER_OF_PLACES_TRAINING"] : "" ?>">     
                    <label for="NUMBER_PLACES_TAKEN" class="font-weight-bold">Nombre de places prises</label>
                    <input type="text" class="form-control contactcolor" id="NUMBER_PLACES_TAKEN" name="NUMBER_PLACES_TAKEN" value="<?= isset($TrainingSessionInformations["NUMBER_PLACES_TAKEN"]) ? $TrainingSessionInformations["NUMBER_PLACES_TAKEN"] : "" ?>">        
                    <!-- <label for="NUMBER_OF_PLACES_TRAINING" class="font-weight-bold">Nombre de places restantes</label>
                    <input type="text" class="form-control contactcolor" id="NUMBER_OF_PLACES_TRAINING" name="NUMBER_OF_PLACES_TRAINING" value="<?= isset($TrainingSessionInformations["NUMBER_OF_PLACES_TRAINING" - "NUMBER_PLACES_TAKEN"]) ? $TrainingSessionInformations["NUMBER_OF_PLACES_TRAINING" - "NUMBER_PLACES_TAKEN"] : "" ?>">              -->

                        <!-- <input>Nom de la Formation <?= strtoupper($eventInDay["NAME_TRAINING"]) ?></P>
                        <p>Date de début de  formation <?= $eventInDay["START_DATE_TRAINING"] ?></p>
                        <p> Date de fin de   formation <?= $eventInDay["END_DATE_TRAINING"] ?></p>
                        <p> Nombre de places total <?= $eventInDay["NUMBER_OF_PLACES_TRAINING"] ?></p>
                        <p> Nombre de places prises <?= $eventInDay["NUMBER_PLACES_TAKEN"] ?></p>
                        <p> Nombre de places restantes <?= $eventInDay["NUMBER_OF_PLACES_TRAINING"] - $eventInDay["NUMBER_PLACES_TAKEN"] ?></p> -->
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
            <button type="submit" name="submitModifTrainingSessions" value="<?= isset($verifiedId) ? $verifiedId : "" ?>">Valider la modification</button>
            </form>