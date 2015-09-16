<?
require 'Schedule.php';

if( empty($_GET['start']) && empty($_GET['totalWeeks']) && empty($_GET['totalHours']) ){
    var_dump($_GET);
    echo 'Please enter valid entries. :P';
    die;

}

$interval = new DateInterval('P1D');

$begin = new DateTime($_GET['start']);
$end = new DateTime($_GET['start']);

$Schedule = new Schedule($begin,$_GET['totalWeeks'],$_GET['totalHours']);

$daterange = new DatePeriod($begin, $interval ,$Schedule->getEndDate());

$Schedule->setDateRange($daterange);
$Schedule->setHolidays(file('holidays.csv'));

if ( !empty($_GET['design']) ) {
    $Schedule->setDesignPercentage('.'.$_GET['design']);
}
if ( !empty($_GET['development']) ) {
   $Schedule->setDevelopmentPercentage('.'.$_GET['development']);
}
if ( !empty($_GET['research']) ) {
    $Schedule->setResearchPercentage('.'.$_GET['research']);
}
if ( !empty($_GET['qa']) ) {
    $Schedule->setQAPercentage('.'.$_GET['qa']);
}
if ( !empty($_GET['designer']) ) {
    $Schedule->setDesigner($_GET['designer']);
}
if ( !empty($_GET['developer']) ) {
    $Schedule->setDeveloper($_GET['developer']);
}
if ( !empty($_GET['pm']) ) {
    $Schedule->setProjectManager($_GET['pm']);
}

$arr = array(
    array(
        "Task" => "Contract Signed",
        "Duration" => "",
        "Dates" => $Schedule->getStartDate()->format('m/d/Y'),
        "Completed" => "",
        "Delay" => "",
        "Department" => $Schedule->getProjectManager()
    ),
    array(
        "Task" => "Input into Trello",
        "Duration" => "",
        "Dates" => $Schedule->getStartDate()->format('m/d/Y'),
        "Completed" => "",
        "Delay" => "",
        "Department" => $Schedule->getProjectManager()
    ),
    array(
        "Task" => "Design Begins",
        "Duration" => $Schedule->getBusinessDays() * $Schedule->getDesignPercentage(),
        "Dates" => $Schedule->getDesignStartDate(),
        "Completed" => "",
        "Delay" => "",
        "Department" => $Schedule->getDesigner()
    ),
    array(
        "Task" => "Design Complete",
        "Duration" => "",
        "Dates" => $Schedule->getDesignEndDate(),
        "Completed" => "",
        "Delay" => "",
        "Department" => $Schedule->getDesigner()
    ),
    array(
        "Task" => "Development Begins",
        "Duration" => $Schedule->getBusinessDays() * $Schedule->getDevelopmentPercentage(),
        "Dates" => $Schedule->getDevelopmentStartDate(),
        "Completed" => "",
        "Delay" => "",
        "Department" => $Schedule->getDeveloper()
    ),
    array(
        "Task" => "Development Complete",
        "Duration" => "",
        "Dates" => $Schedule->getDevelopmentEndDate(),
        "Completed" => "",
        "Delay" => "",
        "Department" => $Schedule->getDeveloper()
    ),
    array(
        "Task" => "QA Begins",
        "Duration" => "",
        "Dates" => $Schedule->getQAStartDate(),
        "Completed" => "",
        "Delay" => "",
        "Department" => ""
    ),
    array(
        "Task" => "QA Complete",
        "Duration" => "",
        "Dates" => $Schedule->getQAEndDate(),
        "Completed" => "",
        "Delay" => "",
        "Department" => ""
    ),
    array(
        "Task" => "Estimated launch date (" . $Schedule->getTotalWeeks() . " wks)",
        "Duration" => "",
        "Dates" => $Schedule->getEndDate()->format('m/d/Y'),
        "Completed" => "",
        "Delay" => "",
        "Department" => ""
    ),
);

$json = json_encode($arr);

echo $json;

