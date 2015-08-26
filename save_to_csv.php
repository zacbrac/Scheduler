<?php

// Just in case you run this off of a server that has a jacked up timezone. 
date_default_timezone_set('America/Los_Angeles');

include 'Schedule.php';

$interval = new DateInterval('P1D');

$begin = new DateTime($_POST['start']);
$end = new DateTime($_POST['start']);

$Schedule = new Schedule($begin,$_POST['totalWeeks'],$_POST['totalHours']);

$daterange = new DatePeriod($begin, $interval ,$Schedule->getEndDate());

$Schedule->setDateRange($daterange);
$Schedule->setHolidays(file('holidays.csv'));

$Schedule->setDeveloper('Zac');
$Schedule->setDesigner('Micheal');
$Schedule->setProjectManager('Mark');

header( 'Content-Type: application/octet-stream' );
header( 'Content-Disposition: attachment; filename=sales.csv;' );
header( 'Content-Transfer-Encoding: binary' );

echo ',Duration,Dates,Completed,Delay,Department' . "\n";
echo 'Contract Signed,,' . $Schedule->getStartDate()->format('m/d/Y') . ',,,' . $Schedule->getProjectManager() . "\n";
echo 'Input into Trello,,' . $Schedule->getStartDate()->format('m/d/Y') . ',,,' . $Schedule->getProjectManager() . "\n";
echo 'Design Begins,' . $Schedule->getTotalHours() * $Schedule->getDesignPercentage() . ',' . $Schedule->getDesignStartDate() . ',,,' . $Schedule->getDesigner() . "\n";
echo 'Design Complete,,' . $Schedule->getDesignEndDate() . ',,,' . $Schedule->getDesigner() . ',' . "\n";
echo 'Development Begins,' . $Schedule->getTotalHours() * $Schedule->getDevelopmentPercentage() . ',' . $Schedule->getDevelopmentStartDate() . ',,,' . $Schedule->getDeveloper() . "\n";
echo 'Development Complete,,' . $Schedule->getDevelopmentEndDate() . ',,,' . $Schedule->getDeveloper() . ',' . "\n";
echo 'QA Begins,,' . $Schedule->getQAStartDate() . ',,,,' . "\n";
echo 'QA Complete,,' . $Schedule->getQAEndDate() . ',,,,' . "\n";
echo 'Estimated launch date (' . $Schedule->getTotalWeeks() . ' wks),,' . $Schedule->getEndDate()->format('m/d/Y') . ',,,,' . "\n";