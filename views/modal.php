<div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Session de Formation</h4>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer
                        </button>
                    </div>
                    <form class="col-10 m-auto" action="modal.php" method="post">
                    <div class="modal-body">
                        <input>Nom de la Formation <?= strtoupper($eventInDay["NAME_TRAINING"]) ?></P>
                        <p>Date de début de  formation <?= $eventInDay["START_DATE_TRAINING"] ?></p>
                        <p> Date de fin de   formation <?= $eventInDay["END_DATE_TRAINING"] ?></p>
                        <p> Nombre de places total <?= $eventInDay["NUMBER_OF_PLACES_TRAINING"] ?></p>
                        <p> Nombre de places prises <?= $eventInDay["NUMBER_PLACES_TAKEN"] ?></p>
                        <p> Nombre de places restantes <?= $eventInDay["NUMBER_OF_PLACES_TRAINING"] - $eventInDay["NUMBER_PLACES_TAKEN"] ?></p>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
            <button type="submit" name="submitModifTrainingSessions" value="<?= isset($verifiedId) ? $verifiedId : "" ?>">Valider la modification</button>
            </form>