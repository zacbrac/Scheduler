<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Scheduler</title>
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
        <div class="col-md-6 col-md-offset-3">
            <h1>Schedule Generator</h1>
             
            <p class="help-block">Please enter values for each field</p>
            
            <form action="view_schedule.php" method="POST">

                <div class="form-group">
                    <label for="start">Contract signature date: </label>
                    <input type="date" name="start" class="form-control">
                </div>

                <div class="form-group">
                    <label for="totalWeeks">Total Number of Weeks: </label>
                    <input type="number" name="totalWeeks" placeholder="20" class="form-control">
                </div>

                <div class="form-group">
                    <label for="totalHours">Total Number of Hours: </label>
                    <input type="number" name="totalHours" placeholder="200" class="form-control">
                </div>
                
                <p class="help-block">Optional Fields - if no data is entered the following will be used: Design: 20%, Development: 50%, Research/Training: 15%, QA: 15%</p>
                
                <div class="form-group">
                    <label for="design">Design Percentage: </label>
                    <input type="number" name="design" placeholder="20" class="form-control">
                </div>

                <div class="form-group">
                    <label for="development">Development Percentage: </label>
                    <input type="number" name="development" placeholder="50" class="form-control">
                </div>

                <div class="form-group">
                    <label for="research">Research/Training Percentage: </label>
                    <input type="number" name="research" placeholder="15" class="form-control">
                </div>

                <div class="form-group">
                    <label for="qa">QA Percentage: </label>
                    <input type="number" name="qa" placeholder="15" class="form-control">
                </div>

                <p class="help-block">Team Members assigned</p>

                <div class="form-group">
                    <label for="designer">Designer: </label>
                    <input type="text" name="designer" placeholder="15" class="form-control">
                </div>

                <div class="form-group">
                    <label for="developer">Developer: </label>
                    <input type="text" name="developer" placeholder="15" class="form-control">
                </div>

                <div class="form-group">
                    <label for="pm">Project Manager: </label>
                    <input type="text" name="pm" placeholder="15" class="form-control">
                </div>

                <button type="submit" class="btn btn-default">Generate Schedule</button>

            </form>
        </div>
      </div>    
    </div> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/boats-n-hoes.js"></script>
</body>
</html>

