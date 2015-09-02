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

    public function getStartDate() {

        return $this->startDate;

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

    public function getDesignStartNumber() {

        return floor($this->getBusinessDays() * $this->getResearchPercentage() / 2) - 1;

    }

    public function getDesignEndNumber() {

        return floor($this->getBusinessDays() * $this->getDesignPercentage()) + $this->getDesignStartNumber();

    }

    public function getDevelopmentStartNumber() {

        return $this->getDesignEndNumber();

    }

    public function getDevelopmentEndNumber() {

        return floor($this->getBusinessDays() * $this->getDevelopmentPercentage()) + $this->getDevelopmentStartNumber();

    }

    public function getTrainingStartNumber() {

        return $this->getDevelopmentEndNumber();

    }

    public function getTrainingEndNumber() {

        return floor($this->getBusinessDays() * ($this->getResearchPercentage() / 2)) + $this->getTrainingStartNumber();

    }

    public function getQAStartNumber() {

        return $this->getTrainingEndNumber();

    }

    public function getQAEndNumber() {

        return floor($this->getBusinessDays() * $this->getResearchPercentage()) + $this->getQAStartNumber();

    }

    public function getDesignStartDate() {

        $projectDays = $this->getProjectDays();

        return $projectDays[$this->getDesignStartNumber()];

    }

    public function getDesignEndDate() {

        $projectDays = $this->getProjectDays();

        return $projectDays[$this->getDesignEndNumber()];

    }

    public function getDevelopmentStartDate() {

        $projectDays = $this->getProjectDays();

        return $projectDays[$this->getDevelopmentStartNumber()];

    }

    public function getDevelopmentEndDate() {

        $projectDays = $this->getProjectDays();

        return $projectDays[$this->getDevelopmentEndNumber()];

    }

    public function getTrainingEndDate() {

        $projectDays = $this->getProjectDays();

        return $projectDays[$this->getTrainingEndNumber()];

    }

    public function getQAStartDate() {

        $projectDays = $this->getProjectDays();

        return $projectDays[$this->getQAStartNumber()];
        
    }

    public function getQAEndDate() {

        $projectDays = $this->getProjectDays();

        return $projectDays[$this->getQAEndNumber()];

    }

    public function getDeveloper() {

        return $this->developer;

    }

    public function getDesigner() {

        return $this->designer;

    }

    public function getProjectManager() {

        return $this->projectManager;

    }

    public function setStartDate($startDate) {

        $this->startDate = $startDate;

    }

    public function setTotalWeeks($totalWeeks) {

        $this->totalWeeks = $totalWeeks;

    }

    public function setTotalHours($totalHours) {

        $this->totalHours = $totalHours;

    }

    public function setDesignPercentage($designPercentage) {

        $this->designPercentage = $designPercentage;

    }

    public function setDevelopmentPercentage($developmentPercentage) {

        $this->developmentPercentage = $developmentPercentage;

    }

    public function setResearchPercentage($researchPercentage) {

        $this->researchPercentage = $researchPercentage;

    }

    public function setQAPercentage($qaPercentage) {

        $this->qaPercentage = $qaPercentage;

    }

    public function setDeveloper($developer) {

        $this->developer = $developer;

    }

    public function setDesigner($designer) {

        $this->designer = $designer;

    }

    public function setProjectManager($projectManager) {

        $this->projectManager = $projectManager;

    }

    public function setDateRange($dateRange) {

        $this->dateRange = $dateRange;

    }

    public function setHolidays($holidays) {

        $this->holidays = $holidays;

    }

}
