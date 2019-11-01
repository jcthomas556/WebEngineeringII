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
<body>
<script src="scriptCode.js"></script>

<div class="jumbotron text-center" style="background-color:maroon">
  <h1 id="banner">D&D Initiative Tracker</h1>
</div>
  
<div class="container">
  <h2 style="text-align:center">Creatures in this encounter</h2>
  <div class="col-lg-10" id="activePlayersEncounter"></div>

    </div>
    <!-- <li class="list-group-item">Player 1 <span class="badge">12</span></li>
  <li class="list-group-item">Player 2 <span class="badge">5</span></li> 
  <li class="list-group-item">Player 3 <span class="badge">3</span></li>
  </ul> -->
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
document.addEventListener("DOMContentLoaded" , ()=>{
    var playersFight = JSON.parse(localStorage.getItem("storedPlayers"));
    
    console.log(playersFight);
    // for (var y = 0; y < playersFight.length; y++){
    //     players.push(playersFight[y])
    // }

    addPlayersEncounter();

}
  // var playersFight = JSON.parse(localStorage.getItem("players"));

  // alert(playersFight);
  function addPlayersEncounter(){
    console.log(playersFight);
    for (i = 0; i < playersFight.length; i++){
      alert('madeit');
        document.getElementById("activePlayersEncounter").innerHTML += "<p class = 'lists' id = 'defaultList'> " + playersFight[i] + '</p>';   
        
        }
 

    }
</script>
</body>
</html>