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
    <form action="addScripture.php" method="POST">  
        <input type="text" name="book" id="book">
        <input type="text" name="chapter" id="chapter">
        <input type="text" name="verse" id="verse">
        <textarea name="content" id="content">  
        

        </textarea>
<?php
        
     
        
        foreach($db->query("Select name FROM topic", PDO::FETCH_ASSOC) as $row){
            echo "<label> " . $row['name'] . " <input type='checkbox' name='topic[]' value='" . $row['name'] . "'> </label>";
        }

?>
        <input type="checkbox" name="newTopic" id="newTopic">
        <input type="text" name="topicText" id="topicText">
        <input type="submit" value="submit" >

    </form>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $book = $_POST["book"];
        $chapter = $_POST["chapter"];
        $verse = $_POST["verse"];
        $content = $_POST["content"];
        $topic = $_POST["topic"];
        $newTopic = $_POST["newTopic"];
        


        $db->query("INSERT INTO scriptures (book, chapter, verse, content) VALUES
        ( '$book'
        , $chapter
        , $verse
        , '$content'
        )");


        if(isset($_POST['newTopic'])){
            $topicText = $_POST["topicText"];

            if(trim($topicText) != "")
            {
                $db->query("INSERT INTO topic (name) VALUES ($topicText)");


                $db->query("INSERT INTO links (topic, scripture) VALUES
                ( currval('topic_id_seq')
                , currval('scriptures_id_seq'))"
                );

            }
            
        }

        



        foreach($topic as $checked){
            $db->query("INSERT INTO links (topic, scripture) VALUES
                ((SELECT id FROM topic WHERE name = '$checked')
                , currval('scriptures_id_seq'))"
                );
        }



    }

    foreach($db->query('SELECT * FROM scriptures', PDO::FETCH_ASSOC) as $row)
    {
        echo '<p><b>' . $row['book'] . ' ' . $row['chapter'] . ':' . $row['verse'] . '</b> - "' . $row['content'];

        foreach($db->query('SELECT t.name FROM topic t, links l
        WHERE t.id = l.topic AND l.scripture = ' . $row['id'], PDO::FETCH_ASSOC) as $topic ){
            echo ' ' . $topic['name'] ;
        }
        echo '</p>';

    }
        
?>
   
</body>
</html>