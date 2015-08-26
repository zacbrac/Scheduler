<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Simple PHP Scheduler</title>
</head>
<body>
    <h4>Schedule Generator</h4>
    
    <i>Please enter values for each field</i>
    
    <form action="scheduler.php" method="POST">
        <label for="start">Contract signature date: </label><input type="date" name="start"><br/>
        <label for="totalWeeks">Total Number of Weeks: </label><input type="number" name="totalWeeks" placeholder="20"><br/>
        <label for="totalHours">Total Number of Hours: </label><input type="number" name="totalHours" placeholder="200">
        <br><br>
        <p><b><i>Optional Fields - if no data is entered the following will be used:</i></b> Design: 20%, Development: 50%, Research/Training: 15%, QA: 15%</p>
        <label for="design">Design Percentage: </label><input type="number" name="design" placeholder="20"><br/>
        <label for="development">Development Percentage: </label><input type="number" name="development" placeholder="50"><br/>
        <label for="research">Research/Training Percentage: </label><input type="number" name="research" placeholder="15"><br/>
        <label for="qa">QA Percentage: </label><input type="number" name="qa" placeholder="15"><br/>
        <br>
        <input type="submit" value="generate schedule"><br/>
    </form>
</body>
</html>

