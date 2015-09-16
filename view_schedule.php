<?php

if( empty($_POST['start']) && empty($_POST['totalWeeks']) && empty($_POST['totalHours']) ){

    echo 'Please enter valid entries. :P';
    die;

}

?>
<!DOCTYPE html>
<html lang="en" ng-app="scheduleApp">
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
    <script src="angular.min.js"></script>

    <script>
      var scheduleApp = angular.module('scheduleApp', []);

      scheduleApp.controller('ScheduleCtrl', function ($scope, $http){

        // Temporary. Will set scope variables in another view
        var start = "<?php echo $_POST['start']; ?>";
        var totalHours = "<?php echo $_POST['totalHours']; ?>";
        var totalWeeks = "<?php echo $_POST['totalWeeks']; ?>";
        var design = "<?php echo $_POST['design']; ?>";
        var development = "<?php echo $_POST['development']; ?>";
        var research = "<?php echo $_POST['research']; ?>";
        var qa = "<?php echo $_POST['qa']; ?>";
        var designer = "<?php echo $_POST['designer']; ?>";
        var developer = "<?php echo $_POST['developer']; ?>";
        var pm = "<?php echo $_POST['pm']; ?>";

        $http.get('http://markpatterson.rocks/ang-scheduler/scheduleJSON.php?start=' + start + '&totalWeeks=' + totalWeeks + '&totalHours=' + totalHours + '&design=' + design +'&development=' + development +'&research=' + research +'&qa=' + qa +'&designer=' + designer +'&developer=' + developer +'&pm=' + pm).
        then(function(response) {
            $scope.table = response.data;
        }, function(response) {
            alert("something went wrong");
        });        
                
      });

    </script>

  </head>
<body ng-controller="ScheduleCtrl">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <h1>Schedule Name</h1>
          <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <td>Tasks</td>
                    <td>Duration</td>
                    <td>Dates</td>
                    <td>Completed</td>
                    <td>Delay</td>
                    <td>Department</td> 
                </tr>
                <tr ng-repeat="cell in table">
                    <td>{{cell.Task}}</td>
                    <td>{{cell.Duration}}</td>
                    <td>{{cell.Dates}}</td>
                    <td>{{cell.Completed}}</td>
                    <td>{{cell.Delay}}</td>
                    <td>{{cell.Department}}</td>
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
                <button type="submit" class="btn btn-primary">Export to CSV</button>
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
