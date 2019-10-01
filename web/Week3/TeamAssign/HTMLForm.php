<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" type="text/css">
  <title>Group assignment</title>
</head>

<body>

  <h2>HTML Forms</h2>

  <form method="post" action="PHPForm.php">
    First name:<br>
    <input type="text" name="firstname" value="John">
    <br>
    Email:<br>
    <input type="text" name="email" value="Email Address">
    <br><br>


    <?php
    $majorOptions = array("Computer Science","Web Design and Development","Computer Information Technology", "Computer Engineering");
    ?>
    
    <p>Please select your major:</p>

    <?php
    foreach{$majorOptions as $major){
        echo "<input type='radio' name='major' value='$major'> $major<br>";
    }
    ?>
    

    <br>
    <textarea name="comments"></textarea>


    <p>Select all continents visated</p>
    <input type="checkbox" name="continentsVisated[]" value="North America"> North America<br>
    <input type="checkbox" name="continentsVisated[]" value="South America"> South America<br>
    <input type="checkbox" name="continentsVisated[]" value="Europe"> Europe<br>
    <input type="checkbox" name="continentsVisated[]" value="Asia"> Asia<br>
    <input type="checkbox" name="continentsVisated[]" value="Australia"> Australia<br>
    <input type="checkbox" name="continentsVisated[]" value="Africa"> Africa<br>
    <input type="checkbox" name="continentsVisated[]" value="Antarctica"> Antarctica<br>

    <br>

    <input type="submit" value="Submit">

  </form>


</body>

</html>