<?php
    require "databaseConnection.php";
    $db = get_db();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>DnD Encounter builder</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=MedievalSharp&display=swap" rel="stylesheet"> 
  <link rel="stylesheet" href="styling.css" />


</head>
<body class="paper">
<script src="scriptCode.js"></script>

<div class="jumbotron text-center" style="background-color:maroon">
  <h1 id="banner">D&D Initiative Tracker</h1>
</div>
  
<div class="container">
  <h2 style="text-align:center">Creatures in this encounter</h2>
  <div id="activePlayersEncounter"></div>

    
  <button type="button" onclick="reRoll()" class="btn btn-secondary btn-lg btn-block">Re-Roll</button>
  
</div>

<br>

<div>
  
 <div class="col-lg-11" >  
</div>
  

 	
 <div class="col-lg-1"> 
    <button onclick="window.location.href='roster.php'" type="button" class="btn btn-secondary btn-sm btn-block">End Fight</button> 
  <br>
    <button onclick="window.location.href='InitTracLanding.php'" type="button" class="btn btn-secondary btn-sm btn-block">Home</button>
 </div>
 
 </div>




<?php
$diceRolls = array();
     if ($_SERVER['REQUEST_METHOD'] == 'GET') {
      $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 
                "https" : "http") . "://" . $_SERVER['HTTP_HOST'] .  
                $_SERVER['REQUEST_URI']; 
       
       $people = (explode(",", $link, -1));
       
       for($i=0; $i < count($people) - 1; $i++){
        
         //echo $people[$i+1];
         //[1 = first name]
         //[2 = second name]
        $temp = $people[$i+1];

        
        foreach($db->query(
          "SELECT
              player_fname,
              player_init_bonus
          FROM
              player_characters
          WHERE
              player_fname = '$temp'
          UNION
          SELECT
            npc_fname,
            npc_init_bonus
          FROM
            npc_characters
          WHERE
              npc_fname ='$temp'", PDO::FETCH_ASSOC) as $holder)
          {
              
              $playerRoll = $holder['player_init_bonus'] + rand(1,20);
              
              array_push($diceRolls, $playerRoll);
              
              
          }          
       }
     }

 ?>

<script>
var playersFight=[];
var displayArray =[];
var rollResults = [];

document.addEventListener("DOMContentLoaded" , ()=>{
    var result = JSON.parse(localStorage.getItem("storedPlayers"));
    
    for (var y = 0; y < result.length; y++){
        playersFight.push(result[y])
    }
    console.log(playersFight);

    addPlayersEncounter();

})
  
 
  function addPlayersEncounter(){
    console.log(playersFight);

    displayArray = <?php echo json_encode($diceRolls); ?>;  /////////////////

    for (i = 0; i < playersFight.length; i++){

        console.log(displayArray);

          
        document.getElementById("activePlayersEncounter").innerHTML += "<p class = 'lists activePlayersEncounter' id = 'defaultList' style=' order : " + displayArray[i] + " ; background-color: papayawhip; '> <span class='badge' id='spanSpacing'> " + displayArray[i] + "</span>" + playersFight[i] + "</p>";

        }
   
        
    }
  function reRoll(){
    //var temp = 0;
    //var temp2 = 0;


    document.getElementById("activePlayersEncounter").innerHTML = "";
    for(i=0; i<displayArray.length; i++){
      var temp = 0;
    var temp2 = 0;

    rollResults = <?php echo json_encode($diceRolls); ?>;  
      //console.log(displayArray);
      alert(rollResults[i]);
    temp = rollResults[i];
    temp2 = (temp + Math.floor(Math.random() * 20) + 1);


    
    document.getElementById("activePlayersEncounter").innerHTML += "<p class = 'lists activePlayersEncounter' id = 'defaultList' style=' order : " + temp2 + " ; background-color: papayawhip; '> <span class='badge' id='spanSpacing'> " + temp2 + "</span>" + playersFight[i] + "</p>";

    }
  }
</script>
</body>
</html>