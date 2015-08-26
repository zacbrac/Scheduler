<?php

// Just in case you run this off of a server that has a jacked up timezone. 
date_default_timezone_set('America/Los_Angeles');

if( !empty($_POST['start']) && !empty($_POST['totalWeeks']) && !empty($_POST['totalHours']) ){

    include 'Schedule.php';

    $interval = new DateInterval('P1D');

    $begin = new DateTime($_POST['start']);
    $end = new DateTime($_POST['start']);

    $Schedule = new Schedule($begin,$_POST['totalWeeks'],$_POST['totalHours']);
    
    $daterange = new DatePeriod($begin, $interval ,$Schedule->getEndDate());

    $Schedule->setDateRange($daterange);
    $Schedule->setHolidays(file())

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <td></td>
            <td>Duration</td>
            <td>Dates</td>
            <td>Completed</td>
            <td>Delay</td>
            <td>Department</td> 
        </tr>
        <tr>
            <td><b>Contract Signed</b></td>
            <td><?php echo $Schedule->getStart(); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Total Weeks</td>
            <td><?php echo $Schedule->getTotalWeeks(); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Total Weeks</td>
            <td><?php echo $Schedule->getTotalWeeks(); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Total Weeks</td>
            <td><?php echo $Schedule->getTotalWeeks(); ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <?php
            echo 'Total weeks ' . $Schedule->getTotalWeeks() . '<br/>';
            echo 'Total business days ' . $Schedule->getTotalBusinessDays() . '<br/>';
            echo 'Total hours allotted ' . $Schedule->getTotalHours() . '<br/><br/>';
            echo 'Start date ' . $begin->format('m/d/Y') . '<br/>';
            echo 'Estmated launch date ' . $endDate->format('m/d/Y') . '<br/><br/>';
            
            echo 'The following are all of the days that Miva will be closed for holidays <br/>';
            
            foreach ($holidays as $key => $holiday) {
                
                echo $holiday . '<br>';

            }

            echo '<br>';
            echo 'Design hours allotted ' . ($totalHours * $designPercent) . '<br/>';
            echo 'Design phase will last ' . ($totalWeeks * $designPercent) . ' weeks<br/>';
            echo 'Design phase will last ' . ($totalBusinessDays * $designPercent) . ' days<br/>';
            echo 'Design Percentage is ' . $designPercent . '<br/><br/>';
            echo 'Development hours allotted ' . ($totalHours * $developmentPercent) . '<br/>';
            echo 'Development phase will last ' . ($totalWeeks * $developmentPercent) . ' weeks<br/>';
            echo 'Development phase will last ' . ($totalBusinessDays * $developmentPercent) . ' days<br/>';
            echo 'Development Percentage is ' . $developmentPercent . '<br/><br/>';
            echo 'Reseach / Training hours allotted ' . ($totalHours * $researchPercent) . '<br/>';
            echo 'Research and Training phases will each last ' . ($totalWeeks * $researchPercent / 2) . ' weeks<br/>'; 
            echo 'Research phase will last ' . ($totalBusinessDays * $researchPercent / 2) . ' days<br/>';
            echo 'Training phase will last ' . ($totalBusinessDays * $researchPercent / 2) . ' days<br/>';
            echo 'Research and Training Percentage is ' . $researchPercent . '<br/><br/>';
            echo 'QA hours allotted ' . ($totalHours * $qaPercent) . '<br/>';
            echo 'QA phase will last ' . ($totalWeeks * $qaPercent) . ' weeks<br/>';
            echo 'QA phase will last ' . ($totalBusinessDays * $qaPercent) . ' days<br/>';
            echo 'QA Percentage is ' . $qaPercent . '<br/><br/>';
            echo 'Design: ' . $designStartDate . ' -> ' . $designEndDate . '<br/>';
            echo 'Development: ' . $devStartDate . ' -> ' . $devEndDate . '<br/>';
            echo 'Training: ' . $trainingStartDate . ' -> ' . $trainingEndDate . '<br/>';
            echo 'QA: ' . $qaStartDate . ' -> ' . $qaEndDate . '<br/>';
            echo 'Launch date(tentative): ' . $endDate->format('m/d/Y');
        ?>
    </table>
</body>
</html>

<?php } ?>
