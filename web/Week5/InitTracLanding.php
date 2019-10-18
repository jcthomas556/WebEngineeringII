<?php
    require "databaseConnection.php";
    $db = get_db();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>DnD Initiative Tracker</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=MedievalSharp&display=swap" rel="stylesheet"> 
  <link rel="stylesheet" href="styling.css" />


</head>
<body>

 <?php
                 foreach ($db->query('SELECT * FROM player_characters', PDO::FETCH_ASSOC) as $row)
                 {
                     echo '<p><b>' . $row['player_fname'] . ' ' . $row['player_lname'] . 
                     'AC:' . $row['player_ac'] . ' -- ' . $row['player_race'] . ', ' . $row['player_class'] . '</p>';
                 }
             ?>

<div class="jumbotron text-center" style="background-color:maroon">
  <h1 id="banner">D&D Initiative Tracker</h1>
</div>
  
<div class="container">
  <div class="row"></div>
 <div class="col-sm-4" ></div>
    <div class="col-lg-4">
     <button onclick="window.location.href='newCharacter.php'" type="button" class="btn btn-secondary btn-lg btn-block">Create PC</button>
     <div class="col-sm-4" ></div>
     <br><br>
     <button onclick="window.location.href='npcCreation.php'" type="button" class="btn btn-secondary btn-lg btn-block">Create NPC</button>
     <div class="col-sm-4" ></div>
     <br><br>
     <button onclick="window.location.href='roster.php'" type="button" class="btn btn-primary btn-lg btn-block">Start Roster!</button>
     <div class="col-sm-4" ></div>
    </div>
    <div class="col-lg-4"> </div>
  </div>
</div>

</body>
</html>