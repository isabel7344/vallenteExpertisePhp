<?php
class CalendrierSession
{
    /**
     * Index of the current month
     */
    private $currentMonthIndex;

    /**
     * Name of the current Month
     */
    private $currentMonthName;

    /**
     * Array of all the month
     */
    private $months;

    /**
     * Current year in the calendar
     */
    private $year;

    private $firstDayInMonth;

    private $nbDaysMonth;


    /** crée un calendrier
     * @param $year: int => anée
     */
    function __construct($month, $year)
    {
        $this->months = [
            'Janvier',
            'Février',
            'Mars',
            'Avril',
            'Mai',
            'Juin',
            'Juillet',
            'Août',
            'Septembre',
            'Octobre',
            'Novembre',
            'Décembre',
        ];
        
        $this->currentMonthName = $month;
        $this->year = $year;
        $this->initMonth();
    }

    /**
     * Initialize all the variable used to draw the month table
     */
    function initMonth()
    {
        //! Si aucun mois ou année n'est recupéré on prend le mois et l'année actuel
        if (!$this->currentMonthName || !$this->year) {
            $this->currentMonthIndex = (int)date("m", time()) - 1;
            $this->currentMonthName = $this->months[$this->currentMonthIndex];
            $this->year = (int)date("Y", time());
        }
        // recalcule le premier jour pour ce mois et le nombre de jour total du mois
        $this->firstDayInMonth = strftime('%u', strtotime(strval($this->currentMonthIndex + 1) . '/01/' . strval($this->year)));
        $this->nbDaysMonth = cal_days_in_month(CAL_GREGORIAN, $this->currentMonthIndex + 1, $this->year);
        $this->currentMonthName = $this->months[$this->currentMonthIndex];
    }
    
    /**
      * fonction qui permet de recupérer le mois précedent du calendrier 
      * $currentMonthIndex: int=> index du mois 
      */

    function prevMonth()
    {
        $this->currentMonthIndex -= 1;
        if ($this->currentMonthIndex <= 0) {
            $this->currentMonthIndex = 11;
            $this->year -= 1;
        }
        $this->initMonth();
    }
/**
      * fonction qui permet de recupérer le mois suivant du calendrier 
      * $currentMonthIndex: int=> index du mois 
       *$year: int=> année
      */

    function nextMonth()
    {
        $this->currentMonthIndex += 1;
        if ($this->currentMonthIndex >= 12) {
            $this->currentMonthIndex = 0;
            $this->year += 1;
        }
        $this->initMonth();
    }
/**
 * function qui permet d'afficher le nom du mois en cours 
 * 
 */

    function getMonthName()
    {
        return $this->currentMonthName;
    }
/**
 * function qui permet d'afficher l'année  en cours 
 * 
 */
    function getYear()
    {
        return $this->year;
    }
/**
 * function qui permet d'afficher le nombre de jour dans le mois 
 * 
 */
    function getNbDayInMonth()
    {
        return $this->nbDaysMonth;
    }
/**
 * function qui permet d'afficher le premier jour du mois 
 * 
 */
    function getFirstDayInMonth()
    {
        return $this->firstDayInMonth;
    }
/**
 * function qui permet d'afficher l'index du mois 
 * 
 */
    function getMonthIndex()
    {
        return $this->currentMonthIndex;
    }
}
