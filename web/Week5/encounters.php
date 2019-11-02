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

    
  <button type="button" class="btn btn-secondary btn-lg btn-block">Re-Roll</button>
  
</div>

<br>

<div>
  
 <div class="col-lg-11" >  
</div>
  

 	
 <div class="col-lg-1"> 
  <button onclick="window.location.href='InitTracLanding.php'" type="button" class="btn btn-secondary btn-sm btn-block">Home</button>
  <br>
  <button onclick="window.location.href='roster.php'" type="button" class="btn btn-secondary btn-sm btn-block">End Fight</button>
 </div>
 
 </div>


<script>
var playersFight=[];
document.addEventListener("DOMContentLoaded" , ()=>{
    var result = JSON.parse(localStorage.getItem("storedPlayers"));
    
    for (var y = 0; y < result.length; y++){
        playersFight.push(result[y])
    }
    console.log(playersFight);
    // for (var y = 0; y < playersFight.length; y++){
    //     players.push(playersFight[y])
    // }

    addPlayersEncounter();

})
  
  var temp = 10;
  function addPlayersEncounter(){
    
    //make a new display array, push each element into it, then display i and i+1 

    var displayArray = <?php echo json_encode($diceRolls); ?>;
    alert(displayArray);

    for (i = 0; i < playersFight.length; i++){
//uncomment everything and this should be ready to display in order. Recomment the current display tool
        //displayArray.push(playersFight[i]);
        //displayArray.push(diceRolls[i]);     

        
        document.getElementById("activePlayersEncounter").innerHTML += "<p class = 'lists' id = 'defaultList'> <span class='badge'></span>" + playersFight[i] + "</p>";   
        //temp = diceRolls[i];
        }
    // for (t = 0; t < displayArray.length; t = t+2){
    //   document.getElementById("activePlayersEncounter").innerHTML += "<p class = 'lists' id = 'defaultList'> <span class='badge'> " + displayArray[t+1] + "</span>" + displayArray[t] + "</p>";   

    // }
 

    }
</script>


<?php
 $diceRolls = [];
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
              //echo '<p>' . $holder['player_init_bonus'] . '</p>';
              $playerRoll = $holder['player_init_bonus'] + rand(1,20);
              //echo $playerRoll;
              $diceRolls.push($playerRoll);
              echo '<p class = "lists" id = "defaultList" style="order = "' . $playerRoll . ' > <span class="badge">' . $playerRoll . '"</span> </p>"';
      
          }
          

       }
     }

    
    


     
 

        //the number result from the query gets added to a d20 roll and then stuck into the array for global storage.

    //pass the global variables to the encounter page to be

 ?>

</body>
</html>