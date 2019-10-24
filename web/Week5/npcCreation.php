<?php
    require "databaseConnection.php";
    $db = get_db();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Create a new NPC</title>
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
     <h2 style="text-align:center">New NPC Character</h2>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <div class="form-group">
      <input type="text" class="form-control" id="fname" placeholder="First Name" name="fname" required>
    </div>
    <div class="form-group">
      <input type="text" class="form-control" id="lname" placeholder="Last Name" name="lname" required>
    </div>
    <div class="form-group">
      <input type="int" class="form-control" id="npc_ac" placeholder="AC" name="npc_ac" required>
    </div>
    <div class="form-group">
      <input type="text" class="form-control" id="init_bonus" placeholder="init_bonus" name="npc_init_bonus" required>
    </div>
    <div class="form-group">
      <input type="text" class="form-control" id="classification" placeholder="classification, Ex. Humanoid, Monstosity" name="classification">
    </div>
    
    <button type="submit" class="btn btn-default btn-block">Submit</button>
  </form>


  <?php
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //$name = htmlspecialchars(trim($_POST['name']));
      $fname = $_POST["fname"];
      $lname = $_POST["lname"];
      $player_ac = $_POST["npc_ac"];
      $init_bonus = $_POST["init_bonus"];
      $classification = $_POST["classification"];

      
      $db->query(
        "INSERT INTO npc_characters (npc_fname, npc_lname, npc_ac, npc_init_bonus, npc_race_type) 
        VALUES (
          '$fname',
          '$lname',
          $player_ac,
          $init_bonus,
          '$classification')" 
        );
       }
  ?>
    <div class="col-sm-4" ></div>
     <br><br>
     <button onclick="window.location.href='InitTracLanding.php'" class="btn btn-default btn-block">Home</button>

  
</div>

</body>
</html>
