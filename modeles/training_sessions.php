<?php
require("../modeles/database.php");

class TrainingSessions extends Database
{
    private $id;
    private $Name_training;
    private $START_DATE_TRAINING;
    private $End_Date_training;
    private $NUMBER_OF_PLACES_TRAINING;
    private $NUMBER_PLACES_TAKEN;

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of Name_training
     */
    public function getName_training()
    {
        return $this->Name_training;
    }

    /**
     * Set the value of Name_training
     *
     * @return  self
     */
    public function setName_training($Name_training)
    {
        $this->Name_training = $Name_training;

        return $this;
    }

    /**
     * Get the value of START_DATE_TRAINING
     */
    public function getSTART_DATE_TRAINING()
    {
        return $this->START_DATE_TRAINING;
    }

    /**
     * Set the value of START_DATE_TRAINING
     *
     * @return  self
     */
    public function setSTART_DATE_TRAINING($START_DATE_TRAINING)
    {
        $this->START_DATE_TRAINING = $START_DATE_TRAINING;

        return $this;
    }

    /**
     * Get the value of End_Date_training
     */
    public function getEnd_Date_training()
    {
        return $this->End_Date_training;
    }

    /**
     * Set the value of End_Date_training
     *
     * @return  self
     */
    public function setEnd_Date_training($End_Date_training)
    {
        $this->End_Date_training = $End_Date_training;

        return $this;
    }
    /**
     * Get the value of NUMBER_OF_PLACES_TRAINING
     */
    public function getNUMBER_OF_PLACES_TRAINING()
    {
        return $this->NUMBER_OF_PLACES_TRAINING;
    }

    /**
     * Set the value of NUMBER_OF_PLACES_TRAINING
     *
     * @return  self
     */
    public function setNUMBER_OF_PLACES_TRAINING($NUMBER_OF_PLACES_TRAINING)
    {
        $this->NUMBER_OF_PLACES_TRAINING = $NUMBER_OF_PLACES_TRAINING;

        return $this;
    }
    /**
     * Get the value of NUMBER_PLACES_TAKEN
     */
    public function getNUMBER_PLACES_TAKEN()
    {
        return $this->NUMBER_PLACES_TAKEN;
    }

    /**
     * Set the value of NUMBER_PLACES_TAKEN
     *
     * @return  self
     */
    public function setNUMBER_PLACES_TAKEN($NUMBER_PLACES_TAKEN)
    {
        $this->NUMBER_PLACES_TAKEN = $NUMBER_PLACES_TAKEN;

        return $this;
    }
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * fonction qui permet de récupérer les listes des formations positionnées sur une année
     *@param int
     */
    public function getEventInDay($day, $month, $year)
    {
        $month += 1; // car dans le tableau on commence a 0
        $strDate = strval($year) . "-" . str_pad(strval($month), 2, "0", STR_PAD_LEFT) . "-" .  str_pad(strval($day), 2, "0", STR_PAD_LEFT);

        $query = "SELECT `id`, `NAME_TRAINING`, `START_DATE_TRAINING`,`END_DATE_TRAINING`,`NUMBER_OF_PLACES_TRAINING`,`NUMBER_PLACES_TAKEN`
        FROM `training_sessions` WHERE :date BETWEEN `START_DATE_TRAINING` AND `END_DATE_TRAINING`";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("date", $strDate,PDO::PARAM_STR);
        $buildQuery->execute();
        return $buildQuery->fetch(PDO::FETCH_ASSOC);
    }
    /**
    * Méthode qui permet d'ajouter une session de formation en base de données
     * 
     * @param array
     * @return boolean
     */
    public function addTrainingSessionAdminModal(array $arrayParameters) {
        $query = "INSERT INTO `training_sessions` (`NAME_TRAINING`, `START_DATE_TRAINING`, `END_DATE_TRAINING`, `NUMBER_OF_PLACES_TRAINING`, `NUMBER_PLACES_TAKEN`) 
        VALUES (:NAME_TRAINING, :START_DATE_TRAINING, :END_DATE_TRAINING, :NUMBER_OF_PLACES_TRAINING, :NUMBER_PLACES_TAKEN);";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("NAME_TRAINING", $arrayParameters["NAME_TRAINING"], PDO::PARAM_STR);
        $buildQuery->bindValue("START_DATE_TRAINING", $arrayParameters["START_DATE_TRAINING"], PDO::PARAM_STR);
        $buildQuery->bindValue("END_DATE_TRAINING", $arrayParameters["END_DATE_TRAINING"], PDO::PARAM_STR);
        $buildQuery->bindValue("NUMBER_OF_PLACES_TRAINING", $arrayParameters["NUMBER_OF_PLACES_TRAINING"], PDO::PARAM_STR);
        $buildQuery->bindValue("NUMBER_PLACES_TAKEN", $arrayParameters["NUMBER_PLACES_TAKEN"], PDO::PARAM_STR);
        return $buildQuery->execute();
    }

/**
     * Méthode qui permet de récupérer toutes les informations d'une session par son id
     *
     * @param int
     * @return array|boolean
     */
    public function getOneTrainingSessionById(int $id) {
        $query = "SELECT `id`, `NAME_TRAINING`, `START_DATE_TRAINING`,`END_DATE_TRAINING`,`NUMBER_OF_PLACES_TRAINING`,`NUMBER_PLACES_TAKEN` FROM `training_sessions` WHERE `id` = :id;";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("id", $id, PDO::PARAM_INT);
        $buildQuery->execute();
        $resultQuery = $buildQuery->fetch(PDO::FETCH_ASSOC);
        if(!empty($resultQuery)) {
            return $resultQuery;
        } else {
            return false;
        }
    }
    /**
     * Méthode qui permet de modifier une session de formation  existante
     *
     * @param array
     * @return boolean
     */
    public function updateTrainingSessions(array $arrayParameters) {
        $query = "UPDATE `training_sessions`
                    SET `NAME_TRAINING` = :NAME_TRAINING,
                        `START_DATE_TRAINING` = :START_DATE_TRAINING,
                        `END_DATE_TRAINING` = :END_DATE_TRAINING,
                        `NUMBER_OF_PLACES_TRAINING` = :NUMBER_OF_PLACES_TRAINING,
                        `NUMBER_PLACES_TAKEN` = :NUMBER_PLACES_TAKEN
                    WHERE `id` = :id;";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("NAME_TRAINING", $arrayParameters["NAME_TRAINING"], PDO::PARAM_STR);
        $buildQuery->bindValue("START_DATE_TRAINING", $arrayParameters["START_DATE_TRAINING"], PDO::PARAM_STR);
        $buildQuery->bindValue("END_DATE_TRAINING", $arrayParameters["END_DATE_TRAINING"], PDO::PARAM_STR);
        $buildQuery->bindValue("NUMBER_OF_PLACES_TRAINING", $arrayParameters["NUMBER_OF_PLACES_TRAINING"], PDO::PARAM_STR);
        $buildQuery->bindValue("NUMBER_PLACES_TAKEN", $arrayParameters["NUMBER_PLACES_TAKEN"], PDO::PARAM_STR);
        $buildQuery->bindValue("id", $arrayParameters["id"], PDO::PARAM_INT);
        return $buildQuery->execute();
    }

/**
     * Méthode qui permet la suppression d'une session de formation via son Id
     * 
     * @param int
     * @return boolean
     */
    public function deleteTrainingSessionById (int $id){
        $query = "DELETE FROM `training_sessions` WHERE `ID` = :ID;";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("ID", $id, PDO::PARAM_INT);
        return $buildQuery->execute();
    }

}  