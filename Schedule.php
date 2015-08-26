<?php

/**
* Schedule
*/

class Schedule
{
    
    public $startDate;
    public $totalWeeks;
    public $totalHours;
    public $holidays;
    public $developer;
    public $designer;
    public $projectManager;
    public $dateRange;
    public $workingDays = ['1', '2', '3', '4', '5'];
    public $designPercentage = 0.20;
    public $developmentPercentage = 0.50;
    public $researchPercentage = 0.15;
    public $qaPercentage = 0.15;

    function __construct(\DateTime $startDate, $totalWeeks, $totalHours) {
        
        $this->startDate = $startDate;
        $this->endDate = $startDate;
        $this->totalWeeks = $totalWeeks;
        $this->totalHours = $totalHours;

    }

    public function getTotalWeeks() {

        return $this->totalWeeks;

    }

    public function getTotalHours() {

        return $this->totalHours;

    }

    public function getBusinessDays() {

        return $this->totalWeeks * 5;

    }

    public function getEndDate() {

        $clone = clone $this->startDate;

        return $clone->modify('+' . $this->getBusinessDays() . ' weekdays');

    }

    public function getDateRange() {

        return $this->dateRange;

    }

    public function getProjectDays() {

        // Array to hold the work days for the project 
        $projectDays = array();

        // Only push the days that are working days
        foreach($this->getDateRange() as $date) {
            
            if(in_array($date->format('N'), $this->workingDays)) {
            
                array_push($projectDays, $date->format("m/d/Y"));
            
            }
        
        }

        return $projectDays;

    }

    public function getHolidays() {

        return $this->holidays;

    }

    public function getResearchPercentage() {

        return $this->researchPercentage;

    }

    public function getDesignPercentage() {

        return $this->designPercentage;

    }

    public function getDevelopmentPercentage() {

        return $this->developmentPercentage;

    }

    public function getDesignStartDate() {

        return floor($this->getBusinessDays() * $this->getResearchPercentage() / 2) - 1;

    }

    public function getDesignEndNumber() {

        return floor($this->getBusinessDays() * $this->getDesignPercentage()) + $this->getDesignStartNum();

    }

    public function getDevelopmentEndNumber() {

        return floor($this->getBusinessDays() * $this->getDevelopmentPercentage()) + $this->getDesignEndNumber();

    }

    public function getTrainingEndNumber() {

        return floor($this->getBusinessDays() * ($this->getResearchPercentage() / 2)) + $this->getDevelopmentEndNumber();

    }

    public function getQAEndNumber() {

        return floor($this->getBusinessDays() * $this->getResearchPercentage()) + $this->getTrainingEndNumber();

    }

    public function getDesignEndDate() {

        $projectDays = $this->getProjectDays();

        return $projectDays[$this->getDesignEndNumber()];

    }

    public function getDevelopmentEndDate() {

        $projectDays = $this->getProjectDays();

        return $projectDays[$this->getDevelopmentEndNumber()];

    }

    public function getTrainingEndDate() {

        $projectDays = $this->getProjectDays();

        return $projectDays[$this->getTrainingEndNumber()];

    }

    public function getQAEndDate() {

        $projectDays = $this->getProjectDays();

        return $projectDays[$this->getQAEndNumber()];
    }
    
    public function setDateRange($dateRange) {

        $this->dateRange = $dateRange;

    }

    public function setHolidays($holidays) {

        $this->holidays = $holidays;

    }

}
