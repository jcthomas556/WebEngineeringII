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
  <script src="scriptCode.js"></script>


</head>

<body>





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
                foreach($db->query(
                    "SELECT
                        player_fname,
                        player_lname,
                        date_entered
                    FROM
                        player_characters
                    UNION
                    SELECT
                        npc_fname,
                        npc_lname,
                        date_entered
                    FROM
                        npc_characters
                    ORDER BY date_entered DESC LIMIT 8", PDO::FETCH_ASSOC) as $holder)
                    {
                        
                        echo '<p class="lists" id="defaultList" onclick"addPlayer()" >' . $holder['player_lname'] . ', ' . $holder['player_fname'] . '</p> ';
                        
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
                    // foreach ($db->query("SELECT * FROM player_characters", PDO::FETCH_ASSOC) as $row)
                    // {
                    //     echo '<p>' . $row['player_fname'] . ' ' . $row['player_lname'] . ' - The '. $row['player_race'] . ', '. $row['player_class'] . ': AC of ' . $row['player_ac'] . ' initiative of ' . $row['player_init_bonus'] .  '<br></p>';
                    // }
                    // foreach ($db->query("SELECT * FROM npc_characters", PDO::FETCH_ASSOC) as $row)
                    // {
                    //     echo '<p>' . $row['npc_fname'] . ' ' . $row['npc_lname'] . ' - The '. $row['npc_race_type'] . ': AC of ' . $row['npc_ac'] . ' initiative of ' . $row['npc_init_bonus'] . '<br></p>';
                    // }
                    
                    //do nothing
                }

            }
            ?>

            
            
        </div>

        

        <div class="col-lg-1"></div>

        <div class="col-lg-2">

            <button type="button" class="btn btn-secondary btn-lg btn-block" onclick="addPlayers()"> Add </button>
            <br>
            <button type="button" class="btn btn-secondary btn-lg btn-block">Clear</button>
            <br>
            <button onclick="window.location.href='encounters.php'" type="button" class="btn btn-secondary btn-lg btn-block">Roll Initiative</button>
            <br>

        </div>

        <div class="col-lg-1"></div>

        <div class="col-lg-4" id="activePlayers">
        
            <ul class="list-group">
                <li class="list-group-item"> </li>
                <li class="list-group-item">Player 2 </li>
                <li class="list-group-item">Player 3 </li>
            </ul>
        </div>
    </div>

    <div class="col-lg-11">
    </div>



    <div class="col-lg-1">
        <button onclick="window.location.href='InitTracLanding.php'" type="button" class="btn btn-secondary btn-sm btn-block">Home</button>
    </div>
<script>

var list = document.getElementsByClassName("lists");
var players = ["player 1", "player 2", "player 3"];

for (let i = 0; i < list.length; i++) {
    list[i].onclick = function() { list[i].style.color = "green"; }
    //list[i].onclick = addIt() { players[i] = list[i]; }
    
    if(list[i].style.color === "green"){
        players[i] = list[i];
    }
}

//document.getElementById("demo").innerHTML = cars[0];

for (i = 0; i < players.length; i++){
	document.getElementById("activePlayers").innerHTML += "<p class = 'lists'> <br> " + players[i] + '</p>';
	
}
// for (let x=0; x< players.length; i++){
//     document.getElementById("demo").innerHTML = players;
// }

// var activePlayers = document.createElement('ul');
// for (var x = 0; x < players.length; x++){
//     var item = document.createElement('li');
//     item.appendChild(document.createTextNode(players[x]));

//     activePlayers.appendChild(item);


// }

//document.getElementById('players').appendChild(makeUL(options[0]));
    //document.getElementById("demo").innerHTML = players;

// function addPLayer(){
//     for (let i = 0; i < list.length; i++) {
//         players[i] = list[i];
//     }
// }
console.log(players);

function displayPlayers(){
    
}

</script>
</body>

</html>