<?php
    require "databaseConnection.php";
    $db = get_db();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Create a new Character</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=MedievalSharp&display=swap" rel="stylesheet"> 
  <link rel="stylesheet" href="styling.css" />

  



</head>
<body>


<div class="jumbotron text-center" style="background-color:maroon">
  <h1 id="banner">D&D Initiative Tracker</h1>
</div>
  
<div class="container">
  
 <div class="col-sm-4" ></div>
    <div class="col-lg-4">
     <h2 style="text-align:center">Create Player Character</h2>
  <form action="/action_page.php">
    <div class="form-group">
      <input type="text" class="form-control" id="fname" placeholder="First Name" name="fname" required>
    </div>
    <div class="form-group">
      <input type="text" class="form-control" id="lname" placeholder="Last Name" name="lname" required>
    </div>
    <div class="form-group">
      <input type="text" class="form-control" id="player_ac" placeholder="Player AC" name="player_ac" required>
    </div>
    <div class="form-group">
      <input type="text" class="form-control" id="init_bonus" placeholder="Player Initiative Bonus" name="init_bonus" required>
    </div>
    <div class="form-group">
      <input type="text" class="form-control" id="race" placeholder="Race" name="race">
    </div>
    <div class="form-group">
      <input type="text" class="form-control" id="class" placeholder="Class" name="class">
    </div>
    <button type="submit" class="btn btn-default btn-block">Submit</button>
  </form>
     <div class="col-sm-4" ></div>
     <br><br>
     <button onclick="window.location.href='InitTracLanding.php'" class="btn btn-default btn-block">Home</button>

  
</div>

</body>
</html>