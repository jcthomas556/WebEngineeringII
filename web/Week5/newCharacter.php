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
  <script src="scriptCode.js"></script>

  



</head>
<body>


<div class="jumbotron text-center" style="background-color:maroon">
  <h1 id="banner">D&D Initiative Tracker</h1>
</div>
  
<div class="container">
  
 <div class="col-sm-4" ></div>
    <div class="col-lg-4">
     <h2 style="text-align:center">Create Player Character</h2>
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
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


  <?php
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //$name = htmlspecialchars(trim($_POST['name']));

      $fname = $_POST["fname"];
      $lname = $_POST["lname"];
      $player_ac = $_POST["player_ac"];
      $init_bonus = $_POST["init_bonus"];
      $race = $_POST["race"];
      $class = $_POST["class"];

      // $checker = $db->query("SELECT count(*) FROM player_characters");
      // $result = $query->get_result();
      // var_dump($checker);



  

      $db->query(
        "INSERT INTO player_characters (player_fname, player_lname, player_ac, player_init_bonus, player_race, player_class) 
        VALUES (
          '$fname',
          '$lname',
          $player_ac,
          $init_bonus,
          '$race',
          '$class')" 
        );

      // foreach($db->query(
      //   "SELECT player_fname 
      //   FROM player_characters
      //   WHERE player_fname = '$fname'", PDO::FETCH_ASSOC) as $result)
      //   {
      //     echo '<p> success </p>';
      //   }
      
      $result = pg_query_params ( $dbconn,
      'SELECT FROM player_fname
      WHERE player_fname = $fname ',
      array ( $question_id )
    );


    if ($result === false) {
        echo pg_last_error($dbconn);
        echo '<script language="javascript">';
      echo 'alert("It failed")';
      echo '</script>';
    } else {
      echo '<script language="javascript">';
      echo 'alert("Character Entered")';
      echo '</script>';
    }
    

      }



  ?>

     <div class="col-sm-4" ></div>
     <br><br>
     <button onclick="window.location.href='InitTracLanding.php'" class="btn btn-default btn-block">Home</button>

  
</div>




</body>
</html>