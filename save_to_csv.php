<?php

// Just in case you run this off of a server that has a jacked up timezone. 
date_default_timezone_set('America/Los_Angeles');

require 'Schedule.php';
include 'Build.php';

header( 'Content-Type: application/octet-stream' );
header( 'Content-Disposition: attachment; filename=sales.csv;' );
header( 'Content-Transfer-Encoding: binary' );

echo ',Duration,Dates,Completed,Delay,Department' . "\n";
echo 'Contract Signed,,' . $Schedule->getStartDate()->format('m/d/Y') . ',,,' . $Schedule->getProjectManager() . "\n";
echo 'Input into Trello,,' . $Schedule->getStartDate()->format('m/d/Y') . ',,,' . $Schedule->getProjectManager() . "\n";
echo 'Design Begins,' . $Schedule->getBusinessDays() * $Schedule->getDesignPercentage() . ',' . $Schedule->getDesignStartDate() . ',,,' . $Schedule->getDesigner() . "\n";
echo 'Design Complete,,' . $Schedule->getDesignEndDate() . ',,,' . $Schedule->getDesigner() . ',' . "\n";
echo 'Development Begins,' . $Schedule->getBusinessDays() * $Schedule->getDevelopmentPercentage() . ',' . $Schedule->getDevelopmentStartDate() . ',,,' . $Schedule->getDeveloper() . "\n";
echo 'Development Complete,,' . $Schedule->getDevelopmentEndDate() . ',,,' . $Schedule->getDeveloper() . ',' . "\n";
echo 'QA Begins,,' . $Schedule->getQAStartDate() . ',,,,' . "\n";
echo 'QA Complete,,' . $Schedule->getQAEndDate() . ',,,,' . "\n";
echo 'Estimated launch date (' . $Schedule->getTotalWeeks() . ' wks),,' . $Schedule->getEndDate()->format('m/d/Y') . ',,,,' . "\n";