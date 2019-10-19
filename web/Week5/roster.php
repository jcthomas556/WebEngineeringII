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
  

</head>

<body>



    <div class="jumbotron text-center" style="background-color:maroon">
        <h1 id="banner">D&D Initiative Tracker</h1>
    </div>
    <br><br><br>
    <div class="container">
        <div class="col-lg-4"  >
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" >
                <input class="form-control mr-sm-2" type="text" placeholder="Search" name="name">
                <input type="submit" value="Search" />
            </form>
            <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $name = htmlspecialchars(trim($_POST['name']));
        
                    foreach ($db->query("SELECT * FROM player_characters WHERE fname='$name'", PDO::FETCH_ASSOC) as $row)
                    {
                        echo '<p>' . $row['fname'] . ' ' . $row['lname'] . '</p>';
                        //echo '<p><a href="scripture.php?id=' . $row['id'] . '"><b>' . $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . '</b></a></p>';
                    }
                }
            ?>
            
        </div>

        <div class="col-lg-1"></div>

        <div class="col-lg-2">

            <button type="button" class="btn btn-secondary btn-lg btn-block"> Add </button>
            <br>
            <button type="button" class="btn btn-secondary btn-lg btn-block">Clear</button>
            <br>
            <button onclick="window.location.href='encounters.php'" type="button" class="btn btn-secondary btn-lg btn-block">Roll Initiative</button>

        </div>

        <div class="col-lg-1"></div>

        <div class="col-lg-4">
            <ul class="list-group">
                <li class="list-group-item">Player 1 </li>
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
</body>

</html>