<?php
function get_db() {
    $db = NULL;
    try
    {
      $dbUrl = getenv('DATABASE_URL');
    
      $dbOpts = parse_url($dbUrl);
    
      $dbHost = $dbOpts["host"];
      $dbPort = $dbOpts["port"];
      $dbUser = $dbOpts["user"];
      $dbPassword = $dbOpts["pass"];
      $dbName = ltrim($dbOpts["path"],'/');
    
      $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
    
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $ex)
    {
      echo 'Error!: ' . $ex->getMessage();
      die();
    }
    
    return $db;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Insert</title>
</head>
<body>
    <form>  
        <input type="text" name="book" id="book">
        <input type="text" name="chapter" id="chapter">
        <input type="text" name="verse" id="verse">
        <textarea name="content" id="content">  

        </textarea>
<?php
        
        foreach ($db->query("SELECT * FROM scriptures", PDO::FETCH_ASSOC) as $row)
        {
            echo '<p><a href="scripture.php?id=' . $row['id'] . '"><b>' . $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . '</b></a></p>';
        }
        
        foreach($db->query("Select name FROM topic", PDO::FETCH_ASSOC) as $row){
            //echo "<label> " . $row['name'] . " <input type='checkbox' name='topic[]' value='" . $row['name'] . "'> </label>";
            //echo $row['name'];
            vardump($row);
            // echo '<p>' . $row['player_fname'] . ' ' . $row['player_lname'] . ' - The '. $row['player_race'] . ', '. $row['player_class'] . 
            // ': AC of ' . $row['player_ac'] . ' initiative of ' . $row['player_init_bonus'] .  '<br></p>';
        }

?>

        <input type="submit" value="submit">

    </form>

    <?php
        
        foreach ($db->query("SELECT * FROM scriptures", PDO::FETCH_ASSOC) as $row)
        {
            echo '<p><a href="scripture.php?id=' . $row['id'] . '"><b>' . $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . '</b></a></p>';
        }
        
        // foreach($db->query("Select name FROM topic", PDO::FETCH_ASSOC) as $row){
        //     //echo "<label> " . $row['name'] . " <input type='checkbox' name='topic[]' value='" . $row['name'] . "'> </label>";
        //     //echo $row['name'];
        //     vardump($row);
        //     // echo '<p>' . $row['player_fname'] . ' ' . $row['player_lname'] . ' - The '. $row['player_race'] . ', '. $row['player_class'] . 
        //     // ': AC of ' . $row['player_ac'] . ' initiative of ' . $row['player_init_bonus'] .  '<br></p>';
        // }

?>
</body>
</html>