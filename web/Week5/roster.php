<?php
    require "databaseConnection.php";
    $db = get_db();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Build your DND roster!</title>
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
    <br><br><br>
    <div class="container">
        <div class="col-lg-4"  >
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" >
                <input class="form-control mr-sm-2"  type="text" autofocus="autofocus" placeholder="Search" name="name">
                <input type="submit" 
                    style="position: absolute; left: -9999px; width: 1px; height: 1px;"
                    tabindex="-1" />
                    <br>
            </form>

            <?php 
            //TODO prevent search from clearing out the array data. store array as a session variable, that way the roll initiative screen can work too
                foreach($db->query(
                    "SELECT
                        player_fname,
                        player_lname,
                        player_race,
                        player_class,
                        player_ac,
                        player_init_bonus,
                        date_entered
                    FROM
                        player_characters
                    UNION
                    SELECT
                        npc_fname,
                        npc_lname,
                        npc_race_type,
                        NULL,
                        npc_ac,
                        npc_init_bonus,
                        date_entered                      
                    FROM
                        npc_characters
                    ORDER BY date_entered DESC LIMIT 8", PDO::FETCH_ASSOC) as $holder)
                    {
                        
                        //echo '<p class="lists" id="defaultList" onclick"addPlayer()" >' . $holder['player_lname'] . ', ' . $holder['player_fname'] . '</p> ';
                        echo '<p class="lists" id="defaultList" onclick"addPlayer()" >' . $holder['player_fname'] . ' ' . $holder['player_lname'] . ' - The '. $holder['player_race'] . ', '. $holder['player_class'] .
                         ': AC of ' . $holder['player_ac'] . ' initiative of ' . $holder['player_init_bonus'] .  '</p> ';
           
                    }

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $name = htmlspecialchars(trim($_POST['name'])); 

                if($name != ""){
                    echo '<script type="text/javascript">',
                    'deleteDefault();',
                    '</script>';
            
                    foreach ($db->query("SELECT * FROM player_characters WHERE player_fname='$name'", PDO::FETCH_ASSOC) as $row)
                    {
                        echo '<p class="lists">' . $row['player_fname'] . ' ' . $row['player_lname'] . ' - The '. $row['player_race'] . ', '. $row['player_class'] . ': AC of ' . $row['player_ac'] . ' initiative of ' . $row['player_init_bonus'] .  '<br></p>';
                    }
                    foreach ($db->query("SELECT * FROM npc_characters WHERE npc_fname = '$name'", PDO::FETCH_ASSOC) as $row)
                    {
                        echo '<p class="lists">' . $row['npc_fname'] . ' ' . $row['npc_lname'] . ' - The '. $row['npc_race_type'] . ': AC of ' . $row['npc_ac'] . ' initiative of ' . $row['npc_init_bonus'] . '<br></p>';
                    }
                    foreach ($db->query("SELECT * FROM player_characters WHERE player_lname='$name'", PDO::FETCH_ASSOC) as $row)
                    {
                        echo '<p class="lists">' . $row['player_fname'] . ' ' . $row['player_lname']  .  ' - The '. $row['player_race'] . ', '. $row['player_class'] . ': AC of ' . $row['player_ac'] . ' initiative of ' . $row['player_init_bonus'] . '<br></p>';
                    }
                    foreach ($db->query("SELECT * FROM npc_characters WHERE npc_lname = '$name'", PDO::FETCH_ASSOC) as $row)
                    {
                        echo '<p class="lists">' . $row['npc_fname'] . ' ' . $row['npc_lname'] . ' - The ' . $row['npc_race_type'] . ': AC of ' . $row['npc_ac'] . ' initiative of ' . $row['npc_init_bonus'] . '<br></p>';
                    }
               
                }

            }
            ?>
  
        </div>

        <div class="col-lg-1"></div>

        <div class="col-lg-2">

            <button type="button" class="btn btn-secondary btn-lg btn-block" onclick="addPlayers()"> Add </button>
            <br>
            <button type="button" class="btn btn-secondary btn-lg btn-block" onclick="clearPlayers()">Clear</button>
            <br>
            <button onclick="rollInitiative();" type="button" class="btn btn-secondary btn-lg btn-block" >Roll Initiative</button>
            <br>

        </div>

        <div class="col-lg-1"></div>

        <div class="col-lg-4" id="activePlayers"></div>
    </div>

    <div class="col-lg-11">
    </div>
    <div class="col-lg-1">
        <button onclick="window.location.href='InitTracLanding.php'" type="button" class="btn btn-secondary btn-sm btn-block">Home</button>
    </div>
<script>

var list = document.getElementsByClassName("lists");
var players = [];
url = 'encounters.php?,';

for (let i = 0; i < list.length; i++) {
    list[i].onclick = function() { 
        list[i].style.backgroundColor = "lightgreen"; 

        
        players.push(list[i].innerHTML); // fill the players array

        var string = players[i];
        var firstName = string.replace(/ .*/,''); // get the string out of players and put it in firstName
        
        var result = url.concat(firstName, ",");
        
        delete url;
        url = result;
        //shown to work ^
        //url will equal the new url

    }
    
}

function rollInitiative(){
    window.location.href=url;
}


function clearPlayers(){
    players.length = 0;
    document.getElementById("activePlayers").innerHTML = "";
    for (i = 0; i < list.length; i++){
        list[i].style.backgroundColor = ""; 
    }
    //loop through and reset the color on all ha
    localStorage.clear();
}

//on pageload, load all globals from localStorage to players array
document.addEventListener("DOMContentLoaded" , ()=>{
    var playersFight = JSON.parse(localStorage.getItem("storedPlayers"));
    
    

    for (var y = 0; y < playersFight.length; y++){
        players.push(playersFight[y])
    }
   
    addPlayers();

})

</script>
</body>

</html>