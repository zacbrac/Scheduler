<?php

if( empty($_POST['start']) && empty($_POST['totalWeeks']) && empty($_POST['totalHours']) ){

    echo 'Please enter valid entries. :P';
    die;

}

// Just in case you run this off of a server that has a jacked up timezone. 
date_default_timezone_set('America/Los_Angeles');

require 'Schedule.php';
include 'Build.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>View Schedule Template</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/stylin-profilin.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
<body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <h1>Schedule Name</h1>
          <div class="table-responsive">
            <table class="table table-striped">
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
                    <td></td>
                    <td><?php echo $Schedule->getStartDate()->format('m/d/Y'); ?></td>
                    <td></td>
                    <td></td>
                    <td><?php echo $Schedule->getProjectManager(); ?></td>
                </tr>
                <tr>
                    <td>Input into Trello</td>
                    <td></td>
                    <td><?php echo $Schedule->getStartDate()->format('m/d/Y'); ?></td>
                    <td></td>
                    <td></td>
                    <td><?php echo $Schedule->getProjectManager(); ?></td>
                </tr>
                <tr>
                    <td><b>Design Begins</b></td>
                    <td><?php echo $Schedule->getBusinessDays() * $Schedule->getDesignPercentage(); ?></td>
                    <td><?php echo $Schedule->getDesignStartDate(); ?></td>
                    <td></td>
                    <td></td>
                    <td><?php echo $Schedule->getDesigner(); ?></td>
                </tr>
                <tr>
                    <td><b>Design Complete</b></td>
                    <td></td>
                    <td><?php echo $Schedule->getDesignEndDate(); ?></td>
                    <td></td>
                    <td></td>
                    <td><?php echo $Schedule->getDesigner(); ?></td>
                </tr>
                <tr>
                    <td><b>Development Begins</b></td>
                    <td><?php echo $Schedule->getBusinessDays() * $Schedule->getDevelopmentPercentage(); ?></td>
                    <td><?php echo $Schedule->getDevelopmentStartDate(); ?></td>
                    <td></td>
                    <td></td>
                    <td><?php echo $Schedule->getDeveloper(); ?></td>
                </tr>
                <tr>
                    <td><b>Development Complete</b></td>
                    <td></td>
                    <td><?php echo $Schedule->getDevelopmentEndDate(); ?></td>
                    <td></td>
                    <td></td>
                    <td><?php echo $Schedule->getDeveloper(); ?></td>
                </tr>
                <tr>
                    <td>QA Begins</td>
                    <td></td>
                    <td><?php echo $Schedule->getQAStartDate(); ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>QA Complete</td>
                    <td></td>
                    <td><?php echo $Schedule->getQAEndDate(); ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Estimated launch date (<?php echo $Schedule->getTotalWeeks(); ?> wks)</td>
                    <td></td>
                    <td><?php echo $Schedule->getEndDate()->format('m/d/Y'); ?></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>

            <form action="save_to_csv.php" method="post">
                <input type="hidden" name="start" value="<?php echo $_POST['start']; ?>">
                <input type="hidden" name="totalWeeks" value="<?php echo $_POST['totalWeeks']; ?>">
                <input type="hidden" name="totalHours" value="<?php echo $_POST['totalHours']; ?>">
                <input type="hidden" name="design" value="<?php echo $_POST['design']; ?>">
                <input type="hidden" name="development" value="<?php echo $_POST['development']; ?>">
                <input type="hidden" name="research" value="<?php echo $_POST['research']; ?>">
                <input type="hidden" name="qa" value="<?php echo $_POST['qa']; ?>">
                <input type="hidden" name="designer" value="<?php echo $_POST['designer']; ?>">
                <input type="hidden" name="developer" value="<?php echo $_POST['developer']; ?>">
                <input type="hidden" name="pm" value="<?php echo $_POST['pm']; ?>">
                <button type="submit">Export to CSV</button>
            </form>

            </div>  
        </div>
      </div>    
    </div>   

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script src="js/boats-n-hoes.js"></script> 

</body>
</html>
