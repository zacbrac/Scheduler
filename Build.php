<?
$interval = new DateInterval('P1D');

$begin = new DateTime($_POST['start']);
$end = new DateTime($_POST['start']);

$Schedule = new Schedule($begin,$_POST['totalWeeks'],$_POST['totalHours']);

$daterange = new DatePeriod($begin, $interval ,$Schedule->getEndDate());

$Schedule->setDateRange($daterange);
$Schedule->setHolidays(file('holidays.csv'));

if ( !empty($_POST['design']) ) {
    $Schedule->setDesignPercent('.'.$_POST['design']);
}
if ( !empty($_POST['development']) ) {
   $Schedule->setDevelopmentPercent('.'.$_POST['development']);
}
if ( !empty($_POST['research']) ) {
    $Schedule->setResearchPercent('.'.$_POST['research']);
}
if ( !empty($_POST['qa']) ) {
    $Schedule->setQAPercent('.'.$_POST['qa']);
}
if ( !empty($_POST['designer']) ) {
    $Schedule->setDesigner($_POST['designer']);
}
if ( !empty($_POST['developer']) ) {
    $Schedule->setDeveloper($_POST['developer']);
}
if ( !empty($_POST['pm']) ) {
    $Schedule->setProjectManager($_POST['pm']);
}
