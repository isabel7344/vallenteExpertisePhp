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
     * @param $month: string => mois en francais
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

    function prevMonth()
    {
        $this->currentMonthIndex -= 1;
        if ($this->currentMonthIndex <= 0) {
            $this->currentMonthIndex = 11;
            $this->year -= 1;
        }
        $this->initMonth();
    }

    function nextMonth()
    {
        $this->currentMonthIndex += 1;
        if ($this->currentMonthIndex >= 12) {
            $this->currentMonthIndex = 0;
            $this->year += 1;
        }
        $this->initMonth();
    }

    function getMonthName()
    {
        return $this->currentMonthName;
    }

    function getYear()
    {
        return $this->year;
    }

    function getNbDayInMonth()
    {
        return $this->nbDaysMonth;
    }

    function getFirstDayInMonth()
    {
        return $this->firstDayInMonth;
    }
}
