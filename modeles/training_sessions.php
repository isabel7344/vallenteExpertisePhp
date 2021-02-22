<?php
require("../modeles/database.php");

class TrainingSessions extends Database
{
    private $id;
    private $Name_training;
    private $START_DATE_TRAINING;
    private $End_Date_training;
    private $Number_of_places_training;
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
     * Get the value of Number_of_places_training
     */
    public function getNumber_of_places_training()
    {
        return $this->Number_of_places_training;
    }

    /**
     * Set the value of Number_of_places_training
     *
     * @return  self
     */
    public function setNumber_of_places_training($Number_of_places_training)
    {
        $this->Number_of_places_training = $Number_of_places_training;

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
        $month += 1; // car dnas le tableau on commence a 0
        $strDate = strval($year) . "-" . str_pad(strval($month), 2, "0", STR_PAD_LEFT) . "-" .  str_pad(strval($day), 2, "0", STR_PAD_LEFT);
        
        $query = "SELECT `id`, `NAME_TRAINING`, `START_DATE_TRAINING`,`END_DATE_TRAINING`,`NUMBER_OF_PLACES_TRAINING`
        FROM `training_sessions` WHERE :date BETWEEN `START_DATE_TRAINING` AND `END_DATE_TRAINING`";
        $buildQuery = parent::getDb()->prepare($query);
        $buildQuery->bindValue("date", $strDate); // TODO mettre varchar
        $buildQuery->execute();
        return $buildQuery->fetch(PDO::FETCH_ASSOC);
    }
}
